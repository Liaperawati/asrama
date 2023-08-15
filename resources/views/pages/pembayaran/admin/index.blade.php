@php
    $data_pembayaran = DB::table('harga_pembayarans')->first();
@endphp

@extends('template.main')
@section('title', 'List Pembayaran')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <h2 class="fw-bold">List Pembayaran Mahasiswa</h2>
            {{-- center h2 data tagihan --}}
            <div class="col-8">
            </div>
            <div class="col-4">
                @if (Auth::user()->role != 'pengawas')
                
                    @if ($data_pembayaran == null)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                                class="fas fa-plus"></i> Buat Nominal
                        </button>
                    @else
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editNominal"> <i
                                class="fas fa-edit"></i> Edit Nominal
                        </button>
                    @endif
                @endif
                <div class="card mt-2">
                    <div class="card-header">Nominal Harga</div>
                    <div class="card-body text-center">
                        <h3>
                            @if ($data_pembayaran == null)
                                <p>Belum ada data</p>
                            @else
                                Rp. {{ $data_pembayaran->nominal_pembayaran }}
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 mt-3">

            <div class="col">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>No. Kamar</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            <tr>
                                {{-- loopiteration --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->nomor_kamar }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>Rp.{{ $item->nominal }}</td>
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
                                            @if ($item->status != 'konfirmasi')
                                                <form action="{{ url('acc-pembayaran/' . $item->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" id="" value="konfirmasi">
                                                    {{-- onclick confirm --}}
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="return confirm('Apakah anda yakin ingin mengkonfirmasi pembayaran ini?')">
                                                        <i class="fa fa-check"></i>
                                                        Konfirmasi
                                                    </button>

                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </tbody>
                    <tfoot>
                        {{-- total nominal --}}
                        @php
                            $total = 0;
                            foreach ($data as $item) {
                                $total += $item->nominal;
                            }
                        @endphp
                        <tr>
                            <th colspan="5">Total</th>
                            <th colspan="3">Rp. {{ $total }}</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>


    </div>
    <!-- Sale & Revenue End -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Harga Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('buat-harga') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran</label>
                            <input type="number" class="form-control" id="nominal_pembayaran" name="nominal_pembayaran"
                                required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editNominal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Harga Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (isset($data_pembayaran) != null)
                        <form action="{{ url('update-harga', $data_pembayaran->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran</label>
                                <input type="number" class="form-control" id="nominal_pembayaran"
                                    name="nominal_pembayaran" value="{{ $data_pembayaran->nominal_pembayaran }}"
                                    required>
                            </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
                @endif
            </div>
        </div>
    </div>

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

    @if (session()->has('error'))
        <script>
            toastr.error(`{{ session('error') }}`);
        </script>
    @endif
@endsection
