<section id="services" class="py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black gradient-text mb-6">Layanan Kami</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-sky-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $services = [
                        [
                            'icon' => 'fas fa-cog',
                            'title' => 'Manajemen Layanan Premium',
                            'description' =>
                                'Layanan managed service fiber optic dengan monitoring 24/7 dan response time terbaik di kelasnya',
                            'gradient' => 'from-blue-600 to-blue-500',
                        ],
                        [
                            'icon' => 'fas fa-shopping-cart',
                            'title' => 'Equipment Premium',
                            'description' =>
                                'Penjualan perangkat fiber optik berkualitas tinggi dari brand ternama dunia dengan garansi internasional',
                            'gradient' => 'from-sky-600 to-sky-500',
                        ],
                        [
                            'icon' => 'fas fa-tools',
                            'title' => 'Instalasi Professional',
                            'description' =>
                                'Layanan instalasi dan terminasi fiber optik dengan teknisi bersertifikat internasional',
                            'gradient' => 'from-blue-500 to-sky-600',
                        ],
                    ];
                @endphp

                @foreach ($services as $service)
                    <div class="group">
                        <div
                            class="glass-morphism p-8 rounded-3xl luxury-shadow transition-all duration-500 group-hover:scale-105 group-hover:shadow-2xl h-full">
                            <div class="text-center space-y-6">
                                <div
                                    class="w-20 h-20 bg-gradient-to-r {{ $service['gradient'] }} rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-500 shadow-lg">
                                    <i class="{{ $service['icon'] }} text-2xl text-white"></i>
                                </div>
                                <h3
                                    class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors">
                                    {{ $service['title'] }}</h3>
                                <p class="text-slate-600 leading-relaxed">{{ $service['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>