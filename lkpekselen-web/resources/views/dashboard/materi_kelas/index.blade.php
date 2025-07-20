@extends('layout.app-2')

@section('title', 'Materi Kelas')

@section('content')
<div class="max-w-3xl mx-auto">

    <form method="GET" action="{{ route('materi.index') }}" class="mb-4 flex gap-4">
    <input type="text" name="search" placeholder="Cari nama..." value="{{ request('search') }}"
        class="border border-gray-300 rounded px-3 py-2" />

    <button type="submit" class="bg-purple-300 text-purple-900 font-semibold px-4 py-2 rounded-full hover:bg-purple-400 transition">Search</button>
    </form>


    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Daftar Materi</h1>
        @can('manage_materi')
            {{-- Button Tambah Materi --}}
            <a href="{{ route('materi.create') }}"
            class="bg-purple-300 text-purple-900 font-semibold px-4 py-2 rounded-full hover:bg-purple-400 transition">
                + Tambah Materi
            </a>           
        @endcan
    </div>

    {{-- Form Filter --}}
    {{-- <form method="GET" action="{{ route('materi.index') }}" class="mb-6">
        <label for="kelas" class="block text-gray-700 text-sm mb-1">Filter berdasarkan kelas:</label>
        <select name="kelas" class="border border-gray-300 rounded px-3 py-2" onchange="this.form.submit()">
            <option value="">-- Semua Kelas --</option>
            @foreach ($kelas_program as $kelas)
            <option value="{{ $kelas->id }}" {{ $selectedKelasId == $kelas->id ? 'selected' : '' }}>
                {{ $kelas->label_unik }}
            </option>
            @endforeach
        </select>
    </form> --}}

    {{-- List Materi --}}
    <ul class="space-y-3">
        @forelse ($materi as $item)
            <li class="border border-gray-300 rounded-lg px-4 py-3 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-gray-800">{{ $item->nama_materi }}</p>
                    <p class="text-sm text-gray-500">{{ $item->kelas->nama_kelas }}</p>
                </div>
                <div class="flex space-x-2">
                    @can('manage_materi')
                    <a href="{{ route('materi.edit', $item->id) }}"
                        class="bg-yellow-400 text-white p-2 rounded hover:bg-yellow-500 transition flex items-center"
                        title="Edit materi">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-10-4l7-7 4 4-7 7H7v-4z" />
                        </svg>
                    </a>
                    <form id="delete-form-{{ $item->id }}" method="POST" action="{{ route('materi.destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete('{{ $item->id }}')" class="bg-red-600 text-white p-2 rounded hover:bg-red-700 transition flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                        
                    @endcan


                    <a href="{{ route('materi.download', $item->id) }}"
                        class="bg-purple-600 text-white p-2 rounded hover:bg-purple-700 transition flex items-center"
                        title="Download file">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                        </svg>
                    </a>
                </div>
            </li>
        @empty
            <li class="text-sm text-gray-500">Belum ada materi untuk kelas ini.</li>
        @endforelse
    </ul>
</div>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin?',
            text: "Data materi akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
</script>
@endsection
