@extends('layout.app-2')

@section('title', 'Pembayaran SPP')

@section('content')
<div class="max-w-md mx-auto bg-white border border-gray-300 rounded-lg p-6 shadow-sm">
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
    </div>
    <div class="text-center text-gray-700 mb-4">
        <p>Kelas : xxxxxx</p>
        <p>untuk melakukan pembayaran Silahkan transfer ke rekening berikut :</p>
        <p class="mt-4 font-semibold">BNI XXXXXXXXX</p>
        <p>Biaya : Rp. xxx.xxx,-</p>
    </div>
    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <label for="bukti_pembayaran" class="block text-gray-700 mb-2">Upload bukti pembayaran</label>
        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
            class="block w-full text-gray-500 file:mr-4 file:py-2 file:px-4
                   file:rounded file:border-0
                   file:text-sm file:font-semibold
                   file:bg-gray-100 file:text-gray-700
                   hover:file:bg-gray-200
                   cursor-pointer" />
        <button type="submit"
            class="w-full bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded">
            Upload
        </button>
    </form>
</div>
@endsection
