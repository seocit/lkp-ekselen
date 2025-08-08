@extends('layout.app-2')

@section('title', 'Pembayaran SPP')

@section('content')
<div class="max-w-md mx-auto bg-white border border-gray-200 rounded-lg p-6 shadow">

    {{-- Logo --}}
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
    </div>

    {{-- Informasi Kelas --}}
    <div class="text-center text-gray-700 mb-4">
        @if ($kelas)
            <ul class="mt-2 space-y-1">
                <li>Program: {{ $kelas->program->nama_program ?? '-' }}</li>
                <li>Nama Kelas: {{ $kelas->nama_kelas }}</li>
                <li>Biaya Pendaftaran: Rp {{ number_format($kelas->biaya_pendaftaran) }}</li>
            </ul>
            <p class="mt-4 text-sm text-gray-600">Untuk melakukan pembayaran silakan transfer ke rekening:</p>
            <p class="mt-2 font-semibold text-lg text-blue-600">BNI 1374900779</p>
        @else
            <p class="text-red-500">Kelas tidak ditemukan.</p>
        @endif
    </div>

    {{-- Informasi Tagihan --}}
    @if ($tagihan)
        <div class="bg-gray-50 p-4 rounded shadow mb-6">
            <h2 class="font-bold text-gray-700 mb-2">Informasi Tagihan Aktif</h2>
            <ul class="text-sm text-gray-800 space-y-1">
                <li><strong>No Tagihan:</strong> {{ $tagihan->no_tagihan }}</li>
                <li><strong>Status:</strong>
                    @if ($tagihan->status === 'pending')
                        <span class="text-yellow-600 font-semibold">Pending</span>
                    @elseif ($tagihan->status === 'terlambat')
                        <span class="text-red-600 font-semibold">Terlambat</span>
                    @elseif ($tagihan->status === 'lunas')
                        <span class="text-green-600 font-semibold">Lunas</span>
                    @elseif ($tagihan->status === 'menunggu_verifikasi')
                        <span class="text-blue-600 font-semibold">Menunggu Verifikasi</span>
                    @endif
                </li>
                <li><strong>Jumlah:</strong> Rp {{ number_format($tagihan->jumlah) }}</li>
                <li><strong>Jatuh Tempo:</strong> {{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d M Y') }}</li>
            </ul>
        </div>
    @endif

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 font-semibold rounded">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 border border-red-400 rounded px-4 py-2">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Upload Bukti Transfer --}}
    @if ($tagihan && $tagihan->status === 'pending')
        <form action="{{ route('pembayaran.spp.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">
            @csrf

            <input type="hidden" name="id_tagihan" value="{{ $tagihan->id }}">

            <label class="block text-left text-sm text-gray-700 font-medium">Upload Bukti Transfer SPP</label>
            <input type="file" name="bukti_transfer" required
                class="w-full border border-gray-300 rounded px-3 py-2
                       file:mr-4 file:py-2 file:px-4 file:rounded file:border-0
                       file:bg-blue-500 file:text-white hover:file:bg-blue-600">

            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded font-semibold">
                Kirim Bukti Pembayaran
            </button>
        </form>
    @elseif ($tagihan && $tagihan->status === 'menunggu_verifikasi')
        <div class="text-sm text-blue-600 text-center mt-4">
            ⏳ Bukti pembayaran sudah dikirim. Menunggu verifikasi admin.
        </div>
    @else
        <div class="text-center bg-yellow-50 border border-yellow-300 text-yellow-700 px-4 py-3 rounded mt-4">
            📭 Tidak ada tagihan aktif saat ini. Silakan cek kembali nanti atau hubungi admin.
        </div>
    @endif

    {{-- Tombol Kembali --}}
    <div class="text-center mt-6">
        <a href="{{ route('siswa.tagihan') }}" class="text-blue-600 hover:underline text-sm">
            Kembali ke halaman sebelumnya
        </a>
    </div>
</div>
@endsection
