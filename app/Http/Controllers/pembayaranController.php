<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('pembayarans')
            ->leftJoin('kamars', 'kamars.id', '=', 'pembayarans.kamar_id')
            ->leftJoin('data_users', 'data_users.user_id', '=', 'pembayarans.user_id')
            ->select('pembayarans.*', 'kamars.nomor_kamar', 'data_users.nama_lengkap')
            ->get();
        // dd($data);
        return view('pages.pembayaran.admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pembayaran.buatTagihan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'user_id' => 'required',
            'nominal' => 'required',
            'tahun' => 'required',
            'tanggal' => 'required',
            'kamar_id' => 'required',
            'status' => 'required',
            'bukti' => 'required|mimes:png,jpg,jpeg,pdf',
        ]);

        $bukti = $request->file('bukti');
        $namaBukti = time() . '.' . $bukti->extension();
        $bukti->move(public_path('bukti'), $namaBukti);

        $upload_data = pembayaran::create([
            'user_id' => $request->user_id,
            'nominal' => $request->nominal,
            'tahun' => $request->tahun,
            'tanggal' => $request->tanggal,
            'kamar_id' => $request->kamar_id,
            'status' => $request->status,
            'bukti' => $namaBukti,
        ]);


        if ($upload_data) {
            return redirect('tagihan')->with('success', 'Data berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        pembayaran::findOrfail($id);
        $request->validate([
            'status' => 'required',
        ]);

        $data = [
            'status' => $request->status,
        ];

        $update_data = pembayaran::where('id', $id)->update($data);

        if ($update_data) {
            return redirect('lihat-pembayaran')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
