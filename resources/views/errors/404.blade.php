<x-layouts.app title="Halaman Tidak Ditemukan">
    <section class="mx-auto flex min-h-[60vh] max-w-3xl flex-col items-center justify-center px-4 text-center">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-600">404</p>
        <h1 class="mt-3 text-3xl font-extrabold text-slate-900 sm:text-4xl">Halaman Tidak Ditemukan</h1>
        <p class="mt-4 text-slate-500">Halaman yang Anda cari mungkin sudah dipindahkan atau tidak tersedia.</p>
        <a href="{{ route('home') }}" class="mt-8 inline-flex items-center justify-center rounded-full bg-primary-800 px-7 py-3 text-sm font-semibold text-white hover:bg-primary-700">
            Kembali ke Beranda
        </a>
    </section>
</x-layouts.app>
