@extends('layout.app')

@section('title', 'Status Pendaftaran')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold text-center mb-6">Status Pendaftaran Anda</h2>

    @if (!$pendaftar)
        <div class="bg-red-100 text-red-800 p-4 rounded font-semibold text-center">
            ⚠️ Anda belum melakukan pendaftaran.
        </div>
    @else
        <div class="bg-gray-100 p-4 rounded border ">
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>No Registrasi</div>
                <div>{{ $pendaftar->no_registrasi }}</div>

                <div>Nama</div>
                <div>{{ $pendaftar->nama_siswa }}</div>

                <div>Alamat</div>
                <div>{{ $pendaftar->alamat }}</div>

                <div>No. Telepon</div>
                <div>{{ $pendaftar->no_wa }}</div>

                <div>Program</div>
                <div>{{ $pendaftar->kelas_choice->program->nama_program ?? '-' }}</div>

                <div>Kelas</div>
                <div>{{ $pendaftar->kelas_choice->nama_kelas ?? '-' }}</div>

                <div>Kategori</div>
                <div>{{ $pendaftar->kategori_kelas->nama_kategori ?? '-' }}</div>

                <div>Biaya</div>
                <div>Rp. {{ $pendaftar->kelas_choice->biaya_pendaftaran ?? '0' }},-</div>
            </div>

            @php
                $user = auth()->user();
            @endphp

            @if ($user && $user->hasRole('siswa'))
                <div class="mt-4 p-3 rounded bg-green-100 text-green-800 font-semibold">
                    ✅ Anda sudah terdaftar sebagai <strong>siswa</strong>.
                </div>
            @else
                <div class="mt-4 p-3 rounded bg-yellow-100 text-yellow-800 font-semibold">
                    ⏳ Pendaftaran Anda masih dalam proses <strong>verifikasi</strong>.
                </div>
            @endif
        </div>
    @endif
</div>
@endsection
