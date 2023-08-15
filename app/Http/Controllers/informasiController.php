<?php

namespace App\Http\Controllers;

use App\Models\infromasi;
use Illuminate\Http\Request;

class informasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = infromasi::orderBy('id', 'DESC')->get();
        return view('pages.informasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.informasi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'penulis' => 'required',
            'status' => 'required',
            'file' => 'mimes:pdf,doc,docx',
        ]);


        // jika file kosong
        if ($request->file == null) {
            infromasi::create(
                [
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'tanggal' => $request->tanggal,
                    'jam' => $request->jam,
                    'penulis' => $request->penulis,
                    'status' => $request->status,
                ]
            );
        } else {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('document/file_informasi', $nama_file);

            infromasi::create(
                [
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'tanggal' => $request->tanggal,
                    'jam' => $request->jam,
                    'penulis' => $request->penulis,
                    'status' => $request->status,
                    'file' => $nama_file,
                ]
            );
        }

        return redirect('/informasi')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = infromasi::find($id);
        return view('pages.informasi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'penulis' => 'required',
            'status' => 'required',
            'file' => 'mimes:pdf,doc,docx',
        ]);

        // jika file kosong
        if ($request->file == null) {
            infromasi::where('id', $id)->update(
                [
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'tanggal' => $request->tanggal,
                    'jam' => $request->jam,
                    'penulis' => $request->penulis,
                    'status' => $request->status,
                ]
            );
        } else {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('document/file_informasi', $nama_file);

            infromasi::where('id', $id)->update(
                [
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'tanggal' => $request->tanggal,
                    'jam' => $request->jam,
                    'penulis' => $request->penulis,
                    'status' => $request->status,
                    'file' => $nama_file,
                ]
            );
        }

        return redirect('/informasi')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        infromasi::where('id', $id)->delete();
        return redirect('/informasi')->with('success', 'Data Berhasil Dihapus');
    }
}
