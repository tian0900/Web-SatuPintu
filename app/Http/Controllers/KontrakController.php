<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrak;
use App\Models\WajibRetribusi;
use App\Models\ItemRetribusi;
use App\Models\Wilayah;
use App\Models\Tagihan;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Storage;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $test = $user->name;
        $Kontrak = Kontrak::with(['wajibRetribusi', 'itemRetribusi', 'Wilayah'])->get();
        $wajibRetribusiOptions = WajibRetribusi::all();
        $itemRetribusiOptions = ItemRetribusi::all();
        
        $subWilayahOptions = Wilayah::all();
        return view('data.kontrak', [
            'Kontrak' => $Kontrak,
            'wajibRetribusiOptions' => $wajibRetribusiOptions,
            'itemRetribusiOptions' => $itemRetribusiOptions,
            'subWilayahOptions' => $subWilayahOptions,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'wajib_retribusi_id' => 'required|exists:wajib_retribusi,id',
            'item_retribusi_id' => 'required|exists:item_retribusi,id',
            'sub_wilayah_id' => 'required|exists:sub_wilayah,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);
    
        // Ambil data harga dan jenis_tagihan dari tabel item_retribusi
        $itemRetribusi = ItemRetribusi::findOrFail($validatedData['item_retribusi_id']);
        $totalHarga = $itemRetribusi->harga;
        $jenisTagihan = $itemRetribusi->jenis_tagihan;
    
        // Tentukan jatuh tempo berdasarkan jenis_tagihan
        $jatuhTempo = now();
        if ($jenisTagihan == 'MINGGUAN') {
            $jatuhTempo = $jatuhTempo->addDays(7);
        } elseif ($jenisTagihan == 'HARIAN') {
            $jatuhTempo = $jatuhTempo->addDays(1);
        } elseif ($jenisTagihan == 'BULANAN') {
            $jatuhTempo = $jatuhTempo->addDays(30);
        }
    
        // Simpan data Kontrak ke dalam database
        $kontrak = Kontrak::create($validatedData);
    
        // Buat data Tagihan
        $tagihanData = [
            'kontrak_id' => $kontrak->id,
            'nama' => 'Tagihan ' . $kontrak->id,
            'total_harga' => $totalHarga,
            'status' => 'NEW',
            'invoice_id' => 'INV-111-222-' . sprintf('%03d', $kontrak->id),
            'request_id' => 'REQ-111-222-' . sprintf('%03d', $kontrak->id),
            'virtualAccountId' => mt_rand(100000, 999999),
            'created_at' => now(),
            'updated_at' => now(),
            'jatuh_tempo' => $jatuhTempo,
        ];
    
        // Simpan data Tagihan ke dalam database
        Tagihan::create($tagihanData);
    
        return response()->json(['success' => true, 'message' => 'Data Kontrak berhasil ditambahkan']);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function generatePDFkontrak($id)
    {
        // Mengambil data kontrak dengan relasi yang sudah di-load
        $kontrak = Kontrak::with(['wajibRetribusi', 'itemRetribusi', 'Wilayah'])->find($id);

        // Jika data tidak ditemukan, kembalikan response 404 Not Found
        if (!$kontrak) {
            abort(404);
        }

        // Ambil nama pengguna dari relasi users di dalam wajibRetribusi
        $userName = $kontrak->wajibRetribusi->user->name;

        // Render view ke dalam HTML dengan data dari database
        $html = view('data.detailkontrak', compact('kontrak'))->render();

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

        // Simpan PDF ke dalam folder kontrak di public
        $pdfName = 'Kontrak_' . Str::slug($userName) . '.pdf'; // Nama file PDF
        $pdfPath = 'kontrakpdf/' . $pdfName; // Path lengkap file PDF di folder public
        Storage::put($pdfPath, $dompdf->output());

        // Stream PDF response to user's browser
        return $dompdf->stream($pdfName);
    }



    public function detailkontrak($id)
    {
        $kontrak = Kontrak::with(['wajibRetribusi', 'itemRetribusi', 'Wilayah'])->find($id);
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
