<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb :list="$breadcrumb['list']" :url="$breadcrumb['url']" />
    </x-slot>

    <div class="p-6 lg:px-12 mx-auto max-w-screen-2xl md:p-6 2xl:p-6 flex flex-col gap-y-5">
        <div class="p-6 rounded-xl bg-white-snow">
            {{-- Detail Permohonan Surat --}}
            <section>
                <div class="bg-blue-gray p-5 rounded-md">
                    <h1 class="font-bold md:text-2xl text-xl">Detail Permohonan Surat</h1>
                </div>
            </section>
            {{-- Forms Permhonan Surat --}}
            <section>
                <form
                    class="p-6 mx-auto max-w-screen-2xl md:p-6 2xl:p-6 flex flex-col md:grid md:grid-cols-1 md:auto-rows-auto gap-y-5">
                    <div class="md:grid md:grid-cols-4">
                        <h5 class="font-semibold">NIK</h5>
                        <p class="md:col-span-3">{{ $persuratan->pengajuan->penduduk->nik }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-4">
                        <h5 class="font-semibold">Nama</h5>
                        <p class="md:col-span-3">{{ $persuratan->pengajuan->penduduk->nama }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-4">
                        <h5 class="font-semibold">Jenis Surat</h5>
                        <p class="md:col-span-3">{{ $persuratan->jenis_surat }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-4">
                        <h5 class="font-semibold">Tanggal</h5>
                        <p class="md:col-span-3">{{ $persuratan->pengajuan->accepted_at }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-1 md:grid-rows-2">
                        <h5 class="font-semibold">Keperluan</h5>
                        <p class="md:col-span-3">{{ $persuratan->pengajuan->keperluan }}</p>
                    </div>
                    <div class="md:flex md:flex-col">
                        <h5 class="font-semibold">Keterangan</h5>
                        <textarea
                            class="w-full h-48 p-2.5 rounded border border-neutral-900 border-opacity-30 justify-start items-start gap-2.5 inline-flex font-normal">{{ $persuratan->pengajuan->keterangan }}</textarea>
                    </div>

                    {{-- Tombol Setujui dan Tolak --}}
                    <div class="mt-10 flex gap-x-5">
                        <button type="submit"
                            class="bg-green-500 text-white-snow text-sm px-4 py-2 rounded-md flex justify-center items-center gap-x-3">
                            <p>Simpan</p>
                        </button>
                        <button type="submit"
                            class="bg-red-500 text-white-snow text-sm px-4 py-2 rounded-md flex justify-center items-center gap-x-3">
                            <p>Simpan</p>
                        </button>
                    </div>
                </form>
            </section>
            {{-- Akhir Detail Keuangan --}}
        </div>
    </div>

    @push('scripts')
        <script>
            const textarea = document.querySelector('#textarea');
            textarea.readOnly = true;
        </script>
    @endpush

</x-app-layout>