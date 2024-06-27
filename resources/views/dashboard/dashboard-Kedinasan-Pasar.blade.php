
@extends('layout.sidebarpasar')
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
                        </div>
                    </div>
                    <div class="image-dashboard"> 
                        <img src="Auth/Admin-kabupaten.png" alt="">
                    </div>
                </div> 
            </div> 
        </div>
    </div>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-3 sm:py-15 px-10">
        <div>
            <a href="#" class="text block max-w-sm p-6 bg-blue border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-4xl text-gray-900 dark:text-white"><i class='bx bx-directions'></i></p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kabupaten</h5>
                <Here class="text-2xl text-gray-900 dark:text-white">{{ $kabupaten}}</p>
            </a>
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
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">user</h5>
                <Here class="text-2xl text-gray-900 dark:text-white">{{ $user}}</p>
            </a>
        </div> 
    </div>  
  </section>
  
  <section class="bg-white dark:bg-gray-900 ">
      
      
  </section>
</div>

@endsection