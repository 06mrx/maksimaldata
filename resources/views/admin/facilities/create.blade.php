@extends('layouts.admin')
@section('title', 'Tambah Fasilitas')
@section('page-title', 'Tambah Fasilitas')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.facilities.store') }}" method="POST">
            @csrf

            <!-- Nama Singkat -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- Svg Icon -->
            <div class="mb-6">
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon (SVG) <a href="https://icones.js.org/collection/all?s=router" target="_blank" class="text-emerald-500">Ambil Icon SVG disini</a></label>
                <textarea name="icon" id="icon" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('icon') }}</textarea>
                @error('icon')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('admin.facilities.index') }}"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Simpan Fasilitas
                    </button>
                </div>
        </form>
    </div>
@endsection
