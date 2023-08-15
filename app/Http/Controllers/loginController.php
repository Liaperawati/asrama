<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.login');
    }

    public function authentication(Request $request)
    {

        // dd($request->all());

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // bedakan setiap rolenya
            switch (Auth::user()->role) {
                case 'mahasiswa':
                    return redirect('/halaman-mahasiswa');
                    break;
                case 'admin1':
                    return redirect('/home');
                    break;
                case 'admin2':
                    return redirect('/home');
                    break;
                case 'pengawas':
                    return redirect('/home');
                    break;
                default:
                    return redirect('/');
                    break;
            }
        }

        return back()->withErrors([
            'username' => 'Username anda salah!!',
            'password' => 'Password anda salah!!',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
