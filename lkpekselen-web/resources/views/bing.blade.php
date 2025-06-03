@extends('layout.app')
@section('title', 'Bing')
@section('content')
    <div class="px-5 py-20 bg-teal-600 md:px-40">
            <p class="text-4xl text-white font-bold">Program Kursus Bahasa Inggris</p>
    </div>

    <div class="max-w-4xl mx-auto pt-10 text-center">
        <h2 class="text-indigo-900 text-3xl font-bold mb-5">
            Welcome to Our English Course
        </h2>
        <p class="text-gray-900">
            Our experienced Instructure will help you to improve your languange skills in a fun and interactive environtment. Our courses cover speaking,writing,and grammar, fundamentals.
        </p>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header -->
        <h2 class="text-3xl font-bold text-center py-2 bg-yellow-200">ENGLISH PROGRAM</h2>

        <!-- Dua kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2">

        <!-- Program 1 -->
        <div class="p-6 shadow bg-green-200">
            <h3 class="text-2xl text-center font-bold mb-6">Program 1</h3>
            <table class="mb-8 w-full">
                <tr>
                    <td>Uang Pendaftaran</td>
                    <td class="text-end">Rp.200.000,-</td>
                </tr>
                <tr>
                    <td>Uang Paket</td>
                    <td class="text-end">Rp.100.000,-</td>
                </tr>
                <tr>
                    <td>- Primary</td>
                    <td class="text-end">Rp.250.000,-</td>
                </tr>
                <tr>
                    <td>- Elementary</td>
                    <td class="text-end">Rp.250.000,-</td>
                </tr>
                <tr>
                    <td>- Intermediate</td>
                    <td class="text-end">Rp.300.000,-</td>
                </tr>
                <tr>
                    <td>- Advance</td>
                    <td class="text-end">Rp.300.000,-</td>
                </tr>
                <tr>
                    <td>Waktu Belajar</td>
                    <td class="text-end">3x/minggu</td>
                </tr>
            </table>
            <div class="text-center">
                <button class="mt-auto bg-white px-24 py-2 rounded-xl mx-auto inline-block">
                    Daftar
                </button>
            </div>
        </div>

        <!-- Program 2 -->
        <div class="p-6 shadow bg-cyan-300">
            <h3 class="text-2xl text-center font-bold mb-6">Program 2</h3>
            <table class="mb-8 w-full">
                <tr>
                    <td>Uang Pendaftaran</td>
                    <td class="text-end">Rp.200.000,-</td>
                </tr>
                <tr>
                    <td>Uang Paket</td>
                    <td class="text-end">Rp.100.000,-</td>
                </tr>
                <tr>
                    <td>- Primary</td>
                    <td class="text-end">Rp.200.000,-</td>
                </tr>
                <tr>
                    <td>- Elementary</td>
                    <td class="text-end">Rp.200.000,-</td>
                </tr>
                <tr>
                    <td>- Intermediate</td>
                    <td class="text-end">Rp.300.000,-</td>
                </tr>
                <tr>
                    <td>- Advance</td>
                    <td class="text-end">Rp.300.000,-</td>
                </tr>
                <tr>
                    <td>Waktu Belajar</td>
                    <td class="text-end">2x/minggu</td>
                </tr>
            </table>
            <div class="text-center">
                <button class="mt-auto bg-white px-24 py-2 rounded-xl mx-auto inline-block">
                    Daftar
                </button>
            </div>
        </div>

        </div>
    </div>

    <div class="max-w-xl mx-auto px-4 py-8">
        <!-- Header -->
        <h2 class="text-3xl font-bold text-center py-2 bg-yellow-200">TOEFL</h2>
        <div class="p-6 bg-cyan-300">
            <table class="mb-8 w-full">
                <tr>
                    <td>Bimbingan TOEFL</td>
                    <td class="text-end">Rp.2.500.000,-</td>
                </tr>
                <tr>
                    <td>Waktu Belajar</td>
                    <td class="text-end">30 jam</td>
                </tr>
            </table>

            <div class="text-center">
                <button class="mt-auto bg-white px-24 py-2 rounded-xl mx-auto inline-block">
                    Daftar
                </button>
            </div>
        </div>
    </div>

@endsection
