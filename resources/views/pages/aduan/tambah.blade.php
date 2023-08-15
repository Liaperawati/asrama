@php
    $jenis_aduan = DB::table('jenis_aduans')->get();
@endphp

@extends('template.main')
@section('title', 'Tambah Aduan')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            {{-- center h2 data tagihan --}}
            <div class="col-md-12">
                <h2 class="text-center fw-bold">Tambah Aduan</h2>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Tambah Aduan</div>
                    <div class="card-body">
                        <form action="{{ url('upload-aduan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <label for="user_id" class="col-sm-2 col-form-label"><b>ID USER</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="user_id" id="user_id"
                                        placeholder="Masukan user_id.." value="{{ Auth::user()->id }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bulan" class="col-sm-2 col-form-label"><b>Jenis Aduan</b></label>
                                <div class="col-sm-7">
                                    <select name="jenis_aduan_id" class="form-select" id="">
                                        <option value="">-- Pilih Jenis Aduan --</option>
                                        @foreach ($jenis_aduan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_aduan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Tambah Jenis Aduan +
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="aduan" class="col-sm-2 col-form-label"><b>Isi Aduan</b></label>
                                <div class="col-sm-10">
                                    <textarea name="isi_aduan" class="form-control" id="aduan" cols="30" rows="10"
                                        placeholder="Masukan Keterangan Lengkap.."></textarea>
                                    <input type="hidden" name="status" id="" value="belum dibaca">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-sm-2 col-form-label"><b>Lampiran / foto</b></label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto_aduan" id="file" class="form-control">
                                </div>
                            </div>


                            <div class="mb-3 float-end">
                                <a href="{{ url('aduan') }}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Aduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('add-jenis-aduan') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_aduan" class="form-label">Jenis Aduan</label>
                            <input type="text" class="form-control" name="nama_aduan" id="nama_aduan">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
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
@endsection
