@extends('layout.app')
@section('title', 'Mipa')
@section('content')
    <div class="px-5 py-20 bg-teal-600 md:px-40">
            <p class="text-4xl text-white font-bold">Program MIPA</p>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header -->
        <h2 class="text-3xl font-bold text-center py-2 bg-yellow-200">Biaya Bimbingan 1 Tahun kelas 4,5,6 SD</h2>

        <!-- Dua kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2">

        <!-- Program 1 -->
        <div class="p-6 shadow bg-green-200">
            <h3 class="text-2xl text-center font-bold mb-6">Program 1 Tahun</h3>
            <table class="mb-8 w-full">
                <tr>
                    <td>Tunai</td>
                    <td class="text-end">Rp. 3.000.000,-</td>
                </tr>
                <tr>
                    <td>Angsuran ke-1</td>
                    <td class="text-end">Rp. 1.600.000,-</td>
                </tr>
                <tr>
                    <td>Angsuran ke-2</td>
                    <td class="text-end">Rp. 1.000.000,-</td>
                </tr>
                <tr>
                    <td>Angsuran ke-3</td>
                    <td class="text-end">Rp. 1.000.000,-</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td class="text-end">Rp.3.600.000,-</td>
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
            <h3 class="text-2xl text-center font-bold mb-6">Program 1 Semester</h3>
            <table class="mb-8 w-full">
                <tr>
                    <td>Tunai</td>
                    <td class="text-end">Rp. 3.000.000,-</td>
                </tr>
                <tr>
                    <td>Angsuran ke-1</td>
                    <td class="text-end">Rp. 1.600.000,-</td>
                </tr>
                <tr>
                    <td>Angsuran ke-2</td>
                    <td class="text-end">Rp. 1.000.000,-</td>
                </tr>
                <tr>
                    <td>Angsuran ke-3</td>
                    <td class="text-end">Rp. 1.000.000,-</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td class="text-end">Rp.3.600.000,-</td>
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
@endsection
