@extends('layout.app')

@section('title', 'Pembayaran Ditempat')

@section('content')
<div class="max-w-md mx-auto border-4 border-blue-500 rounded-lg p-6 m-10 bg-white text-center">
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
    </div>
    <p class="mb-6 text-gray-700 font-semibold">
        Terima kasih Sudah Mendaftar, Silahkan datang ke alamat berikut :
    </p>
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <img src="images/lkpekselen_sako.png" class="w-80 h-40 object-cover" alt="Map 1" class="mx-auto rounded" />
            <a href="https://g.co/kgs/1C86YFe" target="_blank" class="text-blue-600 hover:underline block mt-2">https://g.co/kgs/1C86YFe</a>
        </div>
        <div>
            <img src="images/lkpekselen_kenten.png" class="w-80 h-40 object-cover" alt="Map 2" class="mx-auto rounded" />
            <a href="https://g.co/kgs/C3GCmE7" target="_blank" class="text-blue-600 hover:underline block mt-2">https://g.co/kgs/C3GCmE7</a>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="inline-block bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 px-6 rounded">
        Kembali
    </a>
</div>
@endsection
