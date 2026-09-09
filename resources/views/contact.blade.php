@php
    use App\Models\Setting;
    use App\Models\Service;

    $address = Setting::get('company_address');
    $phone = Setting::get('company_phone');
    $email = Setting::get('company_email');
    $hours = Setting::get('company_hours');
    $mapUrl = Setting::get('map_embed_url');
    $services = Service::query()->orderBy('order')->pluck('name');
@endphp

<x-layouts.app
    title="Kontak Kami"
    description="Hubungi Technogan untuk konsultasi gratis seputar IT Infrastructure, Networking, CCTV, dan Computer Service."
>
    <x-page-hero
        eyebrow="Kontak"
        title="Mari Berdiskusi"
        description="Isi formulir di bawah ini atau hubungi kami langsung, tim kami akan merespons secepatnya."
    />

    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-5">
            <div class="lg:col-span-3">
                <div class="rounded-2xl border border-slate-100 p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-slate-900">Kirim Pesan</h2>

                    @if ($errors->any())
                        <div class="mt-4 rounded-lg bg-red-50 p-4 text-sm text-red-700">
                            <ul class="list-inside list-disc space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="mt-6 space-y-5">
                        @csrf

                        {{-- Honeypot: hidden from real users, bots tend to fill every field --}}
                        <div class="hidden" aria-hidden="true">
                            <label for="website">Website</label>
                            <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700">Nama</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="mt-1.5 block w-full rounded-lg border-slate-200 shadow-sm focus:border-primary-600 focus:ring-primary-600">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="mt-1.5 block w-full rounded-lg border-slate-200 shadow-sm focus:border-primary-600 focus:ring-primary-600">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-slate-700">Telepon</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    class="mt-1.5 block w-full rounded-lg border-slate-200 shadow-sm focus:border-primary-600 focus:ring-primary-600">
                            </div>
                            <div>
                                <label for="service_interested" class="block text-sm font-medium text-slate-700">Layanan Diminati</label>
                                <select name="service_interested" id="service_interested"
                                    class="mt-1.5 block w-full rounded-lg border-slate-200 shadow-sm focus:border-primary-600 focus:ring-primary-600">
                                    <option value="">Pilih layanan (opsional)</option>
                                    @foreach ($services as $serviceName)
                                        <option value="{{ $serviceName }}" @selected(old('service_interested') === $serviceName)>{{ $serviceName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700">Pesan</label>
                            <textarea name="message" id="message" rows="5" required
                                class="mt-1.5 block w-full rounded-lg border-slate-200 shadow-sm focus:border-primary-600 focus:ring-primary-600">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-primary-800 px-7 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-700">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="space-y-6">
                    <div class="rounded-2xl border border-slate-100 p-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-primary-800">Informasi Kontak</h3>
                        <dl class="mt-4 space-y-3 text-sm text-slate-600">
                            @if ($address)
                                <div><dt class="font-medium text-slate-800">Alamat</dt><dd class="mt-0.5">{{ $address }}</dd></div>
                            @endif
                            @if ($phone)
                                <div><dt class="font-medium text-slate-800">Telepon</dt><dd class="mt-0.5"><a href="tel:{{ $phone }}" class="hover:text-primary-700">{{ $phone }}</a></dd></div>
                            @endif
                            @if ($email)
                                <div><dt class="font-medium text-slate-800">Email</dt><dd class="mt-0.5"><a href="mailto:{{ $email }}" class="hover:text-primary-700">{{ $email }}</a></dd></div>
                            @endif
                            @if ($hours)
                                <div><dt class="font-medium text-slate-800">Jam Operasional</dt><dd class="mt-0.5">{{ $hours }}</dd></div>
                            @endif
                        </dl>
                    </div>

                    @if ($mapUrl)
                        <div class="overflow-hidden rounded-2xl border border-slate-100">
                            <iframe
                                src="{{ $mapUrl }}"
                                class="h-72 w-full"
                                style="border:0"
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Lokasi Technogan"
                            ></iframe>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
