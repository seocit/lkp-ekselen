@extends('layout.app-2')
@section('title', 'Materi')
@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-lg font-semibold mb-4">Materi</h1>
        <form method="GET" action="{{ route('materi') }}" class="mb-4">
            <label for="filter_program" class="block mb-1 text-sm text-gray-700">Filter Program</label>
            <select name="program" id="filter_program" onchange="this.form.submit()" class="border border-gray-300 px-3 py-2 rounded-md">
                <option value="">-- Semua Program --</option>
                @foreach ($programs as $program)
                <option value="{{ $program->id }}" {{ request('program') == $program->id ? 'selected' : '' }}>
                    {{ $program->nama_program }}
                </option>
                @endforeach
        </select>
    </form>

        <ul class="space-y-3">
            @foreach ($kelas_program as $item)
            <li>
                <a href="{{ route('materi.kelas', $item->id)}}" class="flex justify-between items-center border border-gray-300 rounded-lg px-4 py-3 hover:bg-gray-100 transition">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $item->nama_kelas}}</p>
                        <p class="text-gray-500 text-sm">{{ $item->program->nama_program}} Program</p>
                        <p class="text-gray-500 text-sm">{{ $item->kategori->nama_kategori ?? '-'}}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
