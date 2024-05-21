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
        $item = ItemRetribusi::where('retribusi_id', 2)->paginate(5);
        return view('data.item', compact('item'));
    }

    public function indexsampah()
    {
        $item = ItemRetribusi::where('retribusi_id', 1)->paginate(5);
        return view('data.itemsampah', compact('item'));
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
            'retribusi_id' => 'required',
            'kategori_nama' => 'required',
            'jenis_tagihan' => 'required',
            'harga'         => 'required',
          ]);
          ItemRetribusi::create($request->all());
          return redirect("/item")
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
          return redirect("/item")
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
