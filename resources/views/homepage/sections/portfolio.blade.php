<!-- Portfolio Section -->
<section id="portfolio" class="py-20 lg:py-32 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width="60" height="60"
            viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" fill-rule="evenodd">
                <g fill="%233b82f6" fill-opacity="0.1">
                    <circle cx="30" cy="30" r="1" />
                </g></svg>'); background-size: 60px 60px;">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-black gradient-text mb-6 p-2">Aktifitas Kami</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-sky-500 mx-auto rounded-full mb-4"></div>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
                {{-- proyek fiber dan pelatihan Mikrotik --}}
                Kami telah menyelesaikan berbagai proyek fiber optik dan pelatihan Mikrotik yang sukses. Berikut adalah
                beberapa contoh aktifitas kami yang menunjukkan keahlian dan dedikasi tim kami dalam industri ini.
            </p>
        </div>
        @php
            $activities = [
                [
                    'title' => 'Training MikroTik Bombana',
                    'desc' =>
                        'Pelatihan dan sertifikasi MikroTik di Bombana, Sulawesi Tenggara untuk mendukung SDM lokal dalam pengelolaan jaringan.',
                    'url' => 'images/activities/1.webp',
                ],
                [
                    'title' => 'MikroTik Kendari',
                    'desc' =>
                        'Kegiatan training dan sertifikasi MikroTik di Kendari sebagai bagian dari program Maksimal Data untuk wilayah Sulawesi Tenggara.',
                    'url' => 'images/activities/2.webp',
                ],
                [
                    'title' => 'MikroTik Banjarmasin',
                    'desc' =>
                        'Pelatihan bersama ISP dan tim IT hotel di Banjarmasin, Kalimantan Selatan untuk meningkatkan kemampuan jaringan berbasis MikroTik.',
                    'url' => 'images/activities/3.webp',
                ],
                [
                    'title' => 'MikroTik Novotel Makassar',
                    'desc' =>
                        'Training MikroTik intensif bersama IT Hotel Novotel Makassar dalam mendukung infrastruktur jaringan yang andal.',
                    'url' => 'images/activities/4.webp',
                ],
                [
                    'title' => 'MikroTik untuk Guru TKJ',
                    'desc' =>
                        'Pelatihan khusus bagi guru-guru TKJ SMKN 4 Jeneponto guna memperkuat kemampuan teknis pengajaran jaringan.',
                    'url' => 'images/activities/5.webp',
                ],
                [
                    'title' => 'MikroTik Bersama Praktisi Maluku',
                    'desc' =>
                        'Sesi pelatihan MikroTik dengan praktisi IT dari Maluku untuk mendukung penyebaran jaringan berkualitas di kawasan timur Indonesia.',
                    'url' => 'images/activities/6.webp',
                ],
                [
                    'title' => 'MikroTik untuk Dosen UMI',
                    'desc' =>
                        'Training dan sertifikasi bersama dosen Universitas Muslim Indonesia untuk penguatan materi jaringan berbasis praktik.',
                    'url' => 'images/activities/7.webp',
                ],
                [
                    'title' => 'Private Training ICON+ Bone',
                    'desc' =>
                        'Pelatihan privat MikroTik untuk Engineer On Site dari ICON+ Kabupaten Bone, sebagai bentuk komitmen Maksimal Data dalam pengembangan jaringan profesional.',
                    'url' => 'images/activities/8.webp',
                ],
            ];

        @endphp
        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($activities as $activity)
                <div class="group relative overflow-hidden luxury-shadow rounded-2xl cursor-pointer portfolio-item"
                    data-category="installation">
                    <div
                        class="aspect-square   flex items-center justify-center relative overflow-hidden glass-morphism">
                        <!-- Replace with actual image -->
                        <img src="{{ asset($activity['url']) }}" alt="{{ $activity['title'] }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"> 
                            

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0  opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                            {{-- <div
                                class="text-center text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <i class="fas fa-search-plus text-2xl mb-2"></i>
                                <p class="text-sm font-medium">Lihat Detail</p>
                            </div> --}}
                        </div>

                        <!-- Shimmer Effect -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                    </div>

                    <!-- Caption -->
                    <div class="mt-4 px-2">
                        <h3 class="font-bold p-2 text-slate-800 -mb-2 -mt-5 group-hover:text-blue-600 transition-colors">
                            {{ $activity['title'] }}
                        </h3>
                        <p class="text-xs p-2 text-slate-600">{{ $activity['desc'] }}</p>
                        </p>
                    </div>
                </div>
            @endforeach


        </div>

        <!-- Call to Action -->
        {{-- <div class="text-center mt-16">
            <div class="glass-morphism p-8 rounded-3xl luxury-shadow max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold gradient-text mb-4">Tertarik dengan Portfolio Kami?</h3>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    Lihat lebih banyak dokumentasi proyek dan diskusikan kebutuhan fiber optik Anda dengan tim ahli kami
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#contact" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-sky-500 text-white font-semibold rounded-xl hover:scale-105 transition-all duration-300 hover:shadow-xl">
                        <i class="fas fa-comments mr-2"></i>
                        Konsultasi Gratis
                    </a>
                    <button class="px-8 py-3 glass-morphism text-slate-700 font-semibold rounded-xl hover:scale-105 transition-all duration-300 hover:shadow-xl border border-blue-200">
                        <i class="fas fa-download mr-2"></i>
                        Download Portofolio
                    </button>
                </div>
            </div>
        </div> --}}
    </div>
</section>
