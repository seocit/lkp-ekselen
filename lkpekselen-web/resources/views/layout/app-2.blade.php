<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'My App 2')</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="h-full flex flex-col">
    <header class="flex justify-between items-center p-4 border-b border-gray-300">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-10 w-10 object-contain" />
            <span class="font-semibold text-lg">YAYASAN EKSELEN HASYIM AL-BAROKAH</span>
        </div>
        <nav class="flex items-center space-x-2">
            <div class="text-gray-700 font-semibold">{{ Auth::user()->name}}</div>
            <form method="POST" action="{{ route('logout')}}">
                @csrf
                <button type="submit" class="text-gray-700 hover:text-blue-500">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <div class="flex flex-grow min-h-0">
        <aside class="w-56 bg-purple-50 border-r border-gray-300 p-4 flex flex-col">
            <h2 class="text-gray-700 font-semibold mb-4">Menu</h2>
            <nav class="flex flex-col space-y-2 text-gray-700 text-sm">
                <a href="{{ route('pengumuman.index') }}" class="flex items-center space-x-2 hover:bg-purple-200 rounded-md px-3 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/></svg>
                    <span>Inbox</span>
                    {{-- <span class="ml-auto bg-gray-300 rounded-full px-2 text-xs">6</span> --}}
                </a>
                {{-- <a href="{{ route('materi.index') }}" class="flex items-center space-x-2 hover:bg-purple-200 rounded-md px-3 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>
                    <span>Materi</span>
                </a>
                <a href="{{ route('pembayaran spp')}}" class="flex items-center space-x-2 hover:bg-purple-200 rounded-md px-3 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"/></svg>
                    <span>Pembayaran</span>
                </a>
                <a href="{{ route('data-siswa.index') }}" class="flex items-center space-x-2 hover:bg-purple-200 rounded-md px-3 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"/></svg>
                    <span>Siswa</span>
                </a>
                <a href="{{ route('calon_siswa.list') }}" class="flex items-center space-x-2 hover:bg-purple-200 rounded-md px-3 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"/></svg>
                    <span>  Calon Siswa</span>
                </a>
                <a href="{{ route('bukti pembayaran') }}" class="flex items-center space-x-2 hover:bg-purple-200 rounded-md px-3 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"/></svg>
                    <span>Bukti Pembayaran Siswa</span>
                </a>
                <a href="{{ route('add.siswa') }}" class="flex items-center space-x-2 hover:bg-purple-200 rounded-md px-3 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"/></svg>
                    <span>Tambah Siswa</span>
                </a> --}}
            </nav>
        </aside>

        <main class="flex-grow p-6 overflow-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
