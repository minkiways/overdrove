<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Overdrive — Cari, Bandingkan, dan Hitung Kredit Mobil</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    darkMode: 'class',
    theme: {
      extend: {
        fontFamily: {
          display: ['"Space Grotesk"', 'sans-serif'],
          sans: ['"Inter"', 'sans-serif'],
        }
      }
    }
  }
</script>
<style>
  html{scroll-behavior:smooth;}
  body{font-family:'Inter',sans-serif;}
  .font-display{font-family:'Space Grotesk',sans-serif; letter-spacing:-0.01em;}

  input[type="range"] {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 100%;
  height: 2px;
}
  .dark input[type="range"]{background:#3F3F46;}
  input[type="range"]::-webkit-slider-thumb{
    -webkit-appearance:none;
    width:18px;height:18px;
    border-radius:50%;
    background:#131316;
    cursor:pointer;
    border:3px solid #fff;
    box-shadow:0 0 0 1px #D4D4D8;
  }
  .dark input[type="range"]::-webkit-slider-thumb{
    background:#F4F4F5; border:3px solid #18181B; box-shadow:0 0 0 1px #52525B;
  }
  input[type="range"]::-moz-range-thumb{
    width:18px;height:18px;border-radius:50%;
    background:#131316;cursor:pointer;
    border:3px solid #fff;box-shadow:0 0 0 1px #D4D4D8;
  }

  .no-scrollbar::-webkit-scrollbar{display:none;}
  .no-scrollbar{-ms-overflow-style:none; scrollbar-width:none;}
</style>
</head>
<body class="bg-zinc-50 text-zinc-900 dark:bg-zinc-950 dark:text-zinc-50 transition-colors">

<!-- ============ HEADER ============ -->
<header class="sticky top-0 z-30 border-b border-zinc-200 dark:border-zinc-800 bg-zinc-50/90 dark:bg-zinc-950/90 backdrop-blur">
  <div class="max-w-7xl mx-auto px-5 md:px-8 h-16 flex items-center justify-between gap-4">
    <a href="#home" class="flex items-center gap-2 font-display font-bold text-lg shrink-0">
      <span class="w-2 h-2 rounded-full bg-zinc-900 dark:bg-zinc-50"></span>
      Overdrive
    </a>

    <nav class="hidden lg:flex items-center gap-7 text-sm font-medium text-zinc-600 dark:text-zinc-400">
      <a href="#home" data-i18n="nav.beranda" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Beranda</a>
      <a href="#tentang" data-i18n="nav.tentang" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Tentang Perusahaan</a>
      <a href="#kategori" data-i18n="nav.cari" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Cari Mobil</a>
      <a href="#kalkulator" data-i18n="nav.simulasi" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Simulasi Kredit</a>
      <a href="#populer" data-i18n="nav.populer" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Mobil Populer</a>
      <a href="#kontak" data-i18n="nav.kontak" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Kontak Perusahaan</a>
    </nav>

    <div class="flex items-center gap-2">
      <div class="relative flex-1 max-w-[10rem] sm:max-w-none sm:w-56">
        <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/></svg>
        <input id="searchInput" type="text" data-i18n-placeholder="search.placeholder" placeholder="Cari model mobil…"
          class="w-full pl-9 pr-3 py-2 rounded-full bg-zinc-100 dark:bg-zinc-900 border border-transparent focus:border-zinc-400 dark:focus:border-zinc-600 outline-none text-sm placeholder:text-zinc-400">
      </div>

      <div class="hidden sm:flex items-center rounded-full bg-zinc-100 dark:bg-zinc-900 p-0.5 text-xs font-semibold shrink-0" role="group" aria-label="Language">
        <button id="langId" data-lang-btn="id" class="px-2.5 py-1.5 rounded-full transition-colors">ID</button>
        <button id="langEn" data-lang-btn="en" class="px-2.5 py-1.5 rounded-full transition-colors">EN</button>
      </div>

      <button id="darkToggle" data-i18n-aria="a11y.theme" aria-label="Ganti tema gelap/terang"
        class="w-10 h-10 grid place-items-center rounded-full bg-zinc-100 dark:bg-zinc-900 hover:bg-zinc-200 dark:hover:bg-zinc-800 transition-colors shrink-0">
        <svg id="iconSun" class="w-4 h-4 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 0l-.7.7M6.34 17.66l-.7.7M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        <svg id="iconMoon" class="w-4 h-4 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 1020.354 15.354z"/></svg>
      </button>
    </div>
  </div>
</header>

<!-- ============ HERO ============ -->
<section id="home" class="max-w-7xl mx-auto px-5 md:px-8 pt-14 pb-16 grid lg:grid-cols-2 gap-10 items-center">
  <div>
    <span data-i18n="hero.eyebrow" class="inline-block text-xs font-semibold px-3 py-1.5 rounded-full border border-zinc-300 dark:border-zinc-700 text-zinc-600 dark:text-zinc-400 mb-5">
      Jual Beli & Simulasi Kredit Kendaraan
    </span>
    <h1 data-i18n="hero.title" class="font-display font-bold text-4xl md:text-5xl leading-[1.08] mb-5">
      Temukan mobil yang layak masuk garasimu.
    </h1>
    <p data-i18n="hero.subtitle" class="text-zinc-600 dark:text-zinc-400 text-base max-w-md mb-8">
      Ribuan mobil baru dan bekas, kalkulator kredit yang update langsung, dan fitur bandingkan biar kamu nggak salah pilih.
    </p>
    <div class="flex flex-wrap gap-3">
      <a href="#kategori" data-i18n="hero.cta1" class="px-6 py-3 rounded-full bg-zinc-900 dark:bg-zinc-50 text-white dark:text-zinc-900 text-sm font-semibold hover:opacity-90 transition-opacity">Mulai Cari Mobil</a>
      <a href="#kalkulator" data-i18n="hero.cta2" class="px-6 py-3 rounded-full border border-zinc-300 dark:border-zinc-700 text-sm font-semibold hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors">Hitung Cicilan</a>
    </div>

    <div class="flex gap-8 mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-800">
      <div>
        <div class="font-display font-bold text-2xl">12.400+</div>
        <div data-i18n="hero.stat1Label" class="text-xs text-zinc-500 mt-1">Listing aktif</div>
      </div>
      <div>
        <div class="font-display font-bold text-2xl">340+</div>
        <div data-i18n="hero.stat2Label" class="text-xs text-zinc-500 mt-1">Dealer mitra</div>
      </div>
      <div>
        <div class="font-display font-bold text-2xl">4.8/5</div>
        <div data-i18n="hero.stat3Label" class="text-xs text-zinc-500 mt-1">Rating pengguna</div>
      </div>
    </div>
  </div>

  <div class="relative block w-full aspect-[4/3] rounded-3xl border border-zinc-200 dark:border-zinc-800 bg-zinc-100 dark:bg-zinc-900 overflow-hidden" id="heroSlider">
    <img src="img/home.jpg" alt="Foto mobil" data-slide="0" class="hero-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-100">
    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200&auto=format&fit=crop" alt="Foto mobil SUV" data-slide="1" class="hero-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0">
    <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=1200&auto=format&fit=crop" alt="Foto mobil sedan" data-slide="2" class="hero-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0">
    <div class="absolute bottom-4 right-4 flex gap-2 z-10" id="heroDots">
      <button data-i="0" class="hero-dot w-2.5 h-2.5 rounded-full bg-white"></button>
      <button data-i="1" class="hero-dot w-2.5 h-2.5 rounded-full bg-white/40"></button>
      <button data-i="2" class="hero-dot w-2.5 h-2.5 rounded-full bg-white/40"></button>
    </div>
  </div>
</section>

<!-- ============ TENTANG PERUSAHAAN ============ -->
<section id="tentang" class="max-w-7xl mx-auto px-5 md:px-8 py-16 border-t border-zinc-200 dark:border-zinc-800">
  <div class="rounded-[2.5rem] bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 overflow-hidden shadow-sm">

    <!-- PANEL GELAP: HEADLINE + GAMBAR -->
    <div class="relative overflow-hidden rounded-t-[2.5rem]">
      <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=1600&auto=format&fit=crop" alt="Showroom mobil" class="absolute inset-0 w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-r from-zinc-950 via-zinc-950/85 to-zinc-950/30"></div>

      <div class="relative px-6 md:px-12 pt-12 pb-20 md:pt-16 md:pb-28 grid md:grid-cols-2 gap-10">
        <!-- KIRI: TEKS -->
        <div class="text-white">
          <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur grid place-items-center mb-7">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13l1.5-4.5A2 2 0 016.4 7h11.2a2 2 0 011.9 1.5L21 13M3 13v4a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-4M3 13h18M6.5 15.5h.01M17.5 15.5h.01"/></svg>
          </div>
          <span data-i18n="about.eyebrow" class="inline-block text-xs font-semibold px-3 py-1.5 rounded-full border border-white/30 text-zinc-200 mb-4">Tentang Perusahaan</span>
          <h2 data-i18n="about.title" class="font-display font-bold text-3xl md:text-5xl leading-[1.1] mb-4">Mitra Kredit Mobil Terpercaya Anda.</h2>
          <p data-i18n="about.desc" class="text-zinc-300 text-sm max-w-sm mb-7 leading-relaxed">Overdrive membantu ribuan pelanggan menemukan mobil yang tepat dan menghitung simulasi kredit secara transparan, bekerja sama dengan ratusan dealer &amp; lembaga pembiayaan resmi di 12+ kota.</p>

          <!-- MINI FORM ALA REFERENSI -->
          <div class="flex flex-wrap items-center gap-2 bg-white rounded-2xl p-2 max-w-md">
            <div class="flex items-center gap-2 px-3 py-2 flex-1 min-w-[120px]">
              <svg class="w-4 h-4 text-zinc-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13l1.5-4.5A2 2 0 016.4 7h11.2a2 2 0 011.9 1.5L21 13M3 13v4a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-4M3 13h18"/></svg>
              <div>
                <div data-i18n="about.formLabel1" class="text-[11px] text-zinc-400 leading-none mb-1">Tipe Mobil</div>
                <div data-i18n="about.formValue1" class="text-sm font-semibold text-zinc-900 leading-none">Semua Merek</div>
              </div>
            </div>
            <div class="w-px h-8 bg-zinc-200"></div>
            <div class="flex items-center gap-2 px-3 py-2 flex-1 min-w-[120px]">
              <svg class="w-4 h-4 text-zinc-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V6m0 10v2"/><circle cx="12" cy="12" r="9"/></svg>
              <div>
                <div data-i18n="about.formLabel2" class="text-[11px] text-zinc-400 leading-none mb-1">Kisaran Harga</div>
                <div data-i18n="about.formValue2" class="text-sm font-semibold text-zinc-900 leading-none">Semua Harga</div>
              </div>
            </div>
            <a href="#kalkulator" data-i18n="about.formCta" class="px-5 py-3 rounded-xl bg-zinc-900 text-white text-sm font-semibold hover:opacity-90 transition-opacity shrink-0">Hitung Kredit</a>
          </div>

          <div class="flex flex-wrap gap-x-6 gap-y-2 mt-5 text-sm text-zinc-300">
            <a href="#kategori" data-i18n="about.link1" class="flex items-center gap-1.5 hover:text-white transition-colors">Beli Mobil <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></a>
            <a href="#kalkulator" data-i18n="about.link2" class="flex items-center gap-1.5 hover:text-white transition-colors">Kredit Mobil <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></a>
          </div>
        </div>

        <!-- KANAN: BADGE MENGAMBANG -->
        <div class="relative hidden md:block">
          <div data-i18n="about.badgeTop" class="absolute -top-2 right-4 max-w-[190px] bg-white text-zinc-900 text-sm font-semibold px-5 py-4 rounded-2xl shadow-lg">Layanan Andalan Kami</div>

          <div class="absolute top-20 right-0 flex flex-col gap-4 w-full max-w-[220px]">
            <div class="bg-zinc-800/90 backdrop-blur rounded-2xl p-5 border border-white/10">
              <div class="w-8 h-8 rounded-full bg-amber-400 grid place-items-center mb-3">
                <svg class="w-4 h-4 text-zinc-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
              </div>
              <h3 data-i18n="about.card1Title" class="text-white font-semibold text-sm mb-1">Cepat Cair</h3>
              <p data-i18n="about.card1Desc" class="text-zinc-400 text-xs leading-relaxed">Approval kredit dalam hitungan jam, dokumen minim.</p>
            </div>
            <div class="bg-zinc-800/50 backdrop-blur rounded-2xl p-5 border border-white/10">
              <div class="w-8 h-8 rounded-full bg-white/15 grid place-items-center mb-3">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V6m0 10v2"/><circle cx="12" cy="12" r="9"/></svg>
              </div>
              <h3 data-i18n="about.card2Title" class="text-white/90 font-semibold text-sm mb-1">Bunga Ringan</h3>
              <p data-i18n="about.card2Desc" class="text-zinc-400 text-xs leading-relaxed">Mulai dari 20% flat per tahun, tanpa biaya tersembunyi.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- STRIP PUTIH: UNIT CONTOH + LOGO MITRA -->
    <div class="px-6 md:px-12 py-6 flex flex-wrap items-center justify-between gap-6">
      <a href="#populer" class="flex items-center gap-3 group">
        <div class="w-16 h-14 rounded-xl overflow-hidden shrink-0 border border-zinc-200 dark:border-zinc-800">
          <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=200&auto=format&fit=crop" alt="Unit mobil" class="w-full h-full object-cover">
        </div>
        <div>
          <div class="flex items-center gap-1 text-xs text-zinc-500">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><circle cx="12" cy="11" r="3"/></svg>
            <span data-i18n="about.unitCity">Jakarta Barat, Indonesia</span>
          </div>
          <div class="text-sm font-semibold group-hover:text-zinc-600 dark:group-hover:text-zinc-300 transition-colors">Toyota Avanza Veloz</div>
          <div class="text-xs text-zinc-500" data-i18n="about.unitPrice">Rp280.000.000</div>
        </div>
      </a>

      <div class="flex flex-wrap items-center gap-3" id="aboutPartners">
        <span class="px-4 py-2.5 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-sm font-semibold text-zinc-600 dark:text-zinc-300">BCA Finance</span>
        <span class="px-4 py-2.5 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-sm font-semibold text-zinc-600 dark:text-zinc-300">Adira Finance</span>
        <span class="px-4 py-2.5 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-sm font-semibold text-zinc-600 dark:text-zinc-300">Mandiri Tunas Finance</span>
        <span class="px-4 py-2.5 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-sm font-semibold text-zinc-600 dark:text-zinc-300">OJK Terdaftar</span>
      </div>
    </div>
  </div>
</section>

<!-- ============ KATEGORI / KOLEKSI ============ -->
<section id="kategori" class="max-w-7xl mx-auto px-5 md:px-8 py-16 border-t border-zinc-200 dark:border-zinc-800">
  <div class="flex items-end justify-between mb-8">
    <div>
      <h2 data-i18n="cat.title" class="font-display font-bold text-2xl md:text-3xl">Jelajah berdasarkan tipe bodi</h2>
      <p data-i18n="cat.subtitle" class="text-zinc-500 text-sm mt-2">Koleksi mobil dikelompokkan biar gampang dibandingkan.</p>
    </div>
  </div>
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4" id="bodyTypeGrid"></div>
</section>

<!-- ============ MEREK ============ -->
<section class="max-w-7xl mx-auto px-5 md:px-8 py-16 border-t border-zinc-200 dark:border-zinc-800">
  <div class="flex items-end justify-between mb-8">
    <div>
      <h2 data-i18n="brand.title" class="font-display font-bold text-2xl md:text-3xl">Merek populer</h2>
      <p data-i18n="brand.subtitle" class="text-zinc-500 text-sm mt-2">12 merek dengan listing terbanyak bulan ini.</p>
    </div>
  </div>
  <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-4" id="brandGrid"></div>
</section>

<!-- ============ KALKULATOR ============ -->
<section id="kalkulator" class="max-w-7xl mx-auto px-5 md:px-8 py-16 border-t border-zinc-200 dark:border-zinc-800">
  <div class="max-w-xl mb-10">
    <span data-i18n="calc.eyebrow" class="inline-block text-xs font-semibold px-3 py-1.5 rounded-full border border-zinc-300 dark:border-zinc-700 text-zinc-600 dark:text-zinc-400 mb-4">Simulasi Kredit</span>
    <h2 data-i18n="calc.title" class="font-display font-bold text-2xl md:text-3xl">Berapa cicilan bulanan kamu?</h2>
    <p data-i18n="calc.subtitle" class="text-zinc-500 text-sm mt-2">Pilih mobil atau masukkan harga manual, uang muka, dan tenor — hasilnya langsung berubah.</p>
  </div>

  <div class="grid lg:grid-cols-[1.1fr_1fr] gap-4">
    <div class="p-7 md:p-8 rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800">

      <!-- FITUR BARU: DROPDOWN MERK & MODEL MOBIL -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
        <div>
          <label data-i18n="calc.brandLabel" class="text-sm text-zinc-500 font-medium block mb-2">Pilih Merek Mobil</label>
          <select id="brandSelect" class="w-full px-4 py-3 rounded-xl bg-zinc-100 dark:bg-zinc-800 font-semibold text-sm outline-none focus:ring-2 focus:ring-zinc-400 dark:focus:ring-zinc-600 cursor-pointer">
            <option value="" data-i18n="calc.brandDefault">-- Semua Merek --</option>
          </select>
        </div>
        <div>
          <label data-i18n="calc.modelLabel" class="text-sm text-zinc-500 font-medium block mb-2">Pilih Model Mobil</label>
          <select id="carSelect" class="w-full px-4 py-3 rounded-xl bg-zinc-100 dark:bg-zinc-800 font-semibold text-sm outline-none focus:ring-2 focus:ring-zinc-400 dark:focus:ring-zinc-600 cursor-pointer">
            <option value="" data-i18n="calc.modelDefault">-- Pilih Mobil --</option>
          </select>
        </div>
      </div>

      <div class="mb-7">
        <div class="flex justify-between items-baseline mb-2.5">
          <label data-i18n="calc.priceLabel" class="text-sm text-zinc-500 font-medium">Harga kendaraan (OTR)</label>
        </div>
        <div class="relative">
          <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-zinc-400">Rp</span>
          <input type="text" inputmode="numeric" id="priceInput"
            class="w-full pl-10 pr-4 py-3 rounded-xl bg-zinc-100 dark:bg-zinc-800 font-semibold text-base outline-none focus:ring-2 focus:ring-zinc-400 dark:focus:ring-zinc-600"
            value="250.000.000">
        </div>
        <input type="range" id="priceSlider" min="30000000" max="2000000000" step="1000000" value="250000000" class="mt-4">
      </div>

      <div class="mb-7">
        <label data-i18n="calc.dpLabel" class="text-sm text-zinc-500 font-medium block mb-2.5">DP (Persen)</label>
        <select id="dpSelect" class="w-full px-4 py-3 rounded-xl bg-zinc-100 dark:bg-zinc-800 font-semibold text-sm outline-none focus:ring-2 focus:ring-zinc-400 dark:focus:ring-zinc-600 cursor-pointer">
          <option value="10">10%</option>
          <option value="20" selected>20%</option>
          <option value="30">30%</option>
          <option value="40">40%</option>
          <option value="50">50%</option>
          <option value="60">60%</option>
        </select>
      </div>

      <div class="mb-7">
        <label data-i18n="calc.tenorLabel" class="text-sm text-zinc-500 font-medium block mb-2.5">Tenor (Tahun)</label>
        <div class="flex gap-4 flex-wrap" id="tenorGroup">
          <label class="flex items-center gap-2 text-sm font-medium cursor-pointer">
            <input type="checkbox" class="tenor-check accent-zinc-900 dark:accent-zinc-50 w-4 h-4" data-years="1"> 1 <span data-i18n="calc.tahunUnit">Tahun</span>
          </label>
          <label class="flex items-center gap-2 text-sm font-medium cursor-pointer">
            <input type="checkbox" class="tenor-check accent-zinc-900 dark:accent-zinc-50 w-4 h-4" data-years="2"> 2 <span data-i18n="calc.tahunUnit">Tahun</span>
          </label>
          <label class="flex items-center gap-2 text-sm font-medium cursor-pointer">
            <input type="checkbox" class="tenor-check accent-zinc-900 dark:accent-zinc-50 w-4 h-4" data-years="3"> 3 <span data-i18n="calc.tahunUnit">Tahun</span>
          </label>
          <label class="flex items-center gap-2 text-sm font-medium cursor-pointer">
            <input type="checkbox" class="tenor-check accent-zinc-900 dark:accent-zinc-50 w-4 h-4" data-years="4"> 4 <span data-i18n="calc.tahunUnit">Tahun</span>
          </label>
          <label class="flex items-center gap-2 text-sm font-medium cursor-pointer">
            <input type="checkbox" class="tenor-check accent-zinc-900 dark:accent-zinc-50 w-4 h-4" data-years="5" checked> 5 <span data-i18n="calc.tahunUnit">Tahun</span>
          </label>
        </div>
      </div>

      <div class="flex justify-between items-baseline p-4 rounded-xl bg-zinc-100 dark:bg-zinc-800">
        <span data-i18n="calc.rateLabel" class="text-sm text-zinc-500 font-medium">Bunga (tetap)</span>
        <span data-i18n="calc.rateValue" class="text-sm font-bold">20% / tahun</span>
      </div>

      <button id="hitungBtn" data-i18n="calc.hitung" class="w-full mt-7 py-3.5 rounded-xl bg-zinc-900 dark:bg-zinc-50 text-white dark:text-zinc-900 text-sm font-semibold hover:opacity-90 transition-opacity">Hitung</button>
    </div>

    <div class="p-7 md:p-8 rounded-3xl bg-zinc-900 dark:bg-zinc-50 text-white dark:text-zinc-900 flex flex-col justify-between">
      <div>
        <div id="selectedCarLabel" class="text-sm font-bold text-amber-400 dark:text-amber-600 mb-4 hidden"></div>

        <div class="space-y-2.5 text-sm">
          <div class="flex justify-between text-zinc-400 dark:text-zinc-500">
            <span data-i18n="calc.hargaOut">Harga Mobil</span>
            <strong class="text-white dark:text-zinc-900 font-semibold" id="hargaOut">Rp100.000.000</strong>
          </div>
          <div class="flex justify-between text-zinc-400 dark:text-zinc-500">
            <span data-i18n="calc.dpOut">DP</span>
            <strong class="text-white dark:text-zinc-900 font-semibold" id="dpOut">20% (Rp20.000.000)</strong>
          </div>
          <div class="flex justify-between text-zinc-400 dark:text-zinc-500">
            <span data-i18n="calc.tenorOut">Tenor</span>
            <strong class="text-white dark:text-zinc-900 font-semibold" id="tenorOut">5 Tahun (60 Bulan)</strong>
          </div>
          <div class="flex justify-between text-zinc-400 dark:text-zinc-500 pb-4 border-b border-zinc-700 dark:border-zinc-300">
            <span data-i18n="calc.bungaOut">Bunga</span>
            <strong class="text-white dark:text-zinc-900 font-semibold" id="bungaOut">20% (Rp20.000.000)</strong>
          </div>
        </div>

        <div class="mt-5">
          <div data-i18n="calc.resultLabel" class="text-sm text-zinc-400 dark:text-zinc-500 font-medium mb-2">Jumlah Angsuran / Bulan</div>
          <div class="font-display font-bold text-4xl md:text-[2.6rem]" id="monthlyResult">Rp1.666.667</div>
        </div>
      </div>

      <div class="mt-7 text-xs text-zinc-500 dark:text-zinc-500 leading-relaxed">
        <span data-i18n="calc.disclaimer">Perhitungan memakai bunga tetap 20% dari harga mobil. Simulasi ini hanya estimasi, bukan penawaran resmi.</span>
        <br><button id="resetBtn" data-i18n="calc.reset" class="underline text-zinc-300 dark:text-zinc-600 mt-1">Kembalikan ke nilai awal</button>
      </div>
    </div>
  </div>
</section>

<!-- ============ MOBIL POPULER ============ -->
<section id="populer" class="max-w-7xl mx-auto px-5 md:px-8 py-16 border-t border-zinc-200 dark:border-zinc-800">
  <div class="flex items-end justify-between mb-8 flex-wrap gap-4">
    <div>
      <h2 data-i18n="pop.title" class="font-display font-bold text-2xl md:text-3xl">Mobil populer</h2>
      <p data-i18n="pop.subtitle" class="text-zinc-500 text-sm mt-2">Klik kartu untuk isi otomatis ke kalkulator, atau centang untuk membandingkan.</p>
    </div>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" id="carsGrid"></div>
</section>

<!-- ============ PROMO BANNER ============ -->
<section class="max-w-7xl mx-auto px-5 md:px-8 py-16 border-t border-zinc-200 dark:border-zinc-800">
  <div class="relative w-full rounded-3xl border border-zinc-200 dark:border-zinc-800 bg-zinc-900 dark:bg-zinc-50 overflow-hidden p-8 md:p-12">
    <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
      <div class="max-w-lg">
        <span data-i18n="promo.eyebrow" class="inline-block text-xs font-semibold px-3 py-1.5 rounded-full border border-zinc-700 dark:border-zinc-300 text-zinc-300 dark:text-zinc-600 mb-4">Promo Bulan Ini</span>
        <h3 data-i18n="promo.title" class="font-display font-bold text-2xl md:text-3xl text-white dark:text-zinc-900 mb-3 leading-snug">Bunga spesial mulai 3,9% untuk 5 merek pilihan.</h3>
        <p data-i18n="promo.subtitle" class="text-zinc-400 dark:text-zinc-500 text-sm max-w-md">Berlaku untuk pengajuan kredit baru sampai akhir bulan, syarat &amp; ketentuan berlaku di tiap dealer mitra.</p>
      </div>
      <a href="#kalkulator" data-i18n="promo.cta" class="shrink-0 px-6 py-3 rounded-full bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white text-sm font-semibold hover:opacity-90 transition-opacity">Lihat Simulasi</a>
    </div>
  </div>
</section>

<!-- ============ NEWSLETTER ============ -->
<section class="max-w-7xl mx-auto px-5 md:px-8 py-16 border-t border-zinc-200 dark:border-zinc-800">
  <div class="rounded-3xl bg-zinc-900 dark:bg-zinc-50 text-white dark:text-zinc-900 p-8 md:p-12 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
    <div class="max-w-md">
      <h3 data-i18n="news.title" class="font-display font-bold text-2xl mb-2">Dapat kabar promo & mobil baru</h3>
      <p data-i18n="news.subtitle" class="text-zinc-400 dark:text-zinc-600 text-sm">Kami kirim ringkasan penawaran menarik tiap minggu, tanpa spam.</p>
    </div>
    <form id="newsletterForm" class="flex w-full md:w-auto gap-2">
      <input required type="email" id="newsletterEmail" data-i18n-placeholder="news.placeholder" placeholder="emailkamu@contoh.com"
        class="flex-1 md:w-64 px-4 py-3 rounded-full bg-white/10 dark:bg-zinc-900/5 placeholder:text-zinc-400 dark:placeholder:text-zinc-500 outline-none focus:ring-2 focus:ring-white/30 dark:focus:ring-zinc-900/20 text-sm">
      <button type="submit" data-i18n="news.submit" class="px-6 py-3 rounded-full bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white text-sm font-semibold hover:opacity-90 transition-opacity shrink-0">Daftar</button>
    </form>
  </div>
  <p id="newsletterMsg" class="text-sm text-zinc-500 mt-3 hidden"></p>
</section>

<!-- ============ FOOTER / KONTAK PERUSAHAAN ============ -->
<footer id="kontak" class="border-t border-zinc-200 dark:border-zinc-800 mt-4">
  <div class="max-w-7xl mx-auto px-5 md:px-8 py-14 grid md:grid-cols-5 gap-10">
    <div class="md:col-span-2">
      <div class="flex items-center gap-2 font-display font-bold text-lg mb-3">
        <span class="w-2 h-2 rounded-full bg-zinc-900 dark:bg-zinc-50"></span>
        Overdrive
      </div>
      <p data-i18n="footer.tagline" class="text-sm text-zinc-500 max-w-xs mb-5">Platform jual beli dan simulasi kredit mobil, motor, serta truk di Indonesia.</p>
      <div class="text-sm text-zinc-500 space-y-1 mb-5">
        <p data-i18n="footer.address">Jl. Raya Tengaran No. 1, Kab. Semarang, Jawa Tengah</p>
        <p><span data-i18n="footer.phoneLabel">Telepon</span>: <a href="tel:+62241234567" class="hover:text-zinc-900 dark:hover:text-white">(024) 123-4567</a></p>
        <p><span data-i18n="footer.emailLabel">Email</span>: <a href="mailto:cs.support@overdrive.id" class="hover:text-zinc-900 dark:hover:text-white">cs.support@overdrive.id</a></p>
      </div>
      <div class="flex gap-3">
        <a href="https://instagram.com" target="_blank" rel="noopener" class="w-9 h-9 grid place-items-center rounded-full bg-zinc-100 dark:bg-zinc-900 hover:bg-zinc-200 dark:hover:bg-zinc-800 transition-colors" aria-label="Instagram">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="3.5"/><circle cx="17.2" cy="6.8" r="0.6" fill="currentColor"/></svg>
        </a>
        <a href="https://youtube.com" target="_blank" rel="noopener" class="w-9 h-9 grid place-items-center rounded-full bg-zinc-100 dark:bg-zinc-900 hover:bg-zinc-200 dark:hover:bg-zinc-800 transition-colors" aria-label="YouTube">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="6" width="19" height="12" rx="4"/><path d="M10.5 9.5l5 2.5-5 2.5v-5z" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="https://tiktok.com" target="_blank" rel="noopener" class="w-9 h-9 grid place-items-center rounded-full bg-zinc-100 dark:bg-zinc-900 hover:bg-zinc-200 dark:hover:bg-zinc-800 transition-colors" aria-label="TikTok">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M14 4v9.5a3.5 3.5 0 11-3-3.46M14 4a4.5 4.5 0 004.5 4.5"/></svg>
        </a>
      </div>
    </div>

    <div>
      <div data-i18n="footer.exploreTitle" class="text-sm font-semibold mb-4">Jelajah</div>
      <ul class="space-y-2.5 text-sm text-zinc-500">
        <li><a href="#kategori" data-i18n="footer.newCars" class="hover:text-zinc-900 dark:hover:text-white">Mobil Baru</a></li>
        <li><a href="#kategori" data-i18n="footer.usedCars" class="hover:text-zinc-900 dark:hover:text-white">Mobil Bekas</a></li>
        <li><a href="#kategori" data-i18n="footer.motor" class="hover:text-zinc-900 dark:hover:text-white">Motor</a></li>
        <li><a href="#kategori" data-i18n="footer.truck" class="hover:text-zinc-900 dark:hover:text-white">Truk</a></li>
        <li><a href="#populer" data-i18n="footer.compareCars" class="hover:text-zinc-900 dark:hover:text-white">Bandingkan Mobil</a></li>
      </ul>
    </div>

    <div>
      <div data-i18n="footer.companyTitle" class="text-sm font-semibold mb-4">Perusahaan</div>
      <ul class="space-y-2.5 text-sm text-zinc-500">
        <li><a href="#" class="js-soon hover:text-zinc-900 dark:hover:text-white" data-i18n="footer.about">Tentang Kami</a></li>
        <li><a href="#" class="js-soon hover:text-zinc-900 dark:hover:text-white" data-i18n="footer.careers">Karier</a></li>
        <li><a href="mailto:cs.support@overdrive.id" class="hover:text-zinc-900 dark:hover:text-white" data-i18n="footer.contact">Kontak</a></li>
        <li><a href="#" class="js-soon hover:text-zinc-900 dark:hover:text-white" data-i18n="footer.privacy">Kebijakan Privasi</a></li>
      </ul>
    </div>

    <div>
      <div data-i18n="footer.helpTitle" class="text-sm font-semibold mb-4">Bantuan</div>
      <ul class="space-y-2.5 text-sm text-zinc-500">
        <li><a href="#kalkulator" data-i18n="calc.eyebrow" class="hover:text-zinc-900 dark:hover:text-white">Simulasi Kredit</a></li>
        <li><a href="#" class="js-soon hover:text-zinc-900 dark:hover:text-white" data-i18n="footer.helpCenter">Pusat Bantuan</a></li>
        <li><a href="#" class="js-soon hover:text-zinc-900 dark:hover:text-white" data-i18n="footer.terms">Syarat & Ketentuan</a></li>
        <li><a href="mailto:cs.support@overdrive.id" class="hover:text-zinc-900 dark:hover:text-white">cs.support@overdrive.id</a></li>
      </ul>
    </div>
  </div>

  <div class="border-t border-zinc-200 dark:border-zinc-800">
    <div class="max-w-7xl mx-auto px-5 md:px-8 py-5 flex flex-col sm:flex-row justify-between gap-2 text-xs text-zinc-400">
      <span data-i18n="footer.copyright">© 2026 Overdrive. Seluruh hak cipta dilindungi.</span>
      <span data-i18n="footer.disclaimer">Simulasi kredit hanya estimasi, bukan penawaran resmi.</span>
    </div>
  </div>
</footer>

<!-- ============ COMPARE BAR (floating) ============ -->
<div id="compareBar" class="fixed bottom-5 left-1/2 -translate-x-1/2 z-40 hidden">
  <div class="flex items-center gap-4 bg-zinc-900 dark:bg-zinc-50 text-white dark:text-zinc-900 pl-5 pr-2 py-2 rounded-full shadow-xl">
    <span class="text-sm font-medium" id="compareCount">2 mobil dipilih</span>
    <button id="compareBtn" data-i18n="cmp.compareBtn" class="px-4 py-2 rounded-full bg-white dark:bg-zinc-900 text-zinc-900 dark:text-white text-sm font-semibold">Bandingkan</button>
    <button id="compareClear" data-i18n-aria="cmp.cancel" class="w-8 h-8 grid place-items-center rounded-full hover:bg-white/10 dark:hover:bg-zinc-900/10" aria-label="Batal">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
  </div>
</div>

<!-- ============ COMPARE MODAL ============ -->
<div id="compareModal" class="fixed inset-0 z-50 hidden">
  <div class="absolute inset-0 bg-black/50" id="compareModalBg"></div>
  <div class="relative max-w-2xl mx-auto mt-16 mx-4 bg-white dark:bg-zinc-900 rounded-3xl p-7 md:p-8 max-h-[80vh] overflow-y-auto">
    <div class="flex items-center justify-between mb-6">
      <h3 data-i18n="cmp.title" class="font-display font-bold text-xl">Bandingkan mobil</h3>
      <button id="compareModalClose" class="w-9 h-9 grid place-items-center rounded-full bg-zinc-100 dark:bg-zinc-800">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <div id="compareTable"></div>
  </div>
</div>

<script>
/* =========================================================
   I18N (BAHASA INDONESIA / ENGLISH)
========================================================= */
const translations = {
  id: {
    'site.title': 'Overdrive — Cari, Bandingkan, dan Hitung Kredit Mobil',
    'nav.beranda': 'Beranda',
    'nav.tentang': 'Tentang Perusahaan',
    'nav.cari': 'Cari Mobil',
    'nav.simulasi': 'Simulasi Kredit',
    'nav.populer': 'Mobil Populer',
    'nav.kontak': 'Kontak Perusahaan',
    'about.eyebrow': 'Tentang Perusahaan',
    'about.title': 'Mitra Kredit Mobil Terpercaya Anda.',
    'about.desc': 'Overdrive membantu ribuan pelanggan menemukan mobil yang tepat dan menghitung simulasi kredit secara transparan, bekerja sama dengan ratusan dealer & lembaga pembiayaan resmi di 12+ kota.',
    'about.formLabel1': 'Tipe Mobil',
    'about.formValue1': 'Semua Merek',
    'about.formLabel2': 'Kisaran Harga',
    'about.formValue2': 'Semua Harga',
    'about.formCta': 'Hitung Kredit',
    'about.link1': 'Beli Mobil',
    'about.link2': 'Kredit Mobil',
    'about.badgeTop': 'Layanan Andalan Kami',
    'about.card1Title': 'Cepat Cair',
    'about.card1Desc': 'Approval kredit dalam hitungan jam, dokumen minim.',
    'about.card2Title': 'Bunga Ringan',
    'about.card2Desc': 'Mulai dari 20% flat per tahun, tanpa biaya tersembunyi.',
    'about.unitCity': 'Jakarta Barat, Indonesia',
    'about.unitPrice': 'Rp280.000.000',
    'search.placeholder': 'Cari model mobil…',
    'a11y.theme': 'Ganti tema gelap/terang',
    'hero.eyebrow': 'Jual Beli & Simulasi Kredit Kendaraan',
    'hero.title': 'Temukan mobil yang layak masuk garasimu.',
    'hero.subtitle': 'Ribuan mobil baru dan bekas, kalkulator kredit yang update langsung, dan fitur bandingkan biar kamu nggak salah pilih.',
    'hero.cta1': 'Mulai Cari Mobil',
    'hero.cta2': 'Hitung Cicilan',
    'hero.stat1Label': 'Listing aktif',
    'hero.stat2Label': 'Dealer mitra',
    'hero.stat3Label': 'Rating pengguna',
    'cat.title': 'Jelajah berdasarkan tipe bodi',
    'cat.subtitle': 'Koleksi mobil dikelompokkan biar gampang dibandingkan.',
    'brand.title': 'Merek populer',
    'brand.subtitle': '12 merek dengan listing terbanyak bulan ini.',
    'calc.eyebrow': 'Simulasi Kredit',
    'calc.title': 'Berapa cicilan bulanan kamu?',
    'calc.subtitle': 'Pilih mobil atau masukkan harga manual, uang muka, dan tenor — hasilnya langsung berubah.',
    'calc.brandLabel': 'Pilih Merek Mobil',
    'calc.brandDefault': '-- Semua Merek --',
    'calc.modelLabel': 'Pilih Model Mobil',
    'calc.modelDefault': '-- Pilih Mobil --',
    'calc.priceLabel': 'Harga kendaraan (OTR)',
    'calc.dpLabel': 'DP (Persen)',
    'calc.tenorLabel': 'Tenor (Tahun)',
    'calc.tahunUnit': 'Tahun',
    'calc.bulanUnit': 'Bulan',
    'calc.rateValue': '20% / tahun',
    'calc.rateLabel': 'Suku bunga flat / tahun',
    'calc.resultLabel': 'Jumlah Angsuran / Bulan',
    'calc.hitung': 'Hitung',
    'calc.hargaOut': 'Harga Mobil',
    'calc.dpOut': 'DP',
    'calc.tenorOut': 'Tenor',
    'calc.bungaOut': 'Bunga',
    'calc.carPrefix': 'Mobil: ',
    'calc.disclaimer': 'Perhitungan memakai bunga tetap 20% dari harga mobil. Simulasi ini hanya estimasi, bukan penawaran resmi.',
    'calc.reset': 'Kembalikan ke nilai awal',
    'tenor.unit': 'bln',
    'pop.title': 'Mobil populer',
    'pop.subtitle': 'Klik kartu untuk isi otomatis ke kalkulator, atau centang untuk membandingkan.',
    'pop.otr': 'OTR',
    'pop.perMonth': '/bln',
    'pop.compare': 'Bandingkan',
    'pop.empty': 'Tidak ada mobil yang cocok dengan pencarian.',
    'promo.eyebrow': 'Promo Bulan Ini',
    'promo.title': 'Bunga spesial mulai 3,9% untuk 5 merek pilihan.',
    'promo.subtitle': 'Berlaku untuk pengajuan kredit baru sampai akhir bulan, syarat & ketentuan berlaku di tiap dealer mitra.',
    'promo.cta': 'Lihat Simulasi',
    'news.title': 'Dapat kabar promo & mobil baru',
    'news.subtitle': 'Kami kirim ringkasan penawaran menarik tiap minggu, tanpa spam.',
    'news.placeholder': 'emailkamu@contoh.com',
    'news.submit': 'Daftar',
    'news.success': 'Terdaftar! Update akan dikirim ke ',
    'cmp.compareBtn': 'Bandingkan',
    'cmp.cancel': 'Batal',
    'cmp.title': 'Bandingkan mobil',
    'cmp.priceLabel': 'Harga OTR',
    'cmp.monthlyLabel': 'Cicilan / bln',
    'cmp.tenorLabel': 'Tenor',
    'cmp.months': 'bulan',
    'cmp.alertNeedTwo': 'Pilih 2 mobil dulu untuk dibandingkan.',
    'cmp.oneSelected': ' mobil dipilih',
    'cmp.manySelected': ' mobil dipilih',
    'toast.notAvailable': (name) => `Halaman "${name}" belum tersedia.`,
    'footer.tagline': 'Platform jual beli dan simulasi kredit mobil, motor, serta truk di Indonesia.',
    'footer.address': 'Jl. Raya Tengaran No. 1, Kab. Semarang, Jawa Tengah',
    'footer.phoneLabel': 'Telepon',
    'footer.emailLabel': 'Email',
    'footer.exploreTitle': 'Jelajah',
    'footer.newCars': 'Mobil Baru',
    'footer.usedCars': 'Mobil Bekas',
    'footer.motor': 'Motor',
    'footer.truck': 'Truk',
    'footer.compareCars': 'Bandingkan Mobil',
    'footer.companyTitle': 'Perusahaan',
    'footer.about': 'Tentang Kami',
    'footer.careers': 'Karier',
    'footer.contact': 'Kontak',
    'footer.privacy': 'Kebijakan Privasi',
    'footer.helpTitle': 'Bantuan',
    'footer.helpCenter': 'Pusat Bantuan',
    'footer.terms': 'Syarat & Ketentuan',
    'footer.copyright': '© 2026 Overdrive. Seluruh hak cipta dilindungi.',
    'footer.disclaimer': 'Simulasi kredit hanya estimasi, bukan penawaran resmi.',
  },
  en: {
    'site.title': 'Overdrive — Search, Compare, and Calculate Car Loans',
    'nav.beranda': 'Home',
    'nav.tentang': 'About Us',
    'nav.cari': 'Find Cars',
    'nav.simulasi': 'Loan Calculator',
    'nav.populer': 'Popular Cars',
    'nav.kontak': 'Contact Us',
    'about.eyebrow': 'About the Company',
    'about.title': 'Your Trusted Car Loan Partner.',
    'about.desc': 'Overdrive helps thousands of customers find the right car and calculate loan simulations transparently, partnering with hundreds of dealers & licensed financing institutions in 12+ cities.',
    'about.formLabel1': 'Car Type',
    'about.formValue1': 'All Brands',
    'about.formLabel2': 'Price Range',
    'about.formValue2': 'Any Price',
    'about.formCta': 'Calculate Loan',
    'about.link1': 'Buy a Car',
    'about.link2': 'Car Financing',
    'about.badgeTop': 'Our Special Service',
    'about.card1Title': 'Fast Approval',
    'about.card1Desc': 'Loan approval within hours, minimal documents.',
    'about.card2Title': 'Low Interest',
    'about.card2Desc': 'Starting from 20% flat per year, no hidden fees.',
    'about.unitCity': 'West Jakarta, Indonesia',
    'about.unitPrice': 'Rp280,000,000',
    'search.placeholder': 'Search car model…',
    'a11y.theme': 'Toggle dark/light theme',
    'hero.eyebrow': 'Buy, Sell & Simulate Vehicle Financing',
    'hero.title': 'Find your next car, with the monthly payment already worked out.',
    'hero.subtitle': 'Thousands of new and used cars, a loan calculator that updates instantly, and a compare tool so you choose with confidence.',
    'hero.cta1': 'Browse Cars',
    'hero.cta2': 'Calculate Payment',
    'hero.stat1Label': 'Active listings',
    'hero.stat2Label': 'Partner dealers',
    'hero.stat3Label': 'User rating',
    'cat.title': 'Browse by body type',
    'cat.subtitle': 'Cars grouped by type, so comparing is easy.',
    'brand.title': 'Popular brands',
    'brand.subtitle': '12 brands with the most listings this month.',
    'calc.eyebrow': 'Loan Calculator',
    'calc.title': "What's your monthly payment?",
    'calc.subtitle': 'Pick a car or enter the price, down payment, and term manually — results update instantly.',
    'calc.brandLabel': 'Select Brand',
    'calc.brandDefault': '-- All Brands --',
    'calc.modelLabel': 'Select Model',
    'calc.modelDefault': '-- Select a Car --',
    'calc.priceLabel': 'Vehicle price (OTR)',
    'calc.dpLabel': 'DP (Percent)',
    'calc.tenorLabel': 'Term (Years)',
    'calc.tahunUnit': 'Years',
    'calc.bulanUnit': 'Months',
    'calc.rateValue': '20% / year',
    'calc.rateLabel': 'Interest (fixed)',
    'calc.resultLabel': 'Monthly Installment',
    'calc.hitung': 'Calculate',
    'calc.hargaOut': 'Car Price',
    'calc.dpOut': 'Down Payment',
    'calc.tenorOut': 'Term',
    'calc.bungaOut': 'Interest',
    'calc.carPrefix': 'Car: ',
    'calc.disclaimer': 'Calculated using a fixed 20% interest on the car price. This simulation is an estimate only, not an official offer.',
    'calc.reset': 'Reset to default',
    'tenor.unit': 'mo',
    'pop.title': 'Popular cars',
    'pop.subtitle': 'Click a card to auto-fill the calculator, or check the box to compare.',
    'pop.otr': 'OTR',
    'pop.perMonth': '/mo',
    'pop.compare': 'Compare',
    'pop.empty': 'No cars match your search.',
    'promo.eyebrow': "This Month's Offer",
    'promo.title': 'Special rates from 3.9% on 5 select brands.',
    'promo.subtitle': 'Valid for new financing applications through the end of the month; terms and conditions apply per partner dealer.',
    'promo.cta': 'See Calculator',
    'news.title': 'Get news on offers & new cars',
    'news.subtitle': 'We send a weekly roundup of good deals, no spam.',
    'news.placeholder': 'youremail@example.com',
    'news.submit': 'Subscribe',
    'news.success': 'Subscribed! Updates will be sent to ',
    'cmp.compareBtn': 'Compare',
    'cmp.cancel': 'Cancel',
    'cmp.title': 'Compare cars',
    'cmp.priceLabel': 'OTR Price',
    'cmp.monthlyLabel': 'Payment / mo',
    'cmp.tenorLabel': 'Term',
    'cmp.months': 'months',
    'cmp.alertNeedTwo': 'Select 2 cars first to compare.',
    'cmp.oneSelected': ' car selected',
    'cmp.manySelected': ' cars selected',
    'toast.notAvailable': (name) => `The "${name}" page isn't available yet.`,
    'footer.tagline': 'A marketplace for buying, selling, and simulating financing for cars, motorcycles, and trucks in Indonesia.',
    'footer.address': 'Jl. Raya Tengaran No. 1, Semarang Regency, Central Java',
    'footer.phoneLabel': 'Phone',
    'footer.emailLabel': 'Email',
    'footer.exploreTitle': 'Explore',
    'footer.newCars': 'New Cars',
    'footer.usedCars': 'Used Cars',
    'footer.motor': 'Motorcycles',
    'footer.truck': 'Trucks',
    'footer.compareCars': 'Compare Cars',
    'footer.companyTitle': 'Company',
    'footer.about': 'About Us',
    'footer.careers': 'Careers',
    'footer.contact': 'Contact',
    'footer.privacy': 'Privacy Policy',
    'footer.helpTitle': 'Support',
    'footer.helpCenter': 'Help Center',
    'footer.terms': 'Terms & Conditions',
    'footer.copyright': '© 2026 Overdrive. All rights reserved.',
    'footer.disclaimer': 'This loan calculator is only an estimate, not an official offer.',
  }
};

let currentLang = localStorage.getItem('overdrive-lang') === 'en' ? 'en' : 'id';

function t(key){
  const v = translations[currentLang][key];
  return v === undefined ? key : v;
}

function applyStaticI18n(){
  document.documentElement.lang = currentLang;
  document.title = t('site.title');
  document.querySelectorAll('[data-i18n]').forEach(el=>{
    el.textContent = t(el.getAttribute('data-i18n'));
  });
  document.querySelectorAll('[data-i18n-placeholder]').forEach(el=>{
    el.setAttribute('placeholder', t(el.getAttribute('data-i18n-placeholder')));
  });
  document.querySelectorAll('[data-i18n-aria]').forEach(el=>{
    el.setAttribute('aria-label', t(el.getAttribute('data-i18n-aria')));
  });
  document.querySelectorAll('[data-lang-btn]').forEach(btn=>{
    const active = btn.getAttribute('data-lang-btn') === currentLang;
    btn.classList.toggle('bg-zinc-900', active);
    btn.classList.toggle('dark:bg-zinc-50', active);
    btn.classList.toggle('text-white', active);
    btn.classList.toggle('dark:text-zinc-900', active);
    btn.classList.toggle('text-zinc-500', !active);
    btn.classList.toggle('dark:text-zinc-400', !active);
  });
  document.querySelectorAll('.tenor-btn').forEach(btn=>{
    btn.textContent = btn.dataset.months + ' ' + t('tenor.unit');
  });
}

function setLanguage(lang){
  currentLang = lang === 'en' ? 'en' : 'id';
  localStorage.setItem('overdrive-lang', currentLang);
  applyStaticI18n();
  populateCars(brandSelect.value);
  syncCalcFromState();
  renderCars(document.getElementById('searchInput').value);
  updateCompareBar();
}

document.querySelectorAll('[data-lang-btn]').forEach(btn=>{
  btn.addEventListener('click', ()=> setLanguage(btn.getAttribute('data-lang-btn')));
});

/* =========================================================
   DARK MODE TOGGLE
========================================================= */
const darkToggle = document.getElementById('darkToggle');
function setDark(on){
  document.documentElement.classList.toggle('dark', on);
  localStorage.setItem('overdrive-theme', on ? 'dark' : 'light');
}
setDark(localStorage.getItem('overdrive-theme') === 'dark');
darkToggle.addEventListener('click', ()=>{
  setDark(!document.documentElement.classList.contains('dark'));
});

/* =========================================================
   GAMBAR SLIDER (HERO)
========================================================= */
const heroSlides = document.querySelectorAll('.hero-slide');
const heroDots = document.querySelectorAll('.hero-dot');
let heroCurrent = 0;
function showHeroSlide(i){
  heroSlides.forEach((s,idx)=> s.classList.toggle('opacity-100', idx===i) || s.classList.toggle('opacity-0', idx!==i));
  heroDots.forEach((d,idx)=>{
    d.classList.toggle('bg-white', idx===i);
    d.classList.toggle('bg-white/40', idx!==i);
  });
  heroCurrent = i;
}
heroDots.forEach(d => d.addEventListener('click', ()=> showHeroSlide(parseInt(d.dataset.i,10))));
setInterval(()=> showHeroSlide((heroCurrent+1) % heroSlides.length), 4000);

/* =========================================================
   DATA MOBIL
========================================================= */
const cars = [
  { brand:'Honda', name:'Honda Brio', price:220000000, months:36, image:'img/home.jpg' },
  { brand:'Toyota', name:'Toyota Avanza Veloz', price:280000000, months:36, image:'img/velos.jpg' },
  { brand:'Daihatsu', name:'Daihatsu Sigra', price:168000000, months:36, image:'img/sigra.jpg' },
  { brand:'Mitsubishi', name:'Mitsubishi Xforce', price:320000000, months:36, image:'img/mitsubisiforce.jpg' },
  { brand:'Toyota', name:'Toyota Rush', price:300000000, months:36, image:'img/rush.jpg' },
  { brand:'Hyundai', name:'Hyundai Creta', price:340000000, months:36, image:'img/hyundaicreta.jpg' },
  { brand:'Wuling', name:'Wuling Confero', price:210000000, months:36, image:'img/wulingconfero.jpg' },
  { brand:'BYD', name:'BYD Seal', price:600000000, months:36, image:'img/bydseal.jpg' },
  { brand:'Toyota', name:'Toyota Innova Zenix', price:430000000, months:36, image:'img/zenix.jpg' },
  { brand:'Suzuki', name:'Suzuki XL7', price:260000000, months:36, image:'img/XL7.jpg' },
  { brand:'Daihatsu', name:'Daihatsu Terios', price:290000000, months:36, image:'img/terios.jpg' },
  { brand:'Nissan', name:'Nissan Magnite', price:250000000, months:36, image:'img/magnite.jpg' },
];

/* =========================================================
   FORMAT HELPERS
========================================================= */
function fmtRupiah(n){ return 'Rp ' + Math.round(n).toLocaleString('id-ID'); }
function fmtNumber(n){ return Math.round(n).toLocaleString('id-ID'); }
function parseNumber(str){ const d = String(str).replace(/[^0-9]/g,''); return d ? parseInt(d,10) : 0; }
function clamp(v,min,max){ return Math.max(min, Math.min(max, v)); }
const BUNGA_PERSEN = 20; // bunga tetap 20% dari harga mobil, sesuai ketentuan
function monthlyPayment(price, dpPercent, months){
  const dpNominal = price * dpPercent / 100;
  const bungaNominal = price * (BUNGA_PERSEN / 100);
  const totalTagihan = (price + bungaNominal) - dpNominal;
  return {
    dpNominal,
    bungaNominal,
    totalTagihan,
    monthly: months > 0 ? totalTagihan / months : 0
  };
}

/* =========================================================
   CALCULATOR LOGIC
========================================================= */
const priceSlider = document.getElementById('priceSlider');
const priceInput = document.getElementById('priceInput');
const dpSelect = document.getElementById('dpSelect');
const tenorGroup = document.getElementById('tenorGroup');
const tenorChecks = document.querySelectorAll('.tenor-check');
const resetBtn = document.getElementById('resetBtn');
const monthlyResult = document.getElementById('monthlyResult');
const selectedCarLabel = document.getElementById('selectedCarLabel');
const hargaOut = document.getElementById('hargaOut');
const dpOut = document.getElementById('dpOut');
const tenorOut = document.getElementById('tenorOut');
const bungaOut = document.getElementById('bungaOut');

const brandSelect = document.getElementById('brandSelect');
const carSelect = document.getElementById('carSelect');

const DEFAULTS = { price: 250000000, dpPercent: 20, years: 5, carName: null };
let state = { ...DEFAULTS };

// Populate Merek
const uniqueBrands = [...new Set(cars.map(c => c.brand))];
uniqueBrands.forEach(b => {
  const opt = document.createElement('option');
  opt.value = b;
  opt.textContent = b;
  brandSelect.appendChild(opt);
});

// Update Model berdasarkan Merek
function populateCars(filterBrand = '') {
  const currentValue = carSelect.value;
  carSelect.innerHTML = `<option value="">${t('calc.modelDefault')}</option>`;
  const filtered = filterBrand ? cars.filter(c => c.brand === filterBrand) : cars;
  filtered.forEach(c => {
    const opt = document.createElement('option');
    opt.value = c.name;
    opt.textContent = `${c.name} (${fmtRupiah(c.price)})`;
    carSelect.appendChild(opt);
  });
  if(currentValue) carSelect.value = currentValue;
}
populateCars();

brandSelect.addEventListener('change', (e) => {
  populateCars(e.target.value);
  carSelect.value = '';
});

carSelect.addEventListener('change', (e) => {
  const selectedName = e.target.value;
  const found = cars.find(c => c.name === selectedName);
  if (found) {
    state.price = found.price;
    state.carName = found.name;
    brandSelect.value = found.brand;
    syncCalcFromState();
  }
});

function setActiveTenor(years){
  tenorChecks.forEach(chk=>{
    chk.checked = parseInt(chk.dataset.years,10) === years;
  });
}

function syncCalcFromState(){
  priceSlider.value = clamp(state.price, parseInt(priceSlider.min,10), parseInt(priceSlider.max,10));
  priceInput.value = fmtNumber(state.price);
  dpSelect.value = state.dpPercent;
  setActiveTenor(state.years);
  if(state.carName){
    selectedCarLabel.textContent = t('calc.carPrefix') + state.carName;
    selectedCarLabel.classList.remove('hidden');
    carSelect.value = state.carName;
  } else {
    selectedCarLabel.classList.add('hidden');
    carSelect.value = '';
  }
  calculate();
}

function calculate(){
  const months = state.years * 12; // jumlah tenor dijadikan satuan bulan
  const r = monthlyPayment(state.price, state.dpPercent, months);
  hargaOut.textContent = fmtRupiah(state.price);
  dpOut.textContent = state.dpPercent + '% (' + fmtRupiah(r.dpNominal) + ')';
  tenorOut.textContent = state.years + ' ' + t('calc.tahunUnit') + ' (' + months + ' ' + t('calc.bulanUnit') + ')';
  bungaOut.textContent = BUNGA_PERSEN + '% (' + fmtRupiah(r.bungaNominal) + ')';
  monthlyResult.textContent = fmtRupiah(r.monthly);
}

priceSlider.addEventListener('input', ()=>{
  state.price = parseInt(priceSlider.value,10);
  priceInput.value = fmtNumber(state.price);
  clearCarLabel();
  calculate();
});
priceInput.addEventListener('input', ()=>{
  const v = clamp(parseNumber(priceInput.value), 0, 5000000000);
  state.price = v;
  priceSlider.value = clamp(v, parseInt(priceSlider.min,10), parseInt(priceSlider.max,10));
  clearCarLabel();
  calculate();
});
priceInput.addEventListener('blur', ()=>{ priceInput.value = fmtNumber(state.price); });

dpSelect.addEventListener('change', ()=>{
  state.dpPercent = parseInt(dpSelect.value,10);
  calculate();
});

// Tenor: hanya boleh satu checkbox aktif, sesuai ketentuan soal
tenorChecks.forEach(chk=>{
  chk.addEventListener('change', ()=>{
    if(chk.checked){
      tenorChecks.forEach(other=>{ if(other !== chk) other.checked = false; });
      state.years = parseInt(chk.dataset.years,10);
    } else {
      state.years = 0;
    }
    calculate();
  });
});

function clearCarLabel(){
  state.carName = null;
  selectedCarLabel.classList.add('hidden');
  carSelect.value = '';
}

resetBtn.addEventListener('click', ()=>{
  state = { ...DEFAULTS };
  brandSelect.value = '';
  populateCars();
  syncCalcFromState();
});

syncCalcFromState();

const hitungBtn = document.getElementById('hitungBtn');
hitungBtn.addEventListener('click', ()=>{
  calculate();
  showToast(t('calc.hitung') + ' ✓');
});

/* =========================================================
   BODY TYPE CATEGORIES
========================================================= */
const bodyTypes = ['SUV','MPV','Sedan','Hatchback','Crossover','Pickup','Van','Wagon','Coupe','Convertible'];
const bodyTypeGrid = document.getElementById('bodyTypeGrid');
bodyTypes.forEach(type=>{
  const el = document.createElement('a');
  el.href = '#populer';
  el.className = 'group rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 p-4 flex flex-col items-center gap-3 hover:border-zinc-400 dark:hover:border-zinc-600 transition-colors';
  el.innerHTML = `
    <div class="w-full aspect-square rounded-xl bg-zinc-100 dark:bg-zinc-800 grid place-items-center">
      <svg class="w-7 h-7 text-zinc-500 dark:text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13l1.5-4.5A2 2 0 016.4 7h11.2a2 2 0 011.9 1.5L21 13M3 13v4a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-4M3 13h18M6.5 15.5h.01M17.5 15.5h.01"/></svg>
    </div>
    <span class="text-sm font-semibold">${type}</span>
  `;
  bodyTypeGrid.appendChild(el);
});

/* =========================================================
   BRANDS
========================================================= */
const brands = ['Toyota','Honda','Daihatsu','Mitsubishi','Suzuki','Hyundai','Wuling','Kia','BMW','Mazda','Isuzu','BYD'];
const brandGrid = document.getElementById('brandGrid');
brands.forEach(brand=>{
  const el = document.createElement('a');
  el.href = '#kalkulator';
  el.className = 'rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 p-4 flex flex-col items-center gap-3 hover:border-zinc-400 dark:hover:border-zinc-600 transition-colors';
  el.innerHTML = `
    <div class="w-14 h-14 rounded-full bg-zinc-900 dark:bg-zinc-50 text-white dark:text-zinc-900 grid place-items-center font-display font-bold text-sm">
      ${brand.slice(0,2).toUpperCase()}
    </div>
    <span class="text-xs font-semibold text-center">${brand}</span>
  `;
  el.addEventListener('click', ()=>{
    brandSelect.value = brand;
    populateCars(brand);
  });
  brandGrid.appendChild(el);
});

/* =========================================================
   POPULAR CARS + COMPARE + SEARCH FILTER
========================================================= */
const carsGrid = document.getElementById('carsGrid');
const selectedCompare = new Set();

function renderCars(filter=''){
  carsGrid.innerHTML = '';
  const f = filter.trim().toLowerCase();
  cars.filter(c => c.name.toLowerCase().includes(f)).forEach(car=>{
    const r = monthlyPayment(car.price, 20, car.months);
    const card = document.createElement('div');
    card.className = 'rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 overflow-hidden hover:border-zinc-400 dark:hover:border-zinc-600 transition-colors';
    card.innerHTML = `
      <div class="relative block w-full aspect-[4/3] overflow-hidden">
       <img src="${car.image}" alt="${car.name}" class="w-full h-full object-cover">
        <label class="absolute top-3 left-3 flex items-center gap-1.5 bg-white/90 dark:bg-zinc-900/90 backdrop-blur rounded-full pl-2 pr-3 py-1.5 cursor-pointer">
          <input type="checkbox" class="compare-check accent-zinc-900 dark:accent-zinc-50 w-3.5 h-3.5" data-name="${car.name}">
          <span class="text-xs font-medium">${t('pop.compare')}</span>
        </label>
      </div>
      <button class="fill-calc w-full text-left p-4 block" data-price="${car.price}" data-months="${car.months}" data-name="${car.name}">
        <div class="text-sm font-semibold mb-1">${car.name}</div>
        <div class="text-xs text-zinc-500 mb-2.5">${fmtRupiah(car.price)} ${t('pop.otr')}</div>
        <div class="text-sm font-bold">${fmtRupiah(r.monthly)}<span class="text-zinc-400 font-normal">${t('pop.perMonth')}</span></div>
      </button>
    `;
    carsGrid.appendChild(card);
  });

  if(carsGrid.children.length === 0){
    carsGrid.innerHTML = `<div class="col-span-full text-center text-sm text-zinc-500 py-10">${t('pop.empty')}</div>`;
  }
}
renderCars();

document.getElementById('searchInput').addEventListener('input', (e)=>{
  renderCars(e.target.value);
  if(e.target.value.trim().length > 0){
    const target = document.getElementById('populer');
    const rect = target.getBoundingClientRect();
    const inView = rect.top < window.innerHeight * 0.6 && rect.bottom > 100;
    if(!inView){
      target.scrollIntoView({behavior:'smooth', block:'start'});
    }
  }
});

carsGrid.addEventListener('click', (e)=>{
  const fillBtn = e.target.closest('.fill-calc');
  if(fillBtn){
    const carName = fillBtn.dataset.name;
    const found = cars.find(c => c.name === carName);
    if(found){
      state.price = found.price;
      state.carName = found.name;
      brandSelect.value = found.brand;
      populateCars(found.brand);
      syncCalcFromState();
    }
    document.getElementById('kalkulator').scrollIntoView({behavior:'smooth', block:'start'});
  }
});

carsGrid.addEventListener('change', (e)=>{
  if(!e.target.classList.contains('compare-check')) return;
  const name = e.target.dataset.name;
  if(e.target.checked){
    if(selectedCompare.size >= 2){ e.target.checked = false; return; }
    selectedCompare.add(name);
  } else {
    selectedCompare.delete(name);
  }
  updateCompareBar();
});

const compareBar = document.getElementById('compareBar');
const compareCount = document.getElementById('compareCount');
function updateCompareBar(){
  if(selectedCompare.size >= 1){
    compareBar.classList.remove('hidden');
    compareCount.textContent = selectedCompare.size + (selectedCompare.size === 1 ? t('cmp.oneSelected') : t('cmp.manySelected'));
  } else {
    compareBar.classList.add('hidden');
  }
}

document.getElementById('compareClear').addEventListener('click', ()=>{
  selectedCompare.clear();
  document.querySelectorAll('.compare-check').forEach(c=>c.checked=false);
  updateCompareBar();
});

const compareModal = document.getElementById('compareModal');
document.getElementById('compareBtn').addEventListener('click', ()=>{
  if(selectedCompare.size < 2){
    alert(t('cmp.alertNeedTwo'));
    return;
  }
  const selectedCars = cars.filter(c => selectedCompare.has(c.name));
  const table = document.getElementById('compareTable');
  table.innerHTML = `
    <div class="grid grid-cols-2 gap-4">
      ${selectedCars.map(car=>{
        const r = monthlyPayment(car.price, 20, car.months);
        return `
          <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 p-4">
            <div class="font-semibold text-sm mb-3">${car.name}</div>
            <div class="space-y-2 text-sm">
              <div class="flex justify-between text-zinc-500"><span>${t('cmp.priceLabel')}</span></div>
              <div class="font-bold">${fmtRupiah(car.price)}</div>
              <div class="flex justify-between text-zinc-500 pt-2"><span>${t('cmp.monthlyLabel')}</span></div>
              <div class="font-bold">${fmtRupiah(r.monthly)}</div>
              <div class="flex justify-between text-zinc-500 pt-2"><span>${t('cmp.tenorLabel')}</span></div>
              <div class="font-bold">${car.months} ${t('cmp.months')}</div>
            </div>
          </div>`;
      }).join('')}
    </div>
  `;
  compareModal.classList.remove('hidden');
});
document.getElementById('compareModalClose').addEventListener('click', ()=> compareModal.classList.add('hidden'));
document.getElementById('compareModalBg').addEventListener('click', ()=> compareModal.classList.add('hidden'));

/* =========================================================
   NEWSLETTER
========================================================= */
document.getElementById('newsletterForm').addEventListener('submit', (e)=>{
  e.preventDefault();
  const email = document.getElementById('newsletterEmail').value;
  const msg = document.getElementById('newsletterMsg');
  msg.textContent = `${t('news.success')}${email}.`;
  msg.classList.remove('hidden');
  e.target.reset();
});

/* =========================================================
   TOAST
========================================================= */
let toastTimer;
function showToast(text){
  let toast = document.getElementById('appToast');
  if(!toast){
    toast = document.createElement('div');
    toast.id = 'appToast';
    toast.className = 'fixed bottom-5 right-5 z-50 px-4 py-3 rounded-xl bg-zinc-900 dark:bg-zinc-50 text-white dark:text-zinc-900 text-sm font-medium shadow-xl transition-opacity duration-200';
    document.body.appendChild(toast);
  }
  toast.textContent = text;
  toast.style.opacity = '1';
  clearTimeout(toastTimer);
  toastTimer = setTimeout(()=>{ toast.style.opacity = '0'; }, 2200);
}
document.body.addEventListener('click', (e)=>{
  const a = e.target.closest('a.js-soon');
  if(!a) return;
  e.preventDefault();
  showToast(t('toast.notAvailable')(a.textContent.trim()));
});

/* =========================================================
   INITIAL LANGUAGE APPLY
========================================================= */
applyStaticI18n();
</script>

</body>
</html>