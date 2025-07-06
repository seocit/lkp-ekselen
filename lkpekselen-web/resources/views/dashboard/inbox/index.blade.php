@extends('layout.app-2')
@section('title', 'Inbox')
@section('content')
    <div class="space-y-4">
        @can('manage_pengumuman')
        <button type="button" onclick="window.location.href='{{ route('pengumuman.create')}}'"
        class="bg-purple-300 text-purple-900 font-semibold px-4 py-2 rounded-full hover:bg-purple-400 transition">
            Buat Pengumuman
        </button>
            
        @endcan

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($pengumuman as $item)
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4 relative">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold text-gray-800">{{ $item->judul}}</h3>
                    @can('manage_pengumuman')
                    <div class="flex space-x-3 text-gray-600">
                        <!-- Trash Icon -->
                        <button type="button"
                            onclick="confirmDelete('{{ route('pengumuman.destroy', $item->id) }}')"
                            aria-label="Delete" class="hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                            </svg>
                        </button>
                        <!-- Edit Icon -->
                        <button aria-label="Edit" type="button" onclick="window.location.href='{{ route('pengumuman.edit', $item->id)}}'" class="hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 13v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6" />
                            </svg>
                        </button>
                    </div>
                        
                    @endcan
                </div>
                <p class="text-gray-700 text-sm">
                    {{ $item->isi }}
                </p>
                <p class="text-gray-700 text-sm italic">
                    {{ $item->tanggal_pengumuman }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Yakin mau hapus?',
            text: "Pengumuman ini akan dihapus permanen, rek!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, hapus aja!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Bikin form baru buat kirim DELETE
                let form = document.createElement('form');
                form.action = url;
                form.method = 'POST';

                // CSRF
                let csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';

                // Method spoofing
                let method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';

                form.appendChild(csrf);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        })
    }
</script>
@endsection
