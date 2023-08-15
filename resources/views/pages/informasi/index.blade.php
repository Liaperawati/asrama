@extends('template.main')
@section('title', 'Informasi')
@section('content')


    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <h2 class="fw-bold">Informasi</h2>

        <div class="row g-4">
            <div class="col-md-12">
            @if(Auth::user()->role == 'admin1')
                <a href="{{ url('add-informasi') }}" class="btn  btn-outline-success m-2 float-end">
                    <i class="fa fa-plus"></i>Tambah Informasi
                    @endif
                </a>
            </div>
        </div>
        <div class="row g-4 mt-2">

            <div class="col">
                <table id="example" class="table table-light table-hover ">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->isi }}</td>
                                <td>{{ $item->jam }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('edit-informasi/' . $item->id) }}">Edit Data</a>
                                            </li>
                                            <li class="dropdown-item" type="button" data-bs-toggle="modal"
                                                data-bs-target="#hapusData{{ $item->id }}">
                                                Hapus Data</li>
                                            <li class="dropdown-item" type="button" data-bs-toggle="modal"
                                                data-bs-target="#show{{ $item->id }}">
                                                Lihat Data</li>


                                        </ul>
                                    </div>



                                </td>
                            </tr>
                            {{-- Show --}}
                            <div class="modal fade" id="show{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>Lihat Data</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- judul --}}
                                            <h4>{{ $item->judul }}</h4>

                                            <p>{{ $item->isi }}</p>
                                            <p>
                                                @if ($item->status == '1')
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak Aktif</span>
                                                @endif
                                            </p>
                                            <p>Penulis <b>{{ $item->penulis }}</b></p>
                                            <p>Tanggal {{ $item->tanggal }} , Jam {{ $item->jam }}</p>
                                            <p>Unduh file

                                                <a href="{{ url('document/file_informasi/', $item->file) }}"
                                                    class="btn btn-success" target="blank">
                                                    <i class="fa fa-download"></i>
                                                    Download
                                                </a>
                                            </p>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">BATAL</button>

                                            </div>
                                        </div>
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
                                            <p>Apakah anda yakin ingin menghapus data ini?</p>

                                            <form action="{{ url('delete-informasi/' . $item->id) }}" method="POST">
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
