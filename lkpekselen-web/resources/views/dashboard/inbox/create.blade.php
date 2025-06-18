@extends('layout.app-2')

@section('title', 'Tambah Inbox')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center space-x-4">
        <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-xl font-semibold">Pengumuman</h1>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-dics pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $errors}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengumuman.store')}}" method="POST" class="space-y-4">
        @csrf
        <div>
            <input
                type="text"
                name="judul"
                placeholder="Judul ..."
                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                value="{{ old('judul')}}"
                required
            />
        </div>
        <div>
            <textarea
                name="isi"
                rows="6"
                placeholder="Isi ..."
                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 resize-none"
                value="{{ old('isi')}}"
                required
            ></textarea>
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
