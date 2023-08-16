<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;

class galeriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = galeri::all();
        return view('pages.galeri.index', compact('data'));
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
            'gambar' => 'required|mimes:png,jpg,jpeg',
        ]);


        $gambar = $request->file('gambar');


        $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
        $gambar->move('img/foto_galeri', $nama_gambar);


        galeri::create(
            [
                'foto' => $nama_gambar,
                'penjelasan' => $request->penjelasan,
            ]
        );

        return redirect('/data-galeri')->with('success', 'Gambar Berhasil Ditambahkan.');
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

        // $request->validate([
        //     'gambar' => 'mimes:png,jpg,jpeg',

        // ]);

        

        galeri::find($id)->update(
            [
                'penjelasan' => $request->penjelasan,
            ]
        );

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');

            $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
            $gambar->move('img/foto_galeri', $nama_gambar);

            galeri::find($id)->update(
                [
                    'foto' => $nama_gambar
                ]
            );
        }

        return redirect('/data-galeri')->with('success', 'Gambar Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus di public juga
        $data = galeri::find($id);
        $data->delete();
        return redirect('/data-galeri')->with('success', 'Gambar Berhasil Dihapus.');
    }

    public function galeri()
    {
        $data = galeri::all();
        return view('pages.galeri.listGaleri', compact('data'));
    }
}
