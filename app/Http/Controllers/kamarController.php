<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use Illuminate\Http\Request;

class kamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kamar.tambahKamar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nomor_kamar' => 'required',
            'bagian_kamar' => 'required',
            'tipe_kamar' => 'required',
            'status' => 'required',
            'kapasitas' => 'required',
        ]);

        $data = kamar::create($request->all());

        if ($request->hasFile('gambar_kamar')) {
            $data->addMediaFromRequest('gambar_kamar')->toMediaCollection('gambar_kamar');
        }

        if ($data) {
            return redirect('/kamar')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('failed', 'Data gagal ditambahkan');
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
        // find id
        $data = kamar::find($id);
        // dd($data);
        return view('pages.kamar.editKamar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomor_kamar' => 'required',
            'bagian_kamar' => 'required',
            'tipe_kamar' => 'required',
            'status' => 'required',
            'kapasitas' => 'required',
        ]);
    
        $kamar = kamar::find($id);
    
        $updateResult = $kamar->update($request->all());
    
        if ($request->hasFile('gambar_kamar')) {
            if ($updateResult) {
                // Hapus gambar yang sudah ada sebelumnya
                $kamar->clearMediaCollection('gambar_kamar');
        
                // Tambahkan gambar yang baru diunggah
                $kamar->addMediaFromRequest('gambar_kamar')->toMediaCollection('gambar_kamar');
            }
        }
    
        if ($updateResult) {
            return redirect('/kamar')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('failed', 'Data gagal diubah');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = kamar::find($id)->delete();

        if ($data) {
            return redirect('/kamar')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('failed', 'Data gagal dihapus');
        }
    }
}
