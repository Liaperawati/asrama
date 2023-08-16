@extends('template.main')
@section('title', 'Data GAleri')
@section('content')


    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <h2 class="fw-bold">Data Galeri</h2>


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

        <div class="row g-4">
            <div class="col-md-12">

                <!-- Button trigger modal -->
                <button type="button" class="btn  btn-outline-success m-2 float-end" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i>Tambah Gambar
                </button>
            </div>
        </div>
        <div class="row g-4 mt-2">

            <div class="col">
                <table id="example" class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>foto</th>
                            <th>penjelasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->foto }}</td>
                                <td>{{ $item->penjelasan }}</td>
                                <td>
                                    <div class="dropdown float-end">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li class="dropdown-item" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $item->id }}">
                                                Edit Data</li>
                                            <li class="dropdown-item" type="button" data-bs-toggle="modal"
                                                data-bs-target="#hapusData{{ $item->id }}">
                                                Hapus Data</li>



                                        </ul>
                                    </div>



                                </td>
                            </tr>
                            {{-- Edit --}}
                            <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>Perbarui Data</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ url('update-galeri', $item->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">gambar</label>
                                                    <input type="file" class="form-control" id="gambar"
                                                        name="gambar">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="penjelasan" class="form-label">Penjelasan</label>
                                                    <textarea class="form-control" id="penjelasan" name="penjelasan" rows="4">{{ $item->penjelasan }}</textarea>
                                                </div>
                                                <img src="{{ asset('img/foto_galeri') }}/{{ $item->foto }}" alt=""
                                                    width="20%">



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Hapus Modal --}}
                            <div class="modal fade" id="hapusData{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>Hapus Data</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus gambar <b>{{ $item->foto }}</b> ini?</p>

                                            <form action="{{ url('delete-gambar/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">BATAL</button>
                                                    <button type="submit" class="btn btn-danger">HAPUS</button>
                                                </div>
                                            </form>
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
    <!-- Sale & Revenue End -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('upload-gambar') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="gambar" class="form-label">gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="penjelasan" class="form-label">Penjelasan</label>
                            <textarea class="form-control" id="penjelasan" name="penjelasan" rows="4">{{ $item->penjelasan }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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

    @if (session()->has('error'))
        <script>
            toastr.error(`{{ session('error') }}`);
        </script>
    @endif
@endsection
