<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-3">Galeri</h1>
            </div>
            <div class="col">
                <a href="{{ url('/') }}" class="btn btn-primary mt-3 float-end">Kembali</a>
            </div>
        </div>
        {{-- jika $data isinya kosong --}}
        @if ($data->isEmpty())
            <br><br><br><br>
            <center><b>Data Masih Kosong</b></center>
        @endif
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">

            @foreach ($data as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('img/foto_galeri') }}/{{ $item->foto }}" class="" alt="...">
                        <center> <h4>{{ $item->penjelasan }}</h4></center>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
