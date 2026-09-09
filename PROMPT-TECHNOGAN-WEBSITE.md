# Brief & Prompt Pembuatan Website — Technogan

Dokumen ini berisi dua bagian:

1. **Hasil analisa struktur & pola desain** website referensi: [hikvision.com/id](https://www.hikvision.com/id/)
2. **Prompt final** (siap dipakai) untuk membangun website Technogan dengan Laravel + Tailwind fullstack.

---

## 1. Analisa Website Referensi (Hikvision Indonesia)

Diamati langsung via browser (homepage + halaman Produk), 2026-09-06.

### Struktur Navigasi

- Header **sticky**: transparan di atas hero, berubah jadi solid putih saat scroll.
- Logo kiri, menu utama tengah/kanan: `Produk`, `Solusi`, `Dukungan`, `Teknologi`, `Mitra`.
- Ikon kanan: search, akun/login, pemilih bahasa/negara.
- Menu-menu tersebut mengarah ke halaman kategori (bukan dropdown mega-menu di homepage, tapi landing page tersendiri per menu).

### Pola Homepage (urutan section)

1. **Hero full-width** — background gelap (navy/hitam), headline besar bold, subheadline, satu tombol CTA warna merah berbentuk pill ("Unduh Sekarang").
2. **Carousel produk unggulan** — kartu horizontal scroll, foto produk dengan overlay gradient gelap, judul produk di pojok bawah kartu. Bisa di-drag/scroll ke samping.
3. **"Teknologi Inti"** — section full-black, layout split (visual kiri, teks kanan): judul, deskripsi singkat, tombol CTA outline (bukan solid), link "View more".
4. **Success Story / Studi Kasus** — slider full-width dengan foto besar sebagai background, teks overlay (kategori, judul, tag terkait), navigasi panah + dot indicator.
5. **CSR / Nilai Perusahaan** — grid 2 kolom, kartu besar dengan gradient overlay di atas foto, judul singkat di bawah tiap kartu.
6. **News/Blog terbaru** (sekilas terlihat sebelum footer).
7. **Footer gelap (abu tua)** — 4 kolom link: _Tentang Kami_, _Ruang Berita_, _Mitra_, _Quick Links_; baris ikon sosial media (FB, IG, X, LinkedIn, YouTube); tombol "Contact Us" & "Subscribe Newsletter"; bar bawah berisi copyright + link Privacy/Cookie Policy.
8. **Floating action buttons** kanan layar (fixed): ikon support/CS, ikon partner portal, tombol scroll-to-top.

### Pola Halaman Kategori (contoh: halaman Produk)

- Hero khusus per halaman: background gelap navy dengan grafis animasi (wave/particle), headline + subheadline + tombol "Hubungi Kami".
- Di bawah hero: tab navigasi (Kategori Produk / Tools / Artikel Terkait) sebelum grid konten.

### Bahasa Visual & UI

- **Warna dominan**: putih/terang untuk section konten biasa, **navy/hitam pekat** untuk hero & section yang menonjolkan teknologi/AI, **merah** sebagai satu-satunya warna aksen CTA.
- **Tipografi**: heading tebal (bold, besar), body text bersih, kontras tinggi di atas background gelap.
- **Komponen berulang**: kartu dengan gradient overlay di atas foto, carousel/slider di banyak section, tombol pill (solid untuk primary CTA, outline untuk secondary), banyak whitespace, fotografi produk berkualitas tinggi jadi elemen visual utama (bukan ilustrasi).
- **Kesan keseluruhan**: korporat, teknologi tinggi, terpercaya (trust), clean, product-led.

### Insight yang Diadaptasi untuk Technogan

Pola struktural di atas relevan dipakai (nav sticky, hero dark dengan CTA jelas, carousel layanan, section teknologi/keunggulan dengan split layout, studi kasus/portofolio klien, footer lengkap), tapi:

- Kategori "Produk" Hikvision → diganti **"Layanan"** (IT Infrastructure, Networking, CCTV, Computer Service).
- Warna merah aksen → diganti sesuai brand Technogan (lihat palet di bawah).
- Konten B2B hardware/AI → diganti konten jasa IT solution & support.
- **Tanpa efek parallax scrolling.** Setiap "section" panjang di homepage
  Hikvision (Produk, Solusi, Teknologi, dst) yang di sana hanya berupa
  anchor-scroll dalam satu halaman, di Technogan diwujudkan sebagai
  **halaman terpisah dengan navigasi klik biasa** (multi-page navigation),
  bukan one-page scroll dengan animasi parallax. Lihat catatan di bagian 2
  poin "Navigasi & Transisi Halaman".

---

## 2. PROMPT FINAL — Pembuatan Website Technogan

> Gunakan prompt di bawah ini apa adanya sebagai instruksi pembuatan website (misalnya ditempel di sesi Claude Code berikutnya untuk mulai development).

```
Buatkan website company profile untuk "Technogan", sebuah perusahaan jasa IT
Solution & Support, dengan tech stack Laravel fullstack + Tailwind CSS + MySQL.
Desain mengadaptasi pola struktural website hikvision.com/id (nav sticky, hero
dark dengan CTA tegas, carousel layanan, section keunggulan split-layout,
studi kasus/portofolio, footer lengkap) tapi dengan identitas visual & konten
Technogan sendiri.

## 1. TECH STACK
- Backend: Laravel 13.x (PHP 8.3+), struktur MVC standar, Eloquent ORM.
- Frontend: Blade templating + Tailwind CSS 3.x (via Vite), Alpine.js untuk
  interaktivitas ringan (dropdown, carousel, mobile menu, modal).
- Database: MySQL 8, migration + seeder untuk semua tabel.
- Admin panel/CMS: Laravel Filament (atau Laravel Breeze + custom dashboard
  jika Filament dianggap berlebihan) untuk mengelola konten tanpa coding.
- Auth admin: Laravel default auth (Breeze), role sederhana (admin only,
  tidak perlu multi-role kompleks).
- Image handling: Intervention Image atau Laravel media library untuk
  resize/optimize upload gambar layanan, portofolio, blog.
- Form handling: validasi server-side Laravel, proteksi spam via honeypot
  field + rate limiting (throttle middleware) pada form kontak.
- Testing minimum: PHPUnit/Pest untuk route utama & validasi form kontak.

## 2. IDENTITAS BRAND & DESIGN SYSTEM
Nama perusahaan: Technogan — IT Solution & Support (IT Infrastructure,
Networking, CCTV, Computer Service).

Palet warna:
- Primary — Traditional/Trust Blue: #1E3A8A (navy blue, dipakai untuk nav
  solid, heading utama, tombol primary, section terang) dengan varian gelap
  #0F2557 untuk hero/section dark dan varian terang #3B82F6 untuk hover state
  & aksen link.
- Secondary/Accent — Warm Tan/Bronze: #BA8759 (dipakai sebagai warna aksen
  CTA sekunder, ikon highlight, border/underline dekoratif, badge "featured") —
  jangan dipakai sebagai warna dominan, cukup sebagai aksen agar kontras
  dengan biru terasa premium & hangat.
- Netral: putih #FFFFFF & abu terang #F8FAFC untuk background section konten,
  abu tua #1F2937 untuk footer, abu teks #4B5563 untuk body copy.
- Sukses/error standar Tailwind (green-600/red-600) khusus untuk status form.

Tipografi:
- Heading: font sans-serif tebal (misal "Inter" atau "Plus Jakarta Sans"),
  ukuran besar & bold di hero (text-4xl–text-6xl).
- Body: font sans-serif reguler, ukuran nyaman dibaca (text-base–text-lg),
  line-height longgar.
- Load font via Google Fonts, self-host jika memungkinkan untuk performa.

Komponen UI (konsisten di seluruh situs):
- Tombol primary: solid biru (#1E3A8A), rounded-full atau rounded-lg,
  hover ke biru lebih terang.
- Tombol secondary: outline biru atau solid tan (#BA8759) untuk CTA sekunder.
- Card layanan/portofolio: gambar dengan gradient overlay gelap di bagian
  bawah, judul + deskripsi singkat, hover efek scale/shadow.
- Section dark (hero & "Kenapa Pilih Technogan"): background navy gelap
  (#0F2557) dengan teks putih, dipakai untuk menonjolkan kredibilitas teknis.
- Navbar sticky: transparan di atas hero, jadi solid putih dengan shadow
  saat discroll (pakai Alpine.js scroll listener).
- Mobile-first, breakpoint standar Tailwind (sm/md/lg/xl), hamburger menu
  di mobile dengan slide-in drawer.

Navigasi & Transisi Halaman (PENTING):
- **DILARANG memakai efek parallax scrolling** (background bergerak beda
  kecepatan dari foreground saat scroll) di section manapun.
- Setiap item menu (Layanan, Tentang Kami, Portofolio, Blog, Kontak, dan
  setiap sub-halaman detail layanan/portofolio/blog) adalah **halaman
  Laravel terpisah dengan route & URL sendiri** — navigasi dilakukan
  dengan klik link biasa yang me-load halaman baru (server-rendered Blade),
  bukan single-page-app dengan konten yang berganti via JS tanpa reload URL.
- Homepage boleh terdiri dari beberapa section vertikal (hero, layanan,
  keunggulan, dst) yang di-scroll biasa dalam satu halaman — itu bukan
  parallax, hanya susunan section standar — tapi tidak boleh ada efek
  scroll-linked animation (background image yang bergerak lebih
  lambat/cepat dari konten, sticky pinned section, atau scroll-jacking).
- Animasi yang diperbolehkan hanya transisi ringan standar: fade-in
  on-scroll sederhana (opsional, pakai Alpine/CSS transition biasa), hover
  state pada card/tombol, dan transisi buka/tutup mobile menu. Tidak ada
  library animasi scroll berat (GSAP ScrollTrigger, parallax.js, dsb).

## 3. ARSITEKTUR HALAMAN & FITUR

### Homepage (/)
1. Hero full-width navy dark: headline value proposition Technogan,
   subheadline singkat, dua CTA ("Konsultasi Gratis" solid biru, "Lihat
   Layanan" outline).
2. Carousel/grid 4 layanan utama (card, link ke halaman detail masing-masing):
   IT Infrastructure, Networking, CCTV & Security System, Computer Service
   & Maintenance.
3. Section "Kenapa Pilih Technogan" — dark navy split layout: poin
   keunggulan (respons cepat, teknisi bersertifikat, garansi layanan,
   dukungan 24/7) dengan angka/statistik (jumlah klien, tahun pengalaman,
   proyek selesai).
4. Section proses kerja/how-it-works (3–4 langkah: konsultasi → survei →
   implementasi → dukungan purna jual).
5. Studi kasus/portofolio proyek (slider) — nama klien/industri, layanan
   yang dikerjakan, hasil singkat.
6. Testimoni klien (carousel card dengan foto/logo perusahaan, kutipan).
7. Blog/artikel terbaru (3 kartu terbaru dari modul blog).
8. CTA banner sebelum footer — ajakan konsultasi/hubungi kami dengan
   tombol WhatsApp & form singkat.
9. Footer lengkap: kolom Tentang, Layanan, Perusahaan (Karir/Blog/Kontak),
   info kontak (alamat, telepon, email, jam operasional), ikon sosial
   media, copyright bar.
10. Floating buttons: tombol WhatsApp (fixed bottom-right) + scroll-to-top.

### Halaman Tentang Kami (/tentang-kami)
Sejarah singkat, visi-misi, struktur tim inti (opsional foto), sertifikasi/
partner teknologi, nilai perusahaan (kartu gaya CSR Hikvision tapi konten
value perusahaan Technogan).

### Halaman Layanan (/layanan dan /layanan/{slug})
- Index: grid semua layanan dengan filter kategori.
- Detail per layanan (IT Infrastructure, Networking, CCTV, Computer
  Service): hero khusus, deskripsi lengkap, sub-layanan/cakupan pekerjaan
  (list), teknologi/brand partner yang didukung, galeri hasil kerja terkait,
  CTA konsultasi.
- Data layanan dikelola via admin (CRUD), bukan hardcode di Blade.

### Halaman Portofolio (/portofolio dan /portofolio/{slug})
Studi kasus proyek: klien, industri, tantangan, solusi, hasil, galeri foto.
CRUD via admin.

### Halaman Blog (/blog dan /blog/{slug})
Artikel seputar IT, tips maintenance, tren teknologi — untuk SEO content
marketing. Kategori & tag, related posts, share button.

### Halaman Kontak (/kontak)
Form kontak (nama, email, telepon, layanan yang diminati, pesan) tersimpan
ke DB + notifikasi email ke admin, embed Google Maps lokasi kantor, info
kontak lengkap, jam operasional.

### Admin Panel (/admin, protected)
CRUD untuk: Layanan & kategori layanan, Portofolio, Blog & kategori,
Testimoni, Pesan masuk dari form kontak (dengan status baru/dibaca/selesai),
pengaturan umum (info kontak, social media links, SEO default).

## 4. STRUKTUR DATABASE (MySQL — garis besar tabel)
- `services` (id, category_id, name, slug, short_description, description,
  icon, thumbnail, is_featured, order, timestamps)
- `service_categories` (id, name, slug, timestamps)
- `portfolios` (id, service_id nullable, client_name, industry, title, slug,
  challenge, solution, result, thumbnail, timestamps)
- `portfolio_images` (id, portfolio_id, image_path, timestamps) — galeri
- `blog_posts` (id, category_id, title, slug, excerpt, content, thumbnail,
  author, published_at, meta_title, meta_description, timestamps)
- `blog_categories` (id, name, slug, timestamps)
- `testimonials` (id, client_name, company, position, photo, message,
  rating, timestamps)
- `contact_messages` (id, name, email, phone, service_interested, message,
  status, timestamps)
- `settings` (key, value) — untuk data umum (alamat, telepon, email, social
  links, default SEO meta)
- `users` (bawaan Laravel, untuk admin)

Semua tabel konten (services, portfolios, blog_posts) wajib punya kolom
`slug` unik untuk URL SEO-friendly, serta `meta_title`/`meta_description`
opsional per halaman untuk override SEO default.

## 5. SEO — WAJIB DITERAPKAN DI SETIAP HALAMAN
- Meta tag dinamis per halaman: `<title>`, `meta description`, canonical URL.
- Open Graph & Twitter Card meta tags (og:title, og:description, og:image,
  og:type) untuk setiap halaman publik.
- Schema.org JSON-LD: `Organization`/`LocalBusiness` di layout utama (nama,
  logo, alamat, telepon, jam operasional, social profile), `Article` di
  halaman blog, `BreadcrumbList` di halaman detail layanan/portofolio/blog.
- URL slug bersih & deskriptif (bukan ID numerik) untuk service, portfolio,
  blog.
- Sitemap.xml dinamis (generate dari data services/portfolios/blog + halaman
  statis) — pakai package spatie/laravel-sitemap atau generate manual via
  route.
- robots.txt yang mengizinkan crawling halaman publik & memblokir /admin.
- Struktur heading semantik (satu H1 per halaman, hierarki H2/H3 logis).
- Semua gambar wajib punya atribut `alt` deskriptif, lazy-loading
  (`loading="lazy"`) kecuali gambar hero above-the-fold.
- Optimasi performa untuk Core Web Vitals: compress & convert gambar ke
  WebP saat upload, minifikasi CSS/JS via Vite build, cache route/config
  Laravel (`route:cache`, `config:cache`) untuk production.
- Internal linking: related services/portfolio/blog posts di tiap halaman
  detail.
- Breadcrumb navigasi visual + markup schema di halaman non-homepage.
- Responsive & mobile-friendly (mobile-first) karena mobile-first indexing.
- Halaman 404 kustom yang tetap membawa navigasi ke halaman utama.

## 6. NON-FUNGSIONAL & KUALITAS KODE
- Ikuti struktur folder Laravel standar, gunakan Blade components/layouts
  (`x-layout`, `x-card`, dll) untuk elemen UI berulang — hindari duplikasi
  markup.
- Tailwind config custom untuk warna brand (`primary`, `secondary`) supaya
  dipakai konsisten via class utility (`bg-primary`, `text-secondary`, dst),
  bukan hardcode hex di banyak tempat.
- Validasi form pakai Form Request class Laravel, bukan validasi inline
  di controller.
- Environment-ready: `.env.example` lengkap, migration + seeder dummy data
  (minimal 4 layanan, 3 portofolio, 3 blog post, 3 testimoni) supaya
  langsung bisa di-demo.
- Kode rapi, tanpa komentar berlebihan, penamaan variabel/fungsi jelas
  dalam bahasa Inggris (konvensi Laravel), konten/teks tampilan dalam
  bahasa Indonesia.
```

---

### Catatan Warna

- **Biru trust**: `#1E3A8A` (primary), `#0F2557` (dark/hero), `#3B82F6` (accent/hover)
- **Tan/bronze aksen**: `#BA8759`

Kombinasi ini dipakai sebagai identitas visual pengganti merah Hikvision — biru mendominasi (nav, heading, CTA utama, section gelap), tan hanya untuk aksen (badge, border, CTA sekunder, ikon highlight) agar tidak terkesan "coklat dominan".

---

**Status:** Ini baru dokumen analisa + prompt. Belum ada kode yang dibuat.
Beri konfirmasi jika prompt di atas sudah sesuai, atau sebutkan bagian yang
perlu direvisi (mis. tambah/kurangi halaman, ganti struktur database, dsb)
sebelum saya mulai proses scaffolding project Laravel-nya.
