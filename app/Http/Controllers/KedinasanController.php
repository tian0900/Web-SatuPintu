<?php

namespace App\Http\Controllers;

use App\Models\Kedinasan;
use Illuminate\Http\Request;

class KedinasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kedinasan = Kedinasan::paginate(5);
        return view('data.kedinasan', compact('kedinasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data.kedinasan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kepala_dinas' => 'required',
        ]);

        $data = [
            'kabupaten_id' => 1, // Sesuaikan dengan ID kabupaten yang sesuai
            'kepala_dinas' => $request->input('kepala_dinas'),
            'nama' => $request->input('nama'),
        ];

        Kedinasan::create($data);
        return redirect('/kedinasan')->with('success', 'Data berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kedinasan = Kedinasan::find($id);
        return view('data.kedinasan', compact('kedinasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kedinasan = Kedinasan::find($id);
        return view('data.kedinasan', compact('kedinasan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kepala_dinas' => 'required',
        ]);

        $kedinasan = Kedinasan::find($id);

        if (!$kedinasan) {
            return redirect('/kedinasan')->with('error', 'Data tidak ditemukan.');
        }

        $kedinasan->update($validatedData);

        return redirect('/kedinasan')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kedinasan = Kedinasan::find($id);
        $kedinasan->delete();
        return redirect()->route('data.kedinasan')
            ->with('success', 'kedinasan deleted successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function indexKabupaten()
    {
        $kedinasan = Kedinasan::all();
        return view('data.kedinasanKab', compact('kedinasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createKabupaten()
    {
        return view('data.kedinasanKab');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeKabupaten(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kepala_dinas' => 'required',
        ]);

        $data = [
            'kabupaten_id' => 1, // Sesuaikan dengan ID kabupaten yang sesuai
            'kepala_dinas' => $request->input('kepala_dinas'),
            'nama' => $request->input('nama'),
        ];


        Kedinasan::create($data);
        return redirect('/kedinasanKabupaten')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function showKabupaten(string $id)
    {
        $kedinasan = Kedinasan::find($id);
        return view('data.kedinasanKab', compact('kedinasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editKabupaten(string $id)
    {
        $kedinasan = Kedinasan::find($id);
        return view('data.kedinasanKab', compact('kedinasan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateKabupaten(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kepala_dinas' => 'required',
        ]);

        $kedinasan = Kedinasan::find($id);

        if (!$kedinasan) {
            return redirect('/kedinasanKabupaten')->with('error', 'Data tidak ditemukan.');
        }

        $kedinasan->update($validatedData);

        return redirect('/kedinasanKabupaten')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyKabupaten(string $id)
    {
        $kedinasan = Kedinasan::find($id);
        $kedinasan->delete();
        return redirect()->route('data.kedinasanKab')
            ->with('success', 'kedinasan deleted successfully');
    }
}