<!-- Detail Profil -->
<div class="p-6">
    <h3 class="text-lg font-semibold mb-4 border-b pb-2">Informasi Akun</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <p class="text-sm text-gray-500">Nama Lengkap</p>
            <p class="font-medium">{{ $user->calonSiswa->nama_siswa ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Email</p>
            <p class="font-medium">{{ $user->email }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Program Kursus</p>
            <p class="font-medium">{{ $user->calonSiswa->kelas_choice->program->nama_program ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Kelas</p>
            <p class="font-medium">{{ $user->calonSiswa->kelas_choice->nama_kelas ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Jadwal Kelas</p>
            <p class="font-medium">{{ $user->calonSiswa->jadwal_choice->keterangan ?? '-' }}</p>
            <p class="font-medium">{{ $user->calonSiswa->session_choice->jam ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Tanggal Bergabung</p>
            <p class="font-medium">{{ $user->dataSiswa->tanggal_masuk->format('d-M-Y') ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Status</p>
            <p class="font-medium">
                @if (optional($user->dataSiswa)->status == 'aktif')
                    <span class="text-green-600 font-semibold">Aktif</span>
                @else
                    <span class="text-red-600 font-semibold">Non-aktif</span>
                @endif
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
