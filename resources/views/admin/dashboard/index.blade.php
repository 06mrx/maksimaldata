@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Peserta -->
        <div
            class="group relative bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-6 border border-blue-200/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 backdrop-blur-sm">
            <div
                class="absolute inset-0 bg-gradient-to-br from-blue-600/5 to-indigo-600/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-500/10 rounded-xl group-hover:bg-blue-500/20 transition-colors duration-300">
                        {{-- <svg class="w-8 h-8 text-blue-600 group-hover:text-blue-700 transition-colors duration-300"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg> --}}
                        <svg class="w-8 h-8 text-blue-600 group-hover:text-blue-700 transition-colors duration-300"
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            viewBox="0 0 256 256"><!-- Icon from Phosphor by Phosphor Icons - https://github.com/phosphor-icons/core/blob/main/LICENSE -->
                            <path fill="currentColor"
                                d="M164.38 181.1a52 52 0 1 0-72.76 0a75.9 75.9 0 0 0-30 28.89a12 12 0 0 0 20.78 12a53 53 0 0 1 91.22 0a12 12 0 1 0 20.78-12a75.9 75.9 0 0 0-30.02-28.89M100 144a28 28 0 1 1 28 28a28 28 0 0 1-28-28m147.21 9.59a12 12 0 0 1-16.81-2.39c-8.33-11.09-19.85-19.59-29.33-21.64a12 12 0 0 1-1.82-22.91a20 20 0 1 0-24.78-28.3a12 12 0 1 1-21-11.6a44 44 0 1 1 73.28 48.35a92.2 92.2 0 0 1 22.85 21.69a12 12 0 0 1-2.39 16.8m-192.28-24c-9.48 2.05-21 10.55-29.33 21.65a12 12 0 0 1-19.19-14.45a92.4 92.4 0 0 1 22.85-21.69a44 44 0 1 1 73.28-48.35a12 12 0 1 1-21 11.6a20 20 0 1 0-24.78 28.3a12 12 0 0 1-1.82 22.91Z" />
                        </svg>
                    </div>
                    <div
                        class="h-12 w-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full opacity-10 group-hover:opacity-20 transition-opacity duration-300">
                    </div>
                </div>
                <h3 class="text-sm font-medium text-blue-600/70 uppercase tracking-wide mb-2">Total Pendaftar</h3>
                <p
                    class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent group-hover:from-blue-700 group-hover:to-indigo-700 transition-all duration-300">
                    {{ $totalParticipants }}</p>
                <div class="mt-3 flex items-center text-xs text-blue-500/60">
                    <div class="h-1 w-8 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full mr-2"></div>
                    <span>Semua Program</span>
                </div>
            </div>
        </div>

        @foreach ($participantCounts as $type)
            <div
                class="group relative bg-gradient-to-br from-sky-50 to-cyan-100 rounded-2xl p-6 border border-sky-200/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 backdrop-blur-sm">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-sky-600/5 to-cyan-600/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-sky-500/10 rounded-xl group-hover:bg-sky-500/20 transition-colors duration-300">
                            <svg class="w-8 h-8 text-blue-600 group-hover:text-blue-700 transition-colors duration-300"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 256 256"><!-- Icon from Phosphor by Phosphor Icons - https://github.com/phosphor-icons/core/blob/main/LICENSE -->
                                <path fill="currentColor"
                                    d="M164.38 181.1a52 52 0 1 0-72.76 0a75.9 75.9 0 0 0-30 28.89a12 12 0 0 0 20.78 12a53 53 0 0 1 91.22 0a12 12 0 1 0 20.78-12a75.9 75.9 0 0 0-30.02-28.89M100 144a28 28 0 1 1 28 28a28 28 0 0 1-28-28m147.21 9.59a12 12 0 0 1-16.81-2.39c-8.33-11.09-19.85-19.59-29.33-21.64a12 12 0 0 1-1.82-22.91a20 20 0 1 0-24.78-28.3a12 12 0 1 1-21-11.6a44 44 0 1 1 73.28 48.35a92.2 92.2 0 0 1 22.85 21.69a12 12 0 0 1-2.39 16.8m-192.28-24c-9.48 2.05-21 10.55-29.33 21.65a12 12 0 0 1-19.19-14.45a92.4 92.4 0 0 1 22.85-21.69a44 44 0 1 1 73.28-48.35a12 12 0 1 1-21 11.6a20 20 0 1 0-24.78 28.3a12 12 0 0 1-1.82 22.91Z" />
                            </svg>
                        </div>
                        <div
                            class="h-12 w-12 bg-gradient-to-br from-sky-500 to-cyan-500 rounded-full opacity-10 group-hover:opacity-20 transition-opacity duration-300">
                        </div>
                    </div>

                    <h3 class="text-sm font-medium text-sky-600/70 uppercase tracking-wide mb-2">{{ $type->name }}

                    </h3>
                    <p
                        class="text-3xl font-bold bg-gradient-to-r from-sky-600 to-cyan-600 bg-clip-text text-transparent group-hover:from-sky-700 group-hover:to-cyan-700 transition-all duration-300">
                        {{ $type->participants_count }}
                    </p>

                    <div class="mt-3 flex items-center text-xs text-sky-500/60">
                        <div class="h-1 w-8 bg-gradient-to-r from-sky-400 to-sky-600 rounded-full mr-2"></div>
                        <span>{{ $type->full_name }}</span>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Jadwal Aktif -->
        <div
            class="group relative bg-gradient-to-br from-indigo-50 to-blue-100 rounded-2xl p-6 border border-indigo-200/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 backdrop-blur-sm">
            <div
                class="absolute inset-0 bg-gradient-to-br from-indigo-600/5 to-blue-600/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="p-3 bg-indigo-500/10 rounded-xl group-hover:bg-indigo-500/20 transition-colors duration-300">
                        {{-- <svg class="w-8 h-8 text-indigo-600 group-hover:text-indigo-700 transition-colors duration-300"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg> --}}
                        <svg class="w-8 h-8 text-indigo-600 group-hover:text-indigo-700 transition-colors duration-300"
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            viewBox="0 0 24 24"><!-- Icon from Gridicons by Automattic - https://github.com/Automattic/gridicons/blob/trunk/LICENSE.md -->
                            <path fill="currentColor"
                                d="m10.498 18.001l-3.705-3.705l1.415-1.415l2.294 2.294l5.293-5.293l1.415 1.415zM21 6v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1V2h2v2h8V2h2v2h1a2 2 0 0 1 2 2m-2 2H5v11h14z" />
                        </svg>
                    </div>
                    <div
                        class="h-12 w-12 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-full opacity-10 group-hover:opacity-20 transition-opacity duration-300">
                    </div>
                </div>
                <h3 class="text-sm font-medium text-indigo-600/70 uppercase tracking-wide mb-2">Jadwal Terbuka</h3>
                <p
                    class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent group-hover:from-indigo-700 group-hover:to-blue-700 transition-all duration-300">
                    {{ App\Models\TrainingSchedule::where('status', 'open')->count() }}
                </p>
                <div class="mt-3 flex items-center text-xs text-indigo-500/60">
                    <div class="h-1 w-8 bg-gradient-to-r from-indigo-400 to-blue-600 rounded-full mr-2"></div>
                    <span>Siap Daftar</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Registrations -->
    <section class="mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Pendaftar Terbaru</h2>
            <a href="{{ route('admin.participants.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
                Lihat Semua →
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">WhatsApp
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelatihan
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($recentParticipants as $participant)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $participant->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $participant->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="https://wa.me/{{ $participant->whatsapp }}" target="_blank"
                                    class="text-blue-600 hover:text-green-600 transition-colors">
                                    {{ $participant->whatsapp }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $participant->trainingSchedule->trainingType?->name ?? 'N/A' }} -
                                    {{-- {{ \Carbon\Carbon::parse($participant->trainingSchedule->start_date)->format('d F Y') }} --}}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada pendaftar baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Upcoming Schedules -->
    <!-- Upcoming Schedules -->
    <section class="mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Jadwal Pelatihan Terdekat</h2>
            <a href="{{ route('admin.training-schedules.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
                Lihat Semua →
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($upcomingSchedules as $schedule)
                <div class="bg-white rounded-3xl p-6 glass-morphism luxury-shadow">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="block text-sm text-gray-500">Tanggal</span>
                            <p class="font-bold text-lg text-gray-900">
                                {{ \Carbon\Carbon::parse($schedule->start_date)->format('d F Y') }}
                            </p>
                            <p class="mt-2 font-semibold text-gray-700">
                                {{ strtoupper($schedule->trainingType?->name) }} • {{ $schedule->participants_count }}
                                orang daftar
                            </p>
                        </div>
                        <span
                            class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full 
                        {{ $schedule->status == 'open' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($schedule->status) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-white rounded-3xl p-6 glass-morphism luxury-shadow text-center text-gray-500">
                    Belum ada jadwal terdekat.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Statistik Chart -->
    <section class="mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Statistik Pendaftar</h2>
        </div>

        <div class="bg-white rounded-3xl p-6 glass-morphism luxury-shadow h-64 md:h-80 flex items-center justify-center">
            <div id="registrationChart" class="w-full h-full"></div>
        </div>
    </section>

    <!-- Quick Actions -->
    <section>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Aksi Cepat</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('admin.training-schedules.create') }}"
                class="group bg-white p-6 rounded-3xl border border-gray-200 hover:border-blue-300 transition-all duration-300 luxury-shadow">
                <div class="flex items-center space-x-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-r from-blue-600 to-sky-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-calendar-plus text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Tambah Jadwal</h3>
                        <p class="text-sm text-gray-600 mt-1">Buat jadwal pelatihan MikroTik baru</p>
                    </div>
                </div>
            </a>

            {{-- <a href="{{ route('admin.participants.index') }}" class="group bg-white p-6 rounded-3xl border border-gray-200 hover:border-blue-300 transition-all duration-300 luxury-shadow">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Lihat Daftar Peserta</h3>
                    <p class="text-sm text-gray-600 mt-1">Kelola pendaftar dan konfirmasi pembayaran</p>
                </div>
            </div>
        </a> --}}

            <a href="{{ route('admin.training-schedules.index') }}"
                class="group bg-white p-6 rounded-3xl border border-gray-200 hover:border-blue-300 transition-all duration-300 luxury-shadow">
                <div class="flex items-center space-x-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-chart-bar text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Analisis Data</h3>
                        <p class="text-sm text-gray-600 mt-1">Lihat statistik dan performa pelatihan</p>
                    </div>
                </div>
            </a>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var options = {
            series: [{
                name: 'Jumlah Peserta',
                data: {!! $chartData !!}
            }],
            chart: {
                height: '100%',
                type: 'area',
                toolbar: {
                    show: false
                },
                animations: {
                    enabled: true,
                    easing: 'linear',
                    speed: 1000,
                    animateGradually: {
                        enabled: true
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2,
                colors: ['#3b82f6']
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.5,
                    gradientToColors: ['#0ea5e9'],
                    inverseColors: false,
                    opacityFrom: 0.4,
                    opacityTo: 0.1,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: {!! $chartMonths !!},
                labels: {
                    rotate: -45,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif',
                        cssClass: 'text-gray-600'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif',
                        color: '#6b7280'
                    }
                }
            },
            tooltip: {
                theme: 'dark',
                marker: {
                    fillColors: ['#3b82f6']
                }
            },
            grid: {
                borderColor: '#e5e7eb',
                strokeDashArray: 3
            },
            title: {
                text: 'Pendaftar per Bulan',
                align: 'left',
                style: {
                    fontSize: '14px',
                    color: '#4b5563'
                }
            },
            noData: {
                text: 'Tidak ada data registrasi'
            }
        };

        var chart = new ApexCharts(document.querySelector("#registrationChart"), options);
        chart.render();
    </script>
@endpush
