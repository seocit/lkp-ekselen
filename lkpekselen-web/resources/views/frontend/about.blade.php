@extends('layout.app')
@section('title', 'About')
@section('content')

<div class="px-5 py-20 bg-teal-600 md:px-40">
    <p class="text-2xl sm:text-3xl md:text-4xl text-white font-bold">About Us</p>
</div>

<div class="px-5 md:px-20 lg:px-40 my-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
        <article>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-indigo-900">LPK EKSELEN</h2>
            <hr class="border-2 border-green-600 my-2">
            <p class="pt-5 text-gray-600 text-sm sm:text-base md:text-lg text-justify leading-relaxed">
                Bimbingan belajar (Bimbel) adalah sebuah kebutuhan yang penting di masa sekarang. Materi pelajaran yang relatif sulit dan tuntutan dari sekolah untuk mencapai standar nilai minimal (KKM) membuat para siswa perlu mendapatkan bimbingan/les di luar jam sekolah.
                <br><br>
                Bimbel EKSELEN hadir sebagai solusi bagi para siswa dan orangtua. Metode Pembelajaran yang berbasis kompetensi sesuai kurikulum sekolah, pemberian dan pembahasan latihan-latihan soal intensif diharapkan dapat memacu peningkatan prestasi siswa di sekolah. Didukung dengan Tentor-tentor dari Perguruan Tinggi Negeri (PTN) yang handal akan membantu para siswa memecahkan soal-soal dan memahami mata pelajaran secara lebih komprehensif.
            </p>
        </article>
        <img src="/images/foto-bersama-1.jpeg" alt="Foto Bersama" class="w-full rounded-lg shadow-lg object-cover">
    </div>

    <div class="pt-10 grid grid-cols-1 md:grid-cols-3 gap-10">
        <article>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-indigo-900">VISI</h2>
            <hr class="border-2 border-green-600 my-2">
            <p class="pt-5 text-gray-600 text-sm sm:text-base md:text-lg text-justify">
                Meningkatkan bakat, minat, skill, serta menghadapi tantangan global dengan membaca dan menelaah setiap kesempatan dan peluang yang ada.
            </p>
        </article>
        <article>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-indigo-900">MISI</h2>
            <hr class="border-2 border-green-600 my-2">
            <ol class="pt-5 text-gray-600 text-sm sm:text-base md:text-lg list-decimal text-justify space-y-2">
                <li>Mengabdikan diri pada masyarakat untuk melayani kebutuhan belajar/keterampilan masyarakat di bidang bahasa asing dan bidang teknologi informasi.</li>
                <li>Melaksanakan dan membantu program pemerintah di bidang pendidikan dan pelatihan bagi kelancaran kegiatan dan program LPK/LKP Ekselen.</li>
                <li>Menyediakan pelayanan bimbingan bagi adik-adik SD, SMP, dan SMA di bidang sains.</li>
                <li>Mengedepankan pencapaian mutu dan menciptakan sarana belajar yang nyaman di LPK/LKP Ekselen.</li>
            </ol>
        </article>
        <article>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-indigo-900">TUJUAN</h2>
            <hr class="border-2 border-green-600 my-2">
            <ol class="pt-5 text-gray-600 text-sm sm:text-base md:text-lg list-decimal text-justify space-y-2">
                <li>Membuat progress dan terobosan bagi para siswa sesuai dengan kebutuhan dalam menyongsong persaingan global yang sedang kita hadapi.</li>
                <li>Memotivasi para siswa LKP/LPK Ekselen agar gemar belajar, bekerja, dan berkarya sehingga dapat mandiri.</li>
                <li>Memicu dan merangsang para siswa dalam pelatihan dan bimbingan kegiatan pembelajaran, supaya menjadi cerdas dalam membaca peluang-peluang yang ada.</li>
            </ol>
        </article>
    </div>

    <div class="pt-10">
        <p class="font-semibold text-indigo-900 text-sm sm:text-base md:text-lg">Manajemen</p>
        <hr class="border-2 border-red-700 w-20 my-2">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-indigo-900">Staff dan Guru</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mt-10">
            <div class="text-center">
                <img src="images/jas.jpg" alt="Deskripsi gambar" class="w-full h-auto rounded-lg shadow-md" />
                <p class="text-sm bg-gray-300 py-1 mt-1">Sir Robert</p>
            </div>
            <div class="text-center">
                <img src="images/jas.jpg" alt="Deskripsi gambar" class="w-full h-auto rounded-lg shadow-md" />
                <p class="text-sm bg-gray-300 py-1 mt-1">Sir Robert</p>
            </div>
            <div class="text-center">
                <img src="images/jas.jpg" alt="Deskripsi gambar" class="w-full h-auto rounded-lg shadow-md" />
                <p class="text-sm bg-gray-300 py-1 mt-1">Sir Robert</p>
            </div>
        </div>
    </div>
</div>

@endsection
