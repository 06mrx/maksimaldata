@extends('layouts.admin')
@section('title', 'Jenis Pelatihan')
@section('page-title', 'Jenis Pelatihan')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-700">Jenis Pelatihan</h2>
        <a href="{{ route('admin.training-types.create') }}" 
           class="group flex items-center justify-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm min-w-[40px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kepanjangan</th>
                    {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi (jam)</th> --}}
                    {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th> --}}
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($types as $type)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $type->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $type->full_name }}</td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $type->duration_hours }} jam</td> --}}
                        {{-- <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate ">{{ $type->location ?? '-' }}</td> --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium space-x-2">
                            <a href="{{ route('admin.training-types.edit', $type) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <button @click="$dispatch('open-delete-modal', {
                                url: '{{ route('admin.training-types.destroy', $type) }}',
                                name: '{{ $type->name }}'
                            })" class="text-red-600 hover:text-red-900">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada jenis pelatihan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $types->links() }}
    </div>
@endsection