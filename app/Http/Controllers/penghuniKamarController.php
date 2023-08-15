<?php

namespace App\Http\Controllers;

use App\Models\penghuniKamar;
use Illuminate\Http\Request;

class penghuniKamarController extends Controller
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
        return view('pages.penghuniKamar.tambahPenghuni');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'kamar_id' => 'required',
        ]);

        $data = penghuniKamar::create($request->all());

        if ($data) {
            return redirect('/kamar')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
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
        $data = penghuniKamar::find($id);
        return view('pages.penghuniKamar.editPenghuni', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'kamar_id' => 'required',
        ]);

        $data = penghuniKamar::find($id)->update($request->all());

        if ($data) {
            return redirect('/kamar')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = penghuniKamar::find($id)->delete();

        if ($data) {
            return redirect('/kamar')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
