<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb :list="$breadcrumb['list']" :url="$breadcrumb['url']" />
    </x-slot>

    {{-- Content Start --}}
    <div class="p-6 lg:px-14 gap-y-5 mx-auto max-w-screen-2xl md:p-6 2xl:p-10 ">
        <x-toolbar :toolbar_id="$toolbar_id" :active="$active" :toolbar_route="$toolbar_route" />
        <div class="p-6 mt-3 rounded-xl bg-white-snow overflow-hidden">

            {{-- Form --}}
            <form method="POST" action="{{ route('pelaporan.update', $pelaporan->pelaporan_id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="bg-blue-gray p-5 max-lg:mt-5 rounded-md">
                    <h1 class="font-bold md:text-2xl text-xl">Edit Pelaporan</h1>
                </div>

                <section>

                    <div class="mt-4 mx-3 mb-3 gap-5 flex flex-col font-bold">
                        {{-- Judul --}}
                        <div>
                            <div class="after:content-['*'] after:ml-0.5 after:text-red-500">Judul Laporan</div>
                            @error('keperluan')
                                <small class="text-red-500 text-xs py-3">{{ $message }}</small>
                            @enderror
                            <input type="text" value="{{ $pelaporan->pengajuan->keperluan }}"
                                placeholder="Masukkan Nama" name="keperluan" id="keperluan"
                                class="font-normal placeholder:text-gray-300 placeholder:font-light required:ring-1 required:ring-red-500 mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">
                        </div>
                    </div>

                    <div class="flex flex-col md:grid md:grid-cols-2">

                        <div class="mx-3 my-3 gap-5 flex flex-col font-bold">
                            {{-- NIK --}}
                            <div>
                                <div class="after:content-['*'] after:ml-0.5 after:text-red-500">NIK</div>
                                @error('nik')
                                    <small class="text-red-500 text-xs py-3">{{ $message }}</small>
                                @enderror
                                <input type="text" disabled value="{{ $pelaporan->pengajuan->penduduk->nik }}"
                                    placeholder="Masukkan NIK" name="nik" id="nik"
                                    class="font-normal placeholder:text-gray-300 placeholder:font-light required:ring-1 required:ring-red-500 mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">
                            </div>

                            {{-- Nama --}}
                            <div>
                                <div class="after:content-['*'] after:ml-0.5 after:text-red-500">Nama</div>
                                @error('nama')
                                    <small class="text-red-500 text-xs py-3">{{ $message }}</small>
                                @enderror
                                <input type="text" disabled value="{{ $pelaporan->pengajuan->penduduk->nama }}"
                                    placeholder="Masukkan Nama" name="nama" id="nama"
                                    class="font-normal placeholder:text-gray-300 placeholder:font-light required:ring-1 required:ring-red-500 mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">
                            </div>

                            {{-- Tanggal --}}
                            <div>
                                <div class="after:content-['*'] after:ml-0.5 after:text-red-500">Tanggal</div>
                                @error('tanggal')
                                    <small class="text-red-500 text-xs py-3">{{ $message }}</small>
                                @enderror
                                <input type="date" name="accepted_at" id="accepted_at"
                                    value="{{ $pelaporan->pengajuan->accepted_at ? \Carbon\Carbon::parse($pelaporan->pengajuan->accepted_at)->format('Y-m-d') : \Carbon\Carbon::now()->format('Y-m-d') }}"
                                    class="font-normal placeholder:text-gray-300 placeholder:font-light required:ring-1 required:ring-red-500 mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">
                            </div>

                            {{-- Jenis Laporan --}}
                            <div>
                                <div class="after:content-['*'] after:ml-0.5 after:text-red-500">Jenis Laporan</div>
                                @error('jenis_pelaporan')
                                    <small class="text-red-500 text-xs py-3">{{ $message }}</small>
                                @enderror
                                <select id="jenis_pelaporan" name="jenis_pelaporan"
                                    class="font-normal  mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">
                                    <option value="" selected disabled>Pilih Jenis Laporan</option>
                                    @foreach ($form['jenis_pelaporan'] as $jenis_pelaporan)
                                        <option value="{{ $jenis_pelaporan }}"
                                            {{ $pelaporan->jenis_pelaporan === $jenis_pelaporan ? 'selected' : '' }}>
                                            {{ $jenis_pelaporan }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        {{-- Lampiran --}}
                        <div class="mx-3 my-3 font-bold">
                            <div>Lampiran</div>

                            <div>
                                @error('image_url')
                                    <small class="text-red-500 text-xs py-3">{{ $message }}</small>
                                @enderror
                                @isset($pelaporan->image_url)
                                    <x-input-file name="image_url" :accept="$extension" :default="route('public', $pelaporan->image_url)" />
                                @else
                                    <x-input-file name="image_url" :accept="$extension" />
                                @endisset
                            </div>
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div class="mx-3 my-3">
                        <label for="text-editor"
                            class="after:content-['*'] after:ml-0.5 after:text-red-500 font-semibold text-navy-night">Keterangan
                        </label>
                        @error('keterangan')
                            <small class="text-red-500 text-xs py-3">{{ $message }}</small>
                        @enderror
                        <textarea id="text-editor" name="keterangan">{{ $pelaporan->pengajuan->keterangan }}</textarea>
                    </div>
                </section>

                {{-- Button --}}
                <div class="mx-3 my-3">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-800 text-white border-2 py-3 px-5 rounded-lg mt-4 mr-2">
                        <p>Simpan</p>
                    </button>
                    <button href="#" onclick="window.history.back()"
                        class="text-black border-2 py-3 px-5 rounded-lg mt-4">
                        <p>Batalkan</p>
                    </button>
                </div>
        </div>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/super-build/ckeditor.js"></script>
        <script>
            CKEDITOR.ClassicEditor.create(document.getElementById("text-editor"), {
                ckfinder: {
                    uploadUrl: "{{ route('file.upload', ['_token' => csrf_token()]) }}"
                },
                toolbar: {
                    items: [
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript',
                        'removeFormat', '|',
                        'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'uploadImage', 'blockQuote', 'insertTable',
                        '|',
                        'specialCharacters', 'horizontalLine', '|'
                    ],
                    shouldNotGroupWhenFull: true
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                placeholder: 'Tuliskan sesuatu...',
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                removePlugins: [
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'MultiLevelList',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            });

            const previewImage = () => {
                const fileInput = document.querySelector('#file_input');
                const imagePreview = document.querySelector('#preview-image');
                const filePreview = document.querySelector('#preview-file');

                if (fileInput.files && fileInput.files[0]) {
                    if (fileInput.files[0].type !== 'application/pdf') {
                        !filePreview.classList.contains('hidden') ? filePreview.classList.add('hidden') : '';
                        imagePreview.classList.remove('hidden');
                        imagePreview.classList.add('inline-block', 'py-5');
                    } else {
                        !imagePreview.classList.contains('hidden') ? imagePreview.classList.add('hidden') : '';
                        filePreview.textContent = fileInput.files[0].name;
                        filePreview.classList.remove('hidden');
                    }
                }


                if (fileInput.files[0].type !== 'application/pdf') {
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(fileInput.files[0]);

                    oFReader.onload = function(oFREvent) {
                        imagePreview.src = oFREvent.target.result;
                    }
                }
            }
        </script>
    @endpush
    @push('styles')
        <style>
            .ck-editor__editable_inline {
                min-height: 300px;
                padding: 3rem;
            }

            .ck-content h2 {
                display: block;
                font-size: 1.5em;
                font-weight: bold;
            }

            .ck-content h3 {
                display: block;
                font-size: 1.33em;
                font-weight: bold;
            }

            .ck-content h4 {
                display: block;
                font-size: 1.17em;
                font-weight: bold;
            }

            .ck-content ol {
                display: block;
                list-style-type: decimal;
                padding-left: 40px;
            }

            .ck-content ul {
                display: block;
                list-style-type: disc;
                padding-left: 40px;
            }

            .ck-content a {
                color: rgb(59 130 246);
                text-decoration: underline;
                background-color: transparent;
            }

            .ck-content blockquote {
                padding: 1rem;
                margin: 1rem 0;
                border-left: 4px solid rgb(209 213 219);
            }

            .ck-content table {
                table-layout: auto;
                width: 100%;
                font-size: 0.875rem;
                line-height: 1.25rem;
                text-align: left;
                color: #0B1215;
            }

            .ck-content table th {
                background-color: rgb(229 231 235);
                padding: 0.75rem;
                border: 1px solid rgb(209 213 219);
            }

            .ck-content table td {
                border: 1px solid rgb(209 213 219);
                padding: 0.75rem;
            }

            .ck-content blockquote p {
                font-size: 1rem;
                line-height: 1.25rem;
                font-style: italic;
                font-weight: 500;
                line-height: 1.625;
                color: #0B1215;
            }
        </style>
    @endpush
    {{-- Content End --}}
</x-app-layout>
