@extends('layout.app-2')
@section('title', 'Data Calon Siswa Program')
@section('content')
<form method="POST" action="{{ route('calon-siswa.promote') }}">
    @csrf

    <div class="max-w-3xl mx-auto">
        <h1 class="text-xl font-semibold mb-6">List Calon Siswa</h1>

        {{-- <div class="mb-4">
            <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div> --}}

        <div class="space-y-4">
    @foreach ($list_calon_siswa as $item)
        <div class="flex justify-between items-start border border-gray-300 rounded-lg p-4">
            <div class="space-y-1">
                <p class="font-semibold text-base">{{ $item->nama_siswa }}</p>

                <p class="text-sm text-gray-600">
                    {{ $item->kelas_choice->program->nama_program ?? '-' }} -
                    {{ $item->kelas_choice->nama_kelas ?? '-' }}
                </p>

                <p class="text-xs text-gray-500">
                    {{ $item->kategori_kelas->nama_kategori ?? '-' }}
                </p>

                <p class="text-xs text-gray-500">
                    {{ $item->tanggal_daftar }}
                </p>

                @if ($item->pembayaran_transfer && $item->pembayaran_transfer->bukti_transfer)
                    <a href="{{ asset('storage/' . $item->pembayaran_transfer->bukti_transfer) }}"
                       target="_blank"
                       class="inline-block mt-2 bg-purple-300 text-purple-900 font-semibold px-4 py-1.5 rounded-full text-sm hover:bg-purple-400 transition">
                        🔍 Lihat Bukti Transfer
                    </a>
                @else
                    <span class="text-sm text-gray-400 italic block mt-2">
                        Tidak ada bukti transfer
                    </span>
                @endif
            </div>

            {{-- Checkbox --}}
            <div class="flex items-center pl-4">
                <input type="checkbox" name="calon_siswa_ids[]" value="{{ $item->id }}"
                       class="h-5 w-5 text-blue-600">
            </div>
        </div>
    @endforeach
</div>


        <div class="mt-6 text-right">
            <button type="submit"
                class="inline-block mt-2 bg-purple-300 text-purple-900 font-semibold px-4 py-1.5 rounded-full text-sm hover:bg-purple-400 transition">Tambahkan ke Data Siswa</button>
        </div>
    </div>
</form>
@endsection
