<?php
namespace App\Http\Controllers\Admin;

use App\Models\TrainingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;


class TrainingTypeController extends Controller
{

    public function __construct()
    {
        // Hanya user dengan permission "view-training-types" yang bisa akses index
        $this->middleware('permission:view-trainingtype')->only(['index']);

        // Hanya user dengan permission "create-training-types" yang bisa tambah jadwal
        $this->middleware('permission:create-trainingtype')->only(['create', 'store']);

        // Hanya user dengan permission "edit-training-types" yang bisa edit jadwal
        $this->middleware('permission:edit-trainingtype')->only(['edit', 'update']);

        // Hanya user dengan permission "delete-training-types" yang bisa hapus jadwal
        $this->middleware('permission:delete-trainingtype')->only(['destroy']);
    }
    public function index()
    {
        $types = TrainingType::paginate(10);
        return view('admin.training-types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.training-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('training_types', 'name')->whereNull('deleted_at'),
            ],
            'full_name' => 'required|string|max:255',
            // 'price' => 'required|integer|min:0',
        ]);

        TrainingType::create($request->all());

        return redirect()->route('admin.training-types.index')->with('success', 'Jenis pelatihan berhasil ditambahkan.');
    }

    public function show(TrainingType $trainingType)
    {
        return view('admin.training-types.show', compact('trainingType'));
    }

    public function edit(TrainingType $trainingType)
    {
        return view('admin.training-types.edit', compact('trainingType'));
    }

    public function update(Request $request, TrainingType $trainingType)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('training_types', 'name')
                    ->ignore($trainingType->id)
                    ->whereNull('deleted_at'),
            ],
            'full_name' => 'required|string|max:255',
        ]);

        $trainingType->update($request->all());

        return redirect()->route('admin.training-types.index')->with('success', 'Jenis pelatihan berhasil diperbarui.');
    }

    public function destroy(TrainingType $trainingType)
    {
        $trainingType->trainingSchedules()->each(function ($schedule) {
            $schedule->participants()->delete(); // Hapus peserta terkait
            $schedule->delete(); // Hapus jadwal
        });
        $trainingType->delete();
        return back()->with('success', 'Jenis pelatihan berhasil dihapus.');
    }
}