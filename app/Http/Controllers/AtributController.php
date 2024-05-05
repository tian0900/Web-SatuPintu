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
    public function index()
    {
        $wilayah = Wilayah::all();
        $atribut = Post::where(function ($query) {
            $query->where('data.kelompok_pasar', 'exists', true)
                ->orWhere('data.Kelompok_pasar', 'exists', true);
        })->get();

        return view('data.atribut', ['atribut' => $atribut, 'wilayah' => $wilayah]);
    }

    public function indexsampah()
    {
        $atribut = Post::where(function ($query) {
            $query->where('data.kategori_sampah', 'exists', true)
                ->orWhere('data.Kategori_sampah', 'exists', true);
        })->get();

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
            'kabupaten_id' => '1', // Sesuaikan dengan ID kabupaten yang sesuai
            'kedinasan_id' => '1', // Sesuaikan dengan ID kedinasan yang sesuai
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
            'retribusi_id' => 2, // Sesuaikan dengan ID kabupaten yang sesuai
            'kategori_nama' => $kategori_nama,
            'jenis_tagihan' => $validatedData['jenis_tagihan'],
            'harga' => $validatedData['harga'],
        ];

        // Simpan data ke dalam MongoDB menggunakan model Post
        Post::create($dataToSave);

        // Simpan data ke dalam ItemRetribusi
        ItemRetribusi::create($postToSave);

        // Redirect ke halaman index
        return redirect()->route('atribut')->with('success', 'Data berhasil ditambahkan.');
    }


    public function storesampah(Request $request)
    {
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
            'kabupaten_id' => '1', // Sesuaikan dengan ID kabupaten yang sesuai
            'kedinasan_id' => '1', // Sesuaikan dengan ID kedinasan yang sesuai
            'data' => [
                [
                    'Kategori_sampah' => $validatedData['Kategori_sampah'],
                    'harga' => $hargaInt32, // Gunakan harga yang telah dikonversi menjadi int32
                    'kategori_nama' => $kategori_nama,
                ]
            ]
        ];

        $postToSave = [
            'retribusi_id' => 1, // Sesuaikan dengan ID kabupaten yang sesuai
            'kategori_nama' => $kategori_nama,
            'jenis_tagihan' => $validatedData['jenis_tagihan'],
            'harga' => $validatedData['harga'],
        ];



        // Simpan data ke dalam ItemRetribusi
        ItemRetribusi::create($postToSave);


        // Simpan data ke dalam MongoDB menggunakan model Post
        Post::create($dataToSave);

        // Redirect ke halaman index
        return redirect()->route('atributsampah')->with('success', 'Data berhasil ditambahkan.');
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
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
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
        return redirect()->route('atribut')->with('success', 'Data berhasil diperbarui.');
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
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
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
        return redirect()->route('atributsampah')->with('success', 'Data berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroysampah($id)
    {
        // Temukan data berdasarkan ID
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Hapus data dari MongoDB
        $post->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    
}
