<?php

namespace App\Http\Controllers;

use App\Models\hargaPembayaran;
use Illuminate\Http\Request;

class hargaPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = hargaPembayaran::all();
        return view('pages.pembayaran.hargaPembayaran.index', compact('data'));
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
        
        hargaPembayaran::create([
            'nominal_pembayaran' => $request->nominal_pembayaran,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
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

        $request->validate([
            'nominal_pembayaran' => 'required',
        ]);
        try {
            $data = hargaPembayaran::findOrFail($id);
            $data->update([
                'nominal_pembayaran' => $request->nominal_pembayaran,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = hargaPembayaran::findOrFail($id);
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
