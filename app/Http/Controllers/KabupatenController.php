<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kabupaten = Kabupaten::orderBy('created_at', 'desc')->paginate(5);
        return view('data.kabupaten', ['kabupaten' => $kabupaten]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data.kabupaten');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        Kabupaten::create($request->all());
        return redirect('/kabupaten')->with('success', 'Data Kabupaten Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kabupaten = Kabupaten::find($id);
        return view('data.kabupaten', compact('kabupaten'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kabupaten = Kabupaten::find($id);
        return view('data.kabupaten', compact('kabupaten'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);
        $kabupaten = Kabupaten::find($id);
        $kabupaten->update($request->all());
        return redirect('/kabupaten')->with('success', 'Data Kabupaten Berhasil Diubah.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kabupaten = Kabupaten::find($id);
        $kabupaten->delete();
        return redirect('/kabupaten')->with('success', 'Data Kabupaten Berhasil Dihapus');
    }
}
