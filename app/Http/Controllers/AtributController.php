<?php

namespace App\Http\Controllers;

use App\Models\ItemRetribusi;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Auth;

class AtributController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $user = Auth::user();
    //     $retribusi_id = $user->admin->retribusi_id;

    //     $wilayah = Wilayah::all();
    //     $atribut = Post::where('retribusi_id', $retribusi_id)->paginate(5);
    //     return view('data.atribut', ['atribut' => $atribut, 'wilayah' => $wilayah]);
    // }

    public function datanew(Request $request)
    {
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'dynamicField.*' => 'required|string',
        ]);

        // Ambil user yang sedang terautentikasi
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        // Format data yang dinamis sesuai dengan yang dibutuhkan untuk MongoDB
        $dynamicData = [];

        foreach ($request->dynamicField as $field) {
            // Tambahkan field dengan nilai kosong ke dynamicData
            $dynamicData[$field] = '';
        }

        // Buat kategori_nama dari field-field yang ada, misalnya dengan menggabungkan beberapa field
        $kategori_nama_values = array_diff_key($dynamicData, array_flip(['harga', 'kategori_nama']));
        $dynamicData['kategori_nama'] = implode(' ', $kategori_nama_values);

        // Jika kategori_nama_values kosong, set nilai default
        if (empty($kategori_nama_values)) {
            $dynamicData['kategori_nama'] = 'Default Kategori Nama'; // Atau aturan default lainnya
        }

        // Simpan data ke MongoDB
        Post::create([
            'retribusi_id' => $retribusi_id,
            'data' => [$dynamicData], // Pastikan 'data' berisi array dari $dynamicData
        ]);

        // Redirect ke halaman yang sesuai dengan route Anda
        return redirect()->route('atribut')->with('success', 'Field berhasil ditambahkan');
    }












    public function index()
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        $wilayah = Wilayah::all();
        $atribut = Post::where('retribusi_id', $retribusi_id)->paginate(5);

        // Tentukan dynamicFields berdasarkan logika tertentu, contoh berdasarkan jenis akun
        if ($user->account_type === 'A') {
            $dynamicFields = ['jenis_tempat', 'harga', 'kategori_nama', 'durasi'];
        } elseif ($user->account_type === 'B') {
            $dynamicFields = ['kelompok_pasar', 'jenis_unit', 'unit', 'no_unit', 'harga', 'kategori_nama'];
        } else {
            // Default jika tidak ada jenis akun yang cocok
            $dynamicFields = [];
        }

        // Mengumpulkan semua kunci unik dari data dalam koleksi $atribut
        $headers = $atribut->flatMap(function ($item) {
            return collect($item['data'])->flatMap(function ($data) {
                return array_keys($data);
            });
        })->unique()->reject(function ($value) {
            return $value === 'retribusi_id'; // menghilangkan kunci yang tidak diperlukan
        });

        return view('data.atribut', [
            'atribut' => $atribut,
            'wilayah' => $wilayah,
            'headers' => $headers,
            'dynamicFields' => $dynamicFields,
        ]);
    }






    public function indexsampah()
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        $test = Post::all();
        $atribut = Post::where('retribusi_id', $retribusi_id)->paginate(5);

        // return $test;

        return view('data.atributsampah', ['atribut' => $atribut]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        // Validasi inputan
        $user = Auth::user();
        $test = $user->name;
        $validatedData = $request->validate([
            'kelompok_pasar' => 'required',
            'jenis_unit' => 'required',
            'unit' => 'required',
            'no_unit' => 'required',
            'jenis_tagihan' => 'required',
            'harga' => 'required|numeric',
        ]);

        // Buat kategori_nama dari data yang diterima
        $kategori_nama = $validatedData['jenis_unit'] . ' ' . $validatedData['unit'] . ' ' . $validatedData['kelompok_pasar'] . ' ' . $validatedData['no_unit'];

        // Buat array data yang akan disimpan ke MongoDB
        $dataToSave = [
            'retribusi_id' => $retribusi_id, // Sesuaikan dengan ID kedinasan yang sesuai
            'data' => [
                [
                    'Kelompok_pasar' => $validatedData['kelompok_pasar'],
                    'jenis_unit' => $validatedData['jenis_unit'],
                    'unit' => $validatedData['unit'],
                    'no_unit' => $validatedData['no_unit'],
                    'harga' => $validatedData['harga'],
                    'kategori_nama' => $kategori_nama,
                ]
            ]
        ];

        // Data untuk disimpan ke dalam MongoDB menggunakan model Post
        $postToSave = [
            'retribusi_id' => $retribusi_id, // Sesuaikan dengan ID kabupaten yang sesuai
            'kategori_nama' => $kategori_nama,
            'jenis_tagihan' => $validatedData['jenis_tagihan'],
            'harga' => $validatedData['harga'],
        ];

        // Simpan data ke dalam MongoDB menggunakan model Post
        Post::create($dataToSave);

        // Simpan data ke dalam ItemRetribusi
        ItemRetribusi::create($postToSave);

        // Redirect ke halaman index
        return redirect()->route('atribut')->with('success', 'Data Atribut Berhasil Ditambahkan.');
    }

    public function storedinamis(Request $request)
    {
        // Validasi data sesuai kebutuhan Anda
        $validatedData = $request->validate([
            // Atur validasi untuk setiap field yang ingin Anda simpan
            'dynamicField.*' => 'required|string',
            'dynamicValue.*' => 'required|string',
            // Tambahkan validasi lainnya sesuai kebutuhan Anda
        ]);

        // Ambil user yang sedang terautentikasi
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        // Ambil kategori_nama dari input request
        $kategori_nama = $request->input('kategori_nama');

        // Format data yang dinamis sesuai dengan yang dibutuhkan untuk MongoDB
        $dynamicData = [];
        foreach ($request->except('_token', 'kategori_nama') as $key => $value) {
            $dynamicData[$key] = $value;
        }

        // Masukkan kategori_nama ke dalam dynamicData
        $dynamicData['kategori_nama'] = $kategori_nama;

        // Simpan data ke MongoDB
        Post::create([
            'retribusi_id' => $retribusi_id,
            'data' => [$dynamicData],
        ]);

        ItemRetribusi::create([
            'retribusi_id' => $retribusi_id,
            'kategori_nama' => $dynamicData['kategori_nama'],
            'jenis_tagihan' => 'BULANAN',
            'harga' => $dynamicData['harga']
        ]);

        // Redirect ke halaman yang sesuai dengan route Anda
        return redirect()->route('atribut')->with('success', 'Data berhasil ditambahkan');
    }






    public function storesampah(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;
        // Validasi inputan
        $validatedData = $request->validate([
            'Kategori_sampah' => 'required',
            'harga' => 'required|numeric',
            'jenis_tagihan' => 'required',
        ]);

        // Buat kategori_nama dari data yang diterima
        $kategori_nama = $validatedData['Kategori_sampah'];

        // Konversi harga menjadi integer
        $hargaInt32 = (int) $validatedData['harga'];

        // Buat array data yang akan disimpan ke MongoDB
        $dataToSave = [
            'retribusi_id' => $retribusi_id, // Sesuaikan dengan ID kedinasan yang sesuai
            'data' => [
                [
                    'Kategori_sampah' => $validatedData['Kategori_sampah'],
                    'harga' => $hargaInt32, // Gunakan harga yang telah dikonversi menjadi int32
                    'kategori_nama' => $kategori_nama,
                ]
            ]
        ];

        $postToSave = [
            'retribusi_id' => $retribusi_id, // Sesuaikan dengan ID kabupaten yang sesuai
            'kategori_nama' => $kategori_nama,
            'jenis_tagihan' => $validatedData['jenis_tagihan'],
            'harga' => $validatedData['harga'],
        ];

        // return $dataToSave;

        // Simpan data ke dalam ItemRetribusi
        ItemRetribusi::create($postToSave);


        // Simpan data ke dalam MongoDB menggunakan model Post
        Post::create($dataToSave);

        // Redirect ke halaman index
        return redirect()->route('atributsampah')->with('success', 'Data Atribut Berhasil Ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'edit_kelompok_pasar' => 'required',
            'edit_jenis_unit' => 'required',
            'edit_unit' => 'required',
            'edit_no_unit' => 'required',
            'edit_harga' => 'required|numeric',
        ]);

        // Temukan data berdasarkan ID
        $atribut = Post::find($id);

        if (!$atribut) {
            return redirect()->back()->with('error', 'Data Atribut tidak ditemukan.');
        }

        // Hitung nilai kategori_nama
        $kategori_nama = $validatedData['edit_jenis_unit'] . ' ' . $validatedData['edit_unit'] . ' ' . $validatedData['edit_kelompok_pasar'] . ' ' . $validatedData['edit_no_unit'];

        // Update data dengan nilai baru
        $updatedData = [
            'Kelompok_pasar' => $validatedData['edit_kelompok_pasar'],
            'jenis_unit' => $validatedData['edit_jenis_unit'],
            'unit' => $validatedData['edit_unit'],
            'no_unit' => $validatedData['edit_no_unit'],
            'harga' => $validatedData['edit_harga'],
            'kategori_nama' => $kategori_nama,
        ];

        // Simpan perubahan ke dalam database
        $atribut->data = [$updatedData];

        $atribut->save();

        // Redirect dengan pesan sukses
        return redirect()->route('atribut')->with('success', 'Data Atribut Berhasil Diperbarui.');
    }

    public function updatesampah(Request $request, $id)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'edit_kategori_sampah' => 'required',
            'edit_harga' => 'required|numeric',
        ]);

        // Temukan data berdasarkan ID
        $atribut = Post::find($id);

        if (!$atribut) {
            return redirect()->back()->with('error', 'Data Atribut tidak ditemukan.');
        }

        // Hitung nilai kategori_nama
        $kategori_nama = $validatedData['edit_kategori_nama'];

        // Update data dengan nilai baru
        $updatedData = [
            'Kategori_sampah' => $validatedData['edit_kelompok_pasar'],
            'harga' => $validatedData['edit_harga'],
            'kategori_nama' => $kategori_nama,
        ];

        // Simpan perubahan ke dalam database
        $atribut->data = [$updatedData];
        $atribut->save();

        // Redirect dengan pesan sukses
        return redirect()->route('atributsampah')->with('success', 'Data Atribut Berhasil Diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroysampah($id)
    {
        // Temukan data berdasarkan ID
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Data Atribut tidak ditemukan.');
        }

        // Hapus data dari MongoDB
        $post->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data Atribut Berhasil Dihapus.');
    }

    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Data Atribut tidak ditemukan.');
        }

        // Hapus data dari MongoDB
        $post->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data Atribut Berhasil Dihapus.');
    }


}
