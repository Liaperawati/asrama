@php
    date_default_timezone_set('Asia/Jakarta');
    // ambil tanggal indonesia sekarang dan simpan di variable $tanggal
    $tanggal = date('Y-m-d');
    // ambil tahun sekarang
    $tahun = date('Y');
    $harga_pembayaran = DB::table('harga_pembayarans')->first();
    $user_id = Auth::user()->id;
    
    $data_kamar = DB::table('penghuni_kamars')
        ->where('user_id', $user_id)
        ->first();
        // dd($data_kamar);
    
    $detail_kamar = DB::table('kamars')
        ->where('id', $data_kamar->kamar_id)
        ->first();
        // dd($detail_kamar);
    
    $data_diri = DB::table('data_users')
        ->where('user_id', $user_id)
        ->first();
@endphp

@extends('template.main')
@section('title', 'Buat Tagihan')
@section('content')
    <!-- Sale & Revenue Start -->

    {{-- error handle --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-md-12">
                <h2 class="text-center fw-bold">Buat Tagihan</h2>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Buat Tagihan</div>
                    <div class="card-body">
                        <form action="{{ url('upload-tagihan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1"
                                            name="tanggal" value="{{ $tanggal }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="tahun" value="{{ $tahun }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="nama_lengkap" value="{{ isset($data_diri->nama_lengkap) ?  $data_diri->nama_lengkap :''}}" readonly>
                                        <input type="hidden" class="form-control" id="exampleFormControlInput1"
                                            name="user_id" value="{{ $user_id }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nomor Kamar</label>

                                        <input type="text" name="nomor_kamar" id="" class="form-control"
                                            value="{{ isset($detail_kamar->nomor_kamar) ? $detail_kamar->nomor_kamar :'' }}" readonly>
                                        <input type="hidden" name="kamar_id" id=""
                                            value="{{ isset($data_kamar->kamar_id) ? $data_kamar->kamar_id : '' }}" readonly>
                                    </div>
                                    <div class="mb-3 d-none">
                                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                                        <input type="hidden" name="status" id="" value="menunggu">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">nominal</label>
                                        <input type="text" name="nominal" id="" class="form-control"
                                            value="{{ isset($harga_pembayaran->nominal_pembayaran) ? $harga_pembayaran->nominal_pembayaran : '' }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Upload Bukti Pembayaran
                                        </label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1"
                                            name="bukti">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Buat</button>
                                <a href="{{ url('tagihan') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Sale & Revenue End -->


@endsection


@section('scripts')

    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            toastr.error(`{{ session('error') }}`);
        </script>
    @endif
@endsection
