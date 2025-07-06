@extends('layout.app-2')

@section('title', 'Tambah Pendaftaran')

@section('content')
<div class="flex justify-center mt-10 mb-20">
    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md border border-gray-200">
        <div class="flex justify-center mb-6">
            <img src="images/logo_ekselen-1.png" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
        </div>
        <form action="{{ route('tambah-siswa.store')}}" method="POST" class="space-y-6">
            @csrf
            <h2 class="text-center text-gray-700 font-semibold mb-4">Formulir Pendaftaran</h2>

            <div class="grid grid-cols-3 gap-4 items-center">
                <label for="nama" class="text-gray-700 text-sm">Nama</label>
                <input type="text" id="nama" name="nama_siswa" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="alamat" class="text-gray-700 text-sm">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="no_telepon" class="text-gray-700 text-sm">No. Telepon</label>
                <input type="text" id="no_telepon" name="no_wa" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="tempat_lahir" class="text-gray-700 text-sm">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="tanggal_lahir" class="text-gray-700 text-sm">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />


                <label for="asal_sekolah" class="text-gray-700 text-sm">Asal Sekolah</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="nama_orang_tua" class="text-gray-700 text-sm">Nama Orang Tua/Wali</label>
                <input type="text" id="nama_orang_tua" name="nama_ortu" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="pekerjaan_orang_tua" class="text-gray-700 text-sm">Pekerjaan Orang Tua</label>
                <input type="text" id="pekerjaan_orang_tua" name="pekerjaan_ortu" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="program" class="block text-gray-700 text-sm mb-1">Program</label>
                <select id="programSelect" name="id_program" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Select Program --</option>
                    @foreach ($programs as $item)
                        <option value="{{ $item->id}}">{{ $item->nama_program}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tambahkan dropdown kategori -->
            <div id="kategoriContainer" style="display: none;">
                <label for="kategoriSelect" class="block text-gray-700 text-sm mt-4">Kategori</label>
                <select id="kategoriSelect" name="id_kategori_kelas" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori_kelas as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Container Kelas -->
            <div id="kelas-container" class="grid grid-cols-3 gap-4 mt-2 text-gray-700 text-sm"></div>

            <div class="mt-4 grid grid-cols-2 gap-4 text-gray-700 text-sm">
                <div>
                    <p class="mb-1">Session</p>
                    @foreach ($sessions as $item)
                        <label class="inline-flex items-center mt-1">
                        <input type="radio" name="id_session" value="{{ $item->id}}" class="form-radio text-blue-600" />
                        <span class="ml-2">{{ $item->label}}:{{ $item->jam}}</span>
                        </label>
                    @endforeach
                </div>
                <div>
                    <p class="mb-1">Jadwal</p>
                    @foreach ($jadwals as $item)
                        <label class="inline-flex items-center mt-1">
                        <input type="radio" name="id_jadwal" value="{{ $item->id}}" class="form-radio text-blue-600" />
                        <span class="ml-2">{{ $item->keterangan}}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-sky-400 text-white py-2 rounded-md hover:bg-sky-500 transition duration-200">Daftar</button>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    const dataKelas = {!! json_encode($programs->map(function($p) {
    return [
        'id' => (string) $p->id,
        'nama_program' => $p->nama_program,
        'kelas' => $p->kelas->map(function($k) {
            return [
                'id' => (string) $k->id,
                'nama_kelas' => $k->nama_kelas,
                'id_kategori' => $k->id_kategori
            ];
        })
    ];
})) !!};

const programSelect = document.getElementById('programSelect');
const kategoriSelect = document.getElementById('kategoriSelect');
const kategoriContainer = document.getElementById('kategoriContainer');
const kelasContainer = document.getElementById('kelas-container');

programSelect.addEventListener('change', function () {
    const selectedProgram = dataKelas.find(p => p.id === this.value);
    const isMIPA = selectedProgram?.nama_program.toLowerCase().includes('mipa');

    kategoriContainer.style.display = isMIPA ? 'block' : 'none';
    kelasContainer.innerHTML = '';
    kategoriSelect.value = '';

    if (!isMIPA) {
        renderKelas(selectedProgram?.kelas || []);
    }
});

kategoriSelect.addEventListener('change', function () {
    const selectedProgram = dataKelas.find(p => p.id === programSelect.value);
    const kategoriId = this.value;
    const filteredKelas = selectedProgram?.kelas.filter(k => k.id_kategori === kategoriId) || [];
    renderKelas(filteredKelas);
});

function renderKelas(kelasList) {
    kelasContainer.innerHTML = '';
    if (!kelasList.length) {
        kelasContainer.innerHTML = '<p class="text-sm text-gray-500">Tidak ada kelas tersedia.</p>';
        return;
    }

    kelasList.forEach(k => {
        const label = document.createElement('label');
        label.className = 'inline-flex items-center mt-1';

        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.name = 'id_kelas';
        radio.value = k.id;
        radio.className = 'form-radio text-blue-600';

        const span = document.createElement('span');
        span.className = 'ml-2';
        span.textContent = k.nama_kelas;

        label.appendChild(radio);
        label.appendChild(span);
        kelasContainer.appendChild(label);
    });
}
</script>

@endsection
