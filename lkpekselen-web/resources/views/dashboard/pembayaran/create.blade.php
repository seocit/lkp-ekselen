@extends('layout.app-2')

@section('title', 'Create Tagihan Siswa')

@section('content')

    <a href="{{ route('bukti-pembayaran-siswa') }}" class="inline-flex items-center text-sm  hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 ml-20">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
        <h2 class="text-xl font-bold">Manajemen Tagihan Siswa</h2>
    </a>
    <div class="max-w-7xl mx-auto px-10 py-6">
        
        
        {{-- Alerts --}}
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong class="font-bold">Error:</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        @if (session('warning'))
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded mb-4">
                <strong class="font-bold">Peringatan:</strong>
                <span class="block sm:inline">{{ session('warning') }}</span>
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4">
                <strong class="font-bold">Berhasil:</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        {{-- === TABEL: Perlu Dikirimi Tagihan === --}}
        <div class="mb-10">
            <h3 class="text-lg font-semibold mb-3">Siswa yang Perlu Dikirim Tagihan</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Program - Kelas</th>
                            <th class="px-6 py-3">Terakhir Bayar</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($daftarTagih as $siswa)
                            @php
                                $calon = $siswa->calonSiswa;
                                $program = $calon->kelas_choice->program->nama_program ?? '-';
                                $kelas = $calon->kelas_choice->nama_kelas ?? '-';
                                $lastBayar = $siswa->lastBayar;
                            @endphp
                            <tr>
                                <td class="px-6 py-4">{{ $calon->nama_siswa }}</td>
                                <td class="px-6 py-4">{{ $program }} - {{ $kelas }}</td>
                                <td class="px-6 py-4">
                                    {{ $lastBayar ? \Carbon\Carbon::parse($lastBayar->tanggal_konfirmasi)->format('d M Y') : '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('tagihan.kirim', $siswa->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded transition">
                                            Kirim Tagihan
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 py-4">
                                    Semua siswa telah dikirimi tagihan bulan ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- === TABEL: Sudah Dikirimi Tagihan === --}}
        <div>
            <h3 class="text-lg font-semibold mb-3">Siswa yang Sudah Dikirim Tagihan Bulan Ini</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Program - Kelas</th>
                            <th class="px-6 py-3">Tanggal Tagihan</th>
                            <th class="px-6 py-3">Jatuh Tempo</th>
                            <th class="px-6 py-3">Jumlah</th>
                            <th class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($tagihanTerkirim as $tagihan)
                            @php
                                $user = $tagihan->user;
                                $calon = $user?->calonSiswa;
                                $kelas = $calon?->kelas_choice;
                                $program = $kelas?->program;
                            @endphp
                            <tr>
                                <td class="px-6 py-4">{{ $calon->nama_siswa ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $program->nama_program ?? '-' }} - {{ $kelas->nama_kelas ?? '-' }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($tagihan->tanggal)->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d M Y') }}</td>
                                <td class="px-6 py-4">Rp{{ number_format($tagihan->jumlah, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">
                                        {{ $tagihan->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-4">
                                    Belum ada tagihan yang dikirim bulan ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
