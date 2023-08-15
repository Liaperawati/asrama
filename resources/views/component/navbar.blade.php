@php
    $id_user = Auth::user()->id;
    $data_user = DB::table('data_users')
        ->where('user_id', $id_user)
        ->first();
@endphp
<nav class="navbar navbar-expand bg-success navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <img src="{{ asset('img/Politeknik_Pertanian_Negeri_Samarinda.webp') }}" alt="logo" width="50"
            height="50">
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0" style="color: green">
        <i class="fa fa-bars"></i>
    </a>

    <div class="navbar-nav align-items-center ms-auto ">

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: white">
                @if ($data_user == null)
                    <img src="{{ asset('img/Politeknik_Pertanian_Negeri_Samarinda.webp') }}" alt="user" width="50" height="50"
                        class="rounded-circle border border-2 border-white">
                @else
                    <img class="rounded-circle me-lg-2" src="{{ asset('img/foto_wajah') }}/{{ $data_user->foto_wajah }}"
                        alt="" style="width: 40px; height: 40px;">
                @endif
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->nama }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ url('my-profile') }}/{{ Auth::user()->id }}" class="dropdown-item">My Profile</a>
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out"></i>
                        Log Out</button>
                </form>


            </div>
        </div>
    </div>
</nav>
