@extends('layout.app')

@section('title', 'Pembayaran Transfer')

@section('content')
<div class="max-w-md mx-auto border-4 border-blue-500 rounded-lg p-6 m-10 bg-white text-center">
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
    </div>
    <p class="mb-4 text-gray-700 font-semibold">
        Terimakasih Sudah Mendaftar Silahkan transfer ke rekening berikut :
    </p>
    <p class="mb-2 font-semibold">BNI XXXXXXXXX</p>
    <p class="mb-6">Biaya : Rp. xxx.xxx,-</p>
    <form method="POST" action="#" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <label for="bukti_pembayaran" class="block text-left mb-1 font-medium text-gray-700">Upload bukti pembayaran</label>
        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="w-full border border-gray-300 rounded-md p-3 text-gray-500 cursor-pointer" />
        <button type="submit" class="w-full bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded">
            Upload
        </button>
    </form>
</div>
@endsection
