<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('homepage') }}" class="text-xl font-semibold text-blue-700">Maksimal Data</a>

        <!-- Desktop Nav -->
        <ul class="hidden md:flex space-x-8 text-sm text-gray-700">
            <li><a href="#tentang" class="hover:text-blue-600 transition">Tentang</a></li>
            <li><a href="#projek" class="hover:text-blue-600 transition">Projek</a></li>
            <li><a href="#layanan" class="hover:text-blue-600 transition">Layanan</a></li>
            <li><a href="#mitra" class="hover:text-blue-600 transition">Mitra</a></li>
            <li><a href="#jadwal-pelatihan" class="hover:text-blue-600 transition">Pelatihan</a></li>
            <li><a href="#kontak" class="hover:text-blue-600 transition">Kontak</a></li>
            <li><a href="{{ route('login') }}" class="font-medium hover:text-blue-600 transition">Login</a></li>
        </ul>

        <!-- Mobile Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" class="md:hidden bg-white shadow-inner p-4 border-t border-gray-200">
        <ul class="space-y-2 text-gray-700">
            <li><a href="#tentang" @click="mobileMenuOpen = false" class="block hover:text-blue-600">Tentang</a></li>
            <li><a href="#projek" @click="mobileMenuOpen = false" class="block hover:text-blue-600">Projek</a></li>
            <li><a href="#layanan" @click="mobileMenuOpen = false" class="block hover:text-blue-600">Layanan</a></li>
            <li><a href="#mitra" @click="mobileMenuOpen = false" class="block hover:text-blue-600">Mitra</a></li>
            <li><a href="#jadwal-pelatihan" @click="mobileMenuOpen = false" class="block hover:text-blue-600">Pelatihan</a></li>
            <li><a href="#kontak" @click="mobileMenuOpen = false" class="block hover:text-blue-600">Kontak</a></li>
            <li><a href="{{ route('login') }}" class="block font-medium text-blue-600">Login</a></li>
        </ul>
    </div>
</nav>