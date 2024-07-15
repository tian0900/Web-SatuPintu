<?php

namespace App\Http\Controllers;

use App\Exports\SetoranExport;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use App\Models\Setor;
use Illuminate\Support\Facades\DB;
use App\Exports\TagihanManualExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TagihanExport;

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
            ->join('wajib_retribusi', 'kontrak.wajib_retribusi_id', '=', 'wajib_retribusi.id')
            ->join('users', 'wajib_retribusi.user_id', '=', 'users.id') // Removed the extra space here
            ->select(
                'tagihan.*',
                'item_retribusi.kategori_nama',
                'users.name',
                'pembayaran.status as pembayaran_status', // Alias for status in the pembayaran table
                'pembayaran.metode_pembayaran', // Alias for status in the pembayaran table
                'kontrak.status as kontrak_status' // Alias for status in the kontrak table
            )
            ->where('tagihan.status', 'NEW') // Filter based on tagihan status
            ->where('pembayaran.status', 'WAITING') // Filter based on pembayaran status
            ->where('tagihan.active', '1') // Filter based on tagihan active status
            ->where('item_retribusi.retribusi_id', '2') // Filter based on item_retribusi retribusi_id
            ->paginate(5);

        // dd($tagihan);

        return view('bendahara.tagihan', ['tagihan' => $tagihan]);
    }

    public function indextagihanmanual()
    {
        $tagihan = DB::table('tagihan_manual')
            ->join('setoran', 'setoran.id', '=', 'tagihan_manual.setoran_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'tagihan_manual.item_retribusi_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'tagihan_manual.sub_wilayah_id')
            ->join('petugas', 'petugas.id', '=', 'tagihan_manual.petugas_id')
            ->join('users', 'users.id', '=', 'petugas.user_id')
            ->select(
                'tagihan_manual.*',
                'item_retribusi.kategori_nama',
                'users.name',
                'sub_wilayah.nama'
            )
            ->where('tagihan_manual.status', 'NEW') // Filter based on tagihanmanual status
            ->where('item_retribusi.retribusi_id', 2) // Filter based on item_retribusi retribusi_id
            ->paginate(5);

        // dd($tagihan);

        return view('bendahara.tagihanmanual', ['tagihan' => $tagihan]);
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
            ->join('transaksi_petugas', 'setoran.id', '=', 'transaksi_petugas.setoran_id')
            ->join('petugas', 'petugas.id', '=', 'transaksi_petugas.petugas_id')
            ->join('users', 'users.id', '=', 'petugas.user_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'setoran.sub_wilayah_id')
            ->select(
                'setoran.*',
                'petugas.user_id',
                'sub_wilayah.nama',
                'users.name as nama_petugas',

            )// Mengelompokkan berdasarkan petugas_id
            ->where('setoran.status', 'MENUNGGU')
            ->paginate(5);
        return view('bendahara.setor', ['setor' => $setor]);
    }




    public function updateStatus(Request $request, $id)
    {
        $setor = Setor::find($id);
        if (!$setor) {
            return response()->json(['message' => 'Data Setor Tidak Ditemukan'], 404);
        }

        $setor->status = 'DITERIMA';
        $setor->save();

        return redirect()->back()->with('message', 'IT WORKS!');
    }

    public function updateStatuspembatalan(Request $request, $id)
    {
        $batal = Tagihan::find($id);
        if (!$batal) {
            return response()->json(['message' => 'Data Batal Tidak Ditemukan'], 404);
        }

        $batal->status = 'NEW';
        $batal->save();

        return redirect()->back()->with('message', 'IT WORKS!');
    }


    public function indexpembatalan()
    {


        $pembatalan = DB::table('tagihan')
            ->join('pembayaran', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('wajib_retribusi', 'kontrak.wajib_retribusi_id', '=', 'wajib_retribusi.id')
            ->join('users', 'wajib_retribusi.user_id', '=', 'users.id') // Removed the extra space here
            ->select(
                'tagihan.*',
                'item_retribusi.kategori_nama',
                'users.name',
                'pembayaran.status as pembayaran_status', // Alias for status in the pembayaran table
                'kontrak.status as kontrak_status'
            )
            ->where('tagihan.status', 'VERIFIED') // Filter berdasarkan status pembayaran
            ->where('tagihan.active', '1') // Filter berdasarkan status pembayaran
            ->where('item_retribusi.retribusi_id', '2') // Filter berdasarkan status pembayaran
            ->distinct() // Menambahkan klausa distinct
            ->paginate(5);



        // dd($tagihan);
        // dd($pembatalan); 

        return view('bendahara.pembatalanpasar', ['pembatalan' => $pembatalan]);
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

    // In your controller
 
    
    public function exportTagihanManual()
    {
        return Excel::download(new TagihanManualExport, 'tagihan_manual.xlsx');
    }
    
    public function exportSetoran()
    {
        return Excel::download(new SetoranExport, 'Setoran.xlsx');
    }
    


}
