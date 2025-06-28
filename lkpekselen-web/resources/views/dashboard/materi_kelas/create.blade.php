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
        <h1 class="text-xl font-semibold">Tambah Materi</h1>
    </div>

    <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        {{-- Dropdown Kelas --}}
        <div>
            <label class="block font-medium mb-1">Pilih Kelas</label>
            <select name="id_kelas" required class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas_programs as $kelas)
                    <option value="{{ $kelas->id }}">
                        {{ $kelas->nama_kelas }} - {{ $kelas->program->nama_program }}
                        @if ($kelas->kategori) ({{ $kelas->kategori->nama_kategori }}) @endif
                    </option>
                @endforeach
            </select>
            @error('id_kelas')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Nama Materi --}}
        <div>
            <input type="text" name="nama_materi" placeholder="Judul materi" required
                   class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            @error('nama_materi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Deskripsi --}}
        <div>
            <input type="text" name="deskripsi" placeholder="Keterangan singkat" required
                   class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Upload File --}}
        <div>
            <label class="block font-medium mb-1">Upload File</label>
            <input type="file" name="nama_file" class="w-full border p-2 rounded" />
            <p class="text-sm text-gray-500">Format: PDF, DOC, PPT, PPTX. Max: 2MB.</p>
            @error('nama_file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Kirim --}}
        <div class="text-right">
            <button type="submit"
                    class="bg-purple-500 hover:bg-purple-600 text-white font-semibold px-6 py-2 rounded-full transition">
                Kirim
            </button>
        </div>
    </form>
</div>

@endsection
