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
    <!-- Modal Edit -->
    @foreach ($atribut as $market)
        <div class="modal fade" id="editModal<?= $market->id ?>" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel<?= $market->id ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?= $market->id ?>">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form untuk edit data -->
                        <form action="{{ route('atribut.update', $market->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="edit_kelompok_pasar<?= $market->id ?>">Kelompok Pasar</label>
                                <input type="text" class="form-control" id="edit_kelompok_pasar<?= $market->id ?>"
                                    name="edit_kelompok_pasar" value="{{ $market['data'][0]['Kelompok_pasar'] }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="edit_jenis_unit<?= $market->id ?>">Jenis Unit</label>
                                <input type="text" class="form-control" id="edit_jenis_unit<?= $market->id ?>"
                                    name="edit_jenis_unit" value="{{ $market['data'][0]['jenis_unit'] }}" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_unit<?= $market->id ?>">Unit</label>
                                <input type="text" class="form-control" id="edit_unit<?= $market->id ?>"
                                    name="edit_unit" value="{{ $market['data'][0]['unit'] }}" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_harga<?= $market->id ?>">Harga</label>
                                <input type="number" class="form-control" id="edit_harga<?= $market->id ?>"
                                    name="edit_harga" value="{{ $market['data'][0]['harga'] }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
                        <form action="{{ route('atribut.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="kelompok_pasar">Kelompok Pasar</label>
                                <input type="text" class="form-control" id="kelompok_pasar" name="kelompok_pasar"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_unit">Jenis Unit</label>
                                <input type="text" class="form-control" id="jenis_unit" name="jenis_unit" required>
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control" id="unit" name="unit" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" required>
                            </div>
                            {{-- <div class="form-group">
                                <label for="kategori_nama">Kategori Nama</label>
                                <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" required>
                            </div> --}}
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
                        <th>Kelompok Pasar</th>
                        <th>Jenis Unit</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th>Kategori Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $number = 1; @endphp <!-- Inisialisasi nomor -->
                    @foreach ($atribut as $market)
                        <tr>
                            <td>{{ $number++ }}</td> <!-- Tampilkan nomor dan tambahkan 1 setiap loop -->
                            <td>{{ $market['data'][0]['Kelompok_pasar'] }}</td>
                            <td>{{ $market['data'][0]['jenis_unit'] }}</td>
                            <td>{{ $market['data'][0]['unit'] }}</td>
                            <td>{{ $market['data'][0]['harga'] }}</td>
                            <td>{{ $market['data'][0]['kategori_nama'] ?? '' }}
                            <td>
                                <!-- Button untuk membuka modal Edit -->
                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-toggle="modal"
                                    data-target="#editModal{{ $market->_id }}"
                                    data-kelompok-pasar="{{ $market['data'][0]['Kelompok_pasar'] }}"
                                    data-jenis-unit="{{ $market['data'][0]['jenis_unit'] }}"
                                    data-unit="{{ $market['data'][0]['unit'] }}"
                                    data-harga="{{ $market['data'][0]['harga'] }}"
                                    data-kategori-nama="{{ $market['data'][0]['Kategori_nama'] ?? ($market['data'][0]['kategori_nama'] ?? '') }}">
                                    Edit
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
