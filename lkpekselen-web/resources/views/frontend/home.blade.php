@extends('layout.app')
@section('title', 'Home')
@section('content')
    <div class="px-5 py-40 bg-teal-600 md:px-40">
            <article class="text-wrap w-[31rem]">
                <p class="text-4xl text-white font-bold">ENGLISH COURSE</p>
                <p class="text-xl text-white my-8">Our experienced instructure will help you to improve your language skills in a fun and interactive environment. Our courses cover speaking, writing, and grammar fundamental.</p>
            </article>
            <button type="button" class="bg-white rounded-xl p-4">SHOW MORE</button>
    </div>

    <div class="mx-10 my-24 text-center md:mx-64">
        <p class="text-3xl font-medium text-indigo-900 py-10">ABOUT</p>
        <p class="text-lg text-gray-600">Bimbingan belajar (Bimbel) adalah sebuah kebutuhan yang penting di masa sekarang. Materi pelajaran yang relatif sulit dan tuntutan dari sekolah untuk mencapai standar nilai minimal membuat para siswa perlu mendapatkan bimbingan/les diluar jam sekolah.</p>
        <div class="grid grid-flow-row justify-items-center gap-10 mt-14 md:grid-flow-col">
            <div class="w-48">
                <div class="bg-emerald-600">01</div>
                <p class="text-xl font-medium text-indigo-900">Akreditasi</p>
                <p class="text-gray-600">LKP/LPK Ekselen Sudah Terakreditasi B</p>
            </div>
            <div class="w-48">
                <div class="bg-emerald-600">02</div>
                <p class="text-xl font-medium text-indigo-900">Evaluasi dan Ujian</p>
                <p class="text-gray-600">Evaluasi diadakan pada pertengahan program dan ujian kenaikan diadakan pada setiap akhir program</p>
            </div>
            <div class="w-48">
                <div class="bg-emerald-600">03</div>
                <p class="text-xl font-medium text-indigo-900">Frekuensi Kursus</p>
                <p class="text-gray-600">Kegiatan kursus dikelas berlangsung 3x/ minggu. Program pelatihan setiap paket/tingkat berlangsung 5 bulan.</p>
            </div>
        </div>
    </div>

    <div class="px-10 py-24 text-center bg-green-50 md:px-64" id="kursus">
        <p class="text-2xl font-medium text-indigo-900">KURSUS</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl px-4 pt-6">

            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <h2 class="text-xl font-semibold mb-2">Bahasa Inggris</h2>
                <ul class="space-y-4">
                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">English Program 1</h3>
                            <p class="text-gray-500 text-sm mt-1">3X Seminggu</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">English Program 2</h3>
                            <p class="text-gray-500 text-sm mt-1">2X Seminggu</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">TOEFL</h3>
                            <p class="text-gray-500 text-sm mt-1">30 Jam Belajar</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <h2 class="text-xl font-semibold mb-2">MIPA</h2>
                <ul class="space-y-4">
                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">English Program 1</h3>
                            <p class="text-gray-500 text-sm mt-1">3X Seminggu</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">English Program 2</h3>
                            <p class="text-gray-500 text-sm mt-1">2X Seminggu</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">TOEFL</h3>
                            <p class="text-gray-500 text-sm mt-1">30 Jam Belajar</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <h2 class="text-xl font-semibold mb-2">Bimbingan Komputer</h2>
                <ul class="space-y-4">
                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">English Program 1</h3>
                            <p class="text-gray-500 text-sm mt-1">3X Seminggu</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">English Program 2</h3>
                            <p class="text-gray-500 text-sm mt-1">2X Seminggu</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-4 rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-gray-800 font-semibold">TOEFL</h3>
                            <p class="text-gray-500 text-sm mt-1">30 Jam Belajar</p>
                        </div>
                        <div class="w-7 h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-sm mt-1">
                            &gt;
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="bg-emerald-600 px-28 py-[11.5rem] grid grid-row-1 place-content-center gap-4">
        <p class="text-4xl text-white font-bold">"AYO BELAJAR DI EKSELEN!"</p>
        <button type="button" class="bg-cyan-600 rounded-xl text-white p-4" onclick="window.location.href='{{ route('pendaftaran.create')}}'">Daftar Online</button>
    </div>

    <div class="mx-10 my-24 text-center" id="galeri">
        <p class="text-2xl font-medium text-indigo-900">GALERI</p>
        <div class="grid grid-flow-row gap-2 justify-items-center mt-14 mx-12 md:grid-flow-col">
            <div class="w-36 bg-emerald-600 text-white md:w-48">Ruang Kelas</div>
            <div class="w-36 bg-emerald-600 text-white md:w-48">Suasana Belajar</div>
            <div class="w-36 bg-emerald-600 text-white md:w-48">Evaluasi</div>
        </div>
        <div class="grid grid-flow-row justify-items-center gap-2 mx-8 mt-14 md:grid-flow-col">
            <img class="w-[60rem] h-80" src="images/kelas_1.jpg" alt="">
            <img class="w-[60rem] h-80" src="images/kelas_2.jpeg" alt="">
            <img class="w-[60rem] h-80" src="images/kelas_3.jpeg" alt="">
        </div>
    </div>

@endsection