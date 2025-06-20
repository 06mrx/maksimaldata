@extends('layouts.admin')
@section('title', 'Jadwal Pelatihan')
@section('page-title', 'Kelola Jadwal Pelatihan')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <h2 class="text-xl font-semibold text-gray-700">Jadwal Pelatihan Mikrotik</h2>

        <div class="w-full md:w-auto flex flex-col sm:flex-row gap-4">
            <!-- Form Pencarian -->
            <form action="{{ route('admin.training-schedules.index') }}" method="GET" class="relative w-full sm:w-64">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari jenis kelas..."
                       class="w-full px-4 py-2 rounded-lg text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if(request('search'))
                    <button type="button" onclick="window.location='{{ route('admin.training-schedules.index') }}'"
                            class="absolute right-8 top-2 text-gray-400 hover:text-gray-600">&times;</button>
                @endif
                <button type="submit" class="absolute right-2 top-2 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </form>

            <!-- Dropdown Show Per Page -->
            <form action="{{ route('admin.training-schedules.index') }}" method="GET" class="flex items-center space-x-2">
                <label for="per_page" class="text-xs text-gray-600 whitespace-nowrap">Show:</label>
                <select name="per_page" id="per_page" onchange="this.form.submit()"
                        class="text-xs rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    @foreach([10, 20, 50, 100] as $val)
                        <option value="{{ $val }}"
                            {{ request('per_page', 10) == $val ? 'selected' : '' }}>
                            {{ $val }}
                        </option>
                    @endforeach
                </select>
            </form>

            <!-- Tombol Add New -->
            <a href="{{ route('admin.training-schedules.create') }}"
               class="group flex items-center justify-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm min-w-[40px]"
               title="Tambah Jadwal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="ml-2 text-sm hidden sm:inline">Add</span>
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Mulai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Selesai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pendaftar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($schedules as $key => $schedule)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ ($schedules->currentPage() - 1) * $schedules->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ strtoupper($schedule->trainingType?->name) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($schedule->start_date)->format('d F Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($schedule->end_date)->format('d F Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <span class="font-bold">{{ $schedule->participants_count }}</span> orang
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $schedule->status == 'open' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($schedule->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('admin.participants.index') }}?schedule_id={{ $schedule->id }}"
                               class="text-blue-600 hover:text-blue-900">Lihat Pendaftar →</a>
                            <a href="{{ route('admin.training-schedules.edit', $schedule) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <button @click="$dispatch('open-delete-modal', {
                                    url: '{{ route('admin.training-schedules.destroy', $schedule) }}',
                                    name: '{{ strtoupper($schedule->trainingType?->name) }} - {{ $schedule->start_date }}'
                                })"
                                class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada jadwal.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $schedules->links() }}
    </div>
@endsection