<?php

namespace App\Http\Controllers\Admin;

use App\Models\TrainingSchedule;
use App\Models\Participant;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $totalParticipants = Participant::count();
        $mtcreParticipants = Participant::whereHas('trainingSchedule', fn($q) => $q->where('type', 'mtcre'))->count();
        $mtcnaParticipants = Participant::whereHas('trainingSchedule', fn($q) => $q->where('type', 'mtcna'))->count();

        $upcomingSchedules = TrainingSchedule::withCount('participants')
            ->where('status', 'open')
            ->whereDate('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->limit(5)
            ->get();

        $recentParticipants = Participant::with('trainingSchedule')->latest()->take(value: 5)->get();

        // Data grafik: jumlah pendaftar per bulan
        $registrationsByMonth = Participant::selectRaw("DATE_FORMAT(created_at, '%M %Y') as month, COUNT(*) as count")
            ->groupByRaw("DATE_FORMAT(created_at, '%M %Y')")
            ->orderByRaw("MIN(created_at)")
            ->get()
            ->keyBy('month');

        // Bulan terakhir 12 bulan (untuk label chart)
        $months = [];
        $data = [];

        for ($i = 11; $i >= 0; $i--) {
            $monthLabel = \Carbon\Carbon::now()->subMonths($i)->format('F Y');
            $months[] = $monthLabel;
            $data[] = $registrationsByMonth->get($monthLabel, ['count' => 0])['count'] ?? 0;
        }

        return view('admin.dashboard.index', compact(
            'totalParticipants',
            'mtcreParticipants',
            'mtcnaParticipants',
            'upcomingSchedules',
            'recentParticipants'
        ))->with([
                    'chartMonths' => json_encode($months),
                    'chartData' => json_encode($data),
                ]);
    }
}