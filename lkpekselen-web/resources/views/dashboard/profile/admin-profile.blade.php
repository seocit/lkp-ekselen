<div class="p-6">
    <h3 class="text-lg font-semibold mb-4 border-b pb-2">Informasi Akun</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <p class="text-sm text-gray-500">Nama</p>
            <p class="font-medium">{{ $user->name}}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Email</p>
            <p class="font-medium">{{ $user->email }}</p>
        </div>     
        <div>
            <p class="text-sm text-gray-500">Tanggal Bergabung</p>
            <p class="font-medium">
              {{ $user->created_at->format('d-M-Y') ?? '-' }}
            </p>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-6 flex gap-3">
        <a href="{{ route('profile.edit') }}"
            class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg shadow">
            Edit Profil
        </a>
        <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
            Ganti Password
        </a>
    </div>
</div>
