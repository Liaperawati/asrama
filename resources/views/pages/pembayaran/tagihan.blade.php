@php
    $data_tagihan = App\Models\pembayaran::where('user_id', Auth::user()->id)->get();
    $user_id = Auth::user()->id;
    $data_kamar = DB::table('penghuni_kamars')
        ->where('user_id', $user_id)
        ->first();
@endphp

@extends('template.main')
@section('title', 'Data Tagihan')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            {{-- center h2 data tagihan --}}
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <h2 class="text-center fw-bold">Data Tagihan</h2>
            </div>
            @if ($data_kamar != null)
                <div class="col-2">
                    <div class="card ">
                        <div class="card-body m-auto">
                            <a href="{{ url('buat-tagihan') }}" class="btn btn-square btn-outline-success m-2">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <p class="text-center"><b>Buat tagihan</b></p>

                </div>
            @endif
            <div class="col">
                <div class="card">
                    <div class="card-header"><b>Form Tagihan</b></div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label for="bulan" class="col-sm-2 col-form-label"><b>Bulan</b></label>
                                <div class="col-sm-10">
                                    <select name="bulan" class="form-select" id="bulan">
                                        <option selected>Pilih Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">Nopember</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tahun" class="col-sm-2 col-form-label"><b>Tahun</b></label>
                                <div class="col-sm-10">
                                    <select name="tahun" class="form-select" id="tahun">
                                        <option selected>Pilih tahun</option>
                                        <option value="1">2021</option>
                                        <option value="2">2022</option>
                                        <option value="3">2023</option>
                                        <option value="4">2024</option>
                                        <option value="5">2025</option>
                                        <option value="6">2026</option>
                                        <option value="7">2027</option>
                                        <option value="8">2028</option>
                                        <option value="9">2029</option>
                                        <option value="10">2030</option>
                                    </select>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-success float-end">Lihat tagihan</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Tabel Tagihan --}}
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Data Tagihan</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No. Kamar</th>
                                    <th scope="col">Tanggal Pembayaran</th>
                                    <th scope="col">Tagihan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_tagihan as $item)
                                    @php
                                        $bulan = $item->bulan;
                                        $tahun = $item->tahun;
                                        $tanggal = $tahun . '-' . $bulan . '-01';
                                        $tanggal = date('F Y', strtotime($tanggal));
                                        
                                        $data_kamar = DB::table('kamars')
                                            ->where('id', $item->kamar_id)
                                            ->first();
                                        
                                        $data_user = DB::table('data_users')
                                            ->where('user_id', $item->user_id)
                                            ->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data_user->nama_lengkap }}</td>
                                        <td>{{ $data_kamar->nomor_kamar }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>Rp. {{ $item->nominal }}</td>
                                        <td>
                                            @if ($item->status == 'menunggu')
                                                <span class="badge bg-warning">{{ $item->status }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#show{{ $item->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="show{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Lihat Bukti Pembayaran
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row  g-4">
                                                        <div class="col">
                                                            <div class="card">
                                                                <img src="{{ asset('bukti/' . $item->bukti) }}"
                                                                    class="card-img-top" alt="...">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                    <a href="{{ asset('bukti/' . $item->bukti) }}" class="btn btn-success"
                                                        download>
                                                        <i class="fa fa-download"></i>
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->


@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
