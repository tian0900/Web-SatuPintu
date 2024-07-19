
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
                        
                    </div>
                    <div class="image-dashboard"> 
                        <img src="Auth/Admin-kabupat.png" alt="">
                    </div>
                </div> 
            </div> 
        </div>
    </div>
    <div class="grid grid-cols-1 gap-12 lg:grid-cols-3 "> 
        <div class=" mx-auto max-w-screen-sm ">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-1">   
                <div class="mx-auto max-w-screen-xl col-span-1">
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
                                        {{$number++}}
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
        <div class="sm:grid-cols-1">
            <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
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