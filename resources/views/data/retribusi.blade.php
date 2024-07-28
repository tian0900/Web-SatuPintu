@extends('layout.sidebarkabupaten')
<!-- ============= Home Section =============== -->
@section('content')
    <div class="container p-5">
        <h1 class="mt-3 text-4xl tracking-tight">Daftar Retribusi</h1>

        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5 mb-5"
            type="button">
            Tambah Data Baru
        </button>

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
                    <form class="p-4 md:p-5" action="{{ route('retribusi.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    retribusi</label>
                                <input type="text" id="nama" name="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="nama" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="kedinasan_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kedinasan</label>
                                <select id="kedinasan_id" name="kedinasan_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                                    <option value="">Pilih Kedinasan</option>
                                    @foreach ($kedinasan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
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
                <div class="relative">
                    <button id="dropdownRadioButton" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button">
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
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
                                <a href="{{ url('retribusi?filter=day') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Day</a>
                            </li>
                            <li>
                                <a href="{{ url('retribusi?filter=week') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Week</a>
                            </li>
                            <li>
                                <a href="{{ url('retribusi?filter=month') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Month</a>
                            </li>
                            <li>
                                <a href="{{ url('retribusi?filter=year') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Year</a>
                            </li>
                            <li>
                                <a href="{{ url('retribusi?filter=all') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">All</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Include necessary scripts -->
                    <script>
                        document.getElementById('dropdownRadioButton').addEventListener('click', function() {
                            var dropdown = document.getElementById('dropdownRadio');
                            dropdown.classList.toggle('hidden');
                        });
                    </script>
                </div>  
                <form action="{{ route('retribusi.index') }}" method="GET">
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
                        <input type="text" id="table-search" name="search" value="{{ request()->query('search') }}"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items">
                    </div>
                </form>
                
            </div>
            <div class="container"> 
                <div class="table-responsive">
                    <div class="relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama Retribusi</th>
                                    <th scope="col" class="px-6 py-3">Kedinasan</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($retribusi as $data)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $data->nama }}</td>
                                        <td class="px-6 py-4">{{ $data->kedinasan->nama }}</td>
                                        <td class="px-6 py-4">
                                            <a data-modal-target="modal{{ $data->id }}" data-modal-toggle="modal{{ $data->id }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-center">Edit</a>
                                            <a data-modal-target="modalhapus{{ $data->id }}" data-modal-toggle="modalhapus{{ $data->id }}"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline text-center">hapus</a>
                                        </td>
                                    </tr>
                                    <!-- Modals omitted for brevity -->
                                @endforeach
                            </tbody>
                        </table>
            
                        <nav class="bg-white flex items-center flex-column flex-wrap md:flex-row justify-between p-4" aria-label="Table navigation">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                                Showing
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $retribusi->firstItem() }}</span> to
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $retribusi->lastItem() }}</span> of
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $retribusi->total() }}</span>
                            </span>
            
                            <div class="w-full md:w-auto text-right">
                                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                    <!-- Pagination links omitted for brevity -->
                                </ul>
                            </div>
                        </nav>
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
    @endsection <!-- resources/views/data/retribusi.blade.php -->
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
