<?php

namespace App\Http\Controllers;

use App\Exports\SetoranExport;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Auth;
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
    public function indextagihan(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        // Apply the date filter based on the query parameter
        $filter = $request->query('filter', 'all'); // Default to showing all data
        $filterLabel = 'All';
        $query = DB::table('tagihan')
            // ->join('pembayaran', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('wajib_retribusi', 'kontrak.wajib_retribusi_id', '=', 'wajib_retribusi.id')
            ->join('users', 'wajib_retribusi.user_id', '=', 'users.id') // Removed the extra space here
            ->select(
                'tagihan.*',
                'item_retribusi.kategori_nama',
                'users.name',
                'tagihan.status as pembayaran_status', // Alias for status in the pembayaran table
                // 'pembayaran.metode_pembayaran', // Alias for status in the pembayaran table
                'kontrak.status as kontrak_status' // Alias for status in the kontrak table
            )
            ->where('tagihan.status', 'NEW') // Filter based on tagihan status
            // ->where('pembayaran.status', 'WAITING') // Filter based on pembayaran status
            ->where('tagihan.active', '1') // Filter based on tagihan active status
            ->where('item_retribusi.retribusi_id', $retribusi_id);// Filter based on item_retribusi retribusi_id
        ; // Filter based on item_retribusi retribusi_id

        switch ($filter) {
            case 'day':
                $query->where('tagihan.created_at', '>=', now()->subDay());
                $filterLabel = 'Last Day';
                break;
            case 'week':
                $query->where('tagihan.created_at', '>=', now()->subWeek());
                $filterLabel = 'Last Week';
                break;
            case 'month':
                $query->where('tagihan.created_at', '>=', now()->subMonth());
                $filterLabel = 'Last Month';
                break;
            case 'year':
                $query->where('tagihan.created_at', '>=', now()->subYear());
                $filterLabel = 'Last Year';
                break;
            case 'all':
            default:
                $filterLabel = 'All';
                break;
        }

        $tagihan = $query->paginate(5);

        return view('bendahara.tagihan', ['tagihan' => $tagihan, 'filterLabel' => $filterLabel]);
    }


    public function indextransaksi(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        // Get the filter from the query parameters, default to 'all' to show all data
        $filter = $request->query('filter', 'all');
        $filterLabel = 'All Data'; // Default label

        // Build the base query
        $query = DB::table('pembayaran')
            ->join('tagihan', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('wajib_retribusi', 'kontrak.wajib_retribusi_id', '=', 'wajib_retribusi.id')
            ->join('users', 'wajib_retribusi.user_id', '=', 'users.id') // Removed the extra space here
            ->select(
                'pembayaran.*',
                'item_retribusi.kategori_nama',
                'users.name',
                // 'pembayaran.status as pembayaran_status', // Alias for status in the pembayaran table
                'pembayaran.status as pembayaran_status', // Alias for status in the pembayaran table
                'tagihan.total_harga', // Alias for status in the pembayaran table
                'pembayaran.metode_pembayaran', // Alias for status in the pembayaran table
                'kontrak.status as kontrak_status' // Alias for status in the kontrak table
            )
            ->where('pembayaran.status', 'SUCCESS') // Filter based on tagihan status
            // ->where('tagihan.active', '1') // Filter based on tagihan active status
            ->where('item_retribusi.retribusi_id', $retribusi_id);

        // Apply the date filter based on the query parameter
        switch ($filter) {
            case 'day':
                $query->where('tagihan.created_at', '>=', now()->subDay());
                $filterLabel = 'Last Day';
                break;
            case 'week':
                $query->where('tagihan.created_at', '>=', now()->subWeek());
                $filterLabel = 'Last Week';
                break;
            case 'month':
                $query->where('tagihan.created_at', '>=', now()->subMonth());
                $filterLabel = 'Last Month';
                break;
            case 'year':
                $query->where('tagihan.created_at', '>=', now()->subYear());
                $filterLabel = 'Last Year';
                break;
            case 'all':
            default:
                $filterLabel = 'All Data'; // Show all data when 'all' is selected or no filter is applied
                break;
        }

        $tagihan = $query->paginate(5);
        // return $tagihan;

        return view('bendahara.transaksi', ['tagihan' => $tagihan, 'filterLabel' => $filterLabel]);
    }

    public function indextagihanmanual(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;
        $filter = $request->query('filter', 'all'); // Default to show all data
        $tagihanQuery = DB::table('tagihan_manual')
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
            ->where('item_retribusi.retribusi_id', $retribusi_id); // Filter based on item_retribusi retribusi_id

        // Apply date filter
        switch ($filter) {
            case 'day':
                $tagihanQuery->whereDate('tagihan_manual.created_at', '=', now()->toDateString());
                break;
            case 'week':
                $tagihanQuery->whereBetween('tagihan_manual.created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $tagihanQuery->whereMonth('tagihan_manual.created_at', '=', now()->month);
                break;
            case 'year':
                $tagihanQuery->whereYear('tagihan_manual.created_at', '=', now()->year);
                break;
            case 'all':
            default:
                // No additional filter for 'all'
                break;
        }

        $tagihan = $tagihanQuery->paginate(5);

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

    public function indexsetor(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;
        $filter = $request->query('filter', 'all'); // Default to show all data

        $setorQuery = DB::table('setoran')
            // ->join('transaksi_petugas', 'setoran.id', '=', 'transaksi_petugas.setoran_id')
            // ->join('tagihan', 'tagihan.id', '=', 'transaksi_petugas.tagihan_id')
            // ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            // ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('petugas', 'petugas.id', '=', 'setoran.petugas_id')
            ->join('users', 'users.id', '=', 'petugas.user_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'setoran.sub_wilayah_id')
            ->select(
                'setoran.*',
                'petugas.user_id',
                'sub_wilayah.nama',
                'users.name as nama_petugas',

            )
            ->where('setoran.status', 'MENUNGGU')
            ->where('sub_wilayah.retribusi_id', $retribusi_id)
        ;

        // Apply date filter
        switch ($filter) {
            case 'day':
                $setorQuery->whereDate('setoran.created_at', '=', now()->toDateString());
                break;
            case 'week':
                $setorQuery->whereBetween('setoran.created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $setorQuery->whereMonth('setoran.created_at', '=', now()->month);
                break;
            case 'year':
                $setorQuery->whereYear('setoran.created_at', '=', now()->year);
                break;
            case 'all':
            default:
                // No additional filter for 'all'
                break;
        }

        $setor = $setorQuery->paginate(5);

        return view('bendahara.setor', ['setor' => $setor]);
    }

    public function lapsetoran()
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        $setor = DB::table('setoran')
            ->join('petugas', 'petugas.id', '=', 'setoran.petugas_id')
            ->join('users', 'users.id', '=', 'petugas.user_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'setoran.sub_wilayah_id')
            ->select(
                'setoran.*',
                'petugas.user_id',
                'sub_wilayah.nama',
                'users.name as nama_petugas',

            )
            ->where('setoran.status', 'DITERIMA')
            ->where('sub_wilayah.retribusi_id', $retribusi_id)
            ->paginate(5);
        return view('bendahara.laporansetoran', ['setor' => $setor]);
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


    public function indexpembatalan(Request $request)
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;
        $filter = $request->query('filter', 'all'); // Default to show all data

        $pembatalanQuery = DB::table('tagihan')
            ->join('pembayaran', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('wajib_retribusi', 'kontrak.wajib_retribusi_id', '=', 'wajib_retribusi.id')
            ->join('users', 'wajib_retribusi.user_id', '=', 'users.id')
            ->select(
                'tagihan.*',
                'item_retribusi.kategori_nama',
                'users.name',
                'pembayaran.status as pembayaran_status',
                'kontrak.status as kontrak_status'
            )
            ->where('tagihan.status', 'VERIFIED')
            ->where('tagihan.active', '1')
            ->where('item_retribusi.retribusi_id', $retribusi_id)
            ->distinct();

        // Apply date filter
        switch ($filter) {
            case 'day':
                $pembatalanQuery->whereDate('tagihan.created_at', '=', now()->toDateString());
                break;
            case 'week':
                $pembatalanQuery->whereBetween('tagihan.created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $pembatalanQuery->whereMonth('tagihan.created_at', '=', now()->month);
                break;
            case 'year':
                $pembatalanQuery->whereYear('tagihan.created_at', '=', now()->year);
                break;
            case 'all':
            default:
                // No additional filter for 'all'
                break;
        }

        $pembatalan = $pembatalanQuery->paginate(5);

        return view('bendahara.pembatalan', ['pembatalan' => $pembatalan]);
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
    public function exportTagihan(Request $request)
    {
        // $filter = $request->input('filter', ''); // Ambil filter dari request

        return Excel::download(new \App\Exports\TagihanExport, 'tagihan.xlsx');
    }

    public function exportTransaksi(Request $request)
    {
        $filter = $request->input('filter', ''); // Ambil filter dari request

        return Excel::download(new \App\Exports\TransaksiExport($filter), 'Transaksi.xlsx');
    }

    public function exportlapsetor(Request $request)
    {


        return Excel::download(new \App\Exports\SetorExport, 'Laporan Konfirmasi.xlsx');
    }



    public function exportTagihanManual()
    {
        return Excel::download(new TagihanManualExport, 'tagihan_manual.xlsx');
    }

    public function exportSetoran()
    {
        return Excel::download(new SetoranExport, 'Setoran.xlsx');
    }



}
