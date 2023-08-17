@php
    $data_kamar = App\Models\Kamar::all();

    // dd($data_kamar);
@endphp

@extends('template.main')
@section('title', 'Kamar')
@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col">

                <h2 class="mt-4">Kamar</h2>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Kamar</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Penghuni
                            Kamar</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="bg-light rounded h-100 p-4">
                            @if(Auth::user()->role == 'admin1')
                            <a href="{{ url('add-kamar') }}" class="btn btn-success mb-4">
                                Tambah Data Kamar <i class="fa fa-plus"></i></a>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nomor Kamar</th>
                                            <th scope="col">Kapasitas</th>
                                            <th scope="col">Bagian Kamar</th>
                                            <th scope="col">Tipe Kamar</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data_kamar as $kamar)
                                            @php
                                                // jika kolom kamar_id sudah ada isinya ditabel penghuni_kamars lebih dari 2 data , maka update status di table kamars
                                                $data_penghuni_kamar = DB::table('penghuni_kamars')
                                                    ->where('kamar_id', $kamar->id)
                                                    ->get();
                                                
                                                if ($kamar->kapasitas == count($data_penghuni_kamar)) {
                                                    $status = 'Penuh';
                                                } elseif (count($data_penghuni_kamar) == 0) {
                                                    $status = 'Kosong';
                                                } elseif ($kamar->kapasitas > count($data_penghuni_kamar)) {
                                                    $status = 'Kurang ' . $kamar->kapasixtas - count($data_penghuni_kamar);
                                                }
                                                
                                                DB::table('kamars')
                                                    ->where('id', $kamar->id)
                                                    ->update([
                                                        'status' => $status,
                                                    ]);
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $kamar->nomor_kamar }}</td>
                                                <td>{{ $kamar->kapasitas }}</td>
                                                <td>{{ $kamar->bagian_kamar }}</td>
                                                <td>{{ $kamar->tipe_kamar }}</td>
                                                <td>
                                                    @foreach ($kamar->getMedia('gambar_kamar') as $media)
                                                        <img src="{{ $media->getUrl() }}" alt="Gambar Kamar" style="max-width: 100px;">
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{-- badge --}}
                                                    @if ($kamar->status == 'Kosong')
                                                        <span class="badge bg-success">{{ $kamar->status }}</span>
                                                    @elseif ($kamar->status == 'Penuh')
                                                        <span class="badge bg-danger">{{ $kamar->status }}</span>
                                                    @else
                                                        <span class="badge bg-warning">{{ $kamar->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                @if(Auth::user()->role == 'admin1')
                                                    <a href="{{ url('edit-kamar/' . $kamar->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                        @endif
                                                        @if(Auth::user()->role == 'admin1')
                                                    <form action="{{ url('delete-kamar/' . $kamar->id) }}" method="POST"
                                                        class="d-inline">
                                                        
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                                                            @endif
                                                        </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="bg-light rounded h-100 p-4">
                            @if(Auth::user()->role == 'admin1')
                                <a href="{{ url('add-penghuni-kamar') }}" class="btn btn-success mb-4">
                                    Tambah Data Penghuni Kamar <i class="fa fa-plus"></i></a>
                                    @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Mahasiswa</th>
                                                <th scope="col">Nomor Kamar</th>
                                                <th scope="col">Bagian Kamar</th>
                                                <th scope="col">Tipe Kamar</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                // join table penghuni_kamar , user adn kamar
                                                $data_penghuni_kamar = DB::table('penghuni_kamars')
                                                    ->join('users', 'penghuni_kamars.user_id', '=', 'users.id')
                                                    ->join('kamars', 'penghuni_kamars.kamar_id', '=', 'kamars.id')
                                                    ->select('penghuni_kamars.*', 'users.nama', 'kamars.nomor_kamar', 'kamars.bagian_kamar', 'kamars.tipe_kamar')
                                                    ->get();
                                                
                                                $data_penghuni = DB::table('penghuni_kamars')
                                                    ->join('users', 'penghuni_kamars.user_id', '=', 'users.id')
                                                    ->select('penghuni_kamars.*', 'users.nama')
                                                    ->get();
                                            @endphp
                                            @foreach ($data_penghuni_kamar as $penghuni_kamar)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $penghuni_kamar->nama }}</td>
                                                    <td>{{ $penghuni_kamar->nomor_kamar }}</td>
                                                    <td>{{ $penghuni_kamar->bagian_kamar }}</td>
                                                    <td>{{ $penghuni_kamar->tipe_kamar }}</td>
                                                    <td>
                                                    @if(Auth::user()->role == 'admin1')
                                                        <a href="{{ url('edit-penghuni-kamar/' . $penghuni_kamar->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                            @endif
                                                    @if(Auth::user()->role == 'admin1')
                                                        <form
                                                            action="{{ url('delete-penghuni-kamar/' . $penghuni_kamar->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                                                                @endif
                                                            </form>
                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
