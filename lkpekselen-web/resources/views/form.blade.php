@extends('layout.app')

@section('title', 'Formulir Pendaftaran')

@section('content')
<div class="flex justify-center mt-10 mb-20">
    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md border border-gray-200">
        <div class="flex justify-center mb-6">
            <img src="images/logo_ekselen-1.png" alt="Logo Ekselen" class="h-24 w-24 object-contain" />
        </div>
        <form action="#" method="POST" class="space-y-6">
            @csrf
            <h2 class="text-center text-gray-700 font-semibold mb-4">Formulir Pendaftaran</h2>

            <div class="grid grid-cols-3 gap-4 items-center">
                <label for="nama" class="text-gray-700 text-sm">Nama</label>
                <input type="text" id="nama" name="nama" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="alamat" class="text-gray-700 text-sm">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="no_telepon" class="text-gray-700 text-sm">No. Telepon</label>
                <input type="text" id="no_telepon" name="no_telepon" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="ttl" class="text-gray-700 text-sm">Tempat/Tanggal Lahir</label>
                <input type="text" id="ttl" name="ttl" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="asal_sekolah" class="text-gray-700 text-sm">Asal Sekolah</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="nama_orang_tua" class="text-gray-700 text-sm">Nama Orang Tua/Wali</label>
                <input type="text" id="nama_orang_tua" name="nama_orang_tua" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />

                <label for="pekerjaan_orang_tua" class="text-gray-700 text-sm">Pekerjaan Orang Tua</label>
                <input type="text" id="pekerjaan_orang_tua" name="pekerjaan_orang_tua" class="col-span-2 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="program" class="block text-gray-700 text-sm mb-1">Program</label>
                <select id="program" name="program" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Select Program --</option>
                    <option value="MIPA">MIPA</option>
                    <option value="Kursus Komputer">Kursus Komputer</option>
                    <option value="TOEFL">TOEFL</option>
                </select>

                <!-- Container radio buttons -->
                <div id="radio-container" class="grid grid-cols-3 gap-4 mt-2 text-gray-700 text-sm">
                    <!-- Radio buttons will be injected here -->
                </div>
            </div>


            <div class="mt-4 grid grid-cols-2 gap-4 text-gray-700 text-sm">
                <div>
                    <p class="mb-1">Session</p>
                    <label class="inline-flex items-center">
                        <input type="radio" name="session" value="14.00 - 15.00" class="form-radio text-blue-600" />
                        <span class="ml-2">14.00 - 15.00</span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="session" value="15.30 - 16.20" class="form-radio text-blue-600" />
                        <span class="ml-2">15.30 - 16.20</span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="session" value="16.20 - 18.00" class="form-radio text-blue-600" />
                        <span class="ml-2">16.20 - 18.00</span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="session" value="19.00 - 20.30" class="form-radio text-blue-600" />
                        <span class="ml-2">19.00 - 20.30</span>
                    </label>
                </div>
                <div>
                    <p class="mb-1">Jadwal</p>
                    <label class="inline-flex items-center">
                        <input type="radio" name="jadwal" value="Senin - Rabu - Jum'at" class="form-radio text-blue-600" />
                        <span class="ml-2">Senin - Rabu - Jum'at</span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="jadwal" value="Selasa - Kamis - Sabtu" class="form-radio text-blue-600" />
                        <span class="ml-2">Selasa - Kamis - Sabtu</span>
                    </label>
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
    const programOptions = {
        "MIPA": [
            "Kelas 3 SD", "Kelas 4 SD", "Kelas 5 SD", "Kelas 6 SD",
            "Kelas 7 SMP", "Kelas 8 SMP", "Kelas 9 SMP", "Kelas Privat"
        ],
        "Kursus Komputer": [
            "Aplikasi Perkantoran", "Desain Grafis", "Pemrograman Dasar"
        ],
        "TOEFL": [
            "Basic TOEFL", "Intermediate TOEFL", "TOEFL Simulation"
        ]
    };

    const selectEl = document.getElementById('program');
    const container = document.getElementById('radio-container');

    selectEl.addEventListener('change', function () {
        const selected = this.value;
        container.innerHTML = ''; // clear previous radios

        if (programOptions[selected]) {
            const options = programOptions[selected];
            const columns = [document.createElement('div'), document.createElement('div'), document.createElement('div')];

            options.forEach((option, index) => {
                const label = document.createElement('label');
                label.className = 'inline-flex items-center mt-1';

                const radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'program_option'; // same name so only one can be selected
                radio.value = option;
                radio.className = 'form-radio text-blue-600';

                const span = document.createElement('span');
                span.className = 'ml-2';
                span.textContent = option;

                label.appendChild(radio);
                label.appendChild(span);

                columns[index % 3].appendChild(label);
            });

            columns.forEach(col => container.appendChild(col));
        }
    });
</script>

@endsection
