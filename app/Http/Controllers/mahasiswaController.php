<?php

namespace App\Http\Controllers;

use App\Models\dataUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('role', 'mahasiswa')->orderBy('id', 'DESC')->get();
        return view('pages.mahasiswa.dataMahasiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = User::find($id);
        return view('pages.mahasiswa.tambahData', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nim' => 'required',
            'prodi' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'asal_sekolah' => 'required',
            'status_pembayaran' => 'required',
            'foto_wajah' => 'required|mimes:png,jpg,jpeg',
            'foto_ktp' => 'required|mimes:png,jpg,jpeg',
            'alamat' => 'required',
        ]);


        $foto_wajah = $request->file('foto_wajah');
        $foto_ktp = $request->file('foto_ktp');

        $nama_file_wajah = time() . "_" . $foto_wajah->getClientOriginalName();
        $nama_file_ktp = time() . "_" . $foto_ktp->getClientOriginalName();

        $foto_wajah->move('img/foto_wajah', $nama_file_wajah);
        $foto_ktp->move('img/foto_ktp', $nama_file_ktp);

        $dataSave = dataUser::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nim' => $request->nim,
            'program_studi' => $request->prodi,
            'agama' => $request->agama,
            'no_hp' => $request->no_hp,
            'asal_sekolah' => $request->asal_sekolah,
            'status_pembayaran' => $request->status_pembayaran,
            'foto_wajah' => $nama_file_wajah,
            'foto_ktp' => $nama_file_ktp,
            'alamat' => $request->alamat,
            'user_id' => $id,
        ]);

        if ($dataSave) {
            return redirect('data-mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('data-mahasiswa')->with('failed', 'Data Gagal Ditambahkan');
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
        $data = DB::table('data_users')->where('user_id', $id)->first();
        return view('pages.mahasiswa.editData', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'foto_wajah' => 'mimes:png,jpg',
            'foto_ktp' => 'mimes:png,jpg',
        ]);

        $data = dataUser::find($id);

        // Memeriksa dan mengelola gambar KTP
        if ($request->hasFile('foto_ktp')) {
            $foto_ktp = $request->file('foto_ktp');
            $nama_file_ktp = time() . "_" . $foto_ktp->getClientOriginalName();
            $foto_ktp->move('img/foto_ktp', $nama_file_ktp);
            $data->foto_ktp = $nama_file_ktp;
        }

        // Memeriksa dan mengelola gambar Wajah
        if ($request->hasFile('foto_wajah')) {
            $foto_wajah = $request->file('foto_wajah');
            $nama_file_wajah = time() . "_" . $foto_wajah->getClientOriginalName();
            $foto_wajah->move('img/foto_wajah', $nama_file_wajah);
            $data->foto_wajah = $nama_file_wajah;
        }

        // Update data lainnya
        $data->nama_lengkap = $request->nama_lengkap;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tempat_lahir = $request->tempat_lahir;

        // Update data tambahan
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->nim = $request->nim;
        $data->program_studi = $request->prodi;
        $data->agama = $request->agama;
        $data->no_hp = $request->no_hp;
        $data->asal_sekolah = $request->asal_sekolah;
        $data->status_pembayaran = $request->status_pembayaran;
        $data->alamat = $request->alamat;

        $data->save();

        return redirect('data-mahasiswa')->with('success', 'Data Berhasil Diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
