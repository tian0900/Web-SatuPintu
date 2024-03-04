<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jenis</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Customize CSS */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Modal CSS */
        .modal-body input {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Daftar Kabupaten</h1>

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
                        <form action="{{ route('kabupaten.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
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
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @php $number = 1; @endphp <!-- Inisialisasi nomor -->
                    @foreach ($kabupaten as $item)
                        <tr>
                            <td>{{ $number++ }}</td> <!-- Tampilkan nomor dan tambahkan 1 setiap loop -->
                            <td>{{ $item->nama }}</td>
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
                                    <form id="editForm" action="{{ route('kabupaten.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Method spoofing untuk PUT request -->
                                        <div class="form-group">
                                            <label for="editnama">Nama</label>
                                            <input type="text" class="form-control" name="nama"
                                                required value="{{ old('nama', $item->nama)}}">
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
    {{-- <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                // Log the data retrieved from the button click
                console.log($(this).data());

                // Mendapatkan data dari tombol edit yang diklik
                var id = $(this).data('id');
                var username = $(this).data('username');
                var identifier = $(this).data('identifier');
                var firstname = $(this).data('firstname');
                var lastname = $(this).data('lastname');

                // Mengisi form edit dengan data yang sesuai
                $('#editForm').attr('action', '/jenis/' + id); // Form action untuk PUT request
                $('#editUsername').val(username);
                $('#editIdentifier').val(identifier);
                $('#editFirstName').val(firstname);
                $('#editLastName').val(lastname);
            });
        });
    </script> --}}

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
