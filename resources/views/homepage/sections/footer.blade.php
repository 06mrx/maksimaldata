<footer class="bg-gradient-to-r from-slate-900 via-blue-900 to-slate-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-6">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div
                        class="w-12 h-12 bg-white/20 p-1 rounded-xl flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" class="" alt="">
                    </div>
                    <span class="text-2xl font-bold">{{ $setting?->title ?? "Your title"}}</span>
                </div>
                <p class="text-blue-200 mb-6"> {{ $setting?->tagline ?? "Your Tagline" }}</p>
            </div>
            {{-- social section --}}
            <div class="flex justify-center space-x-6 mb-6">
                <a href="{{ $setting?->social_instagram ?? '#' }}" target="_blank" rel="noopener noreferrer"
                    class="text-blue-400 hover:text-blue-300 transition-colors">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
                <a href="{{ $setting?->social_facebook ?? '#' }}" target="_blank" rel="noopener noreferrer"
                    class="text-blue-400 hover:text-blue-300 transition-colors">
                    <i class="fab fa-facebook fa-lg"></i>
                </a>
                <a href="{{ $setting?->social_youtube ?? '#' }}" target="_blank" rel="noopener noreferrer"
                    class="text-blue-400 hover:text-blue-300 transition-colors">
                    <i class="fab fa-youtube fa-lg"></i>
                </a>
                <a href="{{ $setting?->social_twitter ?? '#' }}" target="_blank" rel="noopener noreferrer"
                    class="text-blue-400 hover:text-blue-300 transition-colors">
                    <i class="fab fa-twitter fa-lg"></i>
                </a>
                <a href="{{ $setting?->social_linkedin ?? '#' }}" target="_blank" rel="noopener noreferrer"
                    class="text-blue-400 hover:text-blue-300 transition-colors">
                    <i class="fab fa-linkedin fa-lg"></i>
                </a>
                <a href="{{ $setting?->social_github ?? '#' }}" target="_blank" rel="noopener noreferrer"
                    class="text-blue-400 hover:text-blue-300 transition-colors">
                    <i class="fab fa-github fa-lg"></i>
                </a>
            </div>
            {{-- end social section --}}
            <div class="flex justify-center space-x-6 mb-6">
                {{-- <a href="{{ route('homepage') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Beranda</a>
                <a href="{{ route('about') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Tentang Kami</a>
                <a href="{{ route('contact') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Kontak</a>
                <a href="{{ route('training-schedule') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Jadwal Pelatihan</a>
                <a href="{{ route('training-types.index') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Jenis Pelatihan</a>
            </div> --}}
            <div class="border-t border-white/20 pt-6">
                <p class="text-blue-200">
                    Created with <i class="fas fa-heart text-red-400"></i> by
                    <a href="https://www.instagram.com/akbartux/"
                        class="text-blue-400 hover:text-blue-300 font-semibold transition-colors">Muhammad Akbar</a>
                </p>
                <p class="text-blue-300 mt-2">&copy; {{ date('Y') }} Maksimal Data. All rights reserved.</p>
            </div>
        </div>
    </footer>