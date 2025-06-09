<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Yayasan Ekselen</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="h-full flex flex-col">
    <header class="flex justify-between items-center p-4 border-b border-gray-200">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-10 w-10 object-contain" />
            <span class="font-semibold text-lg">YAYASAN EKSSELEN HASYIM AL-BAROKAH</span>
        </div>
        <nav>
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-500">HOME</a>
        </nav>
    </header>

    <main class="flex-grow flex justify-center items-center">
        <div class="w-full max-w-md p-8 border border-gray-300 rounded-md shadow-md">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/logo_ekselen-1.png') }}" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
            </div>
            <h2 class="text-center font-semibold text-lg mb-4">Login</h2>
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="username" class="block text-gray-700 text-sm mb-1">username</label>
                    <input type="text" id="username" name="username" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>
                <div>
                    <label for="password" class="block text-gray-700 text-sm mb-1">password</label>
                    <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>
                <button type="submit" class="w-full bg-sky-400 text-white py-2 rounded-md hover:bg-sky-500 transition duration-200">Masuk</button>
            </form>
        </div>
    </main>
</body>
</html>
