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
            <div class="logo-name">SatuPintu</div>
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
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
                    <a href="/kabupaten" class="link">
                      <i class='bx bx-map-pin' ></i>
                        <span class="name">Kabupaten</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="/kabupaten" class="link submenu-title">Kabupaten</a>
                    <!-- submenu links here  -->
                </div>
            </li>
            
            <!-- -------- Non Dropdown List Item ------- -->
          

            <!-- -------- Dropdown List Item ------- -->
           
        </ul>
    </div>

    <!-- ============= Home Section =============== -->
    <section class="home p-4">
        <div class="toggle-sidebar">
            <i class="toggle-menux bx bx-menu"></i>
            <nav class="border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 left-0 right-0 top-0 z-50">
                <div class="flex flex-wrap justify-between items-center">
                  <div class="flex ">
                    <!-- Notifications -->
                    <button
                      type="button"
                      data-dropdown-toggle="notification-dropdown"
                      class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    >
                      <span class="sr-only">View notifications</span>
                      <!-- Bell icon -->
                      <svg
                        aria-hidden="true"
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                        ></path>
                      </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div
                      class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
                      id="notification-dropdown"
                    >
                      <div
                        class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300"
                      >
                        Notifications
                      </div>
                      <div>
                        <a
                          href="#"
                          class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                        >
                          <div class="flex-shrink-0">
                            <img
                              class="w-11 h-11 rounded-full"
                              src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                              alt="Bonnie Green avatar"
                            />
                            <div
                              class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700"
                            >
                              <svg
                                aria-hidden="true"
                                class="w-3 h-3 text-white"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
                                ></path>
                                <path
                                  d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
                                ></path>
                              </svg>
                            </div>
                          </div>
                          <div class="pl-3 w-full">
                            <div
                              class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                            >
                              New message from
                              <span class="font-semibold text-gray-900 dark:text-white"
                                >Bonnie Green</span
                              >: "Hey, what's up? All set for the presentation?"
                            </div>
                            <div
                              class="text-xs font-medium text-primary-600 dark:text-primary-500"
                            >
                              a few moments ago
                            </div>
                          </div>
                        </a>
                        <a
                          href="#"
                          class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                        >
                          <div class="flex-shrink-0">
                            <img
                              class="w-11 h-11 rounded-full"
                              src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                              alt="Jese Leos avatar"
                            />
                            <div
                              class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-700"
                            >
                              <svg
                                aria-hidden="true"
                                class="w-3 h-3 text-white"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"
                                ></path>
                              </svg>
                            </div>
                          </div>
                          <div class="pl-3 w-full">
                            <div
                              class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                            >
                              <span class="font-semibold text-gray-900 dark:text-white"
                                >Jese leos</span
                              >
                              and
                              <span class="font-medium text-gray-900 dark:text-white"
                                >5 others</span
                              >
                              started following you.
                            </div>
                            <div
                              class="text-xs font-medium text-primary-600 dark:text-primary-500"
                            >
                              10 minutes ago
                            </div>
                          </div>
                        </a>
                        <a
                          href="#"
                          class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                        >
                          <div class="flex-shrink-0">
                            <img
                              class="w-11 h-11 rounded-full"
                              src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                              alt="Joseph McFall avatar"
                            />
                            <div
                              class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white dark:border-gray-700"
                            >
                              <svg
                                aria-hidden="true"
                                class="w-3 h-3 text-white"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </div>
                          </div>
                          <div class="pl-3 w-full">
                            <div
                              class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                            >
                              <span class="font-semibold text-gray-900 dark:text-white"
                                >Joseph Mcfall</span
                              >
                              and
                              <span class="font-medium text-gray-900 dark:text-white"
                                >141 others</span
                              >
                              love your story. See it and view more stories.
                            </div>
                            <div
                              class="text-xs font-medium text-primary-600 dark:text-primary-500"
                            >
                              44 minutes ago
                            </div>
                          </div>
                        </a>
                        <a
                          href="#"
                          class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                        >
                          <div class="flex-shrink-0">
                            <img
                              class="w-11 h-11 rounded-full"
                              src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                              alt="Roberta Casas image"
                            />
                            <div
                              class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white dark:border-gray-700"
                            >
                              <svg
                                aria-hidden="true"
                                class="w-3 h-3 text-white"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </div>
                          </div>
                          <div class="pl-3 w-full">
                            <div
                              class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                            >
                              <span class="font-semibold text-gray-900 dark:text-white"
                                >Leslie Livingston</span
                              >
                              mentioned you in a comment:
                              <span
                                class="font-medium text-primary-600 dark:text-primary-500"
                                >@bonnie.green</span
                              >
                              what do you say?
                            </div>
                            <div
                              class="text-xs font-medium text-primary-600 dark:text-primary-500"
                            >
                              1 hour ago
                            </div>
                          </div>
                        </a>
                        <a
                          href="#"
                          class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                          <div class="flex-shrink-0">
                            <img
                              class="w-11 h-11 rounded-full"
                              src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/robert-brown.png"
                              alt="Robert image"
                            />
                            <div
                              class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-purple-500 rounded-full border border-white dark:border-gray-700"
                            >
                              <svg
                                aria-hidden="true"
                                class="w-3 h-3 text-white"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"
                                ></path>
                              </svg>
                            </div>
                          </div>
                          <div class="pl-3 w-full">
                            <div
                              class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                            >
                              <span class="font-semibold text-gray-900 dark:text-white"
                                >Robert Brown</span
                              >
                              posted a new video: Glassmorphism - learn how to implement
                              the new design trend.
                            </div>
                            <div
                              class="text-xs font-medium text-primary-600 dark:text-primary-500"
                            >
                              3 hours ago
                            </div>
                          </div>
                        </a>
                      </div>
                      <a
                        href="#"
                        class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline"
                      >
                        <div class="inline-flex items-center">
                          <svg
                            aria-hidden="true"
                            class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path
                              fill-rule="evenodd"
                              d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                              clip-rule="evenodd"
                            ></path>
                          </svg>
                          View all
                        </div>
                      </a>
                    </div>
                    <button
                      type="button"
                      class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                      id="user-menu-button"
                      aria-expanded="false"
                      data-dropdown-toggle="dropdown"
                    >
                      <span class="sr-only">Open user menu</span>
                      <img
                        class="w-8 h-8 rounded-full"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                        alt="user photo"
                      />
                    </button>
                    <!-- Dropdown menu -->
                    <div
                      class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                      id="dropdown"
                    >
                      <div class="py-3 px-4">
                        <span
                          class="block text-sm font-semibold text-gray-900 dark:text-white"
                          >{{ Auth::user()->name }}</span
                        >
                        <span
                          class="block text-sm text-gray-900 truncate dark:text-white"
                          >{{ Auth::user()->email }}</span
                        >
                      </div>
                    
                      <ul
                        class="py-1 text-gray-700 dark:text-gray-300"
                        aria-labelledby="dropdown"
                      >
                       
                        
                      <ul
                        class="py-1 text-gray-700 dark:text-gray-300"
                        aria-labelledby="dropdown"
                      >
                        <li>
                          <a
                            href="/logout"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >Sign out</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </nav>
        </div>
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