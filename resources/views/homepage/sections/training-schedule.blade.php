<section id="training-schedule" class="py-20 lg:py-32 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-black gradient-text mb-6">Pelatihan Mikrotik</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-sky-500 mx-auto rounded-full"></div>
        </div>

        <div class="max-w-2xl mx-auto">
            <form action="#" method="GET"
                class="bg-white shadow-md rounded-lg p-6 mb-8 glass-morphism luxury-shadow">
                <div class="mb-6">
                    <label for="schedule_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jadwal
                        Pelatihan</label>
                    <select name="schedule_id" id="schedule_id"
                        class="w-full px-4 py-4 bg-white/70 border border-blue-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 font-medium">
                        <option value="">-- Pilih Jadwal --</option>
                        @forelse ($trainingSchedules as $schedule)
                            <option value="{{ $schedule->id }}">
                                {{ strtoupper($schedule->type) }} -
                                {{ \Carbon\Carbon::parse($schedule->start_date)->format('d F Y') }}
                            </option>
                        @empty
                            <option disabled>Tidak ada jadwal tersedia</option>
                        @endforelse
                    </select>
                </div>

                <div class="text-center">
                    <a id="register-button" href=""
                        class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Daftar
                    </a>

                </div>
            </form>
        </div>
    </div>
</section>
