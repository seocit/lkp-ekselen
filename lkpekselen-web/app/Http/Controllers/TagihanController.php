<?php

namespace App\Http\Controllers;

use id;
use auth;
use App\Models\Tagihan;
use App\Models\DataSiswa;
use App\Models\CalonSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PembayaranTransfer;
use App\Http\Controllers\Controller;


class TagihanController extends Controller
{
    public function kirimTagihan()
    {
        $now = Carbon::now();

        // Ambil semua siswa aktif beserta relasi lengkap
        $siswaAktif = DataSiswa::with('calonSiswa.kelas_choice.program')
            ->where('status', 'aktif')
            ->get();

        // Filter siswa yang perlu ditagih
        $daftarTagih = $siswaAktif->filter(function ($siswa) use ($now) {
            $lastBayar = PembayaranTransfer::where('id_refrensi', $siswa->id_calon_siswa)
                ->where('status_verifikasi', 'diterima')
                ->orderByDesc('tanggal_konfirmasi')
                ->first();

            $siswa->lastBayar = $lastBayar;

            // Cek apakah sudah dikirimi tagihan bulan ini
            $sudahDikirim = Tagihan::where('user_id', $siswa->calonSiswa->user_id)
                ->whereMonth('tanggal', $now->month)
                ->whereYear('tanggal', $now->year)
                ->exists();

            $siswa->sudahDikirim = $sudahDikirim;

            if ($lastBayar) {
                $terakhirBayar = Carbon::parse($lastBayar->tanggal_konfirmasi)->startOfMonth();
                $selisih = $terakhirBayar->diffInMonths($now->startOfMonth());
                return $selisih >= 1 && !$sudahDikirim;
            } else {
                $mulai = Carbon::parse($siswa->tanggal_masuk)->startOfMonth();
                $selisih = $mulai->diffInMonths($now->startOfMonth());
                return $selisih >= 1 && !$sudahDikirim;
            }
        });

        // ✅ Ambil daftar tagihan yang sudah dikirim bulan ini
        $tagihanTerkirim = Tagihan::with('user.calonSiswa.kelas_choice.program')
            ->whereMonth('tanggal', $now->month)
            ->whereYear('tanggal', $now->year)
            ->get();

        return view('dashboard.pembayaran.create', compact('daftarTagih', 'tagihanTerkirim'));
    }


    // public function storeTagihan(Request $request, $id)
    // {
    //     $tanggal = now();
    //     $jatuhTempo = now()->addDays(10); // Atur sesuai kebijakan

    //     // Ambil data siswa + relasi lengkap
    //     $siswa = DataSiswa::with('calonSiswa.kelas_choice')->where('id', $id)->firstOrFail();
    //     $calon = $siswa->calonSiswa;
    //     $kelas = $calon->kelas_choice;

    //     // Validasi jika tidak ada kelas
    //     if (!$kelas) {
    //         return back()->with('error', 'Kelas tidak ditemukan untuk siswa ini.');
    //     }

    //     // Ambil harga dari kelas
    //     $harga = $kelas->biaya_pendaftaran;

    //     // Ambil user_id
    //     $userId = $siswa->calonSiswa->user_id ?? null;

    //     if (!$userId) {
    //         return back()->with('error', 'User ID tidak ditemukan.');
    //     }

    //     // Cegah duplikasi tagihan bulan ini
    //     $existing = Tagihan::where('user_id', $userId)
    //         ->whereMonth('tanggal', $tanggal->month)
    //         ->whereYear('tanggal', $tanggal->year)
    //         ->first();

    //     if ($existing) {
    //         return back()->with('warning', 'Tagihan bulan ini sudah dibuat.');
    //     }

    //     // Buat no_tagihan unik
    //     $noTagihan = 'INV-' . $tanggal->format('Ym') . '-' . strtoupper(Str::random(6));

