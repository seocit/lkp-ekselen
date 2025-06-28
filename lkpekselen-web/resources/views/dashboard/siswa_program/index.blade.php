@extends('layout.app-2')
@section('title', 'Siswa')
@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <h1 class="text-lg font-semibold mb-4">Data Siswa</h1>
        <p class="text-sm text-gray-600 mb-4">Jumlah siswa perkelas</p>
        <canvas id="siswaChart" class="w-full h-64"></canvas>

        <form method="GET" action="{{ route('data-siswa.index') }}">
                <select name="id_program" class="border px-3 py-2 rounded">
                    <option value="">-- Semua Program --</option>
                    @foreach ($list_program as $program)
                        <option value="{{ $program->id }}" {{ request('id_program') == $program->id ? 'selected' : '' }}>
                            {{ $program->nama_program }}
                        </option>
                    @endforeach
                </select>
                {{-- 🎯 Filter status --}}
                <select name="status" class="border px-3 py-2 rounded">
                    <option value="">-- Semua Status --</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded">Filter</button>
        </form>


        <ul class="space-y-3">
            @foreach ($list_siswa as $item)
                <a href="{{ route('data-siswa.show', $item->id) }}" class="block border p-4 rounded mb-2 hover:bg-gray-50">
                    <p class="font-semibold">{{ $item->calonSiswa->nama_siswa }}</p>
                    <p class="text-sm text-gray-600">
                        Program: {{ $item->calonSiswa->kelas_choice->program->nama_program ?? '-' }} /
                        Kelas: {{ $item->calonSiswa->kelas_choice->nama_kelas ?? '-' }}
                    </p>
                </a>
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
        @foreach ($semua_kelas as $kelas)
            "{{ $kelas->nama_kelas }}{{ $kelas->kategori ? ' - ' . $kelas->kategori->nama_kategori : '' }}"{{ !$loop->last ? ',' : '' }}
        @endforeach
    ],
    datasets: [
        @foreach ($program_pelatihans as $program)
            {
                label: "{{ $program->nama_program }}",
                data: [
                    @foreach ($semua_kelas as $kelas)
                        {{ $program->kelas->contains('id', $kelas->id)
                        ? $kelas->calon_siswas->filter(fn($cs) => $cs->dataSiswa)->count()
                        : 0 }},
                    @endforeach
                ],
                backgroundColor: '{{ sprintf("rgba(%d, %d, %d, 0.7)", rand(0,255), rand(0,255), rand(0,255)) }}'
            },
        @endforeach
    ]
},

                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: false,
                            title: {
                                display: true,
                                text: 'Kelas'
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
