<section id="partners" class="py-20 lg:py-32 bg-gradient-to-b from-sky-50/50 to-blue-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black gradient-text mb-6 p-2">Mitra Kami</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-sky-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @php
        $partners = [
            'images/partners/cgs.png', 'images/partners/bat.png', 'images/partners/pc24.png',
            'images/partners/sky.png', 'images/partners/crossnet.png', 'images/partners/ajtel.png',
            'images/partners/desnet.png',
        ];
    @endphp

    @foreach ($partners as $partner)
        <div class="group w-full">
            <div
                class="glass-morphism w-full h-40 p-4 rounded-2xl luxury-shadow transition-all duration-500 group-hover:scale-105 group-hover:shadow-xl flex items-center justify-center">
                <img src="{{ asset($partner) }}" alt="mitra" class="max-h-24 object-contain">
            </div>
        </div>
    @endforeach
</div>

        </div>
    </section>