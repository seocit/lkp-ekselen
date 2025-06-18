@extends('layout.app-2')
@section('title', 'Profile Siswa')
@section('content')
    <div class="max-w-md mx-auto space-y-6">
        <a href="{{ route('siswa_program.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
        <h1 class="text-lg font-semibold">Profile Siswa</h1>
        <div class="grid grid-cols-2 gap-4 text-gray-700">
            @if ($siswa)
                <div>Nama</div>
            <div>{{ $siswa->nama_siswa}}</div>

            <div>Alamat</div>
            <div>{{ $siswa->alamat}}</div>

            <div>No. Telepon</div>
            <div>{{ $siswa->no_wa}}</div>

            <div>Tempat/Tanggal Lahir</div>
            <div>{{ $siswa->tempat_lahir}}, {{ $siswa->tanggal_lahir}}</div>

            <div>Asal Sekolah</div>
            <div>{{ $siswa->asal_sekolah}}</div>

            <div>Nama Orang Tua/Wali</div>
            <div>{{ $siswa->nama_ortu}}</div>

            <div>Pekerjaan Orang Tua</div>
            <div>{{ $siswa->pekerjaan_ortu}}</div>

            <div>Program</div>
            <div>A</div>

            <div>Kelas</div>
            <div>A</div>

            <div>Status Siswa</div>
            <div>
                <select class="border border-gray-300 rounded px-2 py-1">
                    <option value="aktif" selected>aktif</option>
                    <option value="nonaktif">nonaktif</option>
                </select>
            </div>
            @else
                <p>Tidak ada data siswa.</p>
            @endif

        </div>
    </div>
@endsection
