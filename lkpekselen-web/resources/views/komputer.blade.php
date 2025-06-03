@extends('layout.app')
@section('title', 'Komputer')
@section('content')
    <div class="px-5 py-20 bg-teal-600 md:px-40">
            <p class="text-4xl text-white font-bold">Program Komputer</p>
    </div>

    <div class="max-w-xl mx-auto px-4 py-8">
        <!-- Header -->
        <h2 class="text-3xl font-bold text-center py-2 bg-yellow-200">Software</h2>
        <div class="p-6 bg-green-200">
            <table class="mb-8 w-full">
                <tr>
                    <td class="text-2xl font-bold">Program Perkantoran</td>
                </tr>
                <tr>
                    <td>Windows</td>
                </tr>
                <tr>
                    <td>Ms Word 2016</td>
                </tr>
                <tr>
                    <td>Ms Excel 2016</td>
                </tr>
                <tr>
                    <td>Ms Power Point</td>
                </tr>
                <tr>
                    <td>Internet & Social Media</td>
                </tr>
                <tr>
                    <td class="text-2xl font-bold">Desain Grafis</td>
                </tr>
                <tr>
                    <td>Corel Draw</td>
                </tr>
                <tr>
                    <td>Graphic Design</td>
                </tr>
                <tr>
                    <td>Biaya</td>
                    <td class="text-end">Rp. 750.000,-</td>
                </tr>
            </table>

            <div class="text-center">
                <p>Durasi belajar 1 bulan</p>
                <button class="mt-auto bg-white px-24 py-2 rounded-xl mx-auto inline-block">
                    Daftar
                </button>
            </div>
        </div>
    </div>
@endsection
