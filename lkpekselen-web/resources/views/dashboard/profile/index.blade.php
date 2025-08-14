@extends('layout.app-2')

@section('title', 'User Profile')

@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header Profil -->
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 p-6 flex items-center">
                    @if ($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto Profil"
                            class="w-24 h-24 rounded-full border-4 border-white object-cover">
                    @else
                        <div
                            class="w-24 h-24 flex items-center justify-center rounded-full bg-gray-200 border-4 border-white text-gray-700 text-2xl font-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="ml-6 text-white">
                        <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                        <p class="text-sm">{{ $user->email }}</p>
                        <span
                            class="inline-block mt-2 bg-white text-indigo-600 px-3 py-1 rounded-full text-xs font-semibold">
                            {{ $role }}
                        </span>
                    </div>
                </div>

                @if ($role === 'siswa')
                    @include('dashboard.profile.siswa-profile', ['user' => $user, 'role' => $role])
                @elseif($role === 'admin')
                    @include('dashboard.profile.admin-profile', ['user' => $user, 'role' => $role])
                @else
                    <p class="text-center text-gray-500">Role tidak dikenali.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
