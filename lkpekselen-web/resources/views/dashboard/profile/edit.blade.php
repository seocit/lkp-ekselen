@extends('layout.app-2')

@section('title', 'Edit Profile')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-6">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3">
                Edit Profile
            </h2>

            @if (session('status') === 'profile-updated')
                <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700">
                    ✅ Profile berhasil diperbarui.
                </div>
            @endif

            <form id="profile-form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PATCH')
                <!-- Foto Profil -->
                <div>
                    <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>

                    <div class="flex items-center space-x-6 mt-2">
                        @if ($user->profile_photo)
                            <img id="preview-image" src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto Profil"
                                class="w-24 h-24 rounded-full object-cover border" />
                        @else
                            <div id="preview-image-fallback"
                                class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-3xl font-bold text-gray-500 border">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif

                        <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                            class="block text-sm text-gray-600 ml-3" />
                    </div>
                    @error('profile_photo')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Username -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input id="name" name="name" type="text"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" name="email" type="email"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <a href="{{ route('profile.show') }}"
                        class="px-6 py-2 rounded-lg bg-gray-500 text-white hover:bg-gray-700 transition">
                        Kembali
                    </a>
                    <button type="button" id="btn-save"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Update preview gambar saat file dipilih
        const inputFile = document.getElementById('profile_photo');
        inputFile.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                let previewImage = document.getElementById('preview-image');
                const fallback = document.getElementById('preview-image-fallback');

                if (previewImage) {
                    previewImage.src = e.target.result;
                } else if (fallback) {
                    // Ganti div fallback dengan img preview
                    const img = document.createElement('img');
                    img.id = 'preview-image';
                    img.src = e.target.result;
                    img.alt = 'Foto Profil';
                    img.className = 'w-24 h-24 rounded-full object-cover border';

                    fallback.replaceWith(img);
                }
            };
            reader.readAsDataURL(file);
        });

        // Konfirmasi simpan pakai SweetAlert2
        function showConfirmSave() {
            Swal.fire({
                title: 'Konfirmasi Simpan Perubahan',
                text: "Apakah Anda yakin ingin menyimpan perubahan ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#2563eb', // Tailwind blue-600
                cancelButtonColor: '#6b7280',  // Tailwind gray-500
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('profile-form').submit();
                }
            });
        }

        document.getElementById('btn-save').addEventListener('click', showConfirmSave);
    </script>
@endsection
