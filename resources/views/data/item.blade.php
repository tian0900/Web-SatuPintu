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
    @include('layout.index')
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
                        <form action="{{ route('item.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="retribusi_id">ID Retribusi </label>
                                {{-- <input type="number" class="form-control" id="retribusi_id" name="retribusi_id" required> --}}
                                {{-- <select class="form-control" id="retribusi-option" name="retribusi_id">
                                    @foreach ($retribusis as $retribusi)
                                       <option value="{{ $retribusi->id }}">{{ $retribusi->nama }}</option>
                                    @endforeach
                                 </select> --}}
                            </div>
                            <div class="form-group">
                                <label for="kategori_nama">Kategori Nama</label>
                                <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_tagihan">Jenis Tagihan</label>
                                <input type="text" class="form-control" id="jenis_tagihan" name="jenis_tagihan" required>
                            </div>k
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" required>
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
                        <th>Retribusi ID</th>
                        <th>Kategori Nama</th>
                        <th>Jenis Tagihan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php $number = 1; @endphp <!-- Inisialisasi nomor -->
                    @foreach ($item as $data)
                        <tr>
                            <td>{{ $number++ }}</td> <!-- Tampilkan nomor dan tambahkan 1 setiap loop -->
                            <td>{{ $data->retribusi_id }}</td>
                            <td>{{ $data->kategori_nama }}</td>
                            <td>{{ $data->jenis_tagihan }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>
                                <!-- Button untuk membuka modal Edit -->
                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-toggle="modal"
                                    data-target="#def<?= $data->id ?>">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Modal untuk Edit Data -->  
                        <div class="modal fade" id="def<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
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
                                    <form id="editForm" action="{{ route('item.update', $data->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Method spoofing untuk PUT request -->
                                        <div class="form-group">
                                            <label for="editUsername">ID Retribusi</label>
                                            <input type="number" class="form-control" name="retribusi_id"
                                                required value="{{ old('retribusi_id', $data->retribusi_id)}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="editKategoriNama">Kategori Nama</label>
                                            <input type="text" class="form-control" id="kategori_nama" name="kategori_nama"
                                                required value="{{ old('kategori_nama', $data->kategori_nama )}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="editjenis">Jenis Tagihan</label>
                                            <input type="text" class="form-control" id="editjenis" name="jenis_tagihan"
                                                required value="{{ old('jenis_tagihan', $data->jenis_tagihan )}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="editHarga">Harga</label>
                                            <input type="text" class="form-control" id="editHarga" name="harga"
                                                required value="{{ old('harga', $data->harga )}}">
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
