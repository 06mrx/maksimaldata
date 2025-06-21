@extends('layouts.admin')
@section('title', 'Edit Pengaturan')
@section('page-title', 'Edit Pengaturan Aplikasi')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Header Card -->
            <div class="bg-white rounded-xl shadow-lg mb-8 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                    <h1 class="text-2xl font-bold text-white">Pengaturan Aplikasi</h1>
                    <p class="text-blue-100 mt-1">Kelola informasi dasar aplikasi Anda</p>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <form action="{{ route('admin.settings.update') }}" method="POST" class="p-8">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-8 bg-gradient-to-b from-blue-500 to-indigo-500 rounded-full mr-4"></div>
                            <h2 class="text-xl font-semibold text-gray-800">Informasi Dasar</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="lg:col-span-2">
                                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-globe text-blue-500 mr-2"></i>Judul Website
                                </label>
                                <input type="text" name="title" id="title" value="{{ old('title', $setting->title) }}"
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- Tagline -->
                            <div class="lg:col-span-2">
                                <label for="tagline" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-tag text-blue-500 mr-2"></i>Tagline / Kalimat Pendukung
                                </label>
                                <input type="text" name="tagline" id="tagline" value="{{ old('tagline', $setting->tagline) }}"
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-8 bg-gradient-to-b from-blue-500 to-indigo-500 rounded-full mr-4"></div>
                            <h2 class="text-xl font-semibold text-gray-800">Informasi Kontak</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-phone text-blue-500 mr-2"></i>Nomor Telepon
                                </label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $setting->phone) }}"
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-envelope text-blue-500 mr-2"></i>Email
                                </label>
                                <input type="email" name="email" id="email" value="{{ old('email', $setting->email) }}"
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>Alamat
                                </label>
                                <input type="text" name="address" id="address" value="{{ old('address', $setting->address) }}"
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- WhatsApp -->
                            <div>
                                <label for="social_whatsapp" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-whatsapp text-green-500 mr-2"></i>Nomor WhatsApp
                                </label>
                                <input type="text" name="social_whatsapp" id="social_whatsapp"
                                       value="{{ old('social_whatsapp', $setting->social_whatsapp) }}"
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-8 bg-gradient-to-b from-blue-500 to-indigo-500 rounded-full mr-4"></div>
                            <h2 class="text-xl font-semibold text-gray-800">Media Sosial</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Facebook -->
                            <div>
                                <label for="social_facebook" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-facebook text-blue-600 mr-2"></i>Facebook
                                </label>
                                <input type="url" name="social_facebook" id="social_facebook"
                                       value="{{ old('social_facebook', $setting->social_facebook) }}"
                                       placeholder="https://facebook.com/username" 
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- Twitter -->
                            <div>
                                <label for="social_twitter" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-twitter text-sky-500 mr-2"></i>Twitter
                                </label>
                                <input type="url" name="social_twitter" id="social_twitter"
                                       value="{{ old('social_twitter', $setting->social_twitter) }}"
                                       placeholder="https://twitter.com/username" 
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- Instagram -->
                            <div>
                                <label for="social_instagram" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-instagram text-pink-500 mr-2"></i>Instagram
                                </label>
                                <input type="url" name="social_instagram" id="social_instagram"
                                       value="{{ old('social_instagram', $setting->social_instagram) }}"
                                       placeholder="https://instagram.com/username" 
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- YouTube -->
                            <div>
                                <label for="social_youtube" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-youtube text-red-500 mr-2"></i>YouTube
                                </label>
                                <input type="url" name="social_youtube" id="social_youtube"
                                       value="{{ old('social_youtube', $setting->social_youtube) }}"
                                       placeholder="https://youtube.com/@username" 
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- LinkedIn -->
                            <div>
                                <label for="social_linkedin" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-linkedin text-blue-700 mr-2"></i>LinkedIn
                                </label>
                                <input type="url" name="social_linkedin" id="social_linkedin"
                                       value="{{ old('social_linkedin', $setting->social_linkedin) }}"
                                       placeholder="https://linkedin.com/in/username" 
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- GitHub -->
                            <div>
                                <label for="social_github" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-github text-gray-800 mr-2"></i>GitHub
                                </label>
                                <input type="url" name="social_github" id="social_github"
                                       value="{{ old('social_github', $setting->social_github) }}"
                                       placeholder="https://github.com/username" 
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- TikTok -->
                            <div>
                                <label for="social_tiktok" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-tiktok text-gray-800 mr-2"></i>TikTok
                                </label>
                                <input type="url" name="social_tiktok" id="social_tiktok"
                                       value="{{ old('social_tiktok', $setting->social_tiktok) }}"
                                       placeholder="https://tiktok.com/@username" 
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>

                            <!-- Telegram -->
                            <div>
                                <label for="social_telegram" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fab fa-telegram text-blue-500 mr-2"></i>Telegram
                                </label>
                                <input type="url" name="social_telegram" id="social_telegram"
                                       value="{{ old('social_telegram', $setting->social_telegram) }}"
                                       placeholder="https://t.me/username" 
                                       class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 hover:border-blue-300">
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.settings.index') }}" 
                           class="px-6 py-3 border-2 border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 text-center">
                            <i class="fas fa-times mr-2"></i>Batal
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <i class="fas fa-save mr-2"></i>Update Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom CSS for additional styling -->
    <style>
        .form-section {
            position: relative;
        }
        
        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -20px;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #3b82f6, #6366f1);
            border-radius: 2px;
        }

        input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .input-group {
            position: relative;
        }

        .input-group input:focus + .input-icon {
            color: #3b82f6;
        }
    </style>
@endsection