@extends('layout.sidebarbendahara')
<!-- ============= Home Section =============== -->
@section('content')
    <div class="container p-5">
        <h1 class="mt-3 text-4xl tracking-tight">Daftar Setoran</h1>

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
                    <form class="p-4 md:p-5" action="" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="kelompok_pasar"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelompok
                                    Pasar</label>
                                <input type="text" id="kelompok_pasar" name="kelompok_pasar"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="kelompok_pasar" required="">
                            </div>
                        </div>
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="jenis_unit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jenis Unit</label>
                                <input type="text" id="jenis_unit" name="jenis_unit"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="jenis_unit" required="">
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
       
        <div class="container mt-3">
            <div class="button">
                <form id="exportForm" action="{{ route('export-setoran') }}" method="get" style="display: inline;">
                    <input type="hidden" name="filter" id="exportFilter" value="">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Export to Excel</button>
                </form>
            </div>
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4 mt-3">
                <div class="flex space-x-4 mb-4"> 
                    <div class="relative">
                        <!-- Button to show selected date range -->
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                            </svg>
                            <span id="dateRangeCaption">{{ $filterLabel ?? 'Show All' }}</span>
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownRadio" class="hidden z-10 absolute mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                <li>
                                    <a href="#" data-filter="all" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show All</a>
                                </li>
                                <li>
                                    <a href="#" data-filter="30days" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                                </li>
                                <li>
                                    <a href="#" data-filter="day" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last Day</a>
                                </li>
                                <li>
                                    <a href="#" data-filter="week" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last Week</a>
                                </li>
                                <li>
                                    <a href="#" data-filter="month" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last Month</a>
                                </li>
                                <li>
                                    <a href="#" data-filter="year" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last Year</a>
                                </li>
                            </ul>
                        </div>

                        <form id="filterForm" method="GET" action="{{ url('/setoran') }}">
                            <input type="hidden" id="filterInput" name="filter" value="{{ request('filter', 'all') }}">
                        </form>

                        <script>
                            document.querySelectorAll('#dropdownRadio a').forEach(function (element) {
                            element.addEventListener('click', function (event) {
                                event.preventDefault();
                                const filter = this.getAttribute('data-filter');
                                document.getElementById('filterInput').value = filter;
                                document.getElementById('filterForm').submit();
                            });
                            });
                        </script> 
                    </div>  
                </div>
                <div class="relative"> 
                    <form action="{{ route('setoran.search') }}" method="GET">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" name="search"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for items" value="{{ request('search') }}">
                        </div>
                    </form>                                                                 
                </div>
            </div>
            <div class="container mx-auto">
            
                <div class="table-responsive mt-4">
                    <div class="relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No.</th>
                                    <th scope="col" class="px-6 py-3">Petugas</th>
                                    <th scope="col" class="px-6 py-3">Wilayah</th>
                                    <th scope="col" class="px-6 py-3">Nominal</th>
                                    <th scope="col" class="px-6 py-3">Bukti Penyetoran</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $number = ($setor->currentPage() - 1) * $setor->perPage() + 1;
                                @endphp
                                @foreach ($setor as $item)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $number++ }}</td>
                                        <td class="px-3 py-4">{{ $item->nama_petugas }}</td>
                                        <td class="px-3 py-4">{{ $item->nama }}</td>
                                        <td class="px-3 py-4">{{ $item->total }}</td>
                                        <td class="px-3 py-4">
                                            <a data-modal-target="modal{{ $item->id }}" data-modal-toggle="modal{{ $item->id }}"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Lihat Bukti</a>
                                        </td>
                                        <td class="px-3 py-4">
                                            <a data-modal-target="modalkonfirmasi{{ $item->id }}" data-modal-toggle="modalkonfirmasi{{ $item->id }}"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Konfirmasi</a>
                                        </td>
                                    </tr>
            
                                    <!-- Modal for Bukti Penyetoran -->
                                    <div id="modal{{ $item->id }}" tabindex="-1"
                                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bukti Penyetoran</h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="modal{{ $item->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <div class="p-4">
                                                    <img class="mx-auto" src="{{ asset('https://satupintu-del.site/' . $item->bukti_penyetoran) }}" alt="Bukti Penyetoran"
                                                        style="height:400px; width:300px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            

                                    <!-- Main modal -->
                                    <form action="{{ route('setor.updateStatus', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div id="modalkonfirmasi{{ $item->id }}"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modalkonfirmasi{{ $item->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center"> 
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin ingin mengkonfirmasi Setoran dari {{ $item->nama_petugas }} senilai {{ $item->total }}?</h3>
                                                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Konfirmasi
                                                        </button>
                                                        <button data-modal-hide="modalkonfirmasi{{ $item->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <nav class="bg-white flex items-center justify-between p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $setor->firstItem() }}</span> to
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $setor->lastItem() }}</span> of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $setor->total() }}</span>
                    </span>
                    <ul class="inline-flex -space-x-px text-sm h-8">
                        @if ($setor->onFirstPage())
                            <li aria-disabled="true" aria-label="Previous">
                                <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 cursor-not-allowed">Previous</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $setor->previousPageUrl() }}"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    aria-label="Previous">Previous</a>
                            </li>
                        @endif
        
                        @foreach ($setor->links()->elements[0] as $page => $url)
                            @if ($page == $setor->currentPage())
                                <li aria-current="page">
                                    <span class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
        
                        @if ($setor->hasMorePages())
                            <li>
                                <a href="{{ $setor->nextPageUrl() }}"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    aria-label="Next">Next</a>
                            </li>
                        @else
                            <li aria-disabled="true" aria-label="Next">
                                <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 cursor-not-allowed">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    @endsection

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
