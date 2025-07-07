<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DataSiswa;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'role' => ['required', 'in:admin,siswa'],
        ]);

        $id_siswa = null;

        // if ($request->role === 'siswa') {
        //     $siswa = DataSiswa::create([
        //         'id' => Str::uuid(), // kalau pakai UUID
        //         'nama' => $request->name,
        //     // tambahkan kolom lain sesuai tabel siswa
        //     ]);

        //     $id_siswa = $siswa->id;
        // }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'role' => $request->role,
            // 'id_siswa' =>$id_siswa,
        ]);

        event(new Registered($user));
        $user->assignRole('guest');
        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
