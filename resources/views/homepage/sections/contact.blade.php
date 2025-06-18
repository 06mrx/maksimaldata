<section id="contact" class="py-20 lg:py-32">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black gradient-text mb-6 p-2">Hubungi Kami</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-sky-500 mx-auto rounded-full"></div>
            </div>

            <div class="glass-morphism p-8 lg:p-12 rounded-3xl luxury-shadow">
                <form id="contactForm" class="space-y-8">
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
                            class="group relative px-12 py-4 bg-gradient-to-r from-blue-600 to-sky-500 text-white font-bold rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:from-blue-700 hover:to-sky-600">
                            <span class="relative z-10 flex items-center justify-center space-x-2">
                                <i class="fas fa-paper-plane"></i>
                                <span>Kirim Pesan</span>
                            </span>
                            <div
                                class="absolute inset-0 bg-white/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>