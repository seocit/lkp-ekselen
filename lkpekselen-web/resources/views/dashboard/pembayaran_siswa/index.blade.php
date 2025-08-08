@extends('layout.app-2')

@section('title', 'Tagihan SPP')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold mb-6">Tagihan SPP Saya</h1>

    {{-- Tagihan Aktif --}}
    <div class="mb-10">
        <h2 class="text-lg font-semibold mb-4">Tagihan Aktif</h2>
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-center text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-6 py-3">No Tagihan</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Jatuh Tempo</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tagihanAktif as $tagihan)
                        <tr>
                            <td class="px-6 py-4">{{ $tagihan->no_tagihan }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($tagihan->tanggal)->format('d M Y') }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d M Y') }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($tagihan->jumlah, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="{{ $tagihan->badge_color }} px-2 py-1 text-xs rounded">
                                    {{ $tagihan->badge_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if ($tagihan->status == 'pending' || $tagihan->status == 'terlambat')
                                    <a href="{{ route('pembayaran_spp', $tagihan->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-medium">Bayar</a>
                                @elseif ($tagihan->status == 'menunggu_verifikasi')
                                    <span class="text-yellow-500 text-sm">Menunggu Verifikasi</span>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Tidak ada tagihan aktif.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Riwayat Pembayaran --}}
    <div>
        <h2 class="text-lg font-semibold mb-4">Riwayat Pembayaran</h2>
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-center text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Status Verifikasi</th>
                        <th class="px-6 py-3">Bukti Transfer</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($riwayatPembayaran as $index => $item)
                        <tr>
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($item->jumlah ?? 0, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="{{ $item->badge_color }} px-2 py-1 text-xs rounded">
                                    {{ $item->badge_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->pembayaranTransfers && $item->pembayaranTransfers->bukti_transfer)
                                    <a href="{{ asset('storage/' . $item->pembayaranTransfers->bukti_transfer) }}" target="_blank" class="text-blue-600 hover:underline text-sm">Lihat</a>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada riwayat pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
