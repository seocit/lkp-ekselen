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

            <div>Kategori</div>
            <div>{{ $pendaftar->kategori_kelas->nama_kategori ?? '-'}}</div>

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
                <p class="mb-6 text-gray-700 font-semibold">Atau Klik dibawah untuk melakukan pembayaran transfer :</p>
                <p class="mb-2 font-semibold">BNI XXXXXXXXX</p>
            </div>
        </div>
        @if ($pendaftar->pembayaran)
    <div class="text-center text-green-600 font-semibold mb-4">
        Bukti transfer telah diunggah.
    </div>
@else
    <form action="{{ route('pembayaran.transfer.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">
        @csrf

        <!-- Sesuai field di tabel pembayaran_transfers -->
        <input type="hidden" name="tipe_pembayaran" value="pendaftaran">
        <input type="hidden" name="id_refrensi" value="{{ $pendaftar->id }}">

        <label class="block text-left text-sm text-gray-700 font-medium">Upload Bukti Transfer</label>
        <input type="file" name="bukti_transfer" required
               class="w-full border border-gray-300 rounded px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-500 file:text-white hover:file:bg-blue-600">

        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded font-semibold">
            Kirim Bukti Pembayaran
        </button>
    </form>
@endif


        <div class="flex justify-between space-x-4">
            <button type="button" onclick="window.location.href='{{ route('home')}}'" class="flex-grow bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded">
                kembali
            </button>
        </div>
    </div>
</div>
@endsection
