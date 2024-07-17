<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kedinasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KedinasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil kabupaten_id dari admin yang sedang login
        $kabupaten_id = $user->adminkabupaten->kabupaten_id;

        // Ambil kedinasan yang terkait dengan kabupaten_id yang sama dengan admin yang sedang login
        $kedinasan = Kedinasan::whereHas('kabupaten', function ($query) use ($kabupaten_id) {
            $query->where('id', $kabupaten_id);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // Ambil data kabupaten
        $kabupaten = Kabupaten::where('id', $kabupaten_id)->get();

        return view('data.kedinasan', compact('kedinasan', 'kabupaten'));
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
            'kabupaten_id' => 'required',
        ]);

        $data = [
            'kabupaten_id' => $request->input('kabupaten_id'),
            'kepala_dinas' => $request->input('kepala_dinas'),
            'nama' => $request->input('nama'),
        ];

        Kedinasan::create($data);
        return redirect('/kedinasan')->with('success', 'Data Kedinasan Berhasil Ditambahkan.');
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
            return redirect('/kedinasan')->with('error', 'Data Kedinasan tidak ditemukan.');
        }

        $kedinasan->update($validatedData);

        return redirect('/kedinasan')->with('success', 'Data Kedinasan Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kedinasan = Kedinasan::find($id);
        $kedinasan->delete();
        return redirect()->route('kedinasann')
            ->with('success', 'kedinasan deleted successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function indexKabupaten()
    {
        $kedinasan = Kedinasan::paginate(5);
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
        return redirect('/kedinasanKabupaten')->with('success', 'Data Kedinasan Berhasil Ditambahkan.');
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
            return redirect('/kedinasanKabupaten')->with('error', 'Data Kedinasan tidak ditemukan.');
        }

        $kedinasan->update($validatedData);

        return redirect('/kedinasanKabupaten')->with('success', 'Data Kedinasan Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyKabupaten(string $id)
    {
        $kedinasan = Kedinasan::find($id);
        $kedinasan->delete();
        return redirect()->route('data.kedinasanKab')
            ->with('success', 'Data Kedinasan Berhasil Dihapus');
    }
}