@extends('layout.app-2')
@section('title', 'Materi')
@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-lg font-semibold mb-4">Materi</h1>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('materi kelas')}}" class="flex justify-between items-center border border-gray-300 rounded-lg px-4 py-3 hover:bg-gray-100 transition">
                    <div>
                        <p class="font-semibold text-gray-800">Kelas A</p>
                        <p class="text-gray-500 text-sm">Subhead</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
@endsection
