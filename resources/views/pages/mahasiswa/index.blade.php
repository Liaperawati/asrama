@php
    $user_id = Auth::user()->id;
    $data_kamar = DB::table('penghuni_kamars')
        ->where('user_id', $user_id)
        ->first();
    
    // join 3 table [users,data_users,kamars] save in variable $data_diri_lengkap
    $data_diri_lengkap = DB::table('users')
        ->join('data_users', 'users.id', '=', 'data_users.user_id')
        ->where('users.id', $user_id)
        ->first();
    $data_kamar_lengkap = DB::table('users')
        // ->join('data_users', 'users.id', '=', 'data_users.user_id')
        ->join('penghuni_kamars', 'users.id', '=', 'penghuni_kamars.user_id')
        ->join('kamars', 'penghuni_kamars.kamar_id', '=', 'kamars.id')
        ->where('users.id', $user_id)
        ->first();
    
    $nominal = DB::table('harga_pembayarans')->first();
    // dd($data_diri_lengkap)
    
    $mahasiswa = App\Models\User::where('role', 'mahasiswa')->count();
    $informasi = App\Models\infromasi::all()->count();
    $kamar = App\Models\kamar::all()->count();
@endphp

@extends('template.main')
@section('title', 'Dashboard')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-bed fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-2">Kamar</p>
                        <h6 class="mb-0">{{ $kamar }}</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-2">Mahasiswa</p>
                        <h6 class="mb-0">{{ $mahasiswa }}</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-info-circle fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-2">Informasi</p>
                        <h6 class="mb-0">{{ $informasi }}</h6>
                    </div>
                </div>
            </div>

        </div>
        <div class="row g-4 mt-2">
            @if ($data_kamar == null)
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Maaf!</h4>
                        <p>Anda belum mempunyai kamar / Data anda masih belum terdaftar di list kamar.</p>

                    </div>
                </div>
            @endif

            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if ($data_diri_lengkap == null)
                            @else
                                <img src="{{ asset('img/foto_wajah') }}/{{ $data_diri_lengkap->foto_wajah }}"
                                    class="img-fluid rounded-start" alt="...">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Data Diri</h5>
                                @if ($data_diri_lengkap == null)
                                    <p class="card-text">Anda belum melengkapi data diri anda, silahkan lengkapi data diri
                                        anda
                                    </p>
                                @else
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{ $data_diri_lengkap->nama_lengkap }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>{{ $data_diri_lengkap->jenis_kelamin }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td>:</td>
                                            <td>{{ $data_diri_lengkap->tempat_lahir }}</td>
                                        </tr>
                                    </table>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Data Kamar Tinggal</h5>
                                @if ($data_kamar_lengkap == null)
                                    <p class="card-text">Anda Belum Mendapatkan Kamar
                                    </p>
                                @else
                                    <table>
                                        <tr>
                                            <td>Nomor Kamar</td>
                                            <td>:</td>
                                            <td> {{ $data_kamar_lengkap->nomor_kamar }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bagian kamar</td>
                                            <td>:</td>
                                            <td>{{ $data_kamar_lengkap->bagian_kamar }}</td>
                                        </tr>
                                        <tr>
                                            <td>tipe Kamar</td>
                                            <td>:</td>
                                            <td>{{ $data_kamar_lengkap->tipe_kamar }}</td>
                                        </tr>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-2">
            @php
                $data_pembayaran = DB::table('pembayarans')
                    ->where('user_id', $user_id)
                    ->orderBy('id', 'desc')
                    ->first();
                
                if ($data_pembayaran != null) {
                    $tanggal = date('Y-m-d');
                    $tanggal_bayar = date('Y-m-d', strtotime($data_pembayaran->tanggal));
                    $tanggal_bayar = date('Y-m-d', strtotime('+1 month', strtotime($tanggal_bayar)));
                }
                
                // dd($tanggal_bayar);
                
            @endphp
            <div class="col">
                @if ($data_pembayaran != null)
                    @if (strtotime($tanggal) >= strtotime($tanggal_bayar))
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Peringatan!</h4>
                            <p>Anda belum melakukan pembayaran bulanan kamar , sebesar <b>Rp.
                                    {{ $nominal->nominal_pembayaran }}</b>
                                harap segera melakukan pembayaran
                            </p>

                        </div>
                    @elseif (strtotime($tanggal) < strtotime($tanggal_bayar))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Selamat!</h4>
                            <p>Anda sudah melakukan pembayaran bulanan kamar , sebesar <b>Rp.
                                    {{ $nominal->nominal_pembayaran }}</b>

                            </p>

                        </div>
                    @endif
                @elseif ($data_pembayaran == null)
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Maaf!</h4>
                        <p>Anda belum mempunyai data pembayaran / Data anda masih belum terdaftar di list pembayaran.</p>

                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->


@endsection
