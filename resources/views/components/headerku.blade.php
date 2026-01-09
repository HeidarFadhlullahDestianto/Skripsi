<header class="main-header">
    <div class="container-fluid d-flex justify-content-between align-items-center px-3">

        <!-- LOGO -->
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('images/ic3.png') }}" alt="Logo" class="logo-img">
            <span class="logo-text">SuperFit</span>
        </div>

        <!-- AUTH -->
        <div class="d-flex align-items-center gap-2">
            @guest
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm fw-bold">
                    Register
                </a>

                <button class="btn btn-primary btn-sm fw-bold"
                        data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                    Login
                </button>
            @endguest

            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm fw-bold">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</header>
