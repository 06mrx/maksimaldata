<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Models\TrainingSchedule;
use Illuminate\Http\Request;
use App\Models\TrainingType;
use App\Models\Facility;
use Illuminate\Validation\Rule;
use App\Models\TrainingScheduleFacility; 
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
        $trainingTypes = TrainingType::all();
        $facilities = Facility::all();
        return view('admin.training-schedules.create', compact('trainingTypes', 'facilities'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'training_type_id' => 'required',
            'start_date' => 'required|date',
            'location' => 'required',
            'end_date' => 'required|date|after:start_date',
            'status' => 'nullable|in:open,closed',
            'price' => 'required|integer|min:0',
            'note' => 'nullable|string|max:255',
            'facilities' => 'nullable|array',
            'facilities.*' => [
                'exists:facilities,id',
                Rule::unique('training_schedule_facilities', 'facility_id')
                    ->where('training_schedule_id', $request->training_type_id)
                    ->whereNull('deleted_at'),
            ],
        ]);

        $trainingSchedule = TrainingSchedule::create($request->all() + ['status' => $request->status ?? 'open']);
        // Jika ada fasilitas yang dipilih, simpan ke tabel pivot
        if ($request->has('facilities')) {
            foreach ($request->facilities as $facilityId) {
                $trainingSchedule->trainingScheduleFacilities()->create([
                    'facility_id' => $facilityId,
                ]);
            }
        }
        
        return redirect()->route('admin.training-schedules.index')
            ->with('success', 'Jadwal pelatihan berhasil ditambahkan.');
    }

    public function edit(TrainingSchedule $trainingSchedule)
    {
        $trainingTypes = TrainingType::all();
        $facilities = Facility::all();
        // Ambil fasilitas yang sudah ada untuk jadwal ini
        // $selectedFacilities = $trainingSchedule->trainingScheduleFacilities->pluck('facility_id')->toArray();
        return view('admin.training-schedules.edit', compact('trainingSchedule', 'trainingTypes', 'facilities'));
    }

    public function update(Request $request, TrainingSchedule $trainingSchedule)
    {
        
        $request->validate([
            'training_type_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required',
            'status' => 'nullable|in:open,closed',
            'price' => 'required|integer|min:0',
            'note' => 'nullable|string|max:255',
            'facilities' => 'nullable|array',
        
        ]);

        $trainingSchedule->update($request->all());
        // Hapus fasilitas lama
        $trainingSchedule->trainingScheduleFacilities()->delete();
        // Jika ada fasilitas yang dipilih, simpan ke tabel pivot
        if ($request->has('facilities')) {
            foreach ($request->facilities as $facilityId) {
                $trainingSchedule->trainingScheduleFacilities()->create([
                    'facility_id' => $facilityId,
                ]);
            }
        }
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
