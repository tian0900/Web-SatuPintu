<?php

namespace App\Http\Controllers;

use App\Models\Retribusi;
use Illuminate\Http\Request;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Auth;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        $query = Wilayah::where('retribusi_id', $retribusi_id);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('another_column', 'like', '%' . $search . '%');
                  // Add other columns to search here
            });
        }

        $wilayah = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('data.wilayah-pasar', ['wilayah' => $wilayah]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            // Pastikan retribusi_id tersedia dalam request atau atur di sini
        ]);

        // Menyimpan data baru
        Wilayah::create([
            'nama' => $request->nama,
            'retribusi_id' => $retribusi_id,
        ]);

        // Redirect ke halaman yang sesuai
        return redirect('/wilayah-pasar')->with('success', 'Data Wilayah Berhasil Ditambahkan!');
    }


    // public function store(Request $request)
    // {
    //     // Validasi data
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         // Pastikan kedinasan_id tersedia dalam request atau atur di sini
    //     ]);

    //     // Menyimpan data baru
    //     Wilayah::create([
    //         'nama' => $request->nama,
    //     ]);

    //     // Redirect ke halaman yang sesuai
    //     return redirect('/wilayah-pasar')->with('success', 'Data Retribusi Berhasil Ditambahkan!');
    // }

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
        return redirect('/wilayah-pasar')->with('success', 'Data Wilayah Berhasil Diperbarui!');

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
        return redirect()->back()->with('success', 'Data Wilayah Berhasil Dihapus');
    }

    public function indexsampah()
    {
        $wilayah = Wilayah::paginate(5);

        // Menampilkan view 'data.retribusi' dan meneruskan data retribusi ke dalam view
        return view('data.wilayah-sampah', ['wilayah' => $wilayah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createsampah()
    {
        return view('data.wilayah-create');
    }

    // Method untuk menyimpan data yang ditambahkan
    public function storesampah(Request $request)
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
        return redirect('/wilayah-sampah')->with('success', 'Data Retribusi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function showsampah(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editsampah($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        return view('data.wilayah-edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatesampah(Request $request, string $id)
    {
        $retribusi = Wilayah::findOrFail($id);
        $retribusi->update($request->all());
        return redirect('/wilayah-sampah')->with('success', 'Data Wilayah Berhasil Diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroysampah(string $id)
    {
        $wilayah = Wilayah::findOrFail($id);

        // Hapus retribusi
        $wilayah->delete();

        // Redirect atau kembalikan sesuai kebutuhan
        return redirect()->back()->with('success', 'Data Wilayah Berhasil Dihapus');
    }
}
