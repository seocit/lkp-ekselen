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
            <div>xxxxxxxxxxxx</div>

            <div>Alamat</div>
            <div>xxxxxxxxxxxx</div>

            <div>No. Telepon</div>
            <div>xxxx-xxxx-xxxx</div>

            <div>Program</div>
            <div>Text</div>

            <div>Kelas</div>
            <div>Text</div>

            <div>Biaya</div>
            <div>Rp. xxx.xxx,-</div>
        </div>
        <div class="flex justify-between space-x-4">
            <button type="button" onclick="window.location.href='{{ route('pembayaran ditempat')}}'" class="flex-grow bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded">
                Bayar di tempat
            </button>
            <button type="button" onclick="window.location.href='{{ route('pembayaran transfer')}}'" class="flex-grow bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded">
                Transfer
            </button>
        </div>
    </div>
</div>
@endsection
