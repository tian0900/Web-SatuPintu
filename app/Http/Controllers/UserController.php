<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminKabupaten;
use App\Models\Kabupaten;
use App\Models\Retribusi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WajibRetribusi;
use App\Models\Role;
use App\Models\Wilayah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;
use App\Models\PetugasWilayah;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $wilayah = Wilayah::all();
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        $wilayah = Wilayah::where('retribusi_id', $retribusi_id)->get();

        $roles = [
            ['name' => 'WAJIB RETRIBUSI'],
            ['name' => 'Petugas Pemungut'],
        ];

        $roleNames = array_column($roles, 'name');

        $query = User::with('role')->whereHas('role', function ($query) use ($roleNames) {
            $query->whereIn('name', $roleNames); // Filter by role name
        });

        // Apply the date filter based on the query parameter
        $filter = $request->query('filter', '30days'); // Default to last 30 days
        $filterLabel = 'Last 30 days';
        switch ($filter) {
            case 'day':
                $query->where('created_at', '>=', now()->subDay());
                $filterLabel = 'Last Day';
                break;
            case 'week':
                $query->where('created_at', '>=', now()->subWeek());
                $filterLabel = 'Last Week';
                break;
            case 'month':
                $query->where('created_at', '>=', now()->subMonth());
                $filterLabel = 'Last Month';
                break;
            case 'year':
                $query->where('created_at', '>=', now()->subYear());
                $filterLabel = 'Last Year';
                break;
            default:
                $query->where('created_at', '>=', now()->subDays(30));
                break;
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('data.mguser-pasar', compact('users', 'roles', 'wilayah', 'filterLabel'));
    }



    public function indexadmin()
    {
        $user = Auth::user();

        // Ambil kabupaten_id dari admin yang sedang login
        $kabupaten_id = $user->adminkabupaten->kabupaten_id;

        // Mengambil retribusi yang memiliki kabupaten_id sesuai dengan yang sedang login
        $retribusi = Retribusi::whereHas('kedinasan', function ($query) use ($kabupaten_id) {
            $query->where('kabupaten_id', $kabupaten_id);
        })->get();

        $roles = [
            ['name' => 'Bendahara'],
            ['name' => 'AdminKedinasan'],
        ];

        $roleNames = array_column($roles, 'name');

        // Mengambil pengguna yang memiliki role tertentu dan kabupaten_id yang sama dengan admin yang sedang login
        $users = User::with(['role', 'adminkabupaten'])
            ->whereHas('role', function ($query) use ($roleNames) {
                $query->whereIn('name', $roleNames); // Filter berdasarkan role name
            })
            ->whereHas('adminkabupaten', function ($query) use ($kabupaten_id) {
                $query->where('kabupaten_id', $kabupaten_id); // Filter berdasarkan kabupaten_id
            })
            ->orWhereHas('admin', function ($query) use ($kabupaten_id) {
                $query->whereHas('retribusi', function ($subQuery) use ($kabupaten_id) {
                    $subQuery->whereHas('kedinasan', function ($deepQuery) use ($kabupaten_id) {
                        $deepQuery->where('kabupaten_id', $kabupaten_id);
                    });
                });
            })
            ->orderBy('created_at', 'desc') // Mengurutkan dari baru ke lama
            ->paginate(5);

        $roleOptions = Role::all();

        return view('data.mgadmin', compact('users', 'roles', 'roleOptions', 'retribusi'));
    }




    public function indexadminkabupaten()
    {
        $kabupaten = Kabupaten::all();
        $roles = [
            ['name' => 'AdminKabupaten'],
        ];

        $roleNames = array_column($roles, 'name');

        $users = User::with('role')->whereHas('role', function ($query) use ($roleNames) {
            $query->whereIn('name', $roleNames); // Filter berdasarkan role name
        })->paginate(10);

        $roleOptions = Role::all();


        return view('data.mgadminkabupaten', compact('users', 'roles', 'roleOptions', 'kabupaten'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function storekabupatenuser(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'name' => 'required|string',
            'kabupaten_id' => 'required|exists:kabupaten,id',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nik' => 'required|string|unique:users',
            'alamat' => 'required|string',
            'role_id' => 'required|exists:roles,id',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        // return $validatedData;
        $user = User::create($validatedData);

        $postToSave = [
            'user_id' => $user->id,
            'kabupaten_id' => $request->input('kabupaten_id'),
        ];
        // return $postToSave;
        AdminKabupaten::create($postToSave);

        return redirect()->back()->with('success', 'Data User Berhasil Ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'nik' => 'required|string|unique:users,nik',
            'alamat' => 'required|string',
            'wilayah' => 'required|exists:sub_wilayahs,id',  // Pastikan wilayah ada di tabel sub_wilayahs
        ]);

        // Set nilai role_id dan hash password
        $validatedData['role_id'] = 2;
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat user baru
        $user = User::create($validatedData);

        // Siapkan data untuk Petugas
        $postToSave = [
            'user_id' => $user->id,
        ];

        // Buat entri Petugas baru
        $petugas = Petugas::create($postToSave);

        // Siapkan data untuk PetugasWilayah
        $savewilayah = [
            'petugas_id' => $petugas->id,  // Gunakan ID dari entri Petugas yang baru dibuat
            'sub_wilayah_id' => $request->input('wilayah'),
        ];

        // Buat entri PetugasWilayah baru
        PetugasWilayah::create($savewilayah);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Petugas Berhasil Ditambahkan');
    }


    public function storewajib(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'alamat' => 'required|string',
            'nik' => 'required|string|unique:users,nik',
        ]);

        // Set nilai role_id dan hash password
        $validatedData['role_id'] = 1;
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat user baru
        $user = User::create($validatedData);

        // Siapkan data untuk WajibRetribusi
        $postToSave = [
            'user_id' => $user->id,
        ];

        // Buat entri WajibRetribusi baru
        WajibRetribusi::create($postToSave);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Wajib Retribusi Berhasil Ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'nik' => 'required|string|unique:users,nik,' . $id,
            'alamat' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->nik = $validatedData['nik'];
        $user->alamat = $validatedData['alamat'];

        if ($request->has('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Data User Berhasil Di Update');
    }


    public function storeadmin(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nik' => 'required|string|unique:users',
            'alamat' => 'required|string',
            'role_id' => 'required|exists:role,id',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $postToSave = [
            'user_id' => $user->id,
        ];
        Petugas::create($postToSave);

        // dd($petugas); // Tambahkan ini untuk melihat nilai $petugas

        return redirect()->back()->with('success', 'Data User Berhasil Ditambahkan');
    }

    public function indexsampah()
    {
        $wilayah = Wilayah::all();
        $users = User::with('role')->whereHas('role', function ($query) {
            $query->whereIn('id', [1, 2]); // Filter role_id 1 dan 2
        })->paginate(10);

        $roles = [
            ['id' => 1, 'name' => 'WAJIB RETRIBUSI'],
            ['id' => 2, 'name' => 'PETUGAS'],
        ];

        return view('data.mguser-sampah', compact('users', 'roles', 'wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storesampah(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nik' => 'required|string|unique:users',
            'alamat' => 'required|string',
            'wilayah' => 'required',
        ]);

        $validatedData['role_id'] = 2;
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $postToSave = [
            'user_id' => $user->id,
            'subwilayah_id' => $request['wilayah'],
        ];
        Petugas::create($postToSave);

        // dd($petugas); // Tambahkan ini untuk melihat nilai $petugas

        return redirect()->back()->with('success', 'Data User Berhasil Ditambahkan');
    }

    public function storewajibsampah(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nik' => 'required|string|unique:users',
            'alamat' => 'required|string',
        ]);

        $validatedData['role_id'] = 1;
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $postToSave = [
            'user_id' => $user->id,
        ];
        WajibRetribusi::create($postToSave);

        // dd($petugas); // Tambahkan ini untuk melihat nilai $petugas

        return redirect()->back()->with('success', 'Data User Berhasil Ditambahkan');
    }

    public function updatesampah(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'nik' => 'required|string|unique:users,nik,' . $id,
            'alamat' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->nik = $validatedData['nik'];
        $user->alamat = $validatedData['alamat'];

        if ($request->has('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Data User Berhasil Ditambahkan');
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mulai transaksi
        DB::beginTransaction();

        try {
            // Hapus data terkait di wajib_retribusi
            WajibRetribusi::where('user_id', $id)->delete();

            // Temukan user berdasarkan ID, atau gagal jika tidak ditemukan
            $user = User::findOrFail($id);

            // Hapus user
            $user->delete();

            // Commit transaksi
            DB::commit();

            return redirect()->route('userpasar')->with('success', 'User dan data terkait berhasil dihapus');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada kesalahan
            DB::rollBack();

            return redirect()->route('userpasar')->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }

    public function storedata(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'retribusi_id' => 'required|exists:retribusi,id',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nik' => 'required|string|unique:users',
            'alamat' => 'required|string',
            'role_id' => 'required|exists:roles,id',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $postToSave = [
            'user_id' => $user->id,
            'retribusi_id' => $request->input('retribusi_id'),
        ];
        // return $postToSave;
        Admin::create($postToSave);

        return redirect()->back()->with('success', 'Data User Berhasil Ditambahkan');
    }


}
