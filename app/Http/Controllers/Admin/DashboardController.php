<?php

namespace App\Http\Controllers\Admin;

use App\Models\TrainingSchedule;
use App\Models\Participant;
use App\Models\TrainingType;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        // Total semua peserta
        $totalParticipants = Participant::whereHas('trainingSchedule')
            ->count();
        // dd($totalParticipants);
        // Ambil semua training type dengan jumlah peserta (dinamis)
        $participantCounts = TrainingType::withCount([
            'trainingSchedules as participants_count' => function ($query) {
                $query->withCount('participants');
            }
        ])->get();

        

        // Atau jika ingin langsung ambil jumlah participant per training_type
        $participantCounts = TrainingType::withCount(['participants'])->get();
        // dd($participantCounts);
        // Jadwal terdekat yang masih open
        $upcomingSchedules = TrainingSchedule::with(['trainingType', 'participants'])
            ->where('status', 'open')
            ->whereDate('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->limit(5)
            ->get();

        // Peserta terbaru
        $recentParticipants = Participant::whereHas('trainingSchedule')
            ->with('trainingSchedule.trainingType')
            ->latest()
            ->take(5)
            ->get();

        // Data grafik: jumlah pendaftar per bulan
        $registrationsByMonth = Participant::selectRaw("DATE_FORMAT(created_at, '%M %Y') as month, COUNT(*) as count")
            ->groupByRaw("DATE_FORMAT(created_at, '%M %Y')")
            ->orderByRaw("MIN(created_at)")
            ->whereHas('trainingSchedule')
            ->get()
            ->keyBy('month');

        $months = [];
        $data = [];

        for ($i = 11; $i >= 0; $i--) {
            $monthLabel = \Carbon\Carbon::now()->subMonths($i)->format('F Y');
            $months[] = $monthLabel;
            $data[] = $registrationsByMonth->get($monthLabel, ['count' => 0])['count'] ?? 0;
        }

        return view('admin.dashboard.index', compact(
            'totalParticipants',
            'participantCounts',
            'upcomingSchedules',
            'recentParticipants'
        ))->with([
                    'chartMonths' => json_encode($months),
                    'chartData' => json_encode($data),
                ]);
    }
}