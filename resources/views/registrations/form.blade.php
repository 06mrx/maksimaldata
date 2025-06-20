@extends('layouts.app')
@section('title', 'Daftar Pelatihan')

@section('content')

    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 max-w-3xl">
            <div class="text-center mb-16">
                <h2
                    class="text-5xl font-black bg-gradient-to-r from-blue-600 via-purple-600 to-sky-500 bg-clip-text text-transparent mb-4">
                    Formulir Pendaftaran
                </h2>
                <p class="text-xl text-gray-600 font-medium">
                    Training {{ $schedule->trainingType->name . ' (' . $schedule->trainingType->full_name . ')' }} Makassar
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-sky-500 mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Training Info Cards -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- Schedule Card -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl border border-blue-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-blue-500 to-sky-500 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-calendar-alt text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Jadwal Training</h3>
                            <p class="text-blue-600 font-semibold">
                                {{ $schedule->trainingType->name }} Batch {{ \Carbon\Carbon::parse($schedule->start_date)->format('F Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-clock text-blue-500 w-5 mr-3"></i>
                            <span class="text-gray-700">
                                <strong>Hari:</strong> 
                                {{ \Carbon\Carbon::parse($schedule->start_date)->format('l') }} - {{ \Carbon\Carbon::parse($schedule->end_date)->format('l') }}
                            </span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-calendar text-blue-500 w-5 mr-3"></i>
                            <span class="text-gray-700">
                                <strong>Tanggal:</strong> 
                                {{ \Carbon\Carbon::parse($schedule->start_date)->format('d') }} - {{ \Carbon\Carbon::parse($schedule->end_date)->format('d M Y') }}
                            </span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock text-blue-500 w-5 mr-3"></i>
                            <span class="text-gray-700"><strong>Waktu:</strong> 09.00 - 17.00 WITA</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-blue-500 w-5 mr-3"></i>
                            <span class="text-gray-700"><strong>Lokasi:</strong> {{$schedule->location}}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-blue-500 w-5 mr-3"></i>
                            <span class="text-gray-700">
                                <strong>Status:</strong> 
                                <span class="px-2 py-1 rounded-full text-sm font-medium {{ $schedule->status == 'open' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $schedule->status == 'open' ? 'Pendaftaran Dibuka' : 'Pendaftaran Ditutup' }}
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="text-center">
                            <span class="text-3xl font-black text-green-600">
                                Rp. {{ number_format($schedule->trainingType->price, 0, ',', '.') }} 
                            </span>
                            <p class="text-sm text-gray-500 mt-1">Biaya Training</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Info Card -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl border border-green-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-credit-card text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Info Pembayaran</h3>
                            <p class="text-green-600 font-semibold">Transfer Bank Only</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl p-6 text-white mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-semibold">Bank BCA</span>
                            <i class="fas fa-university text-xl"></i>
                        </div>
                        <div class="text-2xl font-black tracking-wider mb-1">1109777771</div>
                        <div class="text-blue-200">a.n. Maksimal Data</div>
                    </div>

                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                            <p class="text-red-700 font-semibold text-sm">
                                HATI-HATI PENIPUAN! Hanya transfer ke rekening di atas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact & Facilities -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- Contact Card -->
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-purple-100">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-headset text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Konfirmasi Pembayaran</h3>
                            <p class="text-purple-600 font-semibold">Setelah Transfer</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                            <i class="fas fa-envelope text-blue-500 text-xl mr-4"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Email</p>
                                <a href="mailto:cs@maksimaldata.com"
                                    class="text-blue-600 hover:underline">cs@maksimaldata.com</a>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-green-50 rounded-xl hover:bg-green-100 transition-colors">
                            <i class="fab fa-whatsapp text-green-500 text-xl mr-4"></i>
                            <div>
                                <p class="font-semibold text-gray-800">WhatsApp</p>
                                <a href="https://wa.me/6285183368291" target="_blank"
                                    class="text-green-600 hover:underline font-mono">0851-8336-8291</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Facilities Card -->
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-orange-100">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-gift text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Fasilitas Training</h3>
                            <p class="text-orange-600 font-semibold">Yang Anda Dapatkan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                            <i class="fas fa-coffee text-orange-500 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Snack</span>
                        </div>
                        <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                            <i class="fas fa-utensils text-orange-500 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Lunch</span>
                        </div>
                        <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                            <i class="fas fa-book text-orange-500 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Modul</span>
                        </div>
                        <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                            <i class="fas fa-certificate text-orange-500 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Sertifikat</span>
                        </div>
                        <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                            <i class="fas fa-wifi text-orange-500 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">RouterBOARD</span>
                        </div>
                        <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                            <i class="fas fa-redo text-orange-500 mr-3"></i>
                            <span class="text-sm font-medium text-gray-700">Free Re-exam</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            @if($schedule->status == 'open')
            <div class="bg-white rounded-2xl p-8 shadow-2xl border border-gray-100">
                <div class="flex items-center mb-8">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-user-plus text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800">Form Pendaftaran</h3>
                        <p class="text-gray-600">Lengkapi data diri Anda dengan benar</p>
                    </div>
                </div>

                <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="training_schedule_id" value="{{ $schedule->id }}">

                    <!-- Name -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-user text-blue-500 mr-2"></i>Nama Lengkap
                        </label>
                        <input type="text" name="name" id="name" required
                            class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message ?? "" }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-envelope text-blue-500 mr-2"></i>Email
                        </label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 @error('email') border-red-500 @enderror"
                            placeholder="contoh@email.com" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message ?? "" }}</p>
                        @enderror
                    </div>

                    <!-- WhatsApp -->
                    <div class="space-y-2">
                        <label for="whatsapp" class="block text-sm font-semibold text-gray-700">
                            <i class="fab fa-whatsapp text-green-500 mr-2"></i>No WhatsApp
                        </label>
                        <input type="text" name="whatsapp" id="whatsapp" required
                            class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 @error('whatsapp') border-red-500 @enderror"
                            placeholder="081234567890" value="{{ old('whatsapp') }}">
                        @error('whatsapp')
                            <p class="text-red-500 text-sm mt-1">{{ $message ?? "" }}</p>
                        @enderror
                    </div>

                    <!-- Training Selected -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-graduation-cap text-purple-500 mr-2"></i>Training yang Diikuti
                        </label>
                        <div
                            class="px-4 py-4 bg-gradient-to-r from-blue-50 to-purple-50 border-2 border-blue-200 rounded-xl">
                            <span class="font-bold text-blue-700">
                                {{ $schedule->trainingType->name . ' (' . $schedule->trainingType->full_name .')'  }} - 
                                {{ \Carbon\Carbon::parse($schedule->start_date)->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    <!-- T-Shirt Size -->
                    <div class="space-y-2">
                        <label for="tshirt_size" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-tshirt text-green-500 mr-2"></i>Ukuran T-Shirt
                        </label>
                        <select name="tshirt_size" id="tshirt_size" required
                            class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 @error('tshirt_size') border-red-500 @enderror">
                            <option value="">-- Pilih Ukuran T-Shirt --</option>
                            <option value="XS" {{ old('tshirt_size') == 'XS' ? 'selected' : '' }}>XS (Extra Small)</option>
                            <option value="S" {{ old('tshirt_size') == 'S' ? 'selected' : '' }}>S (Small)</option>
                            <option value="M" {{ old('tshirt_size') == 'M' ? 'selected' : '' }}>M (Medium)</option>
                            <option value="L" {{ old('tshirt_size') == 'L' ? 'selected' : '' }}>L (Large)</option>
                            <option value="XL" {{ old('tshirt_size') == 'XL' ? 'selected' : '' }}>XL (Extra Large)</option>
                            <option value="XXL" {{ old('tshirt_size') == 'XXL' ? 'selected' : '' }}>XXL (Double Extra Large)</option>
                        </select>
                        @error('tshirt_size')
                            <p class="text-red-500 text-sm mt-1">{{ $message ?? "" }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold text-lg rounded-xl hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-xl hover:shadow-2xl">
                            <i class="fas fa-paper-plane mr-3"></i>
                            Daftar Sekarang
                        </button>
                        <p class="text-center text-sm text-gray-500 mt-4">
                            Dengan mendaftar, Anda menyetujui syarat dan ketentuan yang berlaku
                        </p>
                    </div>
                </form>
            </div>
            @else
            <!-- Registration Closed -->
            <div class="bg-red-50 border-2 border-red-200 rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-times-circle text-red-500 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-red-600 mb-2">Pendaftaran Ditutup</h3>
                <p class="text-red-500 mb-6">
                    Maaf, pendaftaran untuk training {{ $schedule->trainingType->name  }} 
                    batch ini sudah ditutup.
                </p>
                <a href="{{ route('training.schedules') }}" 
                   class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors">
                    <i class="fas fa-search mr-2"></i>
                    Lihat Jadwal Lainnya
                </a>
            </div>
            @endif

            <!-- CTA Section -->
            <div class="mt-12 text-center bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-4">Butuh Bantuan?</h3>
                <p class="mb-6 text-blue-100">Tim customer service kami siap membantu Anda 24/7</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://wa.me/6285183368291" target="_blank"
                        class="inline-flex items-center px-6 py-3 bg-green-500 hover:bg-green-600 rounded-xl font-semibold transition-colors">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Chat WhatsApp
                    </a>
                    <a href="mailto:cs@maksimaldata.com"
                        class="inline-flex items-center px-6 py-3 bg-white text-blue-600 hover:bg-gray-100 rounded-xl font-semibold transition-colors">
                        <i class="fas fa-envelope mr-2"></i>
                        Kirim Email
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    @if(session('success'))
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-auto transform transition-all duration-300 scale-100">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 rounded-t-2xl p-6 text-white text-center">
                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check-circle text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold">Pendaftaran Berhasil!</h3>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6">
                <div class="text-center mb-6">
                    <p class="text-gray-600 text-lg mb-4">{{ session('success') }}</p>
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg text-left">
                        <h4 class="font-semibold text-blue-800 mb-2">Langkah Selanjutnya:</h4>
                        <ul class="text-blue-700 text-sm space-y-1">
                            <li>• Transfer biaya training ke rekening yang tertera</li>
                            <li>• Kirim bukti transfer via WhatsApp atau Email</li>
                            <li>• Tunggu konfirmasi dari tim kami</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3">
                    <button onclick="closeModal('successModal')" 
                            class="flex-1 px-4 py-3 bg-gray-200 text-gray-800 rounded-xl hover:bg-gray-300 transition-colors font-semibold">
                        Tutup
                    </button>
                    <a href="https://wa.me/6285183368291" target="_blank"
                       class="flex-1 px-4 py-3 bg-green-500 text-white rounded-xl hover:bg-green-600 transition-colors text-center font-semibold">
                        <i class="fab fa-whatsapp mr-2"></i>Chat CS
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Error Modal -->
    @if($errors->any() || session('error'))
    <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-auto transform transition-all duration-300 scale-100">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-red-500 to-pink-500 rounded-t-2xl p-6 text-white text-center">
                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold">
                    @if(session('error'))
                        Terjadi Kesalahan!
                    @else
                        Data Tidak Valid!
                    @endif
                </h3>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6">
                <div class="text-center mb-6">
                    @if(session('error'))
                        <p class="text-gray-600 text-lg mb-4">{{ session('error') }}</p>
                    @endif
                    
                    @if($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg text-left">
                            <h4 class="font-semibold text-red-800 mb-3">Mohon perbaiki kesalahan berikut:</h4>
                            <ul class="text-red-700 text-sm space-y-2">
                                @foreach($errors->all() as $error)
                                    <li class="flex items-start">
                                        <i class="fas fa-times-circle text-red-500 mr-2 mt-0.5 text-xs"></i>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                
                <div class="flex gap-3">
                    <button onclick="closeModal('errorModal')" 
                            class="flex-1 px-4 py-3 bg-red-500 text-white rounded-xl hover:bg-red-600 transition-colors font-semibold">
                        <i class="fas fa-times mr-2"></i>Tutup
                    </button>
                    @if($errors->any())
                    <button onclick="closeModal('errorModal'); scrollToForm();" 
                            class="flex-1 px-4 py-3 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition-colors font-semibold">
                        <i class="fas fa-edit mr-2"></i>Perbaiki
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- JavaScript for Modal -->
    <script>
        // Function to close modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.opacity = '0';
                modal.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    modal.remove();
                }, 200);
            }
        }

        // Function to scroll to form
        function scrollToForm() {
            const form = document.querySelector('form');
            if (form) {
                form.scrollIntoView({ behavior: 'smooth', block: 'center' });
                // Focus on first error field
                const errorField = document.querySelector('.border-red-500');
                if (errorField) {
                    setTimeout(() => {
                        errorField.focus();
                    }, 300);
                }
            }
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modals = ['successModal', 'errorModal'];
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (modal && event.target === modal) {
                    closeModal(modalId);
                }
            });
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = ['successModal', 'errorModal'];
                modals.forEach(modalId => {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        closeModal(modalId);
                    }
                });
            }
        });

        // Auto-close success modal after 10 seconds
        @if(session('success'))
        setTimeout(() => {
            closeModal('successModal');
        }, 10000);
        @endif

        // Add entrance animation
        window.addEventListener('DOMContentLoaded', function() {
            const modals = document.querySelectorAll('[id$="Modal"]');
            modals.forEach(modal => {
                if (modal) {
                    setTimeout(() => {
                        modal.style.opacity = '1';
                        const modalContent = modal.querySelector('div > div');
                        if (modalContent) {
                            modalContent.style.transform = 'scale(1)';
                        }
                    }, 100);
                }
            });
        });
    </script>

    <style>
        /* Modal Animation Styles */
        [id$="Modal"] {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        
        [id$="Modal"] > div > div {
            transform: scale(0.9);
            transition: transform 0.3s ease-in-out;
        }
        
        /* Error field highlight animation */
        .border-red-500 {
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        /* Modal backdrop blur effect */
        [id$="Modal"] {
            backdrop-filter: blur(4px);
        }
    </style>
@endsection