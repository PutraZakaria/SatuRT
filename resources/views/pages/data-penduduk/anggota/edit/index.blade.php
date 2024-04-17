<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb :list="$breadcrumb['list']" :url="$breadcrumb['url']" />
    </x-slot>
    <section class="mx-6 md:mx-14 my-4">
        <div>
            <x-toolbar :toolbar_id="$toolbar_id " :active="$active" :toolbar_route="$toolbar_route"/>
        </div>
    </section>

    <section class="bg-white mx-6 md:mx-14 my-10 p-6">
        <form action="{{ route('data-anggota.update', [
            'keluargaid' => $toolbar_id,
            'anggotum' => $id,
        ])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="space-y-6">
                <div>
                    <x-heading text="Edit Data Penduduk" />
                    @include('pages.data-penduduk.partials.data-anggota-keluarga-form')
                </div>
            </div>

            <div class="flex justify-start mt-8 space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
                <a href="{{route('data-keluarga.show', [
                    'keluarga' => $id
                ])}}" draggable="false" class="select-none bg-white text-black border border-gray-300 px-4 py-2 rounded-md">Kembali</a>
            </div>
        </form>
    </section>
</x-app-layout>
