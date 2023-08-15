<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrasi Mahasiswa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



</head>


<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid ">
            <div class="row h-100 align-items-center justify-content-center " style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{ url('/') }}" class="">
                                <img src="{{ asset('img/Politeknik_Pertanian_Negeri_Samarinda.webp') }}" alt="logo"
                                    width="50" height="50">
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <form action="{{ url('daftar') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama" placeholder="nama"
                                    name="nama">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" placeholder="username"
                                    name="username">
                                <label for="username">Username</label>
                            </div>

                            <input type="hidden" class="form-control" id="role" placeholder="role" name="role"
                                value="mahasiswa">



                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password">
                                <label for="password">Password</label>
                            </div>
                            {{-- confirm password --}}
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password2" placeholder="Password"
                                    name="password2">
                                <label for="password2">Confirm Password</label>
                            </div>


                            <button type="submit" class="btn btn-outline-success py-3 w-100 mb-4">Sign Up</button>
                        </form>
                        <p class="text-center mb-0">Already have an Account? <a href="{{ url('login') }}">Sign In</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        // validasi id password and password2 , wirh jquery
        $(document).ready(function() {
            $('#password2').keyup(function() {
                var password = $('#password').val();
                var password2 = $('#password2').val();
                if (password != password2) {
                    $('#password2').addClass('is-invalid');
                    $('#password2').removeClass('is-valid');
                } else {
                    $('#password2').addClass('is-valid');
                    $('#password2').removeClass('is-invalid');
                }
            });
        });
    </script>

</body>

</html>
