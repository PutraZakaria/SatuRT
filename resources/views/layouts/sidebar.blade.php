<aside
    class="absolute left-0 top-0 z-[9999] flex h-screen w-[18rem] md:w-[22rem] flex-col overflow-y-hidden bg-soft-snow duration-300 ease-linear lg:static lg:translate-x-0 border border-l px-4 md:px-8"
    :class="sidebar ? 'translate-x-0' : '-translate-x-full'" @click.outside="sidebar = false">
    <div class="flex justify-between lg:justify-center items-center gap-x-5 w-full py-10">
        <div class="shrink-0">
            <div>
                <x-application-logo class="w-auto h-auto text-navy-night " />
            </div>
        </div>
        <div class="w-10 h-10 lg:hidden">
            <button id="sidebar-close" class="w-10 h-10" @click.stop="sidebar = !sidebar">
                @svg('heroicon-o-x-mark')
            </button>
        </div>
    </div>


    @if (Auth::check())
        @if (Auth::user()->role->role_name === 'Ketua RT')
            <div class="overflow-y-auto pt-10 lg:pt-24 no-scrollbar">
                <h1 class="text-navy-night/35 text-xs md:text-base ">MAIN MENU</h1>

                @php
                    $active = '';
                @endphp

                @if (request()->is('data-penduduk*') || request()->is('data-akun*'))
                    @php
                        $active = 'Penduduk';
                    @endphp
                @elseif (request()->is('pendukung-keputusan*'))
                    @php
                        $active = 'Pendukung Keputusan';
                    @endphp
                @endif

                <div x-data="{ isDataPenduduk: {{ $active === 'Penduduk' ? 'true' : 'false' }}, isPendukungKeputusan: {{ $active === 'Pendukung Keputusan' ? 'true' : 'false' }} }" class="py-5">
                    <nav>
                        <div>
                            <x-nav-menu :href="route('dashboard')" :active="request()->is('dashboard*')" svgIcon="heroicon-o-squares-2x2"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                Dashboard
                            </x-nav-menu>
                        </div>
                        <div>
                            <x-nav-menu svgIcon="heroicon-o-banknotes" :href="route('keuangan.index')" :active="request()->is('keuangan*')"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                Keuangan
                            </x-nav-menu>
                        </div>
                        <div @click.prevent="isDataPenduduk = !isDataPenduduk">
                            <x-nav-menu svgIcon="heroicon-o-user-group" iconStyle="w-6 h-6 md:h-8 md:w-8">
                                <div class="inline-flex w-full justify-between items-center">
                                    <p class="px-1">
                                        Data Penduduk
                                    </p>
                                    <div class="w-5 h-5" :class="isDataPenduduk ? 'rotate-180' : ''">
                                        <x-heroicon-o-chevron-down />
                                    </div>
                                </div>
                            </x-nav-menu>
                        </div>
                        <div :class="isDataPenduduk ? 'block' : 'hidden'">
                            <div class="pl-11 py-1">
                                <x-nav-menu :href="url('data-penduduk/keluarga')" :active="request()->is('data-penduduk/*')">
                                    Data Penduduk
                                </x-nav-menu>
                            </div>
                            <div class="pl-11 py-1">
                                <x-nav-menu :href="url('data-akun/penduduk')" :active="request()->is('data-akun/*')">
                                    Data Akun
                                </x-nav-menu>
                            </div>
                        </div>
                        <div>
                            <x-nav-menu :href="route('umkm.index')" :active="request()->is('umkm*')" svgIcon="heroicon-o-building-storefront"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                UMKM
                            </x-nav-menu>
                        </div>
                        <div>
                            <x-nav-menu :href="route('persuratan.index')" :active="request()->is('persuratan*')" svgIcon="heroicon-o-document-text"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                Permohonan Surat
                            </x-nav-menu>
                        </div>
                        <div @click.prevent="isPendukungKeputusan = !isPendukungKeputusan">
                            <x-nav-menu svgIcon="heroicon-o-scale" iconStyle="w-6 h-6 md:h-8 md:w-8">
                                <div class="w-full inline-flex justify-between items-center">
                                    <p class="px-1">
                                        Pendukung Keputusan
                                    </p>
                                    <div class="w-5 h-5"
                                        :class="isPendukungKeputusan ?
                                            'rotate-180' : ''">
                                        <x-heroicon-o-chevron-down />
                                    </div>
                                </div>
                            </x-nav-menu>
                        </div>
                        <div :class="isPendukungKeputusan ? 'block' :
                            'hidden'">
                            <div class="pl-11 py-1">
                                <x-nav-menu :href="url('pendukung-keputusan/kriteria')" :active="request()->is('pendukung-keputusan/kriteria*')">
                                    Kriteria
                                </x-nav-menu>
                            </div>
                            <div class="pl-11 py-1">
                                <x-nav-menu :href="url('pendukung-keputusan/alternatif')" :active="request()->is('pendukung-keputusan/alternatif*')">
                                    Kelola Kegiatan
                                </x-nav-menu>
                            </div>
                        </div>
                        <div>
                            <x-nav-menu svgIcon="heroicon-o-microphone" :href="route('informasi.index')" :active="request()->is('informasi*')"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                Informasi
                            </x-nav-menu>
                        </div>
                        <div>
                            <x-nav-menu svgIcon="heroicon-o-megaphone" iconStyle="w-6 h-6 md:h-8 md:w-8"
                                :href="route('pelaporan.index')" :active="request()->is('pelaporan*')">
                                Laporan Warga
                            </x-nav-menu>
                        </div>

                    </nav>
                </div>
            </div>
        @elseif(Auth::user()->role->role_name === 'Penduduk')
            <div class="overflow-y-auto pt-10 lg:pt-24 no-scrollbar">
                <h1 class="text-navy-night/35 ">MAIN MENU</h1>
                <div class="py-5">
                    <nav>
                        <div>
                            <x-nav-menu :href="route('dashboard')" :active="request()->routeIs('dashboard')" svgIcon="heroicon-o-squares-2x2"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                Dashboard
                            </x-nav-menu>
                        </div>
                        <div>

                            <x-nav-menu :href="route('data-keluarga.show', [
                                'keluarga' => Auth::user()->penduduk->kartu_keluarga_id,
                            ])" svgIcon="heroicon-o-user-group"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                Data Keluarga
                            </x-nav-menu>
                        </div>
                        <div>
                            <x-nav-menu :href="route('umkm.index')" :active="request()->is('umkm*')" svgIcon="heroicon-o-building-storefront"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                UMKM
                            </x-nav-menu>
                        </div>
                        <div>
                            <x-nav-menu :href="route('persuratan.index')" :active="request()->is('persuratan*')" svgIcon="heroicon-o-document-text"
                                iconStyle="w-6 h-6 md:h-8 md:w-8">
                                Permohonan Surat
                            </x-nav-menu>

                        </div>
                        <div>
                            <x-nav-menu svgIcon="heroicon-o-megaphone" iconStyle="w-6 h-6 md:h-8 md:w-8"
                                :href="route('pelaporan.index')" :active="request()->is('pelaporan*')">
                                LAPOR!
                            </x-nav-menu>
                        </div>

                    </nav>
                </div>
            </div>
        @endif
    @endif
    {{-- Main Menu --}}
</aside>
