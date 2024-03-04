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
        $kedinasan = Kedinasan::all();
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
            'nama'  => 'required',
          ]);
          Kedinasan::create($request->all());
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
        $request->validate([
            'nama' => 'required|max:255',
          ]);
          $kedinasan = Kedinasan::find($id);
          $kedinasan->update($request->all());
          return redirect('/kedinasan')->with('success', 'Data berhasil ditambahkan.');
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
}