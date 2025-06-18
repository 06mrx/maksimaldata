<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Models\TrainingSchedule;
use Illuminate\Http\Request;

class TrainingScheduleController extends Controller
{
    public function __construct()
    {
        // Hanya user dengan permission "view-training-schedules" yang bisa akses index
        $this->middleware('permission:view-trainingschedule')->only(['index']);

        // Hanya user dengan permission "create-training-schedules" yang bisa tambah jadwal
        $this->middleware('permission:create-trainingschedule')->only(['create', 'store']);

        // Hanya user dengan permission "edit-training-schedules" yang bisa edit jadwal
        $this->middleware('permission:edit-trainingschedule')->only(['edit', 'update']);

        // Hanya user dengan permission "delete-training-schedules" yang bisa hapus jadwal
        $this->middleware('permission:delete-trainingschedule')->only(['destroy']);
    }

    public function index(Request $request)
    {

        // Ambil parameter search dan per_page
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        // Query dasar
        $query = TrainingSchedule::query();

        if ($search) {
            $query->where('type', 'like', "%$search%");
        }
        $query->orderBy('start_date', 'desc');
        $schedules = $query->withCount('participants')->paginate($perPage)->withQueryString();

        return view('admin.training-schedules.index', compact('schedules'));

    }

    public function create()
    {
        return view('admin.training-schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:,mtcna',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'nullable|in:open,closed',
        ]);

        TrainingSchedule::create($request->all() + ['status' => $request->status ?? 'open']);

        return redirect()->route('admin.training-schedules.index')
            ->with('success', 'Jadwal pelatihan berhasil ditambahkan.');
    }

    public function edit(TrainingSchedule $trainingSchedule)
    {
        return view('admin.training-schedules.edit', compact('trainingSchedule'));
    }

    public function update(Request $request, TrainingSchedule $trainingSchedule)
    {
        $request->validate([
            'type' => 'required|in:mtcre,mtcna',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'nullable|in:open,closed',
        ]);

        $trainingSchedule->update($request->all());

        return redirect()->route('admin.training-schedules.index')
            ->with('success', 'Jadwal pelatihan berhasil diperbarui.');
    }

    public function destroy(TrainingSchedule $trainingSchedule)
    {
        $trainingSchedule->delete();

        return redirect()->route('admin.training-schedules.index')
            ->with('success', 'Jadwal pelatihan berhasil dihapus.');
    }
}
