@extends('layout.sidebarpasar')

@section('content')
    <div class="container p-5">
        <h1 class="mt-3 text-4xl tracking-tight">Atribut</h1>

        @if (auth()->user()->admin->retribusi_id &&
                App\Models\Post::where('retribusi_id', auth()->user()->admin->retribusi_id)->exists())
                <div class="container"> 
                    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        <div class="button">
                            <button data-modal-target="addDataModal" data-modal-toggle="addDataModal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5 mb-5"
                            type="button">
                            Tambah Data Baru
                            </button>
                        </div>
                        <div class="search">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" id="table-search"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for items">
                            </div>
                        </div>
                    </div>
                </div> 
        @endif
        
        <div id="addDataModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-modal">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Tambah Data Baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="addDataModal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('dinamis.store') }}" method="POST" class="p-6 space-y-6">
                        @csrf
                        <!-- Dynamic fields based on account type or data category -->
                        @foreach ($headers as $field)
                            <div>
                                <label for="{{ $field }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                                <input type="text" id="{{ $field }}" name="{{ $field }}"
                                    class="dynamic-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                        @endforeach
                        <div
                            class="flex items-center justify-end space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-modal-toggle="addDataModal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if ( !auth()->user()->admin->retribusi_id ||
                !App\Models\Post::where('retribusi_id', auth()->user()->admin->retribusi_id)->exists()) 
            <div class="container"> 
                <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                    <div class="button">
                        <button data-modal-target="addModal" data-modal-toggle="addModal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5 mb-5"
                        type="button">
                        Tambah Field Baru
                    </button>
                    </div> 
                </div>
            </div>
        @endif

        <!-- Modal untuk menambah data baru -->
        <div id="addModal" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 z-50 overflow-y-auto hidden bg-black bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md dark:bg-gray-800">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Tambah Data Baru</h3>
                        <button type="button" class="text-gray-500 hover:text-gray-700 dark:text-gray-400"
                            data-modal-toggle="addModal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('dataa.store') }}" method="POST" class="space-y-4" id="dynamic-form">
                        @csrf
                        <div id="dynamic-fields">
                            <!-- Placeholder untuk field dan nilai yang ditambahkan dinamis -->
                        </div>
                        <button type="button"
                            class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:bg-gray-300"
                            id="addDynamicField">
                            Tambah Field dan Nilai
                        </button>
                        <div class="flex justify-end space-x-2">
                            <button type="submit"
                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                Simpan
                            </button>
                            <button type="button"
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:bg-gray-300"
                                data-modal-toggle="addModal">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Buat Data Baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('atribut.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="kelompok_pasar"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelompok
                                    Pasar</label>
                                <!-- Menggunakan dropdown untuk kelompok pasar -->
                                <select id="kelompok_pasar" name="kelompok_pasar"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                                    @foreach ($wilayah as $wilayah)
                                        <option value="{{ $wilayah->nama }}">{{ $wilayah->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="jenis_unit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Unit</label>
                                <input type="text" id="jenis_unit" name="jenis_unit"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Jenis Unit" required="">
                            </div>
                        </div>
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="F-Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                                <input type="text" id="unit" name="unit"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Unit" required="">
                            </div>
                        </div>
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="F-Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                    Unit</label>
                                <input type="text" id="no_unit" name="no_unit"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="No Unit" required="">
                            </div>
                        </div>
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="jenis_tagihan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Tagihan</label>
                                <select id="jenis_tagihan" name="jenis_tagihan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                                    <option value="" disabled selected>Pilih Jenis Tagihan</option>
                                    <option value="HARIAN">HARIAN</option>
                                    <option value="MINGGUAN">MINGGUAN</option>
                                    <option value="BULANAN">BULANAN</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="harga"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                <input type="text" id="harga" name="harga"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Harga" required="">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container m-5">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            </div>
            <div class="table-responsive"> <!-- Responsiveness for small screens -->
                <div class="relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No.</th>
                                @foreach ($headers as $header)
                                    <th scope="col" class="px-6 py-3">{{ ucwords(str_replace('_', ' ', $header)) }}
                                    </th>
                                @endforeach
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = ($atribut->currentPage() - 1) * $atribut->perPage() + 1;
                            @endphp <!-- Inisialisasi nomor -->
                            @foreach ($atribut as $item)
                                @foreach ($item['data'] as $data)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $number++ }}
                                        </td>
                                        @foreach ($headers as $header)
                                            <td class="px-6 py-4">
                                                {{ $data[$header] ?? '-' }}
                                            </td>
                                        @endforeach
                                        <td class="px-6 py-4">
                                            <!-- Modal toggle -->
                                            <a data-modal-target="modal{{ $item->_id }}"
                                                data-modal-toggle="modal{{ $item->_id }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-center">Edit</a>
                                            <a data-modal-target="modalhapus{{ $item->_id }}"
                                                data-modal-toggle="modalhapus{{ $item->_id }}"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline text-center">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- Main modal -->
                                {{-- <div id="modal<?= $item->id ?>" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit Data
                                                </h3>
                                                <button type="button"
                                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="modal<?= $item->id ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4">
                                                <form action="{{ route('atribut.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="kelompok_pasar"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelompok
                                                                Pasar</label>
                                                            <input type="text" id="kelompok_pasar"
                                                                name="edit_kelompok_pasar"
                                                                value="{{ $item['data'][0]['Kelompok_pasar'] }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="jenis_unit"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                                Unit</label>
                                                            <input type="text" id="jenis_unit" name="edit_jenis_unit"
                                                                value="{{ $item['data'][0]['jenis_unit'] }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="unit"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                                                            <input type="text" id="unit" name="edit_unit"
                                                                value="{{ $item['data'][0]['unit'] }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="no_unit"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                                                Unit</label>
                                                            <input type="text" id="no_unit" name="edit_no_unit"
                                                                value="{{ $item['data'][0]['no_unit'] }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required="">
                                                        </div>
                                                    </div>

                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="harga"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                                            <input type="text" id="harga" name="edit_harga"
                                                                value="{{ $item['data'][0]['harga'] }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        Edit product
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Main modal -->
                                <div id="modalhapus<?= $item->id ?>" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="modalhapus<?= $item->id ?>">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>

                                            <!-- Modal body -->
                                            <div class="p-4 text-center ">
                                                <form action="{{ route('pasar.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('Delete')
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Apakah Anda yakin ingin menghapus Atribut ini?</h3>
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Ya, saya yakin
                                                    </button>
                                                    <button data-modal-hide="modalhapus<?= $item->id ?>" type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                        Batalkan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>


                    <nav class="bg-white flex items-center flex-column flex-wrap md:flex-row justify-between p-4"
                        aria-label="Table navigation">
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $atribut->firstItem() }}</span>
                            to
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $atribut->lastItem() }}</span> of
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $atribut->total() }}</span>
                        </span>

                        <div class="w-full md:w-auto text-right">
                            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                <!-- Previous Page Link -->
                                @if ($atribut->onFirstPage())
                                    <li aria-disabled="true" aria-label="Previous">
                                        <span
                                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 cursor-not-allowed">Previous</span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $atribut->previousPageUrl() }}"
                                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                            aria-label="Previous">Previous</a>
                                    </li>
                                @endif

                                <!-- Pagination Elements -->
                                @foreach ($atribut->links()->elements[0] as $page => $url)
                                    @if ($page == $atribut->currentPage())
                                        <li aria-current="page">
                                            <span
                                                class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $url }}"
                                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                <!-- Next Page Link -->
                                @if ($atribut->hasMorePages())
                                    <li>
                                        <a href="{{ $atribut->nextPageUrl() }}"
                                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                            aria-label="Next">Next</a>
                                    </li>
                                @else
                                    <li aria-disabled="true" aria-label="Next">
                                        <span
                                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 cursor-not-allowed">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>


                    <!-- Bagian bawah tetap sama -->

                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div id="success-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="success-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-blue-500 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path fill="currentColor"
                                d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                            <path fill="#fff"
                                d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                            {{ session('success') }}
                        </h3>
                        <button data-modal-hide="success-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Oke</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
