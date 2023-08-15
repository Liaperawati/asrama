@php
    $data_pembayaran = DB::table('harga_pembayarans')->first();
@endphp

@extends('template.main')
@section('title', 'Harga Pembayaran')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col">
                <h2 class="mt-4">Data Harga</h2>
                <!-- Button trigger modal -->
                @if ($data_pembayaran == null)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        + Buat
                    </button>
                @endif
                <div class="card mt-3">
                    <div class="card-header">Nominal Pembayaran</div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nominal Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Rp. {{ $item->nominal_pembayaran }}</td>
                                        <td>
                                            <div class="row mx-auto">
                                                <div class="col-2">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $item->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </div>
                                                <div class="col-2">
                                                    <form action="{{ url('delete-nominal', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus data?')"><i
                                                                class="fa fa-trash"></i></button>

                                                    </form>
                                                </div>

                                            </div>

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Harga Pembayaran
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('update-harga', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="mb-3">
                                                            <label for="nominal_pembayaran" class="form-label">Nominal
                                                                Pembayaran</label>
                                                            <input type="number" class="form-control"
                                                                id="nominal_pembayaran" name="nominal_pembayaran"
                                                                value="{{ $item->nominal_pembayaran }}" required>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                                </form>
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
