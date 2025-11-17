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
                                <th class="py-3 px-1 font-semibold"></th>
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
                                    <td class="py-3 px-1 text-amber-600 font-bold">
                                        <button onclick="openModal({{ $loop->index }})" class="hover:bg-amber-100 p-1 rounded transition-colors">
                                            <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="m18.5,17c0,.829-.671,1.5-1.5,1.5s-1.5-.671-1.5-1.5.671-1.5,1.5-1.5,1.5.671,1.5,1.5Zm5.207,6.707c-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-1.822-1.822c-.981.699-2.177,1.115-3.471,1.115-3.308,0-6-2.692-6-6s2.692-6,6-6,6,2.692,6,6c0,1.294-.416,2.49-1.115,3.471l1.822,1.822c.391.391.391,1.023,0,1.414Zm-2.966-5.878c.334-.501.334-1.157,0-1.659-.632-.949-1.82-2.171-3.741-2.171-1.97,0-3.168,1.284-3.787,2.241-.294.454-.294,1.064,0,1.518.62.957,1.819,2.241,3.787,2.241,2.001,0,3.453-1.738,3.741-2.171Zm-7.741-9.829h6.54c-.347-.913-.88-1.753-1.591-2.464l-3.484-3.486c-.712-.711-1.552-1.244-2.465-1.59v6.54c0,.551.448,1,1,1Zm-4,9c0-3.01,1.673-5.635,4.136-7h-.136c-1.654,0-3-1.346-3-3V.024c-.161-.011-.322-.024-.485-.024h-4.515C2.243,0,0,2.243,0,5v14c0,2.757,2.243,5,5,5h8.136c-2.463-1.365-4.136-3.99-4.136-7Z"/>
                                            </svg>
                                        </button>
                                    </td>
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

    <!-- Modal Detail -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="bg-amber-500 text-white px-6 py-4 rounded-t-xl flex items-center justify-between">
                <h2 class="text-xl font-semibold">Detail Pemesanan</h2>
                <button onclick="closeModal()" class="hover:bg-amber-600 rounded-full p-1 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-3">
                <!-- Nama Pemesan -->
                <div class="flex">
                    <p class="text-gray-600 w-48">Nama Pemesan</p>
                    <p class="text-gray-800">: <span id="modal-nama" class="font-medium">-</span></p>
                </div>

                <!-- Nomor Identitas -->
                <div class="flex">
                    <p class="text-gray-600 w-48">Nomor Identitas</p>
                    <p class="text-gray-800">: <span id="modal-identitas" class="font-medium">-</span></p>
                </div>

                <!-- Jenis Kelamin -->
                <div class="flex">
                    <p class="text-gray-600 w-48">Jenis Kelamin</p>
                    <p class="text-gray-800">: <span id="modal-jk" class="font-medium">-</span></p>
                </div>

                <!-- Tipe Kamar -->
                <div class="flex">
                    <p class="text-gray-600 w-48">Tipe Kamar</p>
                    <p class="text-gray-800">: <span id="modal-room-type" class="font-medium">-</span></p>
                </div>

                <!-- Duras Penginapan -->
                <div class="flex">
                    <p class="text-gray-600 w-48">Durasi Penginapan</p>
                    <p class="text-gray-800">: <span id="modal-duration" class="font-medium">-</span></p>
                </div>

                <!-- Harga Awal -->
                <div class="flex">
                    <p class="text-gray-600 w-48">Harga Awal</p>
                    <p class="text-gray-800">: <span id="modal-price" class="font-medium">-</span></p>
                </div>

                <!-- Discount -->
                <div class="flex">
                    <p class="text-gray-600 w-48">Discount</p>
                    <p class="text-gray-800">: <span id="modal-discount" class="font-medium">-</span> <span id="modal-discount-nominal" class="font-medium text-amber-600">-</span></p>
                </div>

                <!-- Total Bayar -->
                <div class="flex">
                    <p class="text-gray-600 w-48">Total Bayar</p>
                    <p class="text-gray-800">: <span id="modal-total" class="font-medium">-</span></p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 rounded-b-xl flex justify-end">
                <button onclick="closeModal()" class="px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        // Data booking dari Laravel
        const bookingData = @json($booking ?? []);

       function openModal(index) {
            const item = bookingData[index];

            // Isi modal
            document.getElementById('modal-nama').textContent = item.nama || '-';
            document.getElementById('modal-identitas').textContent = item.identitas || '-';
            document.getElementById('modal-jk').textContent = item.jk || '-';
            document.getElementById('modal-room-type').textContent = item.produk?.room_type || '-';
            document.getElementById('modal-duration').textContent = (item.duration || '-') + ' Hari';

            // Ambil nilai dari item
            const price = item.price || 0;
            const duration = item.duration || 0;
            const discount = item.discount || 0;

            // subtotal kamar
            const roomSubtotal = price * duration;

            // harga breakfast per malam (manual 80.000)
            const breakfastPrice = item.breakfast ? 80000 : 0;

            // subtotal breakfast
            const breakfastSubtotal = breakfastPrice * duration;

            // harga awal sebelum diskon
            const subtotal = roomSubtotal + breakfastSubtotal;

            // nilai diskon
            const discountNominal = (roomSubtotal * discount) / 100;

            // tampilkan harga awal
            document.getElementById('modal-price').textContent = formatNumber(subtotal);

            // tampilkan diskon
            document.getElementById('modal-discount').textContent =
                discount > 0 ? discount + '%' : '0%';

            document.getElementById('modal-discount-nominal').textContent =
                discountNominal > 0 ? '(Rp ' + formatNumber(discountNominal) + ')' : '';

            // tampilkan total akhir
            document.getElementById('modal-total').textContent =
                item.total ? formatNumber(item.total) : '-';

            // buka modal
            document.getElementById('detailModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }



        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Tutup modal jika klik di luar
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Tutup modal dengan ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>

</body>
</html>