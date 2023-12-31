<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Asrama Politani</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets3/img/favicon.png" rel="icon">
    <link href="assets3/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets3/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets3/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets3/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets3/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets3/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets3/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets3/css/main.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('img/Politeknik_Pertanian_Negeri_Samarinda.webp') }}" alt="">
                <h1>Politani Negeri Samarinda<span></span></h1>
            </a>


        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">SELAMAT DATANG DI ASRAMA </h2>
                        <p data-aos="fade-down">POLITENIK PERTANIAN NEGERI SAMARINDA</p>
                        <a data-aos="fade-up" data-aos-delay="200" href="/login" class="btn btn-success btn-lg">Sign
                            in</a>
                        <a data-aos="fade-up" data-aos-delay="200" href="{{ url('/galeri') }}"
                            class="btn btn-primary btn-lg">Galeri</a>


                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active" style="background-image: url({{ asset('img/asrama.jpeg') }})"></div>

            {{-- <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a> --}}

        </div>

    </section><!-- End Hero Section -->


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets3/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets3/vendor/aos/aos.js"></script>
    <script src="assets3/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets3/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets3/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets3/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets3/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets3/js/main.js"></script>

</body>

</html>
