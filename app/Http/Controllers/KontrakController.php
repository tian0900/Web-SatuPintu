<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrak;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Kontrak = DB::table('kontrak')
            ->join('wajib_retribusi', 'wajib_retribusi.id', '=', 'kontrak.wajib_retribusi_id')
            ->join('users', 'users.id', '=', 'wajib_retribusi.user_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'kontrak.sub_wilayah_id')
            ->get(); // Menambahkan get() untuk mendapatkan hasil query
            
            
    
        return view('data.kontrak', ['Kontrak' => $Kontrak]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function generatePDFkontrak($id)
    {
        // Mengambil data dari database berdasarkan ID kontrak
        $kontrak = DB::table('kontrak')
            ->join('wajib_retribusi', 'wajib_retribusi.id', '=', 'kontrak.wajib_retribusi_id')
            ->join('users', 'users.id', '=', 'wajib_retribusi.user_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'kontrak.sub_wilayah_id')
            ->where('kontrak.id', $id)
            ->select(
                'kontrak.*',
                'wajib_retribusi.*',
                'users.*',
                'item_retribusi.*',
                'sub_wilayah.*'
            )
            ->first(); // Menggunakan first() untuk mengambil satu data saja

        // Jika data tidak ditemukan, kembalikan response 404 Not Found
        if (!$kontrak) {
            abort(404);
        }

        // Render view ke dalam HTML dengan data dari database
        $html = View::make('data.detailkontrak', compact('kontrak'))->render();

        // Setup Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // Rendering process
        $dompdf->render();

        // Stream PDF response to user's browser
        return $dompdf->stream('surat_perjanjian_sewa_menyewa.pdf');
    }
    public function detailkontrak($id)
    {
        $kontrak = DB::table('kontrak')
        ->join('wajib_retribusi', 'wajib_retribusi.id', '=', 'kontrak.wajib_retribusi_id')
        ->join('users', 'users.id', '=', 'wajib_retribusi.user_id')
        ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
        ->join('sub_wilayah', 'sub_wilayah.id', '=', 'kontrak.sub_wilayah_id')
        ->where('kontrak.id', $id)
        ->select(
            'kontrak.*',
            'wajib_retribusi.*',
            'users.*',
            'item_retribusi.*',
            'sub_wilayah.*'
        )
        ->first();

    // Cek jika data kontrak ditemukan
    if (!$kontrak) {
        return abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
    }
   

    return view('data.detailkontrak', compact('kontrak'));
    } 


    public function testt()
    {
        return view('data.detailkontrak');
    }

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
