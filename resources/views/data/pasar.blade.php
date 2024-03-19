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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="assets/img/kxp_fav.png" type="image/x-icon">
    {{-- <link rel="stylesheet" href="assets/css/style.css"> --}}
    
</head>

<body>
  <div class="sidebar close">
    <!-- ========== Logo ============  -->
    <a href="#" class="logo-box">
        <i class='bx bxl-xing'></i>
        <div class="logo-name">yourLogo</div>
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
    <div class="container">
      <h1 class="mt-5">Daftar Jenis</h1>

      <!-- Button untuk membuka modal -->
      <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambahModal">Tambah
          Data</button>

      <!-- Modal Tambah -->
      <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- Form untuk tambah data -->
                      <form action="{{ route('jenis.store') }}" method="POST">
                          @csrf
                          <div class="form-group">
                              <label for="Username">Username</label>
                              <input type="text" class="form-control" id="Username" name="Username" required>
                          </div>
                          <div class="form-group">
                              <label for="Identifier">Identifier</label>
                              <input type="number" class="form-control" id="Identifier" name="Identifier" required>
                          </div>
                          <div class="form-group">
                              <label for="First_name">First name</label>
                              <input type="text" class="form-control" id="First_name" name="First_name" required>
                          </div>
                          <div class="form-group">
                              <label for="Last_name">Last name</label>
                              <input type="text" class="form-control" id="Last_name" name="Last_name" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="table-responsive"> <!-- Responsiveness for small screens -->
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Identifier</th>
                    <th>First name</th>
                    <th>Last name</th>
                </tr>
            </thead>
            <tbody>
                @php $number = 1; @endphp <!-- Inisialisasi nomor -->
                @foreach ($jenis as $item)
                    <tr>
                        <td>{{ $number++ }}</td> <!-- Tampilkan nomor dan tambahkan 1 setiap loop -->
                        <td>{{ $item->Username }}</td>
                        <td>{{ $item->Identifier }}</td>
                        <td>{{ $item->First_name }}</td>
                        <td>{{ $item->Last_name }}</td>
                        <td>
                            <!-- Button untuk membuka modal Edit -->
                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-toggle="modal"
                                data-target="#def<?= $item->id ?>">
                                Edit
                            </button>
                        </td>
                    </tr>


                    <!-- Modal untuk Edit Data -->  
                    <div class="modal fade" id="def<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk edit data -->
                                <form id="editForm" action="{{ route('jenis.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Method spoofing untuk PUT request -->
                                    <div class="form-group">
                                        <label for="editUsername">Username</label>
                                        <input type="text" class="form-control" name="Username"
                                            required value="{{ old('Username', $item->Username)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="editIdentifier">Identifier</label>
                                        <input type="number" class="form-control" id="Identifier" name="Identifier"
                                            required value="{{ old('Identifier', $item->Identifier )}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="editFirstName">First name</label>
                                        <input type="text" class="form-control" id="editFirstName" name="First_name"
                                            required value="{{ old('First_name', $item->First_name )}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLastName">Last name</label>
                                        <input type="text" class="form-control" id="editLastName" name="Last_name"
                                            required value="{{ old('Last_name', $item->Last_name )}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
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
</section>
        

    

    <!-- jQuery and Bootstrap JS -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
      integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset ('Sidebar/main.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
</body>

</html>
