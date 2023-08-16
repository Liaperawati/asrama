@extends('template.main')
@section('title', 'Edit Kamar')
@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col">
                <h2 class="mt-4">Edit Kamar</h2>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Edit Kamar</div>
                    <div class="card-body">
                        <form action="{{ url('update-kamar', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="nomor_kamar" class="col-sm-2 col-form-label"><b>NOMOR KAMAR</b></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomor_kamar" id="nomor_kamar"
                                        placeholder="Masukan nomor kamar.." value="{{ $data->nomor_kamar }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bagian_kamar" class="col-sm-2 col-form-label"><b>Jenis Aduan</b></label>
                                <div class="col-sm-10">
                                    <select name="bagian_kamar" class="form-select" id="bagian_kamar">
                                        <option value="{{ $data->bagian_kamar }}">{{ $data->bagian_kamar }}</option>
                                        <option value="atas">Atas</option>
                                        <option value="bawah">Bawah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tipe_kamar" class="col-sm-2 col-form-label"><b>Tipe Kamar</b></label>
                                <div class="col-sm-10">
                                    <select name="tipe_kamar" class="form-select" id="tipe_kamar">
                                        <option value="{{ $data->tipe_kamar }}">{{ $data->tipe_kamar }}</option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label"><b>Status Kamar</b></label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-select" id="status">
                                        <option value="{{ $data->status }}">{{ $data->status }}</option>
                                        <option value="penuh">penuh</option>
                                        <option value="kurang 1">kurang 1</option>
                                        <option value="kosong">kosong</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kapasitas" class="col-sm-2 col-form-label"><b>KAPASITAS</b></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="kapasitas" id="kapasitas"
                                        placeholder="Masukan kapasitas.."  value="{{ $data->kapasitas }}" required >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gambar_kamar" class="col-sm-2 col-form-label"><b>Gambar Kamar</b></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="gambar_kamar" id="gambar_kamar" accept="image/*">
                                    @if($data->getMedia('gambar_kamar')->count() > 0)
                                        <div class="mt-2">
                                            <img src="{{ $data->getFirstMedia('gambar_kamar')->getUrl() }}" alt="Gambar Kamar" style="max-width: 200px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                                                   


                            <div class="mb-3 float-end">
                                <a href="{{ url('kamar') }}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary">Update</button>
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
