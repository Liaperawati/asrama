<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('id', 'DESC')->get();
        return view('pages.user.index', compact('data'));
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
        $validate = $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
        ]);

        $validate['password'] = Hash::make($validate['password']);
        $userMasuk =  User::create($validate);

        if ($userMasuk) {
            return back()->with('success', 'Registrasi Berhasil');
        } else {
            return back()->with('error', 'Registrasi Gagal');
        }
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

        // dd($request->all());
        $validate = $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
        ]);

        $validate['password'] = Hash::make($validate['password']);
        $userUpdate =  User::where('id', $id)
            ->update($validate);

        if ($userUpdate) {
            return back()->with('success', 'Update Berhasil');
        } else {
            return back()->with('error', 'Update Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userDelete = User::where('id', $id)->delete();

        if ($userDelete) {
            return back()->with('success', 'Delete Berhasil');
        } else {
            return back()->with('error', 'Delete Gagal');
        }
    }
}
