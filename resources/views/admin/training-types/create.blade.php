@extends('layouts.admin')
@section('title', 'Tambah Jenis Pelatihan')
@section('page-title', 'Tambah Jenis Pelatihan')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.training-types.store') }}" method="POST">
            @csrf

            <!-- Nama Singkat -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama (Singkatan)</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Kepanjangan -->
            <div class="mb-6">
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Kepanjangan</label>
                <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Durasi -->
            {{-- <div class="mb-6">
                <label for="duration_hours" class="block text-sm font-medium text-gray-700 mb-1">Durasi (jam)</label>
                <input type="number" name="duration_hours" id="duration_hours" value="{{ old('duration_hours') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div> --}}

            

            <!-- Submit Button -->
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.training-types.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Simpan Jenis Pelatihan
                </button>
            </div>
        </form>
    </div>
@endsection