@extends('layout.app-2')
@section('title', 'Data Siswa Program')
@section('content')
    <div class="max-w-md mx-auto space-y-4">
        <a href="{{ route('siswa') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
        <h1 class="text-lg font-semibold mb-4">Data siswa Program A</h1>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('profile siswa')}}" class="flex justify-between items-center border border-gray-300 rounded-lg px-4 py-3 hover:bg-gray-100 transition">
                    <div>
                        <p class="font-semibold text-gray-800">Nama</p>
                        <p class="text-gray-500 text-sm">Kelas A</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
@endsection
