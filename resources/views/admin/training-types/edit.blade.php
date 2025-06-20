@extends('layouts.admin')
@section('title', 'Edit Jenis Pelatihan')
@section('page-title', 'Edit Jenis Pelatihan')

@section('content')
{{-- @dd($trainingType->price) --}}
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.training-types.update', $trainingType) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama Singkat -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama (Singkatan)</label>
                <input type="text" name="name" id="name" value="{{ old('name', $trainingType->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kepanjangan -->
            <div class="mb-6">
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Kepanjangan</label>
                <input type="text" name="full_name" id="full_name"
                    value="{{ old('full_name', $trainingType->full_name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('full_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Harga -->
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $trainingType->price) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('price')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Lokasi -->
            {{-- <div class="mb-6">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                <input type="text" name="location" id="location" value="{{ old('location', $trainingType->location) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div> --}}

            <!-- Submit Button -->
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.training-types.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Update Jenis Pelatihan
                </button>
            </div>
        </form>
    </div>
@endsection
