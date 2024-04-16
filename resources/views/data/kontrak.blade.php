@extends('layout.sidebar')

@section('content')
    <div class="container p-5 pl-64">
        <h1 class="mt-3 text-5xl">Kontrak</h1>

        <!-- Modal toggle -->
        <button data-modal-target="#modalTambahKontrak" class="btn btn-primary">Tambah Data</button>


        <!-- Main modal -->


        <div class="container m-5">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div>

                    <!-- Dropdown menu -->
                    <div id="dropdownRadio"
                        class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-1" type="radio" value="" name="filter-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-1"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        day</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked="" id="filter-radio-example-2" type="radio" value=""
                                        name="filter-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-2"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        7 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-3" type="radio" value="" name="filter-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-3"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        30 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-4" type="radio" value="" name="filter-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-4"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        month</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-5" type="radio" value="" name="filter-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-5"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                        year</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="table-responsive"> <!-- Responsiveness for small screens -->
                <div class="relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Wajib Retribusi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Retribusi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Retribusi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Mulai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Selesai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $number = 1; @endphp <!-- Inisialisasi nomor -->
                            @foreach ($Kontrak as $item)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->WajibRetribusi->User->name }}
                                    </th>
                                    <td class="px-3 py-4">
                                        {{ $item->itemRetribusi->kategori_nama }}
                                    </td>
                                    <td class="px-3 py-4">
                                        {{ $item->itemRetribusi->jenis_tagihan }}
                                    </td>
                                    <td class="px-3 py-4">
                                        {{ $item->tanggal_mulai }}
                                    </td>
                                    <td class="px-3 py-4">
                                        {{ $item->tanggal_selesai }}
                                    </td>
                                    <td class="px-3 py-4">
                                        {{ $item->status }}
                                    </td>
                                    <td class="px-3 py-4">
                                        <!-- Modal toggle -->

                                        <a href="{{ route('surat.detail', ['id' => $item->id]) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-center">Detail</a>

                                    </td>
                                </tr>

                                <!-- Main modal -->
                                <div id="modal<?= $item->id ?>" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Sign in to our platform
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
                                            <!-- Your modal body content here -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                    <nav class="bg-white flex items-center flex-column flex-wrap md:flex-row justify-between p-4"
                        aria-label="Table navigation">
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                                class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{-- MOdal --}}
    <!-- Main modal -->
    <div id="modalTambahKontrak" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
        <div class="relative p-4 w-full max-w-md">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">Tambah Data Kontrak</h3>
                    <button type="button"
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center"
                        data-modal-hide="modalTambahKontrak">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4">
                    <form id="formTambahKontrak">
                        @csrf
                        <div class="mb-4">
                            <label for="wajib_retribusi_id" class="block text-sm font-medium text-gray-700">Wajib
                                Retribusi</label>
                            <select name="wajib_retribusi_id" id="wajib_retribusi_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                @foreach ($wajibRetribusiOptions as $wajibRetribusi)
                                    <option value="{{ $wajibRetribusi->id }}">{{ $wajibRetribusi->User->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="item_retribusi_id" class="block text-sm font-medium text-gray-700">Item
                                Retribusi</label>
                            <select name="item_retribusi_id" id="item_retribusi_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                @foreach ($itemRetribusiOptions as $itemRetribusi)
                                    <option value="{{ $itemRetribusi->id }}">{{ $itemRetribusi->kategori_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="sub_wilayah_id" class="block text-sm font-medium text-gray-700">Sub
                                Wilayah</label>
                            <select name="sub_wilayah_id" id="sub_wilayah_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                @foreach ($subWilayahOptions as $subWilayah)
                                    <option value="{{ $subWilayah->id }}">{{ $subWilayah->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal
                                Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal
                                Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!-- Tambahkan script berikut sebelum tag </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Inisialisasi modal
        $('[data-modal-target]').on('click', function () {
            const targetModal = $(this).data('modal-target');
            $(targetModal).removeClass('hidden');
        });

        // Menyembunyikan modal saat tombol close atau di luar modal diklik
        $('[data-modal-hide]').on('click', function () {
            const targetModal = $(this).data('modal-hide');
            $(targetModal).addClass('hidden');
        });

        // Submit form tambah kontrak secara AJAX
        $('#formTambahKontrak').on('submit', function (e) {
            e.preventDefault();
            const formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('kontrak.store') }}',
                data: formData,
                success: function (response) {
                    // Tambahkan handling sesuai kebutuhan, misalnya tampilkan pesan sukses atau refresh halaman
                    console.log(response);
                    $('#modalTambahKontrak').addClass('hidden');
                    alert('Data Kontrak berhasil ditambahkan');
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    // Tambahkan handling untuk error, misalnya tampilkan pesan error atau validasi error dari backend
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>

    {{-- @endsection --}}
