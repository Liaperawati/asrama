<?php

namespace App\Http\Controllers;

use App\Models\aduan;
use App\Models\jenisAduan;
use Illuminate\Http\Request;

class aduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.aduan.index');
    }

    public function dataAduan()
    {
        // join table aduan and jenis aduan and user
        $aduan = aduan::join('jenis_aduans', 'jenis_aduans.id', '=', 'aduans.jenis_aduan_id')
            ->join('users', 'users.id', '=', 'aduans.user_id')
            ->select('aduans.*', 'jenis_aduans.nama_aduan', 'users.nama')
            ->get();
        // dd($aduan);


        return view('pages.aduan.dataAduan', compact('aduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.aduan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->foto_aduan == null) {
            $validate = $request->validate([
                'user_id' => 'required',
                'isi_aduan' => 'required',
                'status' => 'required',
                'jenis_aduan_id' => 'required',
            ]);
            $aduanMasuk =  aduan::create($validate);
        } else {
            $validate = $request->validate([
                'user_id' => 'required',
                'isi_aduan' => 'required',
                'status' => 'required',
                'jenis_aduan_id' => 'required',
                'foto_aduan' => 'mimes:png,jpg,jpeg',
            ]);

            $foto = $request->file('foto_aduan');
            $nama_file = time() . "_" . $foto->getClientOriginalName();
            $foto->move('img/foto_aduan', $nama_file);

            $aduanMasuk =  aduan::create(
                [
                    'user_id' => $request->user_id,
                    'isi_aduan' => $request->isi_aduan,
                    'status' => $request->status,
                    'jenis_aduan_id' => $request->jenis_aduan_id,
                    'foto_aduan' => $nama_file,
                ]
            );
        }



        if ($aduanMasuk) {
            return redirect('/data-aduan')->with('success', 'Aduan Berhasil');
        } else {
            return back()->with('error', 'Aduan Gagal');
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
        //
    }
    public function updateStatus(Request $request, string $id)
    {
        $aduan = aduan::findOrFail($id);
        $aduan->status = $request->status;
        $aduan->save();

        return redirect()->back()->with('success', 'Status Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = aduan::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Aduan Berhasil Dihapus!');
    }
}