    //     // dd([
    //     //     'id' => Str::uuid(),
    //     //     'no_tagihan' => $noTagihan,
    //     //     'user_id' => $userId,
    //     //     'tanggal' => $tanggal,
    //     //     'jatuh_tempo' => $jatuhTempo,
    //     //     'status' => 'belum_dibayar',
    //     //     'jumlah' => $harga,
    //     // ]);
    //             // Simpan tagihan
    //     Tagihan::create([
    //         'id' => Str::uuid(),
    //         'no_tagihan' => $noTagihan,
    //         'user_id' => $userId,
    //         'tanggal' => $tanggal,
    //         'jatuh_tempo' => $jatuhTempo,
    //         'status' => 'pending',
    //         'jumlah' => $harga,
    //     ]);

    //     return back()->with('success', 'Tagihan berhasil dikirim.');
    // }

    public function storeTagihan(Request $request, $id)
    {
        $tanggal = now();
        $jatuhTempo = now()->addDays(10); // Atur sesuai kebijakan

        // Ambil data siswa + relasi lengkap
        $siswa = DataSiswa::with('calonSiswa.kelas_choice')->where('id', $id)->firstOrFail();
        $calon = $siswa->calonSiswa;
        $kelas = $calon->kelas_choice;

        // Validasi jika tidak ada kelas
        if (!$kelas) {
            return back()->with('error', 'Kelas tidak ditemukan untuk siswa ini.');
        }

        // Ambil harga dari kelas (atau sesuaikan ke SPP jika ini untuk bulanan)
        $harga = $kelas->biaya_pendaftaran;

        // Ambil user_id
        $userId = $calon->user_id ?? null;

        if (!$userId) {
            return back()->with('error', 'User ID tidak ditemukan.');
        }

        // Cek apakah sudah ada tagihan untuk bulan ini
        $existing = Tagihan::where('user_id', $userId)
            ->whereMonth('tanggal', $tanggal->month)
            ->whereYear('tanggal', $tanggal->year)
            ->exists();

        if ($existing) {
            return back()->with('warning', 'Tagihan bulan ini sudah dibuat sebelumnya.');
        }

        // Buat nomor tagihan unik
        $noTagihan = 'INV-' . $tanggal->format('Ym') . '-' . strtoupper(Str::random(6));

        // Simpan tagihan
        Tagihan::create([
            'id' => Str::uuid(),
            'no_tagihan' => $noTagihan,
            'user_id' => $userId,
            'tanggal' => $tanggal,
            'jatuh_tempo' => $jatuhTempo,
            'status' => 'pending', // bisa juga 'belum_dibayar' jika itu standar kamu
            'jumlah' => $harga,
        ]);

        return back()->with('success', 'Tagihan berhasil dikirim.');
    }

    public function tagihanSiswa()
    {
        $userId = auth()->id();

        $tagihanAktif = Tagihan::where('user_id', $userId)
            ->whereIn('status', ['pending', 'terlambat'])
            ->orderByDesc('tanggal')
            ->get();

        foreach ($tagihanAktif as $tagihan) {
            if ($tagihan->status === 'pending') {
                $tagihan->badge_color = 'bg-yellow-100 text-yellow-800';
                $tagihan->badge_label = 'Pending';
            } elseif ($tagihan->status === 'terlambat') {
                $tagihan->badge_color = 'bg-red-100 text-red-800';
                $tagihan->badge_label = 'Terlambat';
            } elseif ($tagihan->status === 'lunas') {
                $tagihan->badge_color = 'bg-green-100 text-green-800';
                $tagihan->badge_label = 'Lunas';
            } else {
                $tagihan->badge_color = 'bg-gray-100 text-gray-800';
                $tagihan->badge_label = ucfirst($tagihan->status);
            }
        }

        $riwayatPembayaran = Tagihan::where('user_id', $userId)
            ->where('status', 'lunas')
            ->orderByDesc('tanggal')
            ->get();

        foreach ($riwayatPembayaran as $tagihan) {
            $tagihan->badge_color = 'bg-green-100 text-green-800';
            $tagihan->badge_label = 'Lunas';
        }

        return view('dashboard.pembayaran_siswa.index', compact('tagihanAktif', 'riwayatPembayaran'));
    }
}
