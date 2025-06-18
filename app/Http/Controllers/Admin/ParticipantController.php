<?php

namespace App\Http\Controllers\Admin;

use App\Models\Participant;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingSchedule;

class ParticipantController extends Controller
{

    public function __construct()
    {
        // Hanya user dengan permission "view-participants" yang bisa akses index
        $this->middleware('permission:view-participant')->only(['index']);

        // Hanya user dengan permission "create-participants" yang bisa tambah peserta
        $this->middleware('permission:create-participant')->only(['create', 'store']);

        // Hanya user dengan permission "edit-participants" yang bisa edit peserta
        $this->middleware('permission:edit-participant')->only(['edit', 'update']);

        // Hanya user dengan permission "delete-participants" yang bisa hapus peserta
        $this->middleware('permission:delete-participant')->only(['destroy']);
    }
    public function index(Request $request)
    {
        $query = Participant::with('trainingSchedule');

        // Cari berdasarkan nama atau email
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            // dd($search);
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        // Filter berdasarkan jadwal pelatihan
        if ($request->has('schedule_id')) {
            $scheduleId = $request->input('schedule_id');
            $query->where('training_schedule_id', $scheduleId);
        }

        // Kirim juga data jadwal (untuk header jika ada filter)
        $schedule = null;
        if ($request->has('schedule_id')) {
            $schedule = TrainingSchedule::find($request->input('schedule_id'));
        }

        // Pagination
        $participants = $query->latest()->paginate(10)->withQueryString();

        return view('admin.participants.index', compact('participants', 'schedule'));
    }

    public function show(Participant $participant)
    {
        return view('admin.participants.show', compact('participant'));
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return back()->with('success', 'Peserta berhasil dihapus');
    }
}