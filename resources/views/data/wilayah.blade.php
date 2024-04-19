<!-- resources/views/data/retribusi.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wilayah</title>
    <!-- Tambahkan link CSS yang diperlukan di sini -->
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tambahkan styling untuk modal di sini */
        .modal {
            display: none; /* Sembunyikan modal secara default */
            position: fixed; /* Letakkan modal di atas konten */
            z-index: 1; /* Menempatkan modal di atas elemen lain */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Memungkinkan scrolling jika konten terlalu panjang */
            background-color: rgba(0,0,0,0.4); /* Efek gelap latar belakang */
            padding-top: 60px; /* Membuat jarak dari bagian atas */
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* Memposisikan modal ke tengah layar */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Sesuaikan lebar modal sesuai kebutuhan */
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div style="left: 15%;">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2" onclick="openTambahModal()">Tambah Wilayah</button>
        <div class="overflow-x-auto">
            <table class="table-auto border-collapse w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">Wilayah</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wilayah as $index => $data)
                    <tr>
                        <td class="px-4 py-2 border">{{ $data->nama }}</td>
                        <td class="px-4 py-2 border">
                            <!-- Panggil fungsi openEditModal dengan menyertakan id dan nama retribusi -->
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2"
                                onclick="openEditModal('{{ $data->id }}', '{{ $index }}')">Edit</button>
                            <form action="{{ route('wilayah.destroy', $data->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
    
                <!-- Modal Edit Retribusi -->
                @foreach ($wilayah as $index => $data)
                    <div id="editModal{{ $index }}" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeEditModal('{{ $index }}')">&times;</span>
                            <h2>Edit Wilayah</h2>
                            <form id="editForm{{ $index }}" method="POST" action="">
                                @csrf
                                @method('PUT')
                                <label for="nama">Nama Wilayah:</label><br>
                                <!-- Pastikan variabel $retribusi->nama di sini adalah properti yang tepat -->
                                <input type="text" id="nama" name="nama" value="{{ $data->nama }}"><br><br>
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Simpan</button>
                            </form>
                        </div>
                    </div>
                @endforeach
         <!-- Tambah Data Retribusi Modal -->
         <div id="tambahModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeTambahModal()">&times;</span>
                <h2>Tambah Wilayah</h2>
                <form method="POST" action="{{ route('wilayah.store') }}">
                    @csrf
                    <label for="nama">Nama Wilayah:</label><br>
                    <input type="text" id="nama" name="nama" required><br><br>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Simpan</button>
                </form>
            </div>
        </div>
       
    
        <!-- Tambahkan script JavaScript yang diperlukan di sini -->
        <script>
            // Fungsi untuk membuka modal tambah data
            function openTambahModal() {
                var modal = document.getElementById('tambahModal');
                modal.style.display = "block";
            }
        
            // Fungsi untuk menutup modal tambah data
            function closeTambahModal() {
                var modal = document.getElementById('tambahModal');
                modal.style.display = "none";
            }
        </script>
    
    
        <script>
            // Fungsi untuk membuka modal edit dengan data retribusi yang sesuai
            function openEditModal(id, index) {
                var modal = document.getElementById('editModal' + index);
                modal.style.display = "block";
                var form = document.getElementById('editForm' + index);
                form.action = "/data/wilayah/" + id;
            }
    
            // Fungsi untuk menutup modal edit
            function closeEditModal(index) {
                var modal = document.getElementById('editModal' + index);
                modal.style.display = "none";
            }
        </script>
    </body>
    </html>
    
    </div>
