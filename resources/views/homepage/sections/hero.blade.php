<section id="home" class="min-h-screen hero-bg flex items-center justify-center relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        @for ($i = 0; $i < 20; $i++)
            <div class="particle w-2 h-2 bg-white/20 absolute"
                style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5) }}s;"></div>
        @endfor
    </div>

    <div class="text-center text-white z-10 px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
        <div class="mb-8 mt-20 flex justify-center">
            <a href="{{route('login')}}" class="w-60 p-3 bg-white/10 backdrop-blur-xl rounded-3xl flex items-center justify-center shadow-2xl animate-pulse-slow border border-white/20">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Maksimal Data" class="h-20">
            </a>
        </div>
        {{-- @dump($setting) --}}
        <h1 class="text-6xl md:text-8xl font-black mb-6 leading-tight">
            <span class="block">{{ explode(' ', $setting?->title)[0] ?? "Your" }}</span>
            <span class="block bg-gradient-to-r from-white via-blue-100 to-sky-100 bg-clip-text text-transparent">{{ explode(' ', $setting?->title)[1] ?? "Title" }}</span>
        </h1>

        <p class="text-xl md:text-2xl mb-8 text-blue-100 font-light max-w-3xl mx-auto leading-relaxed">
            {{$setting?->tagline ?? "Your tagline"}}
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="#about" class="group relative px-8 py-4 bg-white/20 backdrop-blur-xl rounded-2xl font-semibold transition-all duration-300 hover:bg-white/30 hover:scale-105 hover:shadow-2xl border border-white/30">
                <span class="relative z-10">Jelajahi</span>
                <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>
            <a href="#contact" class="px-8 py-4 bg-gradient-to-r from-white to-blue-50 text-blue-600 rounded-2xl font-semibold transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>