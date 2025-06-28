@extends('layout.app-2')

@section('title', 'Tambah Materi')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center space-x-4 mb-6">
        <a href="{{ route('materi.index') }}" class="text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-xl font-semibold">Edit Materi</h1>
    </div>

    <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        {{-- Hidden ID Kelas --}}
        <input type="hidden" name="id_kelas" value="{{ $materi->id_kelas }}">

        {{-- Info Kelas (readonly) --}}
        <div>
            <label class="block font-medium mb-1">Kelas</label>
            <input type="text"
                   value="{{ $materi->kelas->nama_kelas }} - {{ $materi->kelas->program->nama_program }}{{ $materi->kelas->kategori ? ' ('.$materi->kelas->kategori->nama_kategori.')' : '' }}"
                   class="w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-100" readonly>
        </div>

        {{-- Nama Materi --}}
        <div>
            <input type="text" name="nama_materi" value="{{ old('nama_materi', $materi->nama_materi) }}"
                   placeholder="Judul materi"
                   class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                   required>
            @error('nama_materi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <input type="text" name="deskripsi" value="{{ old('deskripsi', $materi->deskripsi) }}"
                   placeholder="Keterangan singkat"
                   class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                   required>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- File Baru --}}
        <div>
            <label class="block font-medium mb-1">Ganti File (Opsional)</label>
            <input type="file" name="nama_file" class="w-full border p-2 rounded">
            <p class="text-sm text-gray-500">Format: PDF, DOC, PPT, PPTX. Max: 2MB.</p>
            @error('nama_file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="text-right">
            <button type="submit"
                    class="bg-purple-500 hover:bg-purple-600 text-white font-semibold px-6 py-2 rounded-full transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>


@endsection
