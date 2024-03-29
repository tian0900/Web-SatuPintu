<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemRetribusi;
use App\Models\Retribusi;

class ItemRetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = ItemRetribusi::all();
        return view('data.item', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $retribusis = Retribusi::all();
        return view('data.item', compact('retribusis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'retribusi_id'  => 'required',
            'kategori_nama' => 'required',
            'jenis_tagihan' => 'required',
            'harga'         => 'required',
          ]);
          ItemRetribusi::create($request->all());
          return redirect()->route('data.item')
            ->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = ItemRetribusi::find($id);
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = ItemRetribusi::find($id);
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'retribusi_id'  => 'required',
            'kategori_nama' => 'required',
            'jenis_tagihan' => 'required',
            'harga'         => 'required',
          ]);
          $item = ItemRetribusi::find($id);
          $item->update($request->all());
          return redirect()->route('item.index')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ItemRetribusi::find($id);
        $item->delete();
        return redirect()->route('item.index')
        ->with('success', 'Item deleted successfully');
    }
}
