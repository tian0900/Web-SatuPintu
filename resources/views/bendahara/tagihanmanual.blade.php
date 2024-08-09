@extends('layout.sidebarbendahara')
<!-- ============= Home Section =============== -->
@section('content')
    <div class="container p-5">
        <h1 class="mt-3 text-4xl tracking-tight">Daftar Tagihan Manual</h1>

        <div class="container mt-3">
            <div class="flex flex-col space-y-4 mb-4">
                <form id="exportForm" action="{{ route('export-tagihan-manual') }}" method="get"
                    class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <label for="start_date" class="text-sm font-medium">Start Date:</label>
                        <input type="date" name="start_date" id="start_date"
                            class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="flex items-center space-x-2">
                        <label for="end_date" class="text-sm font-medium">End Date:</label>
                        <input type="date" name="end_date" id="end_date"
                            class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <input type="hidden" name="filter" id="exportFilter" value="">

                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Export
                        to Excel</button>
                </form>
            </div>

            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div class="">
                    <div class="relative">
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button">
                            <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                            </svg>
                            Filter Data
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="dropdownRadio" class="hidden z-10 w-48 bg-white rounded-lg shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                <li>
                                    <a href="?filter=day"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Day</a>
                                </li>
                                <li>
                                    <a href="?filter=week"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Week</a>
                                </li>
                                <li>
                                    <a href="?filter=month"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Month</a>
                                </li>
                                <li>
                                    <a href="?filter=year"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Year</a>
                                </li>
                                <li>
                                    <a href="?filter=all"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">All</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Include necessary scripts -->
                    <script>
                        document.getElementById('dropdownRadioButton').addEventListener('click', function() {
                            var dropdown = document.getElementById('dropdownRadio');
                            dropdown.classList.toggle('hidden');
                        });
                    </script>
                </div>
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
                    <div class="form">
                        <form method="GET" action="{{ url('/tagihannmanual') }}">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="search" id="table-search"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for items" value="{{ request('search') }}">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="table-responsive"> <!-- Responsiveness for small screens -->
                <div class="relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400 text-centerd">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Petugas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Wilayah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nominal
                                </th>
                                {{-- <th scope="col" class="px-6 py-3">
                                    Bukti Pembayaran
                                </th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = ($tagihan->currentPage() - 1) * $tagihan->perPage() + 1;
                            @endphp <!-- Inisialisasi nomor -->
                            @foreach ($tagihan as $item)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $number++ }}
                                    </td>
                                    <td scope="row"
                                        class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->name }}
                                    </td>
                                    <td scope="row"
                                        class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->nama }}
                                    </td>

                                    <td class="px-3 py-4">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    {{-- <td class="px-3 py-4">
                                        <a data-modal-target="modal<?= $item->id ?>"
                                            data-modal-toggle="modal<?= $item->id ?>"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-center">Lihat
                                            Bukti</a>
                                    </td> --}}


                                </tr>

                                <!-- Small Modal -->
                                <div id="modal<?= $item->id ?>" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Bukti Pembayaran
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="select-modal"
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
                                            <div class="p-4 md:p-5">
                                                <img class="card-img-top"
                                                    src="{{ asset('https://satupintu-del.site/' . $item->bukti_bayar) }}"
                                                    alt="Bukti Bayar"
                                                    style="max-height: 500px; max-width: 100%; object-fit: contain;">
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
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $tagihan->firstItem() }}</span> to
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $tagihan->lastItem() }}</span> of
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $tagihan->total() }}</span>
                        </span>

                        <div class="w-full md:w-auto text-right">
                            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                <!-- Previous Page Link -->
                                @if ($tagihan->onFirstPage())
                                    <li aria-disabled="true" aria-label="Previous">
                                        <span
                                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 cursor-not-allowed">Previous</span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $tagihan->previousPageUrl() }}"
                                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                            aria-label="Previous">Previous</a>
                                    </li>
                                @endif

                                <!-- Pagination Elements -->
                                @foreach ($tagihan->links()->elements[0] as $page => $url)
                                    @if ($page == $tagihan->currentPage())
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
                                @if ($tagihan->hasMorePages())
                                    <li>
                                        <a href="{{ $tagihan->nextPageUrl() }}"
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
                </div>
            </div>
        </div>
    @endsection
    <!-- Flowbite CDN -->
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

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
