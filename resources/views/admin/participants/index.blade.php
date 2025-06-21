@extends('layouts.admin')
@section('title', 'Daftar Peserta Pelatihan')
@section('page-title', 'Participants')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <h2 class="text-xl font-semibold text-gray-700">
            Daftar Peserta {{ strtoupper($schedule->type) }} Tanggal
            {{ \Carbon\Carbon::parse($schedule->start_date)->translatedFormat('d F Y') }}
        </h2>

        <div class="flex flex-wrap gap-4 w-full md:w-auto">
            <!-- Form Pencarian -->
            <form action="{{ route('admin.participants.index') }}" method="GET" class="relative w-full sm:w-64">
                @if (request('schedule_id'))
                    <input type="hidden" name="schedule_id" value="{{ request('schedule_id') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..."
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if (request('search'))
                    <button type="button"
                        onclick="window.location='{{ route('admin.participants.index', ['schedule_id' => request('schedule_id')]) }}'"
                        class="absolute right-8 top-2 text-gray-400 hover:text-gray-600">&times;</button>
                @endif
                <button type="submit" class="absolute right-2 top-2 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>

            <!-- Dropdown Filter Jenis Training -->
            {{-- <form action="{{ route('admin.participants.index') }}" method="GET" class="flex items-center space-x-2">
            <label for="type" class="text-xs text-gray-600 whitespace-nowrap">Filter:</label>
            <select name="type" id="type" onchange="this.form.submit()"
                    class="text-xs rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Semua --</option>
                <option value="mtre" {{ request('type') == 'mtre' ? 'selected' : '' }}>MTRE</option>
                <option value="mtcna" {{ request('type') == 'mtcna' ? 'selected' : '' }}>MTCNA</option>
            </select>
        </form> --}}
        </div>
    </div>

    <!-- Tabel Daftar Peserta -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">WhatsApp</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran
                        T-Shirt</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($participants as $key => $participant)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ ($participants->currentPage() - 1) * $participants->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $participant->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $participant->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a href="{{ 'https://wa.me/' . $participant->whatsapp . '?text=Halo+' . rawurlencode($participant->name) . ',+Terima+kasih+telah+mendaftar+di+pelatihan+Maksimal+Data.+Silakan+lakukan+pembayaran+dan+kirim+bukti+konfirmasi.' }}"
                                target="_blank"
                                class="flex items-center space-x-2 text-blue-600 hover:text-green-600 transition duration-300">
                                <i class="fab fa-whatsapp text-lg"></i>
                                <span>{{ $participant->whatsapp }}</span>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $participant->trainingSchedule->type === 'mtcre' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ strtoupper($participant->trainingSchedule->trainingType->name) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $participant->tshirt_size === 'S' ? 'bg-green-100 text-green-800' : ($participant->tshirt_size === 'M' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ $participant->tshirt_size }}
                            </span>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            {{-- <a href="{{ route('admin.participants.show', $participant) }}"
                                class="text-blue-600 hover:text-blue-900">Lihat</a> --}}
                            <button
                                @click="$dispatch('open-delete-modal', {
                        url: '{{ route('admin.participants.destroy', $participant) }}',
                        name: '{{ $participant->name }}'
                    })"
                                class="text-red-600 hover:text-red-900">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada peserta ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $participants->links() }}
    </div>
@endsection
