<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class SettingController extends Controller
{

    public function __construct()
    {
        // Hanya user dengan permission "view-settings" yang bisa akses index
        $this->middleware('permission:view-setting')->only(['index']);

        // Hanya user dengan permission "edit-settings" yang bisa akses edit dan update
        $this->middleware('permission:edit-setting')->only(['edit', 'update']);

        // $this->middleware(function ($request, $next) {
        //     view()->share('setting', Setting::first());
        //     return $next($request);
        // });
    }
    public function index()
    {
        $setting = Setting::first(); // hanya satu baris setting
        return view('admin.settings.index', compact('setting'));
    }

    public function edit(Setting $setting)
    {
        $setting = Setting::first(); // hanya satu baris setting
        if (!$setting) {
            $setting = new Setting(); // buat instance baru jika belum ada
        }
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'tagline' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_youtube' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'social_whatsapp' => 'nullable|string|max:20',
            'social_telegram' => 'nullable|url',
            'social_tiktok' => 'nullable|url',
            'social_github' => 'nullable|url',
        ]);
        $data = $request->only([
            'title',
            'tagline',
            'phone',
            'email',
            'address',
            'social_whatsapp',
            'social_facebook',
            'social_twitter',
            'social_instagram',
            'social_youtube',
            'social_linkedin',
            'social_github',
            'social_tiktok',
            'social_telegram'
        ]);
        $setting->updateOrCreate($data);

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui');
    }
}
