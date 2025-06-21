<?php

namespace App\Http\Controllers;

use App\Models\TrainingSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Facility;
class RegistrationController extends Controller
{
    public function showForm(Request $request)
    {
        // dd(1);
        $trainingSchedules = TrainingSchedule::where('status', 'open')
            ->whereDate('start_date', '>=', Carbon::today())
            ->orderBy('start_date', 'asc')
            ->with(['trainingType', 'trainingScheduleFacilities'])
            ->get();

            // dd($trainingSchedules);
        
        // Ambil schedule_id dari URL atau session
        $scheduleId = $request->input('schedule_id');
        // dd($scheduleId);
        if (!$scheduleId) {
            // dd('Jadwal tidak tersedia atau sudah lewat.');
            return redirect()->route('homepage', compact('trainingSchedules'))->with('error', 'Pilih jadwal pelatihan terlebih dahulu.');
        }

        $schedule = TrainingSchedule::where('id', $scheduleId)->where('status', 'open')->first();
        // dd($schedule->start_date < now());
        if (!$schedule || $schedule->start_date < now()) {
            // dd('Jadwal tidak tersedia atau sudah lewat.');
            return redirect()->route('homepage', compact('trainingSchedules'))->with('error', 'Jadwal tidak tersedia atau sudah lewat.');
        }
        return view('registrations.form', compact('schedule'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'training_schedule_id' => 'required|exists:training_schedules,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:15',
            'tshirt_size' => 'required|in:XS,S,M,L,XL,XXL',
        ]);

        \App\Models\Participant::create($request->all());

        // TODO: Kirim email konfirmasi atau notifikasi ke admin

        return back()->with('success', 'Terima kasih! Silakan lakukan pembayaran dan kirimkan bukti via WhatsApp/email sesuai instruksi.');
    }
}