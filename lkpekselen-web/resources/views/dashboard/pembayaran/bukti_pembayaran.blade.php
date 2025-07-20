@extends('layout.app-2')

@section('title', 'Bukti Pembayaran Siswa')

@section('content')

    <div class="max-w-7xl mx-auto px-10 py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Bukti Pembayaran Siswa</h1>
            <a href="{{ route('tagihan.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Buat Tagihan
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Jenis Pembayaran</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($pembayarans as $index => $item)
                    <tr>
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $item->calonSiswa->nama_siswa }}</td>
                        <td class="px-6 py-4">{{ $item->calonSiswa->user->email }}</td>
                        <td class="px-6 py-4">{{ $item->tipe_pembayaran }}</td>
                        <td class="px-6 py-4">
                            @php
                                $status = $item->status_verifikasi;
                                $badgeClass = match($status) {
                                    'diterima' => 'bg-green-100 text-green-800',
                                    'ditolak' => 'bg-red-100 text-red-800',
                                    default => 'bg-yellow-100 text-yellow-800', // pending atau selainnya
                                };
                            @endphp
                            <span class="{{ $badgeClass }} px-2 py-1 rounded text-xs capitalize">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="flex space-x-1 px-6 py-4">
                            <a href="{{ asset('storage/'.$item->bukti_transfer) }}" target="_blank" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition flex items-center" aria-label="Lihat Bukti Pembayaran">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                            <button class="bg-purple-600 text-white p-2 rounded hover:bg-purple-700 transition flex items-center" aria-label="Download" onclick="window.location.href='{{ route('download-bukti-pembayaran', $item->id) }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
