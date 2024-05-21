
@extends('layout.sidebarkabupaten')
<!-- ============= Home Section =============== -->
@section('content')
<div class="content">
  <section class="bg-white dark:bg-gray-900">
    <div class="mx-auto max-w-screen-xl pb-5">
        <div class="space-y-8 "> 
            <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-3 mb-3">
                    <div class="content col-span-2">
                        <h5 class="mb-2 text-3xl font-bold text-utama ">Welcome Back {{ Auth::user()->name }} <i class='bx bx-party text-hitam'></i></h5>
                        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Kerja bagus, Sistem Anda siap digunakan! Anda dapat melihat Kedinasan dan mengunduh laporan menggunakan Sistem ini.</p>
                        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                            {{-- <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
                                <div class="text-left rtl:text-right">
                                    <div class="mb-1 text-xs">Download on the</div>
                                    <div class="-mt-1 font-sans text-sm font-semibold">Mac App Store</div>
                                </div>
                            </a>
                            <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg>
                                <div class="text-left rtl:text-right">
                                    <div class="mb-1 text-xs">Get in on</div>
                                    <div class="-mt-1 font-sans text-sm font-semibold">Google Play</div>
                                </div>
                            </a> --}}
                        </div>
                    </div>
                    <div class="image-dashboard"> 
                        <img src="Auth/Admin-kabupat.png" alt="">
                    </div>
                </div> 
            </div> 
        </div>
    </div>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-3 ">
        {{-- <div>
            <a href="#" class="text block max-w-sm p-6 bg-blue border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-4xl text-gray-900 dark:text-white"><i class='bx bx-directions'></i></p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kabupaten</h5>
                <Here class="text-2xl text-gray-900 dark:text-white">{{ $kabupaten}}</p>
            </a>
        </div>  --}}
        <div class=" mx-auto max-w-screen-xl ">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">  
                {{-- <div class="w-full max-w-md p-42bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Retribusi</h5> 
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($data as $sistem)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center"> 
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            <i class='bx bx-book-open'></i> {{$sistem->nama}}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach 
                        </ul>
                    </div>
                </div>  --}}
                <div class="mx-auto max-w-screen-xl col-span-2">
                    <div class="relative border overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 dark:bg-gray-800">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 dark:bg-gray-800">
                                        Nama Retribusi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kedinasan
                                    </th> 
                                </tr>
                            </thead>
                            <tbody>
                                @php $number = 1; @endphp <!-- Inisialisasi nomor -->
                                @foreach ($data as $ked)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{$number}}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{$ked->nama}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$ked->kepala_dinas}}
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
            </div>
        </div>
        <div>
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-4xl text-gray-900 dark:text-white"><i class='bx bxs-institution'></i></p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kedinasan</h5>
                <Here class="text-2xl text-gray-900 dark:text-white">{{ $kedinasan}}</p>
            </a>
        </div>  
        <div>
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-4xl text-gray-900 dark:text-white"><i class='bx bx-briefcase-alt-2'></i></p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Retribusi</h5>
                <Here class="text-2xl text-gray-900 dark:text-white">{{ $retribusi}}</p>
            </a>
        </div>
         
    </div> 
   
  </section>
  
  <section class="bg-white dark:bg-gray-900 ">
      
      
  </section>
</div>

@endsection