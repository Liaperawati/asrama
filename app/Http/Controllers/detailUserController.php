<?php

namespace App\Http\Controllers;

use App\Models\dataUser;
use Illuminate\Http\Request;

class detailUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $users = dataUser::where('user_id', $id)->first();
        return view('pages.user.profile', compact('users'));
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

        $request->validate([
            'foto_wajah' => 'required|mimes:png,jpg,jpeg',
            'foto_ktp' => 'required|mimes:png,jpg,jpeg',

        ]);


        $foto_wajah = $request->file('foto_wajah');
        $foto_ktp = $request->file('foto_ktp');

        $nama_file_wajah = time() . "_" . $foto_wajah->getClientOriginalName();
        $foto_wajah->move('img/foto_wajah', $nama_file_wajah);
        $nama_file_ktp = time() . "_" . $foto_ktp->getClientOriginalName();
        $foto_ktp->move('img/foto_ktp', $nama_file_ktp);







        dataUser::create(
            [
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nim' => $request->nim,
                'program_studi' => $request->prodi,
                'agama' => $request->agama,
                'asal_sekolah' => $request->asal_sekolah,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'status_pembayaran' => $request->status_pembayaran,
                'foto_wajah' => $nama_file_wajah,
                'foto_ktp' => $nama_file_ktp,
                'user_id' => $request->user_id,
            ]
        );

        return redirect('/my-profile/' . $request->user_id)->with('success', 'Data User Berhasil Ditambahkan.');
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
        $request->validate([
            'foto_wajah' => 'mimes:png,jpg',
            'foto_ktp' => 'mimes:png,jpg',
        ]);

        // jika foto ktp kosong
        if ($request->foto_ktp == null) {
            $foto_ktp = $request->foto_ktp_lama;
            $nama_file_ktp = $foto_ktp;
        } else {
            $foto_ktp = $request->file('foto_ktp');
            $nama_file_ktp = time() . "_" . $foto_ktp->getClientOriginalName();
            $foto_ktp->move('img/foto_ktp', $nama_file_ktp);
        }

        // jika foto wajah kosong
        if ($request->foto_wajah == null) {
            $foto_wajah = $request->foto_wajah_lama;
            $nama_file_wajah = $foto_wajah;
        } else {
            $foto_wajah = $request->file('foto_wajah');
            $nama_file_wajah = time() . "_" . $foto_wajah->getClientOriginalName();
            $foto_wajah->move('img/foto_wajah', $nama_file_wajah);
        }

        dataUser::where('user_id', $id)->update(
            [
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nim' => $request->nim,
                'program_studi' => $request->prodi,
                'agama' => $request->agama,
                'asal_sekolah' => $request->asal_sekolah,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'status_pembayaran' => $request->status_pembayaran,
                'foto_wajah' => $nama_file_wajah,
                'foto_ktp' => $nama_file_ktp,
                'user_id' => $id,
            ]
        );

        return redirect('/my-profile/' . $id)->with('success', 'Data User Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
