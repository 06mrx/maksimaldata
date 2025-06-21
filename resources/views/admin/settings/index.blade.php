@extends('layouts.admin')
@section('title', 'Pengaturan Aplikasi')
@section('page-title', 'Pengaturan')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header Card -->
            <div class="bg-white rounded-xl shadow-lg mb-8 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Pengaturan Aplikasi</h1>
                            <p class="text-blue-100 mt-1">Kelola konfigurasi dan informasi aplikasi Anda</p>
                        </div>
                        @if ($setting)
                            <div class="mt-4 sm:mt-0">
                                <a href="{{ route('admin.settings.edit') }}" 
                                   class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                    <i class="fas fa-edit mr-2"></i>
                                    Edit Pengaturan
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if ($setting)
                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Informasi Umum Card -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                            <h2 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-info-circle mr-3"></i>
                                Informasi Umum
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <!-- Title -->
                                <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-globe text-blue-600 mt-1"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">Judul Website</p>
                                        <p class="text-lg font-semibold text-gray-800">{{ $setting->title }}</p>
                                    </div>
                                </div>

                                <!-- Tagline -->
                                <div class="flex items-start space-x-3 p-4 bg-indigo-50 rounded-lg border-l-4 border-indigo-500">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-tag text-indigo-600 mt-1"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">Tagline</p>
                                        <p class="text-lg font-semibold text-gray-800">{{ $setting->tagline ?? '-' }}</p>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone text-blue-600 mt-1"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">No Telepon</p>
                                        <p class="text-lg font-semibold text-gray-800">{{ $setting->phone ?? '-' }}</p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-start space-x-3 p-4 bg-indigo-50 rounded-lg border-l-4 border-indigo-500">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-envelope text-indigo-600 mt-1"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">Email</p>
                                        <p class="text-lg font-semibold text-gray-800">{{ $setting->email ?? '-' }}</p>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-blue-600 mt-1"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">Alamat</p>
                                        <p class="text-lg font-semibold text-gray-800">{{ $setting->address ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Media Sosial Card -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                            <h2 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-share-alt mr-3"></i>
                                Media Sosial
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <!-- Facebook -->
                                <div class="flex items-center space-x-3 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-600 hover:bg-blue-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-facebook text-blue-600 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">Facebook</p>
                                        @if($setting->social_facebook)
                                            <a href="{{ $setting->social_facebook }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-medium break-all">
                                                {{ $setting->social_facebook }}
                                            </a>
                                        @else
                                            <p class="text-gray-400">-</p>
                                        @endif
                                    </div>
                                    @if($setting->social_facebook)
                                        <a href="{{ $setting->social_facebook }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                </div>

                                <!-- Twitter -->
                                <div class="flex items-center space-x-3 p-4 bg-sky-50 rounded-lg border-l-4 border-sky-500 hover:bg-sky-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-twitter text-sky-500 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">Twitter</p>
                                        @if($setting->social_twitter)
                                            <a href="{{ $setting->social_twitter }}" target="_blank" class="text-sky-600 hover:text-sky-800 font-medium break-all">
                                                {{ $setting->social_twitter }}
                                            </a>
                                        @else
                                            <p class="text-gray-400">-</p>
                                        @endif
                                    </div>
                                    @if($setting->social_twitter)
                                        <a href="{{ $setting->social_twitter }}" target="_blank" class="text-sky-600 hover:text-sky-800">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                </div>

                                <!-- Instagram -->
                                <div class="flex items-center space-x-3 p-4 bg-pink-50 rounded-lg border-l-4 border-pink-500 hover:bg-pink-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-instagram text-pink-500 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">Instagram</p>
                                        @if($setting->social_instagram)
                                            <a href="{{ $setting->social_instagram }}" target="_blank" class="text-pink-600 hover:text-pink-800 font-medium break-all">
                                                {{ $setting->social_instagram }}
                                            </a>
                                        @else
                                            <p class="text-gray-400">-</p>
                                        @endif
                                    </div>
                                    @if($setting->social_instagram)
                                        <a href="{{ $setting->social_instagram }}" target="_blank" class="text-pink-600 hover:text-pink-800">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                </div>

                                <!-- YouTube -->
                                <div class="flex items-center space-x-3 p-4 bg-red-50 rounded-lg border-l-4 border-red-500 hover:bg-red-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-youtube text-red-500 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">YouTube</p>
                                        @if($setting->social_youtube)
                                            <a href="{{ $setting->social_youtube }}" target="_blank" class="text-red-600 hover:text-red-800 font-medium break-all">
                                                {{ $setting->social_youtube }}
                                            </a>
                                        @else
                                            <p class="text-gray-400">-</p>
                                        @endif
                                    </div>
                                    @if($setting->social_youtube)
                                        <a href="{{ $setting->social_youtube }}" target="_blank" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                </div>

                                <!-- LinkedIn -->
                                <div class="flex items-center space-x-3 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-700 hover:bg-blue-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-linkedin text-blue-700 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">LinkedIn</p>
                                        @if($setting->social_linkedin)
                                            <a href="{{ $setting->social_linkedin }}" target="_blank" class="text-blue-700 hover:text-blue-900 font-medium break-all">
                                                {{ $setting->social_linkedin }}
                                            </a>
                                        @else
                                            <p class="text-gray-400">-</p>
                                        @endif
                                    </div>
                                    @if($setting->social_linkedin)
                                        <a href="{{ $setting->social_linkedin }}" target="_blank" class="text-blue-700 hover:text-blue-900">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                </div>

                                <!-- WhatsApp -->
                                <div class="flex items-center space-x-3 p-4 bg-green-50 rounded-lg border-l-4 border-green-500 hover:bg-green-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-whatsapp text-green-500 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">WhatsApp</p>
                                        <p class="text-green-600 font-medium">{{ $setting->social_whatsapp ?? '-' }}</p>
                                    </div>
                                </div>

                                <!-- Telegram -->
                                <div class="flex items-center space-x-3 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500 hover:bg-blue-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-telegram text-blue-500 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">Telegram</p>
                                        @if($setting->social_telegram)
                                            <a href="{{ $setting->social_telegram }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-medium break-all">
                                                {{ $setting->social_telegram }}
                                            </a>
                                        @else
                                            <p class="text-gray-400">-</p>
                                        @endif
                                    </div>
                                    @if($setting->social_telegram)
                                        <a href="{{ $setting->social_telegram }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                </div>

                                <!-- TikTok -->
                                <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg border-l-4 border-gray-800 hover:bg-gray-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-tiktok text-gray-800 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">TikTok</p>
                                        @if($setting->social_tiktok)
                                            <a href="{{ $setting->social_tiktok }}" target="_blank" class="text-gray-800 hover:text-gray-900 font-medium break-all">
                                                {{ $setting->social_tiktok }}
                                            </a>
                                        @else
                                            <p class="text-gray-400">-</p>
                                        @endif
                                    </div>
                                    @if($setting->social_tiktok)
                                        <a href="{{ $setting->social_tiktok }}" target="_blank" class="text-gray-800 hover:text-gray-900">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                </div>

                                <!-- GitHub -->
                                <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg border-l-4 border-gray-800 hover:bg-gray-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-github text-gray-800 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-600">GitHub</p>
                                        @if($setting->social_github)
                                            <a href="{{ $setting->social_github }}" target="_blank" class="text-gray-800 hover:text-gray-900 font-medium break-all">
                                                {{ $setting->social_github }}
                                            </a>
                                        @else
                                            <p class="text-gray-400">-</p>
                                        @endif
                                    </div>
                                    @if($setting->social_github)
                                        <a href="{{ $setting->social_github }}" target="_blank" class="text-gray-800 hover:text-gray-900">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-12 text-center">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-cog text-4xl text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Pengaturan</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            Pengaturan aplikasi belum dikonfigurasi. Silakan tambahkan pengaturan untuk memulai.
                        </p>
                        <a href="{{ route('admin.settings.edit') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Pengaturan
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        .social-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .break-all {
            word-break: break-all;
        }
        
        .info-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
@endsection