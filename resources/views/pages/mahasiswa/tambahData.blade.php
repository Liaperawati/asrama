@extends('template.main')
@section('title', 'Tambah Data Mahasiswa')
@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col">
                <h2 class="mt-4">Tambah Mahasiswa</h2>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>Form Tambah Mahasiswa</b></div>
                    <div class="card-body">
                        <form action="{{ url('upload-mahasiswa', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label"><b>Nama</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $data->nama }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label"><b>Nama Lengkap</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                        placeholder="Masukan nama lengkap .." required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label"><b>Jenis Kelamin</b></label>
                                <div class="col-sm-10">
                                    <select name="jenis_kelamin" class="form-select" id="">
                                        <option value="">Pilih --- </option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label"><b>Tempat Lahir</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                        placeholder="Ex : Nama Kota" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="foto_wajah" class="col-sm-2 col-form-label"><b>Foto Wajah</b></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="foto_wajah" id="foto_wajah"
                                        placeholder="Ex : Nama Kota">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="foto_ktp" class="col-sm-2 col-form-label"><b>Foto ktp</b></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="foto_ktp" id="foto_ktp">
                                </div>
                            </div>


                            <input type="hidden" name="user_id" id="" value="{{ $data->id }}">



                            <div class="mb-3 float-end">
                                <a href="{{ url('data-mahasiswa') }}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
