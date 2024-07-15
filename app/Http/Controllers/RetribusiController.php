<?php

namespace App\Http\Controllers;

use App\Models\Retribusi;
use Illuminate\Http\Request;

class RetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retribusi = Retribusi::all();

        // Menampilkan view 'data.retribusi' dan meneruskan data retribusi ke dalam view
        return view('data.retribusi', ['retribusi' => $retribusi]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data.retribusi-create');
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
        Retribusi::create([
            'nama' => $request->nama,
            'kedinasan_id' => 1 // Atur nilai default untuk kedinasan_id
        ]);

        // Redirect ke halaman yang sesuai
        return redirect('/retribusi')->with('success', 'Data Retribusi Berhasil Ditambahkan!');
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
    public function edit($id)
    {
        $retribusi = Retribusi::findOrFail($id);
        return view('data.retribusi-edit', compact('retribusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $retribusi = Retribusi::findOrFail($id);
        $retribusi->update($request->all());
        return redirect('/retribusi')->with('success', 'Data Retribusi Berhasil Diperbarui!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $retribusi = Retribusi::findOrFail($id);

        // Hapus retribusi
        $retribusi->delete();
    
        // Redirect atau kembalikan sesuai kebutuhan
        return redirect()->back()->with('success', 'Retribusi Berhasil Dihapus');
    }
}
