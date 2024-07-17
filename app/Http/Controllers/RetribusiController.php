<?php

namespace App\Http\Controllers;

use App\Models\Kedinasan;
use App\Models\Retribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil kabupaten_id dari admin yang sedang login
        $kabupaten_id = $user->adminkabupaten->kabupaten_id;

        // Mengambil retribusi yang memiliki kabupaten_id sesuai dengan yang sedang login
        $retribusi = Retribusi::whereHas('kedinasan', function ($query) use ($kabupaten_id) {
            $query->where('kabupaten_id', $kabupaten_id);
        })
            ->orderBy('created_at', 'asc')
            ->paginate(5);

        // Ambil data kedinasan untuk ditampilkan di view
        $kedinasan = Kedinasan::where('kabupaten_id', $kabupaten_id)->get();

        return view('data.retribusi', compact('kedinasan', 'retribusi'));
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'kedinasan_id' => 'required|exists:kedinasan,id',
        ]);

        Retribusi::create([
            'nama' => $request->nama,
            'kedinasan_id' => $request->kedinasan_id,
        ]);

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
