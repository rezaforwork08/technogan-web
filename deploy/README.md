# Deploy ke Sharehosting (struktur split public_html)

Struktur di server:

```
public_html/            <- isi folder public/ Laravel (index.php, build/, favicon, dsb)
public_html/laravel/    <- sisa project Laravel (app, bootstrap, config, database,
                            resources, routes, storage, vendor, .env, artisan, composer.json)
                            TANPA folder public/ (tidak dipakai di server)
```

## 1. Setup pertama kali di server

1. Upload seluruh project **kecuali** `node_modules/`, `.git/`, dan folder `public/` itu sendiri, ke `public_html/laravel/`.
2. Upload isi folder `public/` (hasil `npm run build` sudah termasuk) langsung ke `public_html/` (bukan ke dalam subfolder).
3. Ganti `public_html/index.php` dengan isi dari `deploy/public_html-index.php` di repo ini — file ini yang memberi tahu Laravel bahwa folder public sebenarnya ada di `public_html`, bukan `public_html/laravel/public` (lihat penjelasan errornya di bawah).
4. Buat `.env` baru langsung di `public_html/laravel/.env` (jangan upload `.env` lokal), isi:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL=https://domain-kamu.com`
   - `DB_*` sesuai kredensial database di hosting
5. Via SSH, masuk ke `public_html/laravel/` lalu jalankan:
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan key:generate
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
6. Buat symlink storage secara manual (artisan storage:link tidak bisa dipakai di sini karena akan menyimpan link ke `laravel/public/storage`, bukan `public_html/storage`):
   ```bash
   ln -s /home/technogan/public_html/laravel/storage/app/public /home/technogan/public_html/storage
   ```
7. Pastikan folder `storage/` dan `bootstrap/cache/` di dalam `public_html/laravel/` writable (755, atau 775 kalau masih permission denied).

## 2. Setiap kali ada perubahan (redeploy)

1. Build assets frontend di lokal: `npm run build`.
2. Upload ulang folder `public/build/` ke `public_html/build/` (timpa semua isinya, karena nama file hash berubah tiap build).
3. Upload perubahan kode PHP ke `public_html/laravel/`.
4. Kalau ada migrasi baru:
   ```bash
   php artisan migrate --force
   ```
5. Clear & rebuild cache supaya perubahan config/route/view kepakai:
   ```bash
   php artisan optimize:clear
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Kenapa index.php perlu diubah?

Laravel menghitung `public_path()` (dipakai untuk cari `build/manifest.json` dan oleh `storage:link`) berdasarkan lokasi `bootstrap/app.php`. Karena `bootstrap/app.php` ada di `public_html/laravel/bootstrap/`, secara default Laravel akan mencari folder public di `public_html/laravel/public/` — padahal isi public sebenarnya ada langsung di `public_html/`. `deploy/public_html-index.php` memanggil `$app->usePublicPath(__DIR__)` supaya Laravel tahu lokasi public yang benar.
