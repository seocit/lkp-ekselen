@extends('layout.app-2')
@section('title', 'Profile Siswa')
@section('content')
    <div class="max-w-md mx-auto space-y-6">
        <a href="{{ route('siswa program') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
        <h1 class="text-lg font-semibold">Profile Siswa</h1>
        <div class="grid grid-cols-2 gap-4 text-gray-700">
            <div>Nama</div>
            <div>xxxxxxx</div>

            <div>Alamat</div>
            <div>xxxxxxx</div>

            <div>No. Telepon</div>
            <div>xxxxxxx</div>

            <div>Tempat/Tanggal Lahir</div>
            <div>xxxxxxx</div>

            <div>Asal Sekolah</div>
            <div>xxxxxxx</div>

            <div>Nama Orang Tua/Wali</div>
            <div>xxxxxxx</div>

            <div>Pekerjaan Orang Tua</div>
            <div>xxxxxxx</div>

            <div>Program</div>
            <div>A</div>

            <div>Status Siswa</div>
            <div>
                <select class="border border-gray-300 rounded px-2 py-1">
                    <option value="aktif" selected>aktif</option>
                    <option value="nonaktif">nonaktif</option>
                </select>
            </div>
        </div>
    </div>
@endsection
