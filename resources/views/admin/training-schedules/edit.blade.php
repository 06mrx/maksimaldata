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
                <label for="training_type_id" class="block text-sm font-medium text-gray-700 mb-1">Jenis Pelatihan</label>
                <select name="training_type_id" id="training_type_id" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Jenis --</option>
                    @foreach ($trainingTypes as $tt)
                        <option value="{{ $tt->id }}"
                            {{ $trainingSchedule->training_type_id == $tt->id ? 'selected' : '' }}>
                            {{ $tt->name }} - {{ $tt->full_name }}
                        </option>
                    @endforeach
                </select>
                @error('training_type_id')
                    <div class="text-red-500 text-sm ">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Mulai -->
            <div class="mb-6">
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date"
                    value="{{ old('start_date', $trainingSchedule->start_date) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('start_date')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Selesai -->
            <div class="mb-6">
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                <input type="date" name="end_date" id="end_date"
                    value="{{ old('end_date', $trainingSchedule->end_date) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('end_date')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Harga -->
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $trainingSchedule->price) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('price')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Lokasi -->
            <div class="mb-6">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                <input type="text" name="location" id="location" value="{{ $trainingSchedule->location }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('location')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Catatan -->
            <div class="mb-6">
                <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Keterangan (Opsional) </label>
                <input type="text" name="note" id="note" value="{{ $trainingSchedule->note }}"
                    placeholder="Keterangan tambahan"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('note')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="open" {{ $trainingSchedule->status === 'open' ? 'selected' : '' }}>Buka</option>
                    <option value="closed" {{ $trainingSchedule->status === 'closed' ? 'selected' : '' }}>Tutup</option>
                </select>
                @error('status')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fasilitas checkbox-->
            {{-- Tabel pivot nya training_schedule_facilities --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Fasilitas</label>
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($facilities as $facility)
                        <div class="flex items-center">
                            <input type="checkbox" name="facilities[]" id="facility_{{ $facility->id }}"
                                value="{{ $facility->id }}"
                                class="mr-2"
                                {{-- {{ $trainingSchedule->trainingScheduleFacilities->contains($facility->id) ? 'checked' : '' }}> --}}
                                {{ $trainingSchedule->trainingScheduleFacilities->contains('facility_id', $facility->id) ? 'checked' : '' }}>
                            <label for="facility_{{ $facility->id }}"
                                class="text-sm text-gray-700">{{ $facility->name }}</label> 
                        </div>
                    @endforeach
                </div>
                @error('facilities')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>


            <!-- Submit Button -->
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.training-schedules.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100">
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
