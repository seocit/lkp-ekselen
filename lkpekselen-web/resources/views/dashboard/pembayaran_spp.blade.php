@extends('layout.app-2')

@section('title', 'Pembayaran SPP')

@section('content')
<div class="max-w-md mx-auto bg-white border border-gray-300 rounded-lg p-6 shadow-sm">
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
    </div>
    <div class="text-center text-gray-700 mb-4">
        @if ($kelas)
            <ul class="mt-2 space-y-1">
                <li>Program: {{ $kelas->program->nama_program ?? '-' }}</li>
                <li>Nama Kelas: {{ $kelas->nama_kelas }}</li>
                <p>untuk melakukan pembayaran Silahkan transfer ke rekening berikut :</p>
                <p class="mt-4 font-semibold">BNI 1374900779</p>
                <li>Biaya: Rp {{ number_format($kelas->biaya_pendaftaran) }}</li>
            </ul>
        @else
            <p class="text-red-500">Kelas tidak ditemukan.</p>
        @endif
        
    </div>
    @php
        $user = auth()->user();
    @endphp

    @if (session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 font-semibold rounded">
            ✅ {{ session('success') }}
        </div>
    @endif

    

        
    <form action="{{ route('pembayaran.spp.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">
        @csrf

        <input type="hidden" name="id_refrensi" value="{{ $pendaftar->id }}">
        <input type="hidden" name="tipe_pembayaran" value="spp">

        <label class="block text-left text-sm text-gray-700 font-medium">Upload Bukti Transfer SPP</label>
        <input type="file" name="bukti_transfer" required class="w-full border border-gray-300 rounded px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-500 file:text-white hover:file:bg-blue-600">

        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded font-semibold">
             Kirim Bukti Pembayaran SPP
        </button>
    </form>
        

    
</div>
@endsection
