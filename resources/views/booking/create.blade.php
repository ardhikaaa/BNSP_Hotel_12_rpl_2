<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23f59e0b" fill-opacity="0.05" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }
        
        .form-input {
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(245, 158, 11, 0.15);
        }
        
        .radio-custom {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .radio-custom:checked {
            border-color: #f59e0b;
            background: #f59e0b;
        }
        
        .radio-custom:checked::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
        }
        
        .checkbox-custom {
            appearance: none;
            width: 24px;
            height: 24px;
            border: 2px solid #d1d5db;
            border-radius: 6px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .checkbox-custom:checked {
            background: #f59e0b;
            border-color: #f59e0b;
        }
        
        .checkbox-custom:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 16px;
            font-weight: bold;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(245, 158, 11, 0.3);
        }
        
        .success-alert {
            animation: slideInDown 0.5s ease-out;
        }
        
        @keyframes slideInDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gray-50">    
    <!-- Hero Section -->
    <div class="hero-section py-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block mb-4">
                <span class="px-4 py-2 bg-amber-500 bg-opacity-20 text-amber-400 text-sm font-medium rounded-full backdrop-blur-sm border border-amber-500 border-opacity-30">
                    Easy Booking
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Pemesanan Hotel</h1>
            <p class="text-lg text-gray-300">Isi formulir di bawah untuk melakukan reservasi kamar Anda</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-12">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="success-alert mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-lg p-6 shadow-lg">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-green-800 font-semibold mb-1">Pemesanan Berhasil!</h3>
                        <p class="text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-amber-50 to-amber-100 px-8 py-6 border-b border-amber-200">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                    <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Formulir Pemesanan
                </h2>
                <p class="text-sm text-gray-600 mt-2">Silakan lengkapi data Anda dengan benar</p>
            </div>

            <!-- Form Body -->
            <form action="{{ route('booking.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="nama" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        Nama Lengkap
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" id="nama" required
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Masukkan nama lengkap Anda">
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-3">
                        <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        Jenis Kelamin
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jk" value="Laki-laki" required class="radio-custom">
                            <span class="text-gray-700 group-hover:text-amber-600 transition-colors">Laki-laki</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jk" value="Perempuan" required class="radio-custom">
                            <span class="text-gray-700 group-hover:text-amber-600 transition-colors">Perempuan</span>
                        </label>
                    </div>
                </div>

                <!-- Nomor Identitas -->
                <div>
                    <label for="identitas" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L11 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552c-.25.78.409 1.574 1.215 1.574.405 0 .791-.165 1.07-.459l1.03-1.084.818-2.552c.25-.78-.409-1.574-1.215-1.574-.405 0-.791.165-1.07.459l-1.03 1.084z" clip-rule="evenodd"></path>
                        </svg>
                        Nomor Identitas (KTP/SIM/Passport)
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="identitas" id="identitas" required inputmode="numeric" pattern="^\+?\d+$" oninput="this.value=this.value.replace(/[^0-9+]/g,'').replace(/(?!^)\+/g,'')"
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="Contoh: 3201234567890001">
                </div>

                <!-- Pilih Kamar -->
                <div>
                    <label for="produk_id" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Pilih Kamar
                        <span class="text-red-500">*</span>
                    </label>
                    <select name="produk_id" id="produk_id" required
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-white">
                        <option value="" disabled selected>-- Pilih Tipe Kamar --</option>
                        @foreach($produks as $produk)
                            <option value="{{ $produk->id }}" data-price="{{ $produk->price }}">
                                {{ $produk->room_type }} - Rp {{ number_format($produk->price, 0, ',', '.') }}/malam
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Grid 2 Columns -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Tanggal Check-in -->
                    <div>
                        <label for="date" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            Tanggal Check-in
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="date" id="date" required
                            class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    </div>

                    <!-- Durasi -->
                    <div>
                        <label for="duration" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                            Durasi (malam)
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="duration" id="duration" min="1" required
                            class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                            placeholder="Jumlah malam">
                    </div>
                </div>

                <!-- Breakfast Option -->
                <div class="bg-amber-50 border-2 border-amber-200 rounded-xl p-6">
                    <label class="flex items-start gap-4 cursor-pointer group">
                        <input type="checkbox" name="breakfast" id="breakfast" value="1" class="checkbox-custom mt-1">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                </svg>
                                <span class="text-base font-semibold text-gray-800 group-hover:text-amber-600 transition-colors">Tambah Breakfast</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Nikmati sarapan pagi dengan menu pilihan chef kami</p>
                            <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold">+ Rp 80.000 / hari</span>
                        </div>
                    </label>
                </div>

                <!-- Hitung Total -->
                <div class="grid md:grid-cols-3 gap-6 items-end">
                    <div class="md:col-span-2">
                        <label for="total_display" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M11 17a1 1 0 01-.894.553H4a1 1 0 110-2h5.382l.724-1.447A3 3 0 008.382 11H6a1 1 0 110-2h2.382a1 1 0 000-2H6a1 1 0 010-2h2.382a3 3 0 012.724 4.447L10.382 11H12a1 1 0 110 2h-1.618a1 1 0 000 2H12a1 1 0 011 1 1 1 0 01-2 1z"/>
                            </svg>
                            Total
                        </label>
                        <input type="text" id="total_display" readonly
                            class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800"
                            placeholder="Rp 0">
                        <input type="hidden" name="total_price" id="total_price">
                    </div>
                    <div class="">
                        <button type="button" id="btn-hitung" class="w-full py-3 rounded-xl text-white font-semibold bg-amber-500 hover:bg-amber-600">
                            Hitung Total Bayar
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 grid md:grid-cols-2 gap-4">
                    <a href="{{ route('booking.index') }}" class="py-4 rounded-xl text-gray-700 font-semibold text-lg shadow-lg flex items-center justify-center gap-3 bg-white border-2 border-gray-300 hover:bg-gray-50 hover:border-gray-400 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </a>
                    <button type="submit" class="submit-btn py-4 rounded-xl text-white font-bold text-lg shadow-lg flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Pesan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script>
    (function() {
        const selectProduk = document.getElementById('produk_id');
        const inputDurasi = document.getElementById('duration');
        const chkBreakfast = document.getElementById('breakfast');
        const btnHitung = document.getElementById('btn-hitung');
        const totalDisplay = document.getElementById('total_display');
        const totalHidden = document.getElementById('total_price');

        function parsePriceFromSelect() {
            const opt = selectProduk.options[selectProduk.selectedIndex];
            if (!opt) return 0;
            const price = Number(opt.getAttribute('data-price') || 0);
            return isNaN(price) ? 0 : price;
        }

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(value);
        }

        function hitungTotal() {
            const price = parsePriceFromSelect();
            const duration = Math.max(0, Number(inputDurasi.value || 0));
            const breakfast = chkBreakfast.checked;

            let initialtotal = price * duration;
            const breakfastCost = breakfast ? (80000 * duration) : 0; // breakfast per hari
            total = initialtotal + breakfastCost;
            if (duration >= 3) {
                total = total - (initialtotal * 0.10); // diskon 10% setelah tambah breakfast (sesuai controller)
            }

            totalDisplay.value = formatRupiah(total);
            totalHidden.value = Math.round(total);
        }

        btnHitung?.addEventListener('click', hitungTotal);
    })();
</script>
</html>
