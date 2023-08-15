@php
    // select all data user where role is mahasiswa , and save in variable $data_mahasiswa
@endphp

@extends('template.main')
@section('title', 'Edit Penghuni Kamar')
@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col">
                <h2 class="mt-4">Edit Penghuni Kamar</h2>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Edit Penghuni Kamar</div>
                    <div class="card-body">
                        <form action="{{ url('update-penghuni-kamar', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="user_id" class="col-sm-2 col-form-label"><b>Nama User</b></label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-select" id="select_box">
                                        @php
                                            $dataUser = App\Models\User::where('id', $data->user_id)->first();
                                        @endphp
                                        <option value="{{ $dataUser->id }}">{{ $dataUser->nama }}</option>
                                        @php
                                            $data_mahasiswa = App\Models\User::where('role', 'mahasiswa')->get();
                                        @endphp
                                        @foreach ($data_mahasiswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kamar_id" class="col-sm-2 col-form-label"><b>Pilih Kamar</b></label>
                                <div class="col-sm-10">
                                    <select name="kamar_id" class="form-select" id="select_kamar">
                                        @php
                                            $dataKamar = App\Models\kamar::where('id', $data->kamar_id)->first();
                                        @endphp
                                        <option value="{{ $dataKamar->id }}">{{ $dataKamar->nomor_kamar }} |
                                            {{ $dataKamar->bagian_kamar }} | {{ $dataKamar->tipe_kamar }} |
                                            {{ $dataKamar->status }}
                                        </option>
                                        @php
                                            $data_kamar = App\Models\kamar::all();
                                        @endphp
                                        @foreach ($data_kamar as $item)
                                            <option value="{{ $item->id }}">{{ $item->nomor_kamar }} |
                                                {{ $item->bagian_kamar }} | {{ $item->tipe_kamar }} | {{ $item->status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 float-end">
                                <a href="{{ url('kamar') }}" class="btn btn-danger">Batal</a>
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

    <script src="{{ asset('js/dselect.js') }}"></script>
    <script>
        var select_box_element = document.querySelector('#select_box');

        dselect(select_box_element, {
            search: true
        });
        var select_box_element = document.querySelector('#select_kamar');

        dselect(select_box_element, {
            search: true
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
