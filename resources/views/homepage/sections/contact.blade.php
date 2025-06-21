<section id="contact" class="py-20 lg:py-32">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-black gradient-text mb-6 p-2">Hubungi Kami</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-sky-500 mx-auto rounded-full"></div>
        </div>

        <div class="glass-morphism p-8 lg:p-12 rounded-3xl luxury-shadow">
            <form id="whatsappForm" class="space-y-8">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-3">Nama
                            Lengkap</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-4 bg-white/70 border border-blue-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 font-medium">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-3">Email
                            Address</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-4 bg-white/70 border border-blue-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 font-medium">
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-semibold text-slate-700 mb-3">Pesan</label>
                    <textarea id="message" name="message" rows="6" required
                        class="w-full px-4 py-4 bg-white/70 border border-blue-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 font-medium resize-none"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="group relative px-12 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:from-green-600 hover:to-green-700">
                        <span class="relative z-10 flex items-center justify-center space-x-2">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span>Kirim ke WhatsApp</span>
                        </span>
                        <div
                            class="absolute inset-0 bg-white/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </button>
                </div>
            </form>

            <!-- WhatsApp Direct Contact -->
            @if ($setting && $setting->social_whatsapp)
                <div class="mt-8 pt-8 border-t border-blue-200/50">
                    <div class="text-center">
                        <p class="text-slate-600 mb-4 font-medium">Atau hubungi langsung via WhatsApp:</p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->social_whatsapp) }}"
                            target="_blank"
                            class="inline-flex items-center space-x-3 px-8 py-4 bg-green-500 text-white font-semibold rounded-2xl hover:bg-green-600 transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <i class="fab fa-whatsapp text-2xl"></i>
                            <span>{{ $setting->social_whatsapp }}</span>
                            <i class="fas fa-external-link-alt text-sm"></i>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('whatsappForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            // Validate form
            if (!name || !email || !message) {
                alert('Mohon lengkapi semua field!');
                return;
            }

            // Create WhatsApp message
            const whatsappMessage = `Halo! Saya ingin menghubungi Anda.

*Nama:* ${name}
*Email:* ${email}
*Pesan:* ${message}

Terima kasih!`;

            // WhatsApp number from settings
            const whatsappNumber =
                '{{ $setting && $setting->social_whatsapp ? preg_replace('/[^0-9]/', '', $setting->social_whatsapp) : '' }}';

            if (!whatsappNumber) {
                alert('Nomor WhatsApp tidak tersedia. Silakan hubungi admin.');
                return;
            }

            // Create WhatsApp URL
            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(whatsappMessage)}`;

            // Open WhatsApp
            window.open(whatsappUrl, '_blank');

            // Reset form
            this.reset();

            // Show success message
            const button = this.querySelector('button[type="submit"]');
            const originalContent = button.innerHTML;
            button.innerHTML =
                '<span class="flex items-center justify-center space-x-2"><i class="fas fa-check"></i><span>Berhasil Dikirim!</span></span>';
            button.disabled = true;

            setTimeout(() => {
                button.innerHTML = originalContent;
                button.disabled = false;
            }, 3000);
        });
    </script>
</section>
