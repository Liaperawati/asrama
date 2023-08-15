@extends('template.main')
@section('title', 'Data Aduan')
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3>Data Aduan Mahasiswa</h3>
            {{-- Tabel Tagihan --}}
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Data Aduan</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Aduan</th>
                                    <th scope="col">Isi Aduan</th>
                                    <th scope="col">Foto / Lampiran</th>
                                    <th scope="col">Status</th>
                                    @if (Auth::user()->role != 'mahasiswa')
                                        <th scope="col">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aduan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nama_aduan }}</td>
                                        <td>{{ $item->isi_aduan }}</td>
                                        <td>{{ $item->foto_aduan }}</td>
                                        <td>
                                            @if ($item->status == 'belum dibaca')
                                                <span class="badge bg-danger">{{ $item->status }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        @if (Auth::user()->role != 'mahasiswa')
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#show{{ $item->id }}">
                                                    Detail
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $item->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            
                                        @endif

                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="show{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Aduan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ url('update/aduan', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Nama
                                                                Mahasiswa</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" value="{{ $item->nama }}"
                                                                readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Jenis
                                                                Aduan</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1"
                                                                value="{{ $item->nama_aduan }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Isi
                                                                Aduan</label>
                                                            {{-- textarea --}}
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{ $item->isi_aduan }}</textarea>

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Status
                                                                Aduan</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" value="{{ $item->status }}"
                                                                readonly>
                                                            <input type="hidden" name="status" id=""
                                                                value="sudah dibaca">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Lampiran</label>
                                                            <br>
                                                            <img src="{{ asset('img/foto_aduan') }}/{{ $item->foto_aduan }}"
                                                                alt="" width="100">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Tandai Sudah
                                                            Dibaca</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Aduan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ url('delete-aduan', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        {{-- <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Nama
                                                                Mahasiswa</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" value="{{ $item->nama }}"
                                                                readonly>
                                                        </div> --}}
                                                        <p>Apakah anda yakin akan menghapus data Aduan ini ?</p>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
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
