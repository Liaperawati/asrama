@php
    $id_user = Auth::user()->id;
    $data_user = DB::table('data_users')
        ->where('user_id', $id_user)
        ->first();
@endphp
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">

        <a class="navbar-brand mx-4 mb-3" href="#">
            <h3 class="me-3">
                <img src="{{ asset('img/Politeknik_Pertanian_Negeri_Samarinda.webp') }}" alt="logo" width="50"
                    height="50"> ASRAMA
            </h3>
            <hr>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                @if ($data_user == null)
                    <img src="{{ asset('img/user.jpg') }}" alt="user" width="50" height="50"
                        class="rounded-circle border border-2 border-white">
                @else
                    <img class="rounded-circle" src="{{ asset('img/foto_wajah') }}/{{ $data_user->foto_wajah }}"
                        alt="" style="width: 40px; height: 40px;">
                @endif
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->nama }}</h6>
                <span>{{ Auth::user()->role }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">

        

            @if (Auth::user()->role == 'admin1' || Auth::user()->role == 'admin2' || Auth::user()->role == 'pengawas')
                <a href="/"
                    class="nav-item nav-link
             @if (request()->is('/') || request()->is('home')) active @endif
             ">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="{{ url('kamar') }}"
                    class="nav-item nav-link
                @if (request()->is('kamar')) active @endif
                ">
                    <i class="fa fa-bed me-2"></i>
                    Kamar
                </a>

                <a href="{{ url('data-mahasiswa') }}"
                    class="nav-item nav-link
                @if (request()->is('data-mahasiswa')) active @endif
                ">
                    <i class="fa fa-users me-2"></i>
                    Mahasiswa
                </a>
                <a href="{{ url('informasi') }}"
                    class="nav-item nav-link  @if (request()->is('informasi')) active @endif">
                    <i class="fa fa-info-circle me-2"></i>Informasi
                </a>
                <a href="{{ url('lihat-pembayaran') }}"
                    class="nav-item nav-link  @if (request()->is('lihat-pembayaran')) active @endif">
                    <i class="fa fa-dollar-sign me-2"></i>Pembayaran
                </a>
                <a href="{{ url('aduan') }}"
                    class="nav-item nav-link text-danger  @if (request()->is('aduan')) active @endif">
                    <i class="fa fa-notes-medical me-2"></i>Aduan ?
                </a>
                <a href="{{ url('data-galeri') }}"
                    class="nav-item nav-link  @if (request()->is('data-galeri')) active @endif">
                    <i class="fa fa-image me-2"></i>Galeri
                </a>
            @endif

            @if (Auth::user()->role == 'admin1')
                <a href="{{ url('datauser') }}"
                    class="nav-item nav-link  @if (request()->is('datauser')) active @endif">
                    <i class="fa fa-user me-2"></i>User
                </a>
            @endif

            @if (Auth::user()->role == 'mahasiswa')
                <a href="{{ url('halaman-mahasiswa') }}"
                    class="nav-item nav-link
             @if (request()->is('halaman-mahasiswa')) active @endif
             ">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <div class="nav-item dropdown ">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-dollar-sign me-2"></i>pembayaran</a>
                    <div
                        class="dropdown-menu bg-transparent border-0

                 @if (request()->is('tagihan') || request()->is('lunas')) show @endif
                 ">
                        <a
                            href="{{ url('tagihan') }}"class="dropdown-item
                     @if (request()->is('tagihan')) active @endif
                     ">
                            Data
                            Tagihan
                        </a>
                        <a href="{{ url('lunas') }}"
                            class="dropdown-item  @if (request()->is('lunas')) active @endif">
                            Lunas
                        </a>

                    </div>
                </div>
                <a href="{{ url('informasi') }}"
                    class="nav-item nav-link  @if (request()->is('informasi')) active @endif">
                    <i class="fa fa-info-circle me-2"></i>Informasi
                </a>
                <a href="{{ url('aduan') }}"
                    class="nav-item nav-link text-danger  @if (request()->is('aduan')) active @endif">
                    <i class="fa fa-notes-medical me-2"></i>Aduan ?
                </a>
            @endif

        </div>
    </nav>

</div>
