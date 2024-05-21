<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WajibRetribusi;
use App\Models\Role;
use App\Models\Wilayah;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayah = Wilayah::all();
        $users = User::with('role')->whereHas('role', function ($query) {
            $query->whereIn('id', [1, 2]); // Filter role_id 1 dan 2
        })->paginate(5);

        $roles = [
            ['id' => 1, 'name' => 'WAJIB RETRIBUSI'],
            ['id' => 2, 'name' => 'PETUGAS'],
        ];

        return view('data.mguser', compact('users', 'roles', 'wilayah'));
    }

    public function indexadmin()
    { 
        $users = User::with('role')->whereHas('role', function ($query) {
            $query->whereIn('id', [4, 5, 6]); // Filter role_id 4, 5 dan 6
        })->paginate(5);

        $roleOptions = Role::all();

        $roles = [
            ['id' => 4, 'name' => 'Bendahara'],
            ['id' => 5, 'name' => 'AdminKabupaten'],
            ['id' => 6, 'name' => 'AdminKedinasan'],
        ];

        return view('data.mgadmin', compact('users', 'roles', 'roleOptions'));
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

        return redirect()->back()->with('success', 'User created successfully');
    }

    public function storewajib(Request $request)
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

        return redirect()->back()->with('success', 'User created successfully');
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

        return redirect()->back()->with('success', 'User created successfully');
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

    return redirect()->back()->with('success', 'User updated successfully');
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
    public function destroy(string $id)
    {
        //
    }
}
