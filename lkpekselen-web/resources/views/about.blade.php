@extends('layout.app')
@section('title', 'About')
@section('content')
    <div class="px-5 py-20 bg-teal-600 md:px-40">
            <p class="text-4xl text-white font-bold">About Us</p>
    </div>

    <div class="mx-40 my-10">
        <div class="grid grid-cols-2 gap-15">
            <article>
                <h2 class="text-3xl font-bold text-indigo-900">LPK EKSELEN</h2>
                <hr class="border-2 border-green-600">
                <p class="pt-5 text-justify text-gray-600">
                Bimbingan belajar(Bimbel) adalah sebuah kebutuhan yang penting di masa sekarang. Materi pelajaran yang relatif sulit dan tuntutan dari sekolah untuk mencapai standar nilai minimal(KKM) membuat para siswa perlu mendapatkan bimbingan/les diluar jam sekolah.
                <br><br>
                Bimbel EKSELEN hadir sebagai solusi bagi para siswa dan orangtua. Metode Pembelajaran yang berbasis kompetensi sesuai kurikulum sekolah, pemberian dan pembahasan latihan-latihan soal intensif diharapkan dapat memacu peningkatan prestasi siswa di sekolah. Didukung dengan Tentor-tentor dari Perguruan Tinggi Negri (PTN) yang handalakan membantu para siswa memcahkan soal-soal dan memahami mata pelajaran secara lebih komprehensif.
                </p>
            </article>
            <img src="/images/foto-bersama-1.jpeg" alt="">
        </div>

        <div class="pt-10 grid grid-cols-3 gap-15">
            <article>
                <h2 class="text-3xl font-bold text-indigo-900">VISI</h2>
                <hr class="border-2 border-green-600">
                <p class="pt-5 text-gray-600 text-justify">
                    Meningkatkan bakat, minat, skill, serta menghadapi tantangan global dengan membaca dan menelaah setiap kesempatan dan peluang yang ada.
                </p>
            </article>
            <article>
                <h2 class="text-3xl font-bold text-indigo-900">MISI</h2>
                <hr class="border-2 border-green-600">
                <ol class="pt-5 text-gray-600 list-decimal text-justify">
                    <li>Mengabdikan diri pada masyarakat untuk melayani kebutuhan belajar/keterampilan masyarakat di bidang bahasa asing dan bidang teknologi informasi.</li>
                    <li>Melaksanakan dan membantu program pemerintah di bidang pendidikan dan pelatihan bagi kelancaran kegiatan dan program LPK/LKP Ekselen.</li>
                    <li>Menyediakan pelayanan bimbingan bagi adik-adik SD, SMP, dan SMA di bidang sains.</li>
                    <li>Mengedepankan pencapaian mutu dan menciptakan sarana belajar yang nyaman di LPK/LKP Ekselen.</li>
                </ol>
            </article>
            <article>
                <h2 class="text-3xl font-bold text-indigo-900">TUJUAN</h2>
                <hr class="border-2 border-green-600">
                <ol class="pt-5 text-gray-600 list-decimal text-justify">
                    <li>Membuatnya progress dan terobosan bagi para siswa sesuai dengan kebutuhan dalam menyongsong persaingan global yang sedang kita hadapi.</li>
                    <li>Memotivasi para siswa LKP/LPK Ekselen agar gemar belajar, bekerja, dan berkarya sehingga dapat mandiri.</li>
                    <li>Memicu dan merangsang para siswa dalam pelatihan dan bimbingan kegiatan pembelajaran, supaya menjadi cerdas dalam membaca peluang-peluang yang ada.
                    </li>
                </ol>
            </article>
        </div>

        <p class="font-semibold text-indigo-900">Manajemen</p>
        <hr class="border-2 border-red-700 w-21">
        <h2 class="text-3xl font-bold text-indigo-900">Staff dan Guru</h2>

        <div class="grid grid-cols-3 gap-5 my-10 justify-item-stretch">
            <div class="text-center w-[380px]">
                <img src="images/jas.jpg" alt="Deskripsi gambar" class="w-full h-auto"/>
                <p class="text-sm bg-gray-300 py-1">
                    Sir Robert
                </p>
            </div>
            <div class="text-center w-[380px]">
                <img src="images/jas.jpg" alt="Deskripsi gambar" class="w-full h-auto"/>
                <p class="text-sm bg-gray-300 py-1">
                    Sir Robert
                </p>
            </div>
            <div class="text-center w-[380px]">
                <img src="images/jas.jpg" alt="Deskripsi gambar" class="w-full h-auto"/>
                <p class="text-sm bg-gray-300 py-1">
                    Sir Robert
                </p>
            </div>
        </div>
    </div>



@endsection
