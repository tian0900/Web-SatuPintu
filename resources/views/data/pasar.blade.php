<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jenis</title>
    <!-- ICONS -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="{{ asset ('Sidebar/style.css')}}" />
    <!-- Bootstrap CSS -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="assets/img/kxp_fav.png" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    
</head>

<body>
  <div class="sidebar close">
    <!-- ========== Logo ============  -->
    <a href="#" class="logo-box">
        {{-- <i class='bx bxl-xing'></i> --}}
        <img class="img-logo" src="Logo/logo.png" alt="">
        <div class="logo-name">Satu Pintu</div>
    </a>

    <!-- ========== List ============  -->
    <ul class="sidebar-list">
        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-grid-alt'></i>
                    <span class="name">Dashboard</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Dashboard</a>
                <!-- submenu links here  -->
            </div>
        </li>

        <!-- -------- Dropdown List Item ------- -->
        <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-collection'></i>
                    <span class="name">Category</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Category</a>
                <a href="#" class="link">HTML & CSS</a>
                <a href="#" class="link">JavaScript</a>
                <a href="#" class="link">PHP & MySQL</a>
            </div>
        </li>

        <!-- -------- Dropdown List Item ------- -->
        <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-book-alt'></i>
                    <span class="name">Posts</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Posts</a>
                <a href="#" class="link">Web Design</a>
                <a href="#" class="link">Login Form</a>
                <a href="#" class="link">Card Design</a>
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-line-chart'></i>
                    <span class="name">Analytics</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Analytics</a>
                <!-- submenu links here  -->
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="name">Chart</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Chart</a>
                <!-- submenu links here  -->
            </div>
        </li>

        <!-- -------- Dropdown List Item ------- -->
        <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-extension'></i>
                    <span class="name">Plugins</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Plugins</a>
                <a href="#" class="link">UI Face</a>
                <a href="#" class="link">Pigments</a>
                <a href="#" class="link">Box Icons</a>
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-compass'></i>
                    <span class="name">Explore</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Explore</a>
                <!-- submenu links here  -->
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-history'></i>
                    <span class="name">History</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">History</a>
                <!-- submenu links here  -->
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-cog'></i>
                    <span class="name">Settings</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Settings</a>
                <!-- submenu links here  -->
            </div>
        </li>
    </ul>
</div>

<!-- ============= Home Section =============== -->
<section class="home">
    <div class="toggle-sidebar">
        <i class='bx bx-menu'></i>
        <div class="text">Toggle</div>
    </div>
    <div class="container p-5">
      <h1 class="mt-3 text-5xl">Daftar Jenis</h1>

      <!-- Modal toggle -->
      <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5 mb-5" type="button">
        Tambah Data Baru
      </button>

      <!-- Main modal -->
      <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative p-4 w-full max-w-md max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                          Buat Data Baru
                      </h3>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                  </div>
                  <!-- Modal body -->
                  <form class="p-4 md:p-5" action="{{ route('jenis.store') }}" method="POST">
                    @csrf
                      <div class="grid gap-4 mb-4 grid-cols-2">
                          <div class="col-span-2">
                              <label for="Username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                              <input type="text" id="Username" name="Username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Username"  required="">
                          </div>
                      </div>
                      <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="Identifier" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Identifier</label>
                            <input type="number" id="Identifier" name="Identifier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Identifier"  required="">
                        </div>
                      </div>
                      <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="F-Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                            <input type="text" id="First_name" name="First_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name"  required="">
                        </div>
                      </div>
                      <div class="grid gap-4 mb-4 grid-cols-2">
                          <div class="col-span-2">
                              <label for="Last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                              <input type="text" id="Last_name" name="Last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last Name"  required="">
                          </div>
                      </div>
                      <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                          Tambah
                      </button>
                  </form>
              </div>
          </div>
      </div> 

      <div class="container m-5">
        <div class="table-responsive"> <!-- Responsiveness for small screens -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              Username
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Identifier
                          </th>
                          <th scope="col" class="px-6 py-3">
                              First Name
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Last Name
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Action
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @php $number = 1; @endphp <!-- Inisialisasi nomor -->
                    @foreach ($jenis as $item)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->Username }}
                        </th>
                        <td class="px-6 py-4">
                        {{ $item->Identifier }}
                        </td>
                        <td class="px-6 py-4">
                        {{ $item->First_name }}
                        </td>
                        <td class="px-6 py-4">
                        {{ $item->Last_name }}
                        </td>
                        <td class="px-6 py-4">
                        <!-- Modal toggle -->
                        <a data-modal-target="modal<?= $item->id ?>" data-modal-toggle="modal<?= $item->id ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-center">Edit</a>
                        </td>
                    </tr>
    
                    <!-- Main modal -->
                    <div id="modal<?= $item->id ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Sign in to our platform
                                    </h3>
                                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal<?= $item->id ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4">
                                    <form action="{{ route('jenis.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="Username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                                <input type="text" id="Username" name="Username" value="{{ old('Username', $item->Username)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                                            </div>
                                        </div>
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="Identifier" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Identifier</label>
                                            <input type="number" id="Identifier" name="Identifier" value="{{ old('Identifier', $item->Identifier)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                                        </div>
                                        </div>
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="F-Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                            <input type="text" id="First_name" name="First_name" value="{{ old('First_name', $item->First_name)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                                        </div>
                                        </div>
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="Last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                                <input type="text" id="Last_name" name="Last_name" value="{{ old('Last_name', $item->Last_name)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                                            </div>
                                        </div>
                                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            Edit product
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                      @endforeach
                  </tbody>
              </table>
            </div>  
          </div>
      </div>
    </div>
</section>
        

    

    <!-- jQuery and Bootstrap JS -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
      integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset ('Sidebar/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
