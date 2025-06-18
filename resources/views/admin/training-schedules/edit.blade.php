@extends('layouts.admin')
@section('title', 'Edit Jadwal')
@section('page-title', 'Edit Jadwal Pelatihan')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.training-schedules.update', $trainingSchedule) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Jenis Kelas -->
            <div class="mb-6">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelas</label>
                <select name="type" id="type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="mtcre" {{ $trainingSchedule->type === 'mtcre' ? 'selected' : '' }}>MTCRE</option>
                    <option value="mtcna" {{ $trainingSchedule->type === 'mtcna' ? 'selected' : '' }}>MTCNA</option>
                </select>
            </div>

            <!-- Tanggal Mulai -->
            <div class="mb-6">
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date"
                       value="{{ old('start_date', $trainingSchedule->start_date) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Tanggal Selesai -->
            <div class="mb-6">
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                <input type="date" name="end_date" id="end_date"
                       value="{{ old('end_date', $trainingSchedule->end_date) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="open" {{ $trainingSchedule->status === 'open' ? 'selected' : '' }}>Buka</option>
                    <option value="closed" {{ $trainingSchedule->status === 'closed' ? 'selected' : '' }}>Tutup</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.training-schedules.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100">
                    Cancel
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update Jadwal
                </button>
            </div>
        </form>
    </div>
@endsection