@extends('layout.app-2')
@section('title', 'Siswa')
@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <h1 class="text-lg font-semibold mb-4">Data Siswa</h1>
        <canvas id="siswaChart" class="w-full h-64"></canvas>

        <form method="GET" action="{{ route('data-siswa.index') }}">
            <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari nama siswa..."
            class="border px-3 py-2 rounded mr-2" />
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
                <button type="submit"
                class="bg-purple-300 text-purple-900 font-semibold px-4 py-2 rounded-full hover:bg-purple-400 transition">Search</button>
        </form>

        {{-- Section Export --}}
        <div class="flex items-center justify-between mt-6 border-t pt-6">
            <h2 class="text-md font-semibold text-gray-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 6h.01M3 12h.01" />
                </svg>
                Backup Data Siswa
            </h2>

            <a href="{{ route('export.siswa') }}"
            class="inline-flex items-center gap-2 bg-green-600 text-white font-semibold px-5 py-2.5 rounded-xl shadow hover:bg-green-700 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 4v16h16V4H4zm8 2v6m0 0l-3-3m3 3l3-3m-9 9h12" />
                </svg>
                Export Excel
            </a>
        </div>

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
            labels: @json($tahunList),
            datasets: @json($datasets)
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: 'Jumlah Siswa per Tahun per Program'
                }
            },
            scales: {
                x: { title: { display: true, text: 'Tahun' } },
                y: { beginAtZero: true, title: { display: true, text: 'Jumlah Siswa' } }
            }
        }
    });
});
</script>
@endsection
