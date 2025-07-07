@extends('layout.app-2')

@section('title', 'Bukti Pembayaran Siswa')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-xl font-semibold mb-6">Bukti Pembayaran siswa</h1>
    <div class="space-y-4">
        @foreach ($pembayarans as $item)
            <div class="flex justify-between items-center border border-gray-300 rounded-lg p-4">
            {{-- @if ($item->bukti_transfer)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$item->bukti_transfer) }}" alt="Bukti Transfer" class="w-32 rounded border" />
                </div>
            @endif --}}
            <div>
                <p class="text-sm font-semibold">{{ $item->calonSiswa->no_registrasi}}</p>
                <p class="font-semibold">{{ $item->calonSiswa->nama_siswa}}</p>
                <p class="text-xs text-gray-500">{{ $item->calonSiswa->kelas_choice->nama_kelas ?? "-"}}</p>
                <p class="text-xs text-gray-500">{{ $item->created_at}}</p>
            </div>
                <button class="text-gray-600 hover:text-gray-900" aria-label="Download" onclick="window.location.href='{{ route('download-bukti-pembayaran', $item->id) }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                    </svg>
                </button>
            </div>
        @endforeach
    </div>
</div>
@endsection
