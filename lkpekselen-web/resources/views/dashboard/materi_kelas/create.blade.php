@extends('layout.app-2')

@section('title', 'Tambah Materi')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center space-x-4 mb-6">
        <a href="{{ route('materi')}}" class="text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-xl font-semibold">Tambah materi</h1>
    </div>

    <form action="{{ route('materi.store')}}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

        <div>
            <input
                type="text"
                name="nama_materi"
                placeholder="Judul materi"
                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                required
            />
            @error('nama_materi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input
                type="text"
                name="deskripsi"
                placeholder="keterangan singkat"
                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                required
            />
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium">Upload File</label>
            <input type="file" name="nama_file" class="w-full border p-2 rounded">
            <p class="text-sm text-gray-500">Format: PDF, DOCX, PPTX. Max: 2MB.</p>
            @error('nama_file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="text-right">
            <button
                type="submit"
                class="bg-purple-300 text-purple-900 font-semibold px-6 py-2 rounded-full hover:bg-purple-400 transition"
            >
                Kirim
            </button>
        </div>
    </form>
</div>
@endsection
