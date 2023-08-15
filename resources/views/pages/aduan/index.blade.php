@extends('template.main')
@section('title', 'Aduan')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            {{-- center h2 data tagihan --}}
            <div class="col-md-12">
                <h2 class="text-center fw-bold">Selamat datang di form pengaduan</h2>
            </div>
            <div class="col-md-12">
                <p class="text-center">Kami selaku pihak kampus akan mendengarkan aduan saudara sebisa mungkin kami akan
                    memberikan tanggapan
                    atas aduan dari saudara</p>
                <center>
                    <a href="{{ url('add-aduan') }}" class="btn btn-success "> Buat Aduan</a>
                    <a href="{{ url('data-aduan') }}" class="btn btn-primary "> Data Aduan</a>
                </center>
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
@endsection
