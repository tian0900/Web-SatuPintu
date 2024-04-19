<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayah = Wilayah::all();

        // Menampilkan view 'data.retribusi' dan meneruskan data retribusi ke dalam view
        return view('data.wilayah', ['wilayah' => $wilayah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data.wilayah-create');
    }

    // Method untuk menyimpan data yang ditambahkan
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            // Pastikan kedinasan_id tersedia dalam request atau atur di sini
        ]);

        // Menyimpan data baru
        Wilayah::create([
            'nama' => $request->nama,
        ]);

        // Redirect ke halaman yang sesuai
        return redirect('/wilayah')->with('success', 'Data retribusi berhasil ditambahkan!');
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
    public function edit( $id)
    {
        $wilayah = Wilayah::findOrFail($id);
        return view('data.wilayah-edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $retribusi = Wilayah::findOrFail($id);
        $retribusi->update($request->all());
        return redirect('/wilayah')->with('success', 'Data Wilayah berhasil diperbarui!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wilayah = Wilayah::findOrFail($id);

        // Hapus retribusi
        $wilayah->delete();
    
        // Redirect atau kembalikan sesuai kebutuhan
        return redirect()->back()->with('success', 'Wilayah berhasil dihapus');
    }
}
