<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $store['name'] ?? 'Kangtopi Industry' }} | Topi Custom Profesional</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --brand: #1B4D35;
            --brand-light: #2d7a56;
            --brand-dark: #0d2818;
            --text: #0f172a;
            --muted: #475569;
            --border: #dbe2ea;
            --soft: #F5F5F5;
            --brand-soft: #F2F7F4;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #ffffff;
            color: var(--text);
        }

        /* Smooth animations */
        * {
            scroll-behavior: smooth;
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Button styles */
        .btn-primary {
            background: var(--brand);
            color: white;
            padding: 12px 24px;
            border-radius: 9999px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--brand-dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(27, 77, 53, 0.25);
        }

        .btn-outline {
            border: 2px solid var(--brand);
            color: var(--brand);
            background: #ffffff;
            padding: 12px 24px;
            border-radius: 9999px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: var(--brand);
            color: white;
            transform: translateY(-1px);
        }

        /* Card styles */
        .card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Section spacing */
        .section {
            padding: 80px 0;
        }

        /* Typography */
        .heading-lg {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .heading-md {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.01em;
        }

        .label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--muted);
        }

        .text-muted-strong {
            color: #334155;
        }

        .text-muted {
            color: var(--muted);
        }
    </style>
</head>
<body class="bg-white text-[#111111]">
    @php
        $strengths = [
            ['icon' => '⭐', 'title' => 'Kualitas Premium', 'text' => 'Jahitan rapi, struktur topi kokoh, dan finishing yang siap dipakai untuk branding serius.'],
            ['icon' => '⚡', 'title' => 'Efisiensi Waktu', 'text' => 'Alur produksi dibuat jelas agar approval, revisi, dan proses jalan lebih cepat.'],
            ['icon' => '🔧', 'title' => 'Fleksibilitas Produksi', 'text' => 'Bisa menyesuaikan model, bahan, patch, bordir, hingga kebutuhan campaign atau event.'],
            ['icon' => '💰', 'title' => 'Harga Terjangkau', 'text' => 'Struktur harga tetap rasional untuk komunitas, bisnis, instansi, dan reseller.'],
            ['icon' => '💬', 'title' => 'Free Konsultasi', 'text' => 'Bantu pilih model dan material yang masuk dengan target anggaran dan fungsi produk.'],
            ['icon' => '🛡️', 'title' => 'Garansi Terbaik', 'text' => 'QC lebih ketat dan ada pendampingan jika ada hal teknis yang perlu diselesaikan.'],
        ];

        $steps = [
            ['no' => '01', 'title' => 'Hubungi CS', 'text' => 'Mulai dari kebutuhan dasar: model topi, jumlah, deadline, dan target budget.'],
            ['no' => '02', 'title' => 'Konsultasi Desain', 'text' => 'Diskusikan bahan, warna, aplikasi logo, dan detail finishing yang paling masuk.'],
            ['no' => '03', 'title' => 'Pembayaran Deposit', 'text' => 'Produksi dimulai setelah detail utama disetujui dan deposit masuk.'],
            ['no' => '04', 'title' => 'Produksi Tahap 1', 'text' => 'Tim masuk ke tahap persiapan bahan, cutting, dan pengerjaan awal.'],
            ['no' => '05', 'title' => 'Pembayaran Tahap 2', 'text' => 'Progress dilanjutkan sesuai termin yang sudah disepakati di awal.'],
            ['no' => '06', 'title' => 'Produksi & QC', 'text' => 'Finishing, pengecekan jahitan, aplikasi logo, dan quality control akhir.'],
            ['no' => '07', 'title' => 'Pembayaran Lunas', 'text' => 'Pelunasan dilakukan setelah hasil final siap kirim dan lolos pengecekan.'],
            ['no' => '08', 'title' => 'Pengiriman', 'text' => 'Produk dikirim ke alamat tujuan dengan update status yang jelas.'],
        ];

        $clients = ['Pertamina', 'Yamaha', 'Bawaslu', 'PON XXI', 'Universitas', 'Komunitas'];
        $galleryItems = collect($products)->take(6);
    @endphp

    <!-- Navbar -->
    <nav class="fixed top-0 w-full bg-white/95 backdrop-blur-sm border-b border-gray-200 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="font-bold text-xl tracking-tight">KANGTOPI</div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-800 hover:text-[var(--brand)] transition">Home</a>
                    <a href="#produk" class="text-gray-800 hover:text-[var(--brand)] transition">Produk</a>
                    <a href="#material" class="text-gray-800 hover:text-[var(--brand)] transition">Material</a>
                    <a href="#paket" class="text-gray-800 hover:text-[var(--brand)] transition">Paket</a>
                    <a href="#estimasi" class="text-gray-800 hover:text-[var(--brand)] transition">Estimasi</a>
                </div>

                <a href="https://wa.me/6289528866133" class="btn-primary text-sm">
                    Konsultasi WA
                </a>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section id="home" class="pt-24 pb-16 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-8">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-[var(--brand-soft)] text-[var(--brand)] text-sm font-semibold">
                            Vendor Topi Custom Profesional
                        </div>

                        <h1 class="heading-lg">
                            Topi Custom yang Bersih, Kuat, dan Siap Dijual.
                        </h1>

                        <p class="text-lg text-muted-strong leading-relaxed">
                            Ekspresikan brand, komunitas, dan event kamu dengan produksi topi custom terbaik.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#produk" class="btn-primary">Lihat Katalog</a>
                            <a href="#estimasi" class="btn-outline">Estimasi Harga</a>
                        </div>

                        <div class="flex flex-wrap gap-6 text-sm text-muted">
                            <span class="flex items-center gap-2">✓ Gratis Ongkir</span>
                            <span class="flex items-center gap-2">✓ Gratis Konsultasi</span>
                            <span class="flex items-center gap-2">✓ Garansi 100%</span>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="aspect-square bg-gradient-to-br from-[var(--brand-soft)] to-white rounded-3xl p-8 flex items-center justify-center">
                            <div class="text-center space-y-4">
                                <div class="w-32 h-32 bg-[var(--brand)] rounded-full mx-auto flex items-center justify-center">
                                    <span class="text-white text-4xl">🧢</span>
                                </div>
                                <p class="text-[var(--brand)] font-semibold">3 Topi Baseball Custom</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kenapa Kangtopi -->
        <section class="bg-[var(--brand)] text-white section">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="heading-md mb-4">Kenapa harus Kangtopi?</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($strengths as $item)
        <div class="h-full">
            <div class="card h-full flex flex-col bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-black p-6 hover:bg-white/15 transition-all duration-300 overflow-hidden">
                
                <div class="text-3xl mb-4">
                    {{ $item['icon'] }}
                </div>

                <h3 class="font-bold text-lg mb-3 break-words">
                    {{ $item['title'] }}
                </h3>

                <p class="text-black/90 text-sm leading-relaxed break-words flex-grow">
                    {{ $item['text'] }}
                </p>

            </div>
        </div>
    @endforeach
