@extends('layout.app')

@section('title', 'Pembayaran Daftar')

@section('content')
<div class="max-w-md mx-auto border-4 border-blue-500 rounded-lg p-6 m-10 bg-white">
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
    </div>
    <div class="text-gray-700">
        <p class="font-semibold mb-2">Formulir Pendaftaran</p>
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>Nama</div>
            <div>{{ $pendaftar->nama_siswa}}</div>

            <div>Alamat</div>
            <div>{{ $pendaftar->alamat}}</div>

            <div>No. Telepon</div>
            <div>{{ $pendaftar->no_wa}}</div>

            <div>Program</div>
            <div>{{ $pendaftar->kelas_choice->program->nama_program ?? '-'}}</div>

            <div>Kelas</div>
            <div>{{ $pendaftar->kelas_choice->nama_kelas ?? '-'}}</div>

            <div>Biaya</div>
            <div>Rp. {{ $pendaftar->kelas_choice->biaya_pendaftaran}},-</div>
        </div>
        <div class="text-center mb-5">
            <p class="mb-6 text-gray-700 font-semibold">
                Terima kasih Sudah Mendaftar, Silahkan datang ke alamat berikut :
            </p>
            <div>
                <img src="{{ asset('images/maps_ekselen_sako.png')}}" class="w-80 h-40 object-cover mx-auto" alt="Map 1"/>
                <a href="https://g.co/kgs/1C86YFe" target="_blank" class="text-blue-600 hover:underline block mt-2">LINK GMAPS EKSELEN!</a>
                <p class="mb-6 text-gray-700 font-semibold">Klik dibawah untuk melakukan pembayaran transfer :</p>
            </div>
        </div>
        <div class="flex justify-between space-x-4">
            <button type="button" onclick="window.location.href='{{ route('pembayaran.transfer')}}'" class="flex-grow bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded">
                Transfer
            </button>
        </div>
    </div>
</div>
@endsection
