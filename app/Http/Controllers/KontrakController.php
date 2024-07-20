<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrak;
use App\Models\WajibRetribusi;
use App\Models\ItemRetribusi;
use App\Models\Wilayah;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;
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
    // use Illuminate\Support\Facades\Auth;

    public function index()
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        // Mengurutkan berdasarkan kolom 'created_at' dalam urutan menurun (data terbaru tampil pertama)
        $Kontrak = Kontrak::with(['wajibRetribusi', 'itemRetribusi', 'Wilayah'])
            ->whereHas('itemRetribusi', function ($query) use ($retribusi_id) {
                $query->where('retribusi_id', $retribusi_id);
            })

            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $wajibRetribusiOptions = WajibRetribusi::all();
        $itemRetribusiOptions = ItemRetribusi::where('retribusi_id', $retribusi_id)->get();
        $subWilayahOptions =  Wilayah::where('retribusi_id', $retribusi_id)->get();

        // return $subWilayahOptions;

        return view('data.kontrak', [
            'Kontrak' => $Kontrak,
            'wajibRetribusiOptions' => $wajibRetribusiOptions,
            'itemRetribusiOptions' => $itemRetribusiOptions,
            'subWilayahOptions' => $subWilayahOptions,
        ]);
    }


    public function indexsampah()
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;
        $test = $user->name;
        $Kontrak = Kontrak::with(['wajibRetribusi', 'itemRetribusi', 'Wilayah'])
            ->whereHas('itemRetribusi', function ($query) use ($retribusi_id) {
                $query->where('retribusi_id', $retribusi_id);
            })

            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $wajibRetribusiOptions = WajibRetribusi::all();
        $itemRetribusiOptions = ItemRetribusi::where('retribusi_id', $retribusi_id)->get();

        $subWilayahOptions = Wilayah::all();
        return view('data.kontraksampah', [
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

    // Hitung berapa banyak tagihan yang perlu dibuat
    $mulai = Carbon::parse($validatedData['tanggal_mulai']);
    $selesai = Carbon::parse($validatedData['tanggal_selesai']);
    $durasiBulan = $mulai->diffInMonths($selesai);

    // Simpan data Kontrak ke dalam database
    $kontrak = Kontrak::create($validatedData);

    // Buat tagihan sesuai dengan durasi bulan
    for ($i = 0; $i < $durasiBulan; $i++) {
        $jatuhTempo = $mulai->copy()->addMonths($i + 1);
        $tagihanData = [
            'kontrak_id' => $kontrak->id,
            'nama' => 'Tagihan ' . $kontrak->id . ' - ' . ($i + 1),
            'total_harga' => $totalHarga,
            'status' => 'NEW',
            'invoice_id' => 'INV-111-222-' . sprintf('%03d', $kontrak->id) . '-' . ($i + 1),
            'request_id' => 'REQ-111-222-' . sprintf('%03d', $kontrak->id) . '-' . ($i + 1),
            'created_at' => now(),
            'updated_at' => now(),
            'active' => 1,
            'jatuh_tempo' => $jatuhTempo->endOfMonth(), // Akhiri bulan untuk jatuh tempo
        ];

        // Simpan data Tagihan ke dalam database
        $tagihan = Tagihan::create($tagihanData);

        if ($tagihan) {
            // Fresh to ensure tagihan_id is valid
            $tagihan = $tagihan->fresh();

            // Buat pembayaran untuk setiap tagihan yang baru dibuat
            $metodePembayaran = ['VA', 'QRIS'];
            $pembayaranData = [
                'tagihan_id' => $tagihan->id,
                'metode_pembayaran' => $metodePembayaran[array_rand($metodePembayaran)],
                'status' => 'WAITING',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Simpan data Pembayaran ke dalam database
            $pembayaran = Pembayaran::create($pembayaranData);

            if (!$pembayaran) {
                return redirect()->back()->with('error', 'Gagal membuat Pembayaran.');
            }
        } else {
            return redirect()->back()->with('error', 'Gagal membuat Tagihan.');
        }
    }

    return redirect()->back()->with('success', 'Data Kontrak Berhasil Ditambahkan.');
}



    public function deleteKontrak($id)
    {
        // Cari kontrak berdasarkan ID
        $kontrak = Kontrak::findOrFail($id);

        // Hapus tagihan yang terkait dengan kontrak
        $tagihanKontrak = Tagihan::where('kontrak_id', $kontrak->id)->get();
        foreach ($tagihanKontrak as $tagihan) {
            $tagihan->delete();
        }

        // Hapus kontrak
        $kontrak->delete();

        return redirect()->back()->with('success', 'Kontrak dan Tagihan Terkait Berhasil Dihapus.');
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
        $pdfName = $id .'_Kontrak_' . Str::slug($userName) . '.pdf'; // Nama file PDF
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

    public function detailkontraksampah($id)
    {
        $kontrak = Kontrak::with(['wajibRetribusi', 'itemRetribusi', 'Wilayah'])->find($id);
        // Cek jika data kontrak ditemukan
        if (!$kontrak) {
            return abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        return view('data.detailkontraksampah', compact('kontrak'));
    }


    public function updateStatus(Request $request, $id)
    {
        $statuskonrak = Kontrak::find($id);
        if (!$statuskonrak) {
            return response()->json(['message' => 'Data Kontrak Tidak Ditemukan'], 404);
        }

        $statuskonrak->status = 'DITERIMA';
        $statuskonrak->save();

        return redirect()->back()->with('message', 'IT WORKS!');
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
