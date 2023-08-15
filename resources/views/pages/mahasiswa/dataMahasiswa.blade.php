@extends('template.main')
@section('title', 'Data Mahasiswa')
@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <h2 class="mt-4">Data Mahasiswa</h2>
            <div class="col">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Data Mahasiswa</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Foto Wajah</th>
                                    <th scope="col">Foto KTP</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>

                                        @php
                                            // join table users and data_users
                                            $data_users = DB::table('data_users')
                                                ->where('user_id', $item->id)
                                                ->first();
                                            
                                        @endphp

                                        @if ($data_users == null)
                                            <td>NULL</td>
                                            <td>NULL</td>
                                            <td>NULL</td>
                                            <td>NULL</td>
                                            <td>NULL</td>
                                            <td>
                                                <a href="{{ url('add_data/mahasiswa/' . $item->id) }}">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        @else
                                            <td>{{ $data_users->nama_lengkap }}</td>
                                            <td>{{ $data_users->jenis_kelamin }}</td>
                                            <td>{{ $data_users->tempat_lahir }}</td>
                                            <td>
                                                <img src="{{ asset('img/foto_wajah/' . $data_users->foto_wajah) }}"
                                                    alt="{{ $data_users->foto_wajah }}" width="100px">
                                            </td>
                                            <td>
                                                <img src="{{ asset('img/foto_ktp/' . $data_users->foto_ktp) }}"
                                                    alt="{{ $data_users->foto_ktp }}" width="100px">

                                            </td>
                                            <td>
                                                <a href="{{ url('edit/mahasiswa/' . $item->id) }}">
                                                    <button type="button" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        @endif



                                    </tr>
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
