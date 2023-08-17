@extends('template.main')
@section('title', 'Edit Data Mahasiswa')
@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col">
                <h2 class="mt-4">Edit Mahasiswa</h2>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>Form Edit Mahasiswa</b></div>
                    <div class="card-body">
                        <form action="{{ url('update-data-mahasiswa', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label"><b>Nama</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $data->nama_lengkap }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label"><b>Nama Lengkap</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                        placeholder="Masukan nama lengkap .." required value="{{ $data->nama_lengkap }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label"><b>Jenis Kelamin</b></label>
                                <div class="col-sm-10">
                                    <select name="jenis_kelamin" class="form-select" id="">
                                        <option value="">Pilih --- </option>
                                        <option value="Laki-laki"
                                            {{ $data->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ $data->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label"><b>Tempat Lahir</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                        placeholder="Ex : Nama Kota" value="{{ $data->tempat_lahir }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="foto_wajah" class="col-sm-2 col-form-label"><b>Foto Wajah</b></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="foto_wajah" id="foto_wajah"
                                        placeholder="Ex : Nama Kota">
                                    @if ($data->foto_wajah)
                                        <small>Gambar saat ini: {{ $data->foto_wajah }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="foto_ktp" class="col-sm-2 col-form-label"><b>Foto KTP</b></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="foto_ktp" id="foto_ktp">
                                    @if ($data->foto_ktp)
                                        <small>Gambar saat ini: {{ $data->foto_ktp }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label"><b>Tanggal Lahir</b></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ $data->tanggal_lahir }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nim" class="col-sm-2 col-form-label"><b>NIM</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nim" id="nim"
                                        value="{{ $data->nim }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prodi" class="col-sm-2 col-form-label"><b>Prodi</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="prodi" id="prodi"
                                        value="{{ $data->program_studi }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="agama" class="col-sm-2 col-form-label"><b>Agama</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="agama" id="agama"
                                        value="{{ $data->agama }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_hp" class="col-sm-2 col-form-label"><b>No. HP</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_hp" id="no_hp"
                                        value="{{ $data->no_hp }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="asal_sekolah" class="col-sm-2 col-form-label"><b>Asal Sekolah</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah"
                                        value="{{ $data->asal_sekolah }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status_pembayaran" class="col-sm-2 col-form-label"><b>Status Pembayaran</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran"
                                        value="{{ $data->status_pembayaran }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3"
                                        required>{{ $data->alamat }}</textarea>
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
