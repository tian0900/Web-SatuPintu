<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- ICONS -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="{{ asset ('Sidebar/style.css')}}" />
    <link rel='icon' href="logo/Logo.png">
    <!-- Bootstrap CSS -->
    
    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="assets/img/kxp_fav.png" type="image/x-icon">
    <!-- Taildwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
  
    <div class="sidebar close">
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            {{-- <i class='bx bxl-xing'></i> --}}
            <img class="img-logo" src="Logo/logo.png" alt="">
            <div class="logo-name">
              Aplikasi Retribusi
          </div>
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
              <div class="title">
                  <a href="/dashboard-kabupaten" class="link">
                      <i class='bx bx-grid-alt'></i>
                      <span class="name">Dashboard</span>
                  </a>
              </div>
              <div class="submenu">
                  <a href="/dashboard-kabupaten" class="link submenu-title">Dashboard</a>
              </div>
            </li>

            <li>
              <div class="title">
                  <a href="/retribusi" class="link">
                    <i class='bx bx-map-alt'></i>
                      <span class="name">Retribusi</span>
                  </a>
                  <!-- <i class='bx bxs-chevron-down'></i> -->
              </div>
              <div class="submenu">
                  <a href="/retribusi" class="link submenu-title">Retribusi</a>
                  <!-- submenu links here  -->
              </div>
          </li>
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="/kedinasan" class="link">
                        <i class='bx bx-sitemap'></i>
                        <span class="name">Kedinasan</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="/kedinasan" class="link submenu-title">Kedinasan</a>
                </div>
            </li>
            
            <li>
              <div class="title">
                  <a href="/logout" class="link">
                    <i class='bx bx-log-out'></i>
                      <span class="name">Logout</span>
                  </a>
                  <!-- <i class='bx bxs-chevron-down'></i> -->
              </div>
              <div class="submenu">
                  <a href="/logout" class="link submenu-title">Logout</a>
                  <!-- submenu links here  -->
              </div>
            </li>
            
            <!-- -------- Non Dropdown List Item ------- -->
          

            <!-- -------- Dropdown List Item ------- -->
           
        </ul>
    </div>

    <!-- ============= Home Section =============== -->
    <section class="home p-4">
      <nav class="bg-white border-gray-200 dark:bg-gray-900 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 toggle-sidebar">
          <i class="toggle-menux bx bx-menu"></i>
          <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
              <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" alt="user photo" />
              </button>
              <!-- Dropdown menu -->
              <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <div class="px-4 py-3">
                  <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                  <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                </div>
                
                <ul class="py-2" aria-labelledby="user-menu-button">
                  <li>
                    <a href="/logout" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                      Sign out
                    </a>
                  </li>
                </ul>
              </div>
              <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
          </div> 
        </div>
      </nav>
      @yield('content')
    </section>

    <!-- jQuery and JS -->
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