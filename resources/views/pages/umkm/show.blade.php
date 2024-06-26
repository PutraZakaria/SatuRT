<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb :list="$breadcrumb['list']" :url="$breadcrumb['url']" />
    </x-slot>

    {{-- Content Start --}}
    <div class="p-6 lg:px-12 mx-auto max-w-screen-2xl md:p-6 2xl:p-6 flex flex-col gap-y-5">
        <x-toolbar :toolbar_id="$toolbar_id" :active="$active" :toolbar_route="$toolbar_route" />
        <div class="p-6 rounded-xl bg-white-snow mt-5">
            {{-- Information Details --}}
            <section>
                <div class="bg-blue-gray p-5 rounded-md">
                    <h1 class="font-bold md:text-2xl text-xl">Detail UMKM</h1>
                </div>
            </section>
            <section>
                <div class="p-6 mx-auto max-w-screen-2xl md:p-6 2xl:p-6 flex flex-col md:grid md:grid-cols-2 gap-y-5">
                    <div>
                        <h5 class="font-semibold">Pemilik</h5>
                        <p>{{ $umkm->penduduk->nama }}</p>
                    </div>
                    <div>
                        <h5 class="font-semibold">Nama UMKM</h5>
                        <p>{{ $umkm->nama_umkm }}</p>
                    </div>
                    <div>
                        <h5 class="font-semibold">Jenis UMKM</h5>
                        <p>{{ $umkm->jenis_umkm }}</p>
                    </div>
                    <div>
                        <h5 class="font-semibold">Alamat</h5>
                        <p>{{ $umkm->alamat }}</p>
                    </div>
                    <div>
                        <h5 class="font-semibold">Nomor Telepon</h5>
                        <p>{{ $umkm->nomor_telepon }}</p>
                    </div>
                    <div>
                        <h5 class="font-semibold">Lokasi URL</h5>
                        <p>{{ $umkm->lokasi_url }}</p>
                    </div>
                    <div>
                        <h5 class="font-semibold">Status UMKM</h5>
                        <p>{{ $umkm->status }}</p>
                    </div>
                    <div class="md:col-span-2 md:h-auto">
                        <h5 class="font-semibold">Surat Izin Usaha</h5>
                        @if ($umkm->lisence_image_url)
                            <x-image-preview :file="is_null($umkm->lisence_image_url)
                                ? null
                                : (strpos($umkm->lisence_image_url, 'http') === false
                                    ? route('storage.lisence', $umkm->lisence_image_url)
                                    : $umkm->lisence_image_url)" />
                        @else
                            <p>Tidak ada surat izin usaha</p>
                        @endif
                    </div>
                    <div class="md:col-span-2">
                        <h5 class="font-semibold">Thumbnail</h5>
                        @if ($umkm->thumbnail_url)
                            <x-image-preview :file="is_null($umkm->thumbnail_url)
                                ? null
                                : (strpos($umkm->thumbnail_url, 'http') === false
                                    ? route('public', $umkm->thumbnail_url)
                                    : $umkm->thumbnail_url)" />
                        @else
                            <p>Tidak ada thumbnail</p>
                        @endif
                    </div>
                    <div class="md:col-span-2">
                        <h5 class="font-semibold">Keterangan</h5>
                        {!! $umkm->keterangan !!}
                    </div>
                </div>
            </section>
            {{-- End Information Details --}}

            {{-- Back Button --}}
            <div class="flex gap-x-5 px-5">
                <button onclick="window.history.back()" class="text-black border-2 py-3 px-5 rounded-lg mt-4">
                    {{-- <p class="max-lg:hidden"><</p> --}}
                    <p">Kembali</p>
                </button>
            </div>

            {{-- Back Button
            <div class="mt-10 flex gap-x-5 px-5">
                <a href="{{ route('umkm.index') }}"
                    class="border border-navy-night/50 rounded-md px-4 py-2 text-sm flex justify-center items-center gap-x-3">
                    <p>Kembali</p>
                </a>
            </div> --}}
        </div>
    </div>
    {{-- Content End --}}

    @push('styles')
        <style>
            #content h2 {
                display: block;
                font-size: 1.5em;
                font-weight: bold;
            }

            #content h3 {
                display: block;
                font-size: 1.33em;
                font-weight: bold;
            }

            #content h4 {
                display: block;
                font-size: 1.17em;
                font-weight: bold;
            }

            #content ol {
                display: block;
                list-style-type: decimal;
                padding-left: 40px;
            }

            #content ul {
                display: block;
                list-style-type: disc;
                padding-left: 40px;
            }

            #content a {
                color: rgb(59 130 246);
                text-decoration: underline;
                background-color: transparent;
            }

            #content blockquote {
                padding: 1rem;
                margin: 1rem 0;
                border-left: 4px solid rgb(209 213 219);
            }

            #content table {
                table-layout: auto;
                width: 100%;
                font-size: 0.875rem;
                line-height: 1.25rem;
                text-align: left;
                color: #0B1215;
            }

            #content table th {
                background-color: rgb(229 231 235);
                padding: 0.75rem;
                border: 1px solid rgb(209 213 219);
            }

            #content table td {
                border: 1px solid rgb(209 213 219);
                padding: 0.75rem;
            }

            #content blockquote p {
                font-size: 1rem;
                line-height: 1.25rem;
                font-style: italic;
                font-weight: 500;
                line-height: 1.625;
                color: #0B1215;
            }
        </style>
    @endpush
</x-app-layout>
