<section id="projects" class="py-20 lg:py-32 bg-gradient-to-b from-blue-50/50 to-sky-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black gradient-text mb-6 p-2">Projek Kami</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-sky-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $projects = [
                        [
                            'img' => 'images/projects/1.png',
                            'title' => 'Penarikan Kabel Optik Makassar',
                            'description' =>
                                'Protelindo 2019 - Instalasi backbone fiber optic dengan teknologi terdepan',
                            'gradient' => 'from-blue-600 to-blue-500',
                        ],
                        [
                            'img' => 'images/projects/2.png',
                            'title' => 'Instalasi & Terminasi CGS',
                            'description' =>
                                'CGS 2021 - Layanan premium instalasi dan terminasi untuk corporate client',
                            'gradient' => 'from-sky-600 to-sky-500',
                        ],
                        [
                            'img' => 'images/projects/3.png',
                            'title' => 'Corporate Solutions',
                            'description' => 'PT KIMA 2021 - Solusi enterprise fiber optic untuk industri besar',
                            'gradient' => 'from-blue-500 to-sky-600',
                        ],
                        [
                            'img' => 'images/projects/4.png',
                            'title' => 'Fiber Optic Installation - PT KIMA',
                            'description' =>
                                'PT KIMA 2021 - Instalasi jaringan fiber optic untuk area industri terpadu',
                            'gradient' => 'from-indigo-600 to-indigo-500',
                        ],
                        [
                            'img' => 'images/projects/5.png',
                            'title' => 'Terminasi Fiber Optik PT KIMA',
                            'description' =>
                                'PT KIMA 2021 - Terminasi dan pengujian kabel optik untuk efisiensi maksimal',
                            'gradient' => 'from-purple-600 to-purple-500',
                        ],
                    ];
                @endphp

                @foreach ($projects as $project)
                    <div class="group cursor-pointer">
                        <div
                            class="glass-morphism rounded-3xl overflow-hidden luxury-shadow transition-all duration-500 group-hover:scale-105 group-hover:shadow-2xl">
                            <div
                                class="relative  bg-gradient-to-br {{ $project['gradient'] }} flex items-center justify-center overflow-hidden">
                                {{-- <i class="{{ $project['icon'] }} text-6xl text-white group-hover:scale-110 transition-transform duration-500"></i> --}}
                                <img class="w-full" src="{{ asset($project['img']) }}" alt="">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                </div>
                            </div>
                            <div class="p-6">
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 group-hover:text-blue-600 transition-colors">
                                    {{ $project['title'] }}</h3>
                                <p class="text-slate-600 leading-relaxed">{{ $project['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
