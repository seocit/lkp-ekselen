@extends('layout.app-2')

@section('title', 'Materi Kelas')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-4">
            <a href="{{ route('materi') }}" class="text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-xl font-semibold">Materi Kelas {{ $kelas->nama_kelas}}</h1>
        </div>
        <a href="{{ route('tambah materi', ['id_kelas' => $kelas->id])}}" class="bg-purple-300 text-purple-900 font-semibold px-4 py-2 rounded-full hover:bg-purple-400 transition">
            Tambah Materi
        </a>
    </div>

    <ul class="space-y-3">
        @forelse ($materi as $item)
        <li class="flex justify-between items-center border border-gray-300 rounded-lg px-4 py-3 hover:bg-gray-50 transition">
            <div>
                <p class="font-semibold text-gray-800">{{ $item->nama_materi}}</p>
                <p class="text-gray-500 text-sm">{{ $item->nama_file}}</p>
            </div>
            <a href="#" download aria-label="Download Judul" class="text-gray-600 hover:text-purple-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 10l5 5 5-5M12 15V3" />
                </svg>
            </a>
        </li>
        @empty
        <p>
            Belum ada materi yang ditambahkan!
        </p>
        @endforelse
    </ul>
</div>
@endsection
