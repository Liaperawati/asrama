<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registrasiController extends Controller
{
    public function index()
    {
        return view('pages.auth.registrasi');
    }

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
            return redirect('/login')->with('success', 'Registrasi Berhasil');
        } else {
            return back()->with('error', 'Registrasi Gagal');
        }
    }
}
