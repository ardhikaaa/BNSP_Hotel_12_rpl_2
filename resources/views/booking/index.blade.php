<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon Hotel - Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    
</head>
<body class="bg-gray-50">
    <x-navbar/>
    <div class="max-w-7xl mx-auto px-4 py-24">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800">Pesanan Kamar</h1>
                    <p class="text-gray-500 text-sm">Daftar semua pemesanan yang telah dibuat</p>
                </div>
                <a href="/booking/create" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white bg-amber-500 hover:bg-amber-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Booking
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-3 rounded-md bg-green-50 text-green-700 border border-green-200">{{ session('success') }}</div>
            @endif

            @isset($booking)
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-700 bg-amber-100">
                                <th class="py-3 px-4 font-semibold">No</th>
                                <th class="py-3 px-4 font-semibold">Nama Tamu</th>
                                <th class="py-3 px-4 font-semibold">Jenis Kelamin</th>
                                <th class="py-3 px-4 font-semibold">Nomor Identitas</th>
                                <th class="py-3 px-4 font-semibold">Tipe Kamar</th>
                                <th class="py-3 px-4 font-semibold">Harga/Malam</th>
                                <th class="py-3 px-4 font-semibold">Tanggal Pesan</th>
                                <th class="py-3 px-4 font-semibold">Durasi</th>
                                <th class="py-3 px-4 font-semibold">Breakfast</th>
                                <th class="py-3 px-4 font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($booking as $item)
                                <tr class="border-b border-gray-100 hover:bg-amber-50 transition-colors">
                                    <td class="py-3 px-4 text-gray-600">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4 text-gray-800 font-medium">{{ $item->nama ?? '-' }}</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ ($item->jk ?? '') == 'Laki-laki' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' }}">
                                            {{ $item->jk ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-gray-600">{{ $item->identitas ?? '-' }}</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-indigo-100 text-indigo-700">
                                            {{ $item->produk->room_type ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-gray-700 font-medium">Rp {{ isset($item->price) ? number_format($item->price, 0, ',', '.') : '-' }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ $item->date ?? '-' }}</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-purple-100 text-purple-700">
                                            {{ $item->duration ?? '-' }} malam
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ ($item->breakfast ?? false) ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }}">
                                            {{ ($item->breakfast ?? false) ? 'Ya' : 'Tidak' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-amber-600 font-bold">Rp {{ isset($item->total) ? number_format($item->total, 0, ',', '.') : '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="py-8 text-center text-gray-500">Belum ada data booking.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
                <div class="py-12 text-center text-gray-500">Halaman index booking siap. Hubungkan controller untuk mengirim data.</div>
            @endisset
        </div>
    </div>

</body>
</html>