<!-- Tambahkan ini di bawah halaman HTML Anda, sebelum penutup </body> -->
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

<script>
    // JavaScript untuk menambahkan field dan nilai secara dinamis
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.querySelector('#addDynamicField');
        const dynamicFields = document.querySelector('#dynamic-fields');

        addButton.addEventListener('click', function() {
            const inputField = document.createElement('div');
            inputField.innerHTML = `
                <div class="flex space-x-4 mb-4">
                    <input type="text" name="dynamicField[]" placeholder="Nama Field"
                        class="w-1/2 px-3 py-2 text-sm leading-tight text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                    <input type="text" name="dynamicValue[]" placeholder="Nilai"
                        class="w-1/2 px-3 py-2 text-sm leading-tight text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                </div>
            `;
            dynamicFields.appendChild(inputField);
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('table-search');
        const rows = document.querySelectorAll(
            'tbody tr'); // Menggunakan selector yang sesuai dengan struktur tabel Anda

        searchInput.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase())
                    .join(' ');
                row.style.display = rowText.includes(searchValue) ? '' : 'none';
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if ({{ session('success') ? 'true' : 'false' }}) {
            const modal = new Modal(document.getElementById('success-modal'));
            modal.show();
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fields = document.querySelectorAll('.dynamic-field');
        const form = document.querySelector('form');
        const kategoriNamaInput = document.getElementById('kategori_nama');

        fields.forEach(field => {
            field.addEventListener('input', updateKategoriNama);
        });

        function updateKategoriNama() {
            const values = Array.from(fields)
                .filter(field => field.id !== 'kategori_nama' && field.id.toLowerCase() !== 'harga')
                .map(field => field.value.trim())
                .filter(value => value !== '');

            kategoriNamaInput.value = values.join(' ');
        }

        // Pastikan kategori_nama di-update sebelum form dikirim
        form.addEventListener('submit', function(event) {
            updateKategoriNama();
        });
    });
</script>






<!-- JavaScript to handle dynamic field display -->
<script>
    // Example JavaScript to toggle fields based on account type or data category
    const accountType = "{{ Auth::user()->account_type }}"; // Replace with how you determine account type
    let dynamicFields = [];

    // Example condition to determine dynamic fields
    if (accountType === 'A') {
        dynamicFields = ['jenis_tempat', 'harga', 'kategori_nama', 'durasi'];
    } else if (accountType === 'B') {
        dynamicFields = ['kelompok_pasar', 'jenis_unit', 'unit', 'no_unit', 'harga', 'kategori_nama'];
    }

    // Render dynamic fields in the form
    const form = document.querySelector('form');
    dynamicFields.forEach(field => {
        const label = document.createElement('label');
        label.setAttribute('for', field);
        label.textContent = field.toUpperCase().replace('_', ' ');
        form.insertBefore(label, form.lastElementChild);

        const input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('id', field);
        input.setAttribute('name', field);
        input.setAttribute('class',
            'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white'
        );
        input.setAttribute('required', 'true');
        form.insertBefore(input, form.lastElementChild);
    });
</script>
