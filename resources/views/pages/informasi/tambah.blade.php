@php
    // ambil jam indonesia sekarang dan simpan di variable $jam
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('H:i:s');
    // ambil tanggal indonesia sekarang dan simpan di variable $tanggal
    $tanggal = date('Y-m-d');
@endphp

@extends('template.main')
@section('title', 'Tambah Informasi')
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
                <h2 class="text-center fw-bold">Tambah Informasi</h2>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Tambah Informasi</div>
                    <div class="card-body">
                        <form action="{{ url('upload-informasi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="judul">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Isi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal"
                                    value="{{ $tanggal }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Jam</label>
                                <input type="time" class="form-control" id="exampleFormControlInput1" name="jam"
                                    value="{{ $jam }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="penulis"
                                    value="{{ Auth::user()->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected>Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">File Lampiran (Optional)</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1" name="file">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{ url('informasi') }}" class="btn btn-danger">Batal</a>
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
