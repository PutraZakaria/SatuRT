<x-profile-layout>
    <div class="p-6 lg:px-12 mx-auto max-w-screen-2xl md:p-6 2xl:p-6 flex flex-col gap-y-5">
        <div class="p-6 rounded-xl bg-white-snow">
            {{-- Header --}}
            <section>
                <div
                    class="p-6 lg:px-14 lg:py-8 sticky top-0 z-[999] flex w-full bg-soft-snow max-lg:drop-shadow lg:hidden">
                    <div class="mx-auto flex items-center justify-between w-full">
                        <button @click.stop="sidebar = !sidebar" class="z-50 w-10 h-10">
                            <x-heroicon-c-bars-3-center-left />
                        </button>
                        <div class="lg:hidden" x-data="{ profile: false }">
                            <div class="h-14 w-14 rounded-full overflow-hidden" @click.stop="profile = !profile">
                                <img class="h-full w-full object-cover"
                                    src="{{ asset('assets/images/milad-fakurian-PGdW_bHDbpI-unsplash.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b-2 border-black m-3 p-1 lg:mt-5">
                    <h1 class="text-2xl font-semibold">Ganti Kata Sandi</h1>
                </div>
            </section>
            {{-- End Header --}}

            {{-- Form --}}
            <form action="{{ route('profile.change-password.post', $penduduk->penduduk_id) }}" method="POST">
                @csrf

                <div class="mx-3 my-6 flex flex-nowrap">
                    <div class="lg:w-1/2 max-lg:w-full">
                        <div class="after:content-['*'] after:ml-0.5 after:text-red-500">Kata Sandi Lama</div>
                        <input type="text" placeholder="Kata Sandi Lama" name="sandi_lama" id="sandi_lama"
                            class="placeholder:text-gray-300 placeholder:font-light required:ring-1 required:ring-red-500 mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">
                        <x-input-error :messages="$errors->get('sandi_lama')" class="mt-2" />
                    </div>
                </div>

                <div class="mx-3 my-6 flex flex-nowrap">
                    <div class="lg:w-1/2 max-lg:w-full">
                        <div class="after:content-['*'] after:ml-0.5 after:text-red-500">Kata Sandi Baru</div>
                        <input type="text" placeholder="Kata Sandi Baru" name="sandi_baru" id="sandi_baru"
                            class="placeholder:text-gray-300 placeholder:font-light required:ring-1 required:ring-red-500 mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">
                        <x-input-error :messages="$errors->get('sandi_baru')" class="mt-2" />
                    </div>
                </div>

                <div class="mx-3 my-6 flex flex-nowrap">
                    <div class="lg:w-1/2 max-lg:w-full">
                        <div class="after:content-['*'] after:ml-0.5 after:text-red-500">Ulangi Kata Sandi Baru</div>
                        <input type="text" placeholder="Ulangi Kata Sandi Baru" name="ulang_sandi_baru"
                            id="ulang_sandi_baru"
                            class="placeholder:text-gray-300 placeholder:font-light required:ring-1 required:ring-red-500 mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">
                        <x-input-error :messages="$errors->get('ulang_sandi_baru')" class="mt-2" />
                    </div>
                </div>

                <button type="submit"
                    class="bg-green-400 hover:bg-green-700 text-white mx-3 my-6 py-2 px-4 rounded mt-4">
                    Simpan Perubahan
                </button>
            </form>

            {{-- End Form --}}
        </div>
    </div>

    @push('styles')
    @endpush

    @push('scripts')
    @endpush

</x-profile-layout>
