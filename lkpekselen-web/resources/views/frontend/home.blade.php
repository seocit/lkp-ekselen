@extends('layout.app')
@section('title', 'Home')
@section('content')
    <div class="relative px-5 py-20 md:py-32 bg-center bg-cover bg-no-repeat md:px-20" 
        style="background-image: url('{{ asset('images/hero_section.jpg') }}');">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>
        
        <div class="relative z-10">
            <article class="w-full md:w-124">
                <p class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-white font-bold">ENGLISH COURSE</p>
                <p class="text-sm sm:text-base md:text-lg lg:text-xl text-white my-4 md:my-8">
                    Our experienced instructors will help you to improve your language skills in a fun and interactive environment. 
                    Our courses cover speaking, writing, and grammar fundamentals.
                </p>
            </article>
            <a href="{{ route('bing') }}" 
            class="bg-white rounded-xl px-4 py-2 md:p-4 inline-block text-teal-700 font-semibold hover:bg-gray-100 transition text-sm md:text-base">
                SHOW MORE
            </a>
        </div>
    </div>

    {{-- section about --}}
    <div class="relative py-16 md:py-24"> <!-- Gunakan padding tetap bukan min-height -->
    <div class="container mx-auto px-5 md:px-10 lg:px-20 max-w-6xl"> <!-- Container dengan max-width -->
        <div class="text-center">
        <p class="text-2xl md:text-3xl font-medium text-indigo-900 mb-6 md:mb-10">ABOUT</p>
        <p class="text-sm md:text-base lg:text-lg text-gray-600 mx-auto max-w-3xl"> <!-- Batasi lebar teks -->
            Bimbingan belajar (Bimbel) adalah sebuah kebutuhan yang penting di masa sekarang. 
            Materi pelajaran yang relatif sulit dan tuntutan dari sekolah untuk mencapai 
            standar nilai minimal membuat para siswa perlu mendapatkan bimbingan/les 
            diluar jam sekolah.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mt-10 md:mt-14">
            <!-- Item 1 -->
            <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <img src="{{ asset('images/akreditasi.png') }}" alt="Akreditasi" 
                class="w-16 h-16 md:w-20 md:h-20 object-contain mx-auto">
            <p class="text-lg md:text-xl font-medium text-indigo-900 mt-4">Akreditasi</p>
            <p class="text-xs md:text-sm text-gray-600 mt-2">
                LKP/LPK Ekselen Sudah Terakreditasi B
            </p>
            </div>
            
            <!-- Item 2 -->
            <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <img src="{{ asset('images/exam.png') }}" alt="Exam" 
                class="w-16 h-16 md:w-20 md:h-20 object-contain mx-auto">
            <p class="text-lg md:text-xl font-medium text-indigo-900 mt-4">Evaluasi dan Ujian</p>
            <p class="text-xs md:text-sm text-gray-600 mt-2">
                Evaluasi diadakan pada pertengahan program dan ujian kenaikan diadakan 
                pada setiap akhir program
            </p>
            </div>
            
            <!-- Item 3 -->
            <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <img src="{{ asset('images/schedule.png') }}" alt="Schedule" 
                class="w-16 h-16 md:w-20 md:h-20 object-contain mx-auto">
            <p class="text-lg md:text-xl font-medium text-indigo-900 mt-4">Frekuensi Kursus</p>
            <p class="text-xs md:text-sm text-gray-600 mt-2">
                Kegiatan kursus dikelas berlangsung 3x/ minggu. Program pelatihan 
                setiap paket/tingkat berlangsung 5 bulan.
            </p>
            </div>
        </div>
        </div>
    </div>
    </div>
    {{-- section about end --}}
    {{-- section kursus --}}
    <div class="px-5 py-12 md:py-24 text-center bg-green-50 md:px-10 lg:px-64" id="kursus">
        <p class="text-xl md:text-2xl font-medium text-indigo-900">KURSUS</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 max-w-6xl px-4 pt-6 mx-auto">

            <!-- Card 1 -->
            <div class="bg-white p-4 md:p-6 rounded-xl md:rounded-2xl shadow-md text-center">
                <h2 class="text-lg md:text-xl font-semibold mb-2">Bahasa Inggris</h2>
                <ul class="space-y-3 md:space-y-4">
                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">English Program 1</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">3X Seminggu</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">English Program 2</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">2X Seminggu</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">TOEFL</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">30 Jam Belajar</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-4 md:p-6 rounded-xl md:rounded-2xl shadow-md text-center">
                <h2 class="text-lg md:text-xl font-semibold mb-2">MIPA</h2>
                <ul class="space-y-3 md:space-y-4">
                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">English Program 1</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">3X Seminggu</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">English Program 2</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">2X Seminggu</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">TOEFL</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">30 Jam Belajar</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-4 md:p-6 rounded-xl md:rounded-2xl shadow-md text-center">
                <h2 class="text-lg md:text-xl font-semibold mb-2">Bimbingan Komputer</h2>
                <ul class="space-y-3 md:space-y-4">
                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">English Program 1</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">3X Seminggu</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">English Program 2</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">2X Seminggu</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>

                    <li class="flex justify-between items-start bg-white p-3 md:p-4 rounded-lg md:rounded-xl shadow">
                        <div class="flex flex-col text-left">
                            <h3 class="text-sm md:text-base text-gray-800 font-semibold">TOEFL</h3>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">30 Jam Belajar</p>
                        </div>
                        <div class="w-5 h-5 md:w-7 md:h-7 bg-emerald-900 rounded-full flex items-center justify-center text-white text-xs md:text-sm mt-1">
                            &gt;
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- end section kursus --}}

    {{-- cta --}}
    <div class="bg-emerald-600 px-5 py-10 md:px-28 md:py-16 text-center bg-bottom-right " style="background-image: url('{{ asset('images/cta.jpg') }}');">
        <div class="max-w-4xl mx-auto">
            <p class="text-2xl md:text-4xl text-white font-bold mb-6">"AYO BELAJAR DI EKSELEN!"</p>
            <button type="button" 
                    class="bg-cyan-600 hover:bg-cyan-700 rounded-xl text-white font-semibold px-8 py-4 text-lg transition-colors duration-200"
                    onclick="window.location.href='{{ route('pendaftaran.create')}}'">
                Daftar Online
            </button>
        </div>
    </div>
    {{-- ctaend --}}
    <div class="mx-5 my-12 md:my-24 text-center" id="galeri">
        <p class="text-xl md:text-2xl font-medium text-indigo-900">GALERI</p>
        <div class="grid grid-cols-3 gap-2 md:gap-4 mt-8 md:mt-14 mx-2 md:mx-12">
            <div class="w-full bg-emerald-600 text-white text-xs md:text-base py-2 md:py-3">Ruang Kelas</div>
            <div class="w-full bg-emerald-600 text-white text-xs md:text-base py-2 md:py-3">Suasana Belajar</div>
            <div class="w-full bg-emerald-600 text-white text-xs md:text-base py-2 md:py-3">Evaluasi</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-4 mx-2 md:mx-8 mt-8 md:mt-14">
            <img class="w-full h-48 md:h-80 object-cover" src="images/kelas_1.jpg" alt="Kelas 1">
            <img class="w-full h-48 md:h-80 object-cover" src="images/kelas_2.jpeg" alt="Kelas 2">
            <img class="w-full h-48 md:h-80 object-cover" src="images/kelas_3.jpeg" alt="Kelas 3">
        </div>
    </div>

@endsection