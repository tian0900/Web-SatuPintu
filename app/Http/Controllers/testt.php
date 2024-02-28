<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Models\Pasar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;


class testt extends Controller
{
    /**
     * Menampilkan daftar buku.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\View\View
    {
        // Ambil semua data dari koleksi "jenis"
        $jenis = Post::all();

        // Tampilkan data dalam bentuk JSON menggunakan dd()
        return view('data.pasar', compact('jenis'));
    }

    public function create(): \Illuminate\View\View
    {
        return view('data.create');
    }

    public function store(Request $request)
    {


        // Validasi data yang diterima dari form
        $request->validate([
            'Username' => 'required|string',
            'Identifier' => 'required|integer',
            'First_name' => 'required|string', // Ubah 'First name' menjadi 'First_name'
            'Last_name' => 'required|string',
        ]);

        // Buat objek baru dari model Post
        $post = new Post();
        // Isi atribut-atributnya sesuai dengan data yang diterima dari form
        $post->Username = $request->input('Username');
        $post->Identifier = $request->input('Identifier');
        $post->First_name = $request->input('First_name'); // Sesuai dengan input name di view
        $post->Last_name = $request->input('Last_name');   // Sesuai dengan input name di view

        // Lanjutkan dengan atribut-atribut lainnya yang diizinkan

        // Simpan data ke dalam database
        $post->save();

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect('/data/pasar')->with('success', 'Data berhasil ditambahkan.');

    }

    public function edit($id)
    {
        $pasar = Post::findOrFail($id);
        return view('data.edit ', compact('pasar'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'Username' => 'required|string',
            'Identifier' => 'required|integer',
            'First_name' => 'required|string',
            'Last_name' => 'required|string',
        ]);

        $pasar = Post::findOrFail($id);
        $pasar->update([
            'Username' => $request->input('Username'),
            'Identifier' => $request->input('Identifier'),
            'First_name' => $request->input('First_name'),
            'Last_name' => $request->input('Last_name'),
        ]);

        return redirect('/data/pasar')->with('success', 'Data berhasil diperbarui.');
    }

    public function pasar(Request $request)
    {
        $market = Pasar::all();
        return response()->json($market);
    }

}