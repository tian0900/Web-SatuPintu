<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Retribusi;
use App\Models\Kedinasan;
use App\Models\Kabupaten;
use App\Models\Kontrak;
use App\Models\Petugas;
use App\Models\User;
use App\Models\WajibRetribusi;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layout.index');
    }
    public function landing()
    {
        return view('basic.landing');
    }
    public function dashboard()
    {
        $data = Retribusi::with(['Kedinasan'])
            ->whereHas('Kedinasan', function ($query) {
                $query->where('kedinasan_id', 2);
            })
            ->get(); 
        $kabupaten = Kabupaten::count();
        $kedinasan = kedinasan::count();
        $kontrak = kontrak::count();
        $retribusi = retribusi::count();
        $petugas = petugas::count();
        $wajibretribusi = WajibRetribusi::count();
        $item = WajibRetribusi::count();

        return view('auth.dashboard', compact('kabupaten', 'kedinasan', 'kontrak', 'retribusi', 'petugas', 'wajibretribusi', 'item', 'data'));
    }

    public function dashboardkabupaten()
    {
        $data = Retribusi::with(['Kedinasan'])
            ->whereHas('Kedinasan', function ($query) {
                $query->where('kedinasan_id', 2);
            })
            ->get(); 
        $kabupaten = Kabupaten::count();
        $kedinasan = kedinasan::count();
        $kontrak = kontrak::count();
        $retribusi = retribusi::count();
        $petugas = petugas::count();
        $wajibretribusi = WajibRetribusi::count();
        $item = WajibRetribusi::count();

        return view('dashboard.dashboard-Kabupaten', compact('kabupaten', 'kedinasan', 'kontrak', 'retribusi', 'petugas', 'wajibretribusi', 'item', 'data'));
    }
    public function dashboardkedinasan()
    {
        $data = Retribusi::with(['Kedinasan'])
            ->whereHas('Kedinasan', function ($query) {
                $query->where('kedinasan_id', 2);
            })
            ->get(); 
        $kabupaten = Kabupaten::count();
        $kedinasan = kedinasan::count();
        $kontrak = kontrak::count();
        $retribusi = retribusi::count();
        $user = user::count();
        $petugas = petugas::count();
        $wajibretribusi = WajibRetribusi::count();
        $item = WajibRetribusi::count();

        return view('dashboard.dashboard-Kedinasan', compact('kabupaten', 'kedinasan', 'kontrak', 'retribusi', 'petugas', 'wajibretribusi', 'item', 'data'));
    }
    
    public function dashboardbendahara()
    {
        $data = Retribusi::with(['Kedinasan'])
            ->whereHas('Kedinasan', function ($query) {
                $query->where('kedinasan_id', 2);
            })
            ->get(); 
        $kabupaten = Kabupaten::count();
        $kedinasan = kedinasan::count();
        $kontrak = kontrak::count();
        $retribusi = retribusi::count();
        $petugas = petugas::count();
        $wajibretribusi = WajibRetribusi::count();
        $item = WajibRetribusi::count();

        return view('dashboard.dashboard-bendahara', compact('kabupaten', 'kedinasan', 'kontrak', 'retribusi', 'petugas', 'wajibretribusi', 'item', 'data'));
    }
    // public function dashboardkedinasan()
    // {
    //     $wilayah = Wilayah::all()->count();
    //     $atribut = Post::all()->count();

    //     return view('auth.dashboard', ['atribut' => $atribut, 'wilayah' => $wilayah]);
    // }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
