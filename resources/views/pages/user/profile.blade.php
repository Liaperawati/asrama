@extends('template.main')
@section('title', 'My Profile')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <h3> My Profile</h3>

            <div class="col">
                <div class="text-center mb-3">
                    @if ($users == null)
                        <img src="{{ asset('img/user.jpg') }}" alt="" style="width: 200px; height: 200px;"
                            class="rounded-circle">
                    @else
                        <img src="{{ asset('img/foto_wajah') }}/{{ $users->foto_wajah }}" alt=""
                            style="width: 200px; height: 200px;" class="rounded-circle">
                    @endif

                </div>

                <div class="card mb-3">
                    <div class="card-body">


                        @if ($users == null && Auth::user()->role != 'admin1')
                            <form action="{{ url('add-data-user') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama_lengkap">
                                    <input type="hidden" class="form-control" id="nama" name="user_id"
                                        value="{{ Auth::user()->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin
                                    </label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                        <option selected>pilih jenis kelmain</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                </div>


                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim">
                                </div>
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">prodi</label>
                                    <input type="text" class="form-control" id="prodi" name="prodi">
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">no_hp</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                                </div>
                                <div class="mb-3">
                                    <label for="asal_sekolah" class="form-label">asal_sekolah</label>
                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah">
                                </div>
                                <div class="mb-3">
                                    <label for="status_pembayaran" class="form-label">status_pembayaran</label>
                                    <input type="text" class="form-control" id="status_pembayaran"
                                        name="status_pembayaran">
                                </div>


                                {{-- foto wajah --}}
                                <div class="mb-3">
                                    <label for="foto_wajah" class="form-label">Foto Wajah</label>
                                    <input class="form-control" type="file" id="foto_wajah" name="foto_wajah">
                                </div>
                                {{-- foto ktp --}}
                                <div class="mb-3">
                                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                                    <input class="form-control" type="file" id="foto_ktp" name="foto_ktp">
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" class="form-control" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        @elseif( $users != null && Auth::user()->role != 'admin1')
                            <form action="{{ url('update-profile', $users->user_id) }}"method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama_lengkap"
                                        value="{{ $users->nama_lengkap }}">
                                    <input type="hidden" class="form-control" id="nama" name="foto_wajah_lama"
                                        value="{{ $users->foto_wajah }}">
                                    <input type="hidden" class="form-control" id="nama" name="foto_ktp_lama"
                                        value="{{ $users->foto_ktp }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin
                                    </label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                        <option selected>{{ $users->jenis_kelamin }}</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        value="{{ $users->tempat_lahir }}">
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ $users->tanggal_lahir }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim"
                                        name="nim"value="{{ $users->nim }}">
                                </div>
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">prodi</label>
                                    <input type="text" class="form-control" id="prodi" name="prodi"
                                        value="{{ $users->program_studi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">agama</label>
                                    <input type="text" class="form-control" id="agama"
                                        name="agama"value="{{ $users->agama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">no_hp</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ $users->no_hp }}">
                                </div>
                                <div class="mb-3">
                                    <label for="asal_sekolah" class="form-label">asal_sekolah</label>
                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah"
                                        value="{{ $users->asal_sekolah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="status_pembayaran" class="form-label">status_pembayaran</label>
                                    <input type="text" class="form-control" id="status_pembayaran"
                                        name="status_pembayaran" value="{{ $users->status_pembayaran }}">
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" class="form-control" rows="10">{{ $users->alamat }}</textarea>
                                </div>

                                {{-- foto wajah --}}
                                <div class="mb-3">
                                    <label for="foto_wajah" class="form-label">Foto Wajah</label>
                                    <input class="form-control" type="file" id="foto_wajah" name="foto_wajah">
                                </div>
                                {{-- foto ktp --}}
                                <div class="mb-3">
                                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                                    <input class="form-control" type="file" id="foto_ktp" name="foto_ktp">
                                </div>
                                {{-- tampilkan foto ktp --}}
                                <div class="mb-3">

                                    <img src="{{ asset('img/foto_ktp') }}/{{ $users->foto_ktp }}" alt=""
                                        style="width: 200px; height: 200px;">
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        @endif

                        @if ($users == null && Auth::user()->role == 'admin1')
                            test
                            @elseif($users != null && Auth::user()->role == 'admin1')
                            <form action="{{ url('update-profile', $users->user_id) }}"method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama_lengkap"
                                        value="{{ $users->nama_lengkap }}">
                                    <input type="hidden" class="form-control" id="nama" name="foto_wajah_lama"
                                        value="{{ $users->foto_wajah }}">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">no_hp</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ $users->no_hp }}">
                                </div>

                               

                                {{-- foto wajah --}}
                                <div class="mb-3">
                                    <label for="foto_wajah" class="form-label">Foto Wajah</label>
                                    <input class="form-control" type="file" id="foto_wajah" name="foto_wajah">
                                </div>
                             
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        @endif

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
    @if (count($errors) > 0)
        <script>
            toastr.error(`{{ $errors->first() }}`);
        </script>
    @endif
@endsection
