@extends('layout.app-2')
@section('title', 'Siswa')
@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <h1 class="text-lg font-semibold mb-4">Data Siswa</h1>
        <p class="text-sm text-gray-600 mb-4">Jumlah siswa per tahun</p>
        <canvas id="siswaChart" class="w-full h-64"></canvas>

        <ul class="space-y-3">
            @foreach ($program_pelatihan as $item)
                <li>
                <a href="{{ route('siswa_program.index')}}" class="flex justify-between items-center border border-gray-300 rounded-lg px-4 py-3 hover:bg-gray-100 transition">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $item->nama_program}}</p>
                        <p class="text-gray-500 text-sm">Subhead</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </li>
            @endforeach

        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('siswaChart').getContext('2d');
            const siswaChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($program_pelatihan as $item)
                            "{{ $item->nama_program }}"{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    ],
                    datasets: [
                        {
                            label: 'Kelas A',
                            data: [30, 15, 16],
                            backgroundColor: 'rgba(107, 114, 128, 0.7)' // gray-500
                        },
                        {
                            label: 'Kelas B',
                            data: [25, 30, 25],
                            backgroundColor: 'rgba(156, 163, 175, 0.7)' // gray-400
                        },
                        {
                            label: 'Kelas C',
                            data: [10, 16, 25],
                            backgroundColor: 'rgba(209, 213, 219, 0.7)' // gray-300
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: false,
                            title: {
                                display: true,
                                text: 'Program'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Siswa'
                            },
                            ticks: {
                                stepSize: 5
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
