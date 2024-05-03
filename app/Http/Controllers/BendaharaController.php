<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setor;
use Illuminate\Support\Facades\DB;

class BendaharaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indextagihan()
    {


        $tagihan = DB::table('tagihan')
            ->join('pembayaran', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'kontrak.sub_wilayah_id')
            ->join('users as wajib_retribusi_user', 'wajib_retribusi_user.id', '=', 'kontrak.wajib_retribusi_id')
            ->select(
                'tagihan.*',
                'kontrak.*',
                'item_retribusi.*',
                'sub_wilayah.*',
                'wajib_retribusi_user.*',
                'pembayaran.status as pembayaran_status', // Alias untuk status di tabel pembayaran
                'kontrak.status as kontrak_status' // Alias untuk status di tabel kontrak
            )
            ->where('pembayaran.status', 'WAITING') // Filter berdasarkan status pembayaran
            ->where('tagihan.status', 'NEW') // Filter berdasarkan status pembayaran
            ->where('tagihan.active', '1') // Filter berdasarkan status pembayaran
            ->where('item_retribusi.retribusi_id', '2') // Filter berdasarkan status pembayaran
            ->distinct() // Menambahkan klausa distinct
            ->get();



        // dd($tagihan);

        return view('bendahara.tagihan', ['tagihan' => $tagihan]);
    }

    public function tagihansampah()
    {


        $tagihan = DB::table('tagihan')
            ->join('pembayaran', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'kontrak.sub_wilayah_id')
            ->join('users as wajib_retribusi_user', 'wajib_retribusi_user.id', '=', 'kontrak.wajib_retribusi_id')
            ->select(
                'tagihan.*',
                'kontrak.*',
                'item_retribusi.*',
                'sub_wilayah.*',
                'wajib_retribusi_user.*',
                'pembayaran.status as pembayaran_status', // Alias untuk status di tabel pembayaran
                'kontrak.status as kontrak_status' // Alias untuk status di tabel kontrak
            )
            ->where('pembayaran.status', 'WAITING') // Filter berdasarkan status pembayaran
            ->where('tagihan.status', 'NEW') // Filter berdasarkan status pembayaran
            ->where('tagihan.active', '1') // Filter berdasarkan status pembayaran
            ->where('item_retribusi.retribusi_id', '1') // Filter berdasarkan status pembayaran
            ->distinct() // Menambahkan klausa distinct
            ->get();



        // dd($tagihan);

        return view('bendahara.tagihansampah', ['tagihan' => $tagihan]);
    }

    

    public function indexsetor()
    {
        $setor = DB::table('setoran')
            ->join('petugas', 'petugas.id', '=', 'setoran.petugas_id')
            ->join('users', 'users.id', '=', 'petugas.user_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'setoran.sub_wilayah_id')
            ->select(
                'setoran.*',
                'petugas.user_id',
                'sub_wilayah.nama',
                'users.name as nama_petugas',

            )// Mengelompokkan berdasarkan petugas_id
            ->where('setoran.status', 'MENUNGGU')
            ->get();
        return view('bendahara.setor', ['setor' => $setor]);
    }

    
    

    public function updateStatus(Request $request, $id)
    {
        $setor = Setor::find($id);
        if (!$setor) {
            return response()->json(['message' => 'Data setor tidak ditemukan'], 404);
        }

        $setor->status = 'DITERIMA';
        $setor->save();

        return redirect()->back()->with('message', 'IT WORKS!');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
