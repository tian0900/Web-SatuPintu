<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perjanjian Sewa Menyewa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px; /* Mengatur ukuran font */
        }

        .container {
            width: 70%; /* Mengurangi lebar container */
            margin: 0 auto;
            border: 1px solid black; /* Mengurangi ketebalan border */
            padding: 10px; /* Mengurangi padding */
        }

        .center {
            text-align: center;
            margin-bottom: 10px; /* Mengurangi margin bottom */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px; /* Mengurangi margin bottom */
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px; /* Mengurangi padding */
        }

        .right-align {
            text-align: right;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .container, .container * {
                visibility: visible;
            }
            .container {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="center">
            <h2 style="font-size: 14px;">Surat Sewa Menyewa Tempat Pasar Kabupaten Humbang Hasundutan</h2>
        </div>
        <div>
            <button id="exportBtn" type="button">Export to PDF</button>
            <p>Yang bertanda tangan di bawah ini:</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $kontrak->WajibRetribusi->User->name }}</td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>: </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>: </td>
                </tr>
            </table>
            <p>Dalam hal ini bertindak atas nama diri pribadi yang selanjutnya disebut PIHAK PERTAMA</p>
            <br>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $kontrak->WajibRetribusi->User->name }}</td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>: </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>: </td>
                </tr>
            </table>
            <p>Dalam hal ini bertindak atas nama diri pribadi yang selanjutnya disebut PIHAK KEDUA</p>
            <br>
            <p>Dimana pihak kedua sepakat untuk menyewa bangunan:</p>
            <table>
                <tr>
                    <td>Nomor Kios</td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Jenis Bangunan</td>
                    <td>: {{ $kontrak->ItemRetribusi->kategori_nama }}</td>
                </tr>
                <tr>
                    <td>Durasi Sewa</td>
                    <td>: {{ $kontrak->tanggal_mulai }} - {{ $kontrak->tanggal_selesai }}</td>
                </tr>
                <tr>
                    <td>Biaya Sewa</td>
                    <td>: Rp. {{ $kontrak->ItemRetribusi->harga }} / bulan</td>
                </tr>
            </table>
            <p>Ini adalah detail surat sewa menyewa tempat pasar kabupaten Humbang Hasundutan</p>
            <br>
            <div class="right-align">
                <p></p>
                <p>Toba, 26 Mei 2022</p>
                <br>
                <p></p>
            </div>
        </div>
    </div>

    
    <script>
        document.getElementById('exportBtn').addEventListener('click', function() {
            this.style.display = 'none';
            // Menggunakan AJAX untuk mengirim permintaan ke endpoint generatePDFkontrak
            // yang akan menghasilkan file PDF
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '{{ route('generate-pdfkontrak', ['id' => $kontrak->id]) }}', true);
            xhr.responseType = 'blob'; // Menentukan tipe respons sebagai blob (file)
            xhr.onload = function() {
                if (this.status === 200) {
                    var blob = this.response;
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'Kontrak_{{ $kontrak->WajibRetribusi->User->name }}.pdf';  // Nama file PDF
                    document.body.appendChild(link);
                    link.click(); // Simulasi klik link untuk mengunduh file PDF
                    document.body.removeChild(link);
                }
            };
            xhr.send();
            this.style.display = 'block';
        });
    </script>
</body>

</html>
