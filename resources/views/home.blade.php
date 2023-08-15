@php
    // count all user where role is mahasiswa
    $mahasiswa = App\Models\User::where('role', 'mahasiswa')->count();
    $informasi = App\Models\infromasi::all()->count();
    $kamar = App\Models\kamar::all()->count();
@endphp
@extends('template.main')
@section('title', 'Dashboard')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-bed fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-2">Kamar</p>
                        <h6 class="mb-0">{{ $kamar }}</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-2">Mahasiswa</p>
                        <h6 class="mb-0">{{ $mahasiswa }}</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-info-circle fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-2">Informasi</p>
                        <h6 class="mb-0">{{ $informasi }}</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Sale & Revenue End -->


@endsection
