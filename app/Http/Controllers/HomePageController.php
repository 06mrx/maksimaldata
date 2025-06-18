<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingSchedule;
use Illuminate\Support\Carbon;

class HomePageController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil jadwal dengan status 'open' dan start_date >= hari ini
        $trainingSchedules = TrainingSchedule::where('status', 'open')
            ->whereDate('start_date', '>=', Carbon::today())
            ->orderBy('start_date', 'asc')
            ->get();
        // dd($trainingSchedules);
        return view('homepage.index', compact('trainingSchedules'));
    }
}