</div>
            </div>
        </section>

        <!-- Produk -->
        <section id="produk" class="section bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex items-center justify-between mb-12">
                    <div>
                        <div class="label mb-2">PRODUK</div>
                        <h2 class="heading-md">Spesialis Produksi Topi Custom</h2>
                    </div>
                    <a href="#produk" class="btn-outline">Lihat Semua</a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($products as $product)
                        <div class="card p-6 group">
                            @if($product->image && file_exists(public_path('storage/' . $product->image)))
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                            @else
                                <div class="aspect-square bg-[var(--brand-soft)] rounded-xl mb-4 flex items-center justify-center">
                                    <span class="text-4xl">🧢</span>
                                </div>
                            @endif
                            <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                            <div class="flex flex-wrap gap-2 mb-4">
                                @forelse($materials->take(2) as $material)
                                    <span class="px-3 py-1 bg-[var(--brand-soft)] text-[var(--brand)] text-xs rounded-full">{{ $material->name }}</span>
                                @empty
                                    <span class="px-3 py-1 bg-[var(--brand-soft)] text-[var(--brand)] text-xs rounded-full">Custom Material</span>
                                @endforelse
                            </div>
                            <button class="btn-outline w-full">Order Now</button>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-muted">
                            Produk akan segera ditampilkan
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Material -->
        <section id="material" class="section">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="label mb-2">MATERIAL</div>
                    <h2 class="heading-md">Pilih Bahan Sesuai Kebutuhan</h2>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($materials as $material)
                        <div class="card p-6 text-center">
                                @if($material->image && file_exists(public_path('storage/' . $material->image)))
                                    <img src="{{ asset('storage/' . $material->image) }}" alt="{{ $material->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                                @else
                                    <div class="aspect-square bg-gradient-to-br from-[var(--brand-soft)] to-white rounded-xl mb-4 flex items-center justify-center">
                                        <span class="text-2xl">🧵</span>
                                    </div>
                                @endif
                            <h3 class="font-bold">{{ $material->name }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Paket -->
        <section id="paket" class="section bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="label mb-2">PAKET</div>
                    <h2 class="heading-md">Pilih Sesuai Kebutuhanmu</h2>
                </div>

                <div class="grid lg:grid-cols-3 gap-8">
                    @foreach($quantity_tiers as $tier)
                        @php
                            $isFeatured = $tier->id === 2; // Medium tier (id 2) is featured
                            $priceDisplay = $tier->is_negotiable ? 'Nego' : 'Rp ' . number_format($tier->price_per_unit, 0, ',', '.');
                            $maxQtyDisplay = $tier->max_qty ? $tier->max_qty : '∞';
                        @endphp
                        <div class="card p-8 {{ $isFeatured ? 'bg-[var(--brand)] text-black border-[var(--brand)]' : '' }}">
                            @if($isFeatured)
                                <div class="inline-flex items-center px-3 py-1 rounded-full bg-black/20 text-black text-xs font-semibold mb-4">
                                    Terpopuler
                                </div>
                            @endif

                            <div class="text-center mb-6">
                                <h3 class="font-bold text-2xl mb-2">{{ $tier->label }}</h3>
                                <div class="text-3xl font-bold mb-1">{{ $tier->min_qty }} - {{ $maxQtyDisplay }} pcs</div>
                                <div class="text-lg">{{ $priceDisplay }}/pcs</div>
                            </div>

                            <ul class="space-y-3">
                                @forelse($tier->benefits as $benefit)
                                    <li class="flex items-center gap-3">
                                        <span class="{{ $isFeatured ? 'text-emerald-200' : 'text-green-600' }}">✓</span>
                                        <span class="text-sm {{ $isFeatured ? 'text-black' : 'text-muted-strong' }}">{{ $benefit->benefit }}</span>
                                    </li>
                                @empty
                                    <li class="flex items-center gap-3">
                                        <span class="{{ $isFeatured ? 'text-emerald-200' : 'text-green-600' }}">✓</span>
                                        <span class="text-sm {{ $isFeatured ? 'text-black' : 'text-muted-strong' }}">Bonus menarik</span>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Estimasi -->
        <section id="estimasi" class="section" style="background: var(--brand-soft)">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Heading -->
        <div class="text-center mb-12">
            <h2 class="heading-md">
                Hitung Estimasi Hargamu
            </h2>

            <p class="text-muted mt-3">
                Simulasikan kebutuhan custom topimu secara realtime
            </p>
        </div>

        <!-- Card -->
        <div class="max-w-2xl mx-auto">

            <div class="card p-8 rounded-2xl shadow-lg bg-white">

                <div class="grid md:grid-cols-2 gap-6 mb-8">

                    <!-- Product -->
                    <div>
                        <label class="block text-sm font-semibold mb-2">
                            Pilih Produk
                        </label>

                        <select id="product_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-[var(--brand)] focus:ring-2 focus:ring-[var(--brand)]/20 focus:outline-none">

                            <option value="">
                                Pilih produk
                            </option>

                            @foreach($products as $produk)
                                <option
                                    value="{{ $produk->id }}"
                                    data-price="{{ $produk->base_price ?? 0 }}">

                                    {{ $produk->name }}

                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Material -->
                    <div>
                        <label class="block text-sm font-semibold mb-2">
                            Pilih Material
                        </label>

                        <select id="material_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-[var(--brand)] focus:ring-2 focus:ring-[var(--brand)]/20 focus:outline-none">

                            <option value="">
                                Pilih material
                            </option>

                            @foreach($materials as $material)
                                <option
                                    value="{{ $material->id }}"
                                    data-price="{{ $material->price_per_unit }}"
                                    data-name="{{ $material->name }}">

                                    {{ $material->name }}
                                    — Rp {{ number_format($material->price_per_unit,0,',','.') }}/pcs

                                </option>
                            @endforeach

                        </select>

                        <!-- Material Info -->
                        <div id="material-price-info"
                            class="mt-2 text-sm text-[var(--brand)] font-medium">
                        </div>
                    </div>

                    <!-- Qty -->
                    <div>
                        <label class="block text-sm font-semibold mb-2">
                            Jumlah / Qty
                        </label>

                        <input
                            id="qty"
                            type="number"
                            min="24"
                            value="24"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-[var(--brand)] focus:ring-2 focus:ring-[var(--brand)]/20 focus:outline-none">

                        <!-- Warning -->
                        <div id="qty-warning"
                            class="hidden mt-2 text-sm text-red-500 font-medium">

                            Minimum order 24 pcs

                        </div>

                        <!-- Tier Badge -->
                        <div id="package-tier"
                            class="mt-3 inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-[var(--brand-soft)] text-[var(--brand)] border border-[var(--brand)]/20">

                            Paket Starter

                        </div>
                    </div>

                    <!-- Branding -->
                    <div>
                        <label class="block text-sm font-semibold mb-3">
                            Teknik Branding
                        </label>

                        <div class="space-y-3">

                            @forelse($estimation_factors as $factor)

                                <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 hover:border-[var(--brand)] cursor-pointer transition">

                                    <input
                                        type="checkbox"
                                        class="estimation-extra rounded border-gray-300 text-[var(--brand)] focus:ring-[var(--brand)]"
                                        value="{{ $factor->id }}"
                                        data-price="{{ $factor->extra_cost }}"
                                        data-name="{{ $factor->name }}">

                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium">
                                            {{ $factor->name }}
                                        </span>

                                        <span class="text-xs text-gray-500">
                                            + Rp {{ number_format($factor->extra_cost,0,',','.') }}/pcs
                                        </span>
                                    </div>

                                </label>

                            @empty

                                <div class="text-sm text-gray-500">
                                    Belum ada teknik branding tersedia
                                </div>

                            @endforelse

                        </div>
                    </div>

                </div>

                <!-- Result -->
                <div class="bg-[var(--brand-soft)] p-6 rounded-2xl mb-6 border border-[var(--brand)]/10">

                    <div class="text-sm font-semibold text-[var(--brand)] mb-2">
                        ESTIMASI TOTAL
                    </div>

                    <div id="estimation-total"
                        class="text-3xl font-bold text-gray-900">

                        Rp 0

                    </div>

                    <div id="estimation-breakdown"
                        class="text-sm text-muted mt-2">

                        Pilih spesifikasi untuk melihat simulasi harga

                    </div>

                </div>

                <!-- WA -->
                <a id="wa-order-link"
                    href="https://wa.me/6289528866133?text=Halo, saya ingin estimasi harga custom topi."
                    class="btn-primary w-full text-center block rounded-xl">

                    Pesan via WA

                </a>

            </div>

        </div>

    </div>
</section>

<script>
    const qtyInput = document.getElementById('qty');
    const packageTier = document.getElementById('package-tier');
    const qtyWarning = document.getElementById('qty-warning');

    const materialSelect = document.getElementById('material_id');
    const materialPriceInfo = document.getElementById('material-price-info');

    function updatePackageTier() {

        const qty = parseInt(qtyInput.value) || 0;

        // Minimum order
        if (qty < 24) {

            qtyWarning.classList.remove('hidden');

        } else {

            qtyWarning.classList.add('hidden');

        }

        // Package tier
        if (qty >= 24 && qty <= 49) {

            packageTier.innerHTML = 'Paket Starter';

        } else if (qty >= 50 && qty <= 99) {

            packageTier.innerHTML = 'Paket Medium';

        } else if (qty >= 100) {

            packageTier.innerHTML = 'Paket Bulk';

        } else {

            packageTier.innerHTML = '-';

        }

    }

    function updateMaterialInfo() {

        const selected = materialSelect.options[materialSelect.selectedIndex];

        if (!selected.value) {

            materialPriceInfo.innerHTML = '';
            return;

        }

        const name = selected.dataset.name;
        const price = parseInt(selected.dataset.price);

        materialPriceInfo.innerHTML =
            `${name} — Rp ${price.toLocaleString('id-ID')}/pcs`;

    }

    qtyInput.addEventListener('input', updatePackageTier);
    materialSelect.addEventListener('change', updateMaterialInfo);

    updatePackageTier();
    updateMaterialInfo();
</script>

        <!-- Alur Pemesanan -->
        <section class="section">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="label mb-2">ALUR PEMESANAN</div>
                    <h2 class="heading-md">Mudah, Transparan, Terpercaya</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($steps as $step)
                        <div class="text-center">
                            <div class="w-12 h-12 bg-[var(--brand)] text-white rounded-full flex items-center justify-center font-bold mx-auto mb-4">{{ $step['no'] }}</div>
                            <h3 class="font-bold mb-2">{{ $step['title'] }}</h3>
                            <p class="text-sm text-muted">{{ $step['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Hasil Produksi -->
        <section class="section bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="label mb-2">PORTOFOLIO</div>
                    <h2 class="heading-md">Beberapa Hasil Produksi Kami</h2>
                </div>

                <div class="columns-1 md:columns-2 lg:columns-3 gap-6">
                    @forelse($galleryItems as $product)
                    
                        <div class="card p-6 mb-6 break-inside-avoid">
                            @if($product->image && file_exists(public_path('storage/' . $product->image)))
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                            @else
                            <div class="aspect-[4/3] bg-gradient-to-br from-[var(--brand-soft)] to-white rounded-xl mb-4 flex items-center justify-center">
                                <span class="text-4xl">📸</span>
                            </div>
                            @endif
                            <h3 class="font-bold">{{ $product->name }}</h3>
                        </div>
                    @empty
                        <div class="card p-12 text-center text-muted">
                            Portofolio hasil produksi akan segera ditampilkan
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Klien -->
        <section class="section">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="label mb-2">KLIEN</div>
                    <h2 class="heading-md">Dipercaya oleh Berbagai Instansi</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @foreach($clients as $client)
                        <div class="card p-6 text-center hover:grayscale-0 grayscale transition">
                            <div class="font-bold text-lg">{{ $client }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[var(--brand)] text-white py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <div class="font-bold text-xl mb-4">KANGTOPI</div>
                    <p class="text-white/90 text-sm">
                        Vendor topi custom dengan tampilan modern, proses produksi jelas, dan hasil yang dirancang untuk dipakai, dipamerkan, dan dijual dengan percaya diri.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Menu</h4>
                    <div class="space-y-2 text-sm text-white/90">
                        <a href="#home" class="block hover:text-white transition">Home</a>
                        <a href="#produk" class="block hover:text-white transition">Produk</a>
                        <a href="#material" class="block hover:text-white transition">Material</a>
                        <a href="#paket" class="block hover:text-white transition">Paket</a>
                        <a href="#estimasi" class="block hover:text-white transition">Estimasi</a>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <div class="space-y-2 text-sm text-white/90">
                        <a href="https://wa.me/6289528866133" class="block hover:text-white transition">WhatsApp: 0895-2886-6133</a>
                        <div>Instagram: @kangtopii.id</div>
                        <div>Email: hello@kangtopi.id</div>
                        <div>Jam operasional: Senin - Sabtu, 08.00 - 17.00</div>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Workshop</h4>
                    <div class="text-sm text-white/90">
                        <div>Jl. Raya Sumedang No. 123</div>
                        <div>Sumedang, Jawa Barat</div>
                        <div>Indonesia 45311</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productSelect = document.getElementById('product_id');
            const materialSelect = document.getElementById('material_id');
            const qtyInput = document.getElementById('qty');
            const extras = Array.from(document.querySelectorAll('.estimation-extra'));
            const totalNode = document.getElementById('estimation-total');
            const breakdownNode = document.getElementById('estimation-breakdown');
            const waLink = document.getElementById('wa-order-link');

            const getSelectedPrice = (select) => Number(select?.selectedOptions?.[0]?.dataset?.price || 0);
            const getSelectedText = (select) => select?.selectedOptions?.[0]?.text || '-';
            const formatRupiah = (value) => `Rp ${new Intl.NumberFormat('id-ID').format(value)}`;

            const updateEstimation = () => {
                const qty = Math.max(1, Number(qtyInput.value || 0));
                const basePrice = getSelectedPrice(productSelect);
                const materialPrice = getSelectedPrice(materialSelect);
                const extrasTotal = extras
                    .filter((item) => item.checked)
                    .reduce((sum, item) => sum + Number(item.dataset.price || 0), 0);

                const unitPrice = basePrice + materialPrice + extrasTotal;
                const total = unitPrice * qty;

                totalNode.textContent = formatRupiah(total);

                const selectedExtras = extras
                    .filter((item) => item.checked)
                    .map((item) => item.dataset.name)
                    .join(', ') || 'Tanpa extra';

                breakdownNode.textContent = `${getSelectedText(productSelect)} · ${getSelectedText(materialSelect)} · ${qty} pcs · ${selectedExtras}`;

                const message = `Halo, saya ingin estimasi harga custom topi.%0AProduk: ${encodeURIComponent(getSelectedText(productSelect))}%0AMaterial: ${encodeURIComponent(getSelectedText(materialSelect))}%0AQty: ${qty} pcs%0AExtra: ${encodeURIComponent(selectedExtras)}%0AEstimasi total: ${encodeURIComponent(formatRupiah(total))}`;
                waLink.href = `https://wa.me/6289528866133?text=${message}`;
            };

            [productSelect, materialSelect, qtyInput].forEach((field) => {
                field?.addEventListener('input', updateEstimation);
                field?.addEventListener('change', updateEstimation);
            });

            extras.forEach((item) => item.addEventListener('change', updateEstimation));

            updateEstimation();
        });
    </script>
</body>
</html>
