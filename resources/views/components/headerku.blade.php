<header class="main-header">
    <div class="container-fluid d-flex justify-content-between align-items-center px-3">

        <!-- LOGO -->
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('images/ic3.png') }}" alt="Logo SuperFit" class="logo-img">
            <span class="logo-text">SuperFit</span>
        </div>

        <!-- AUTH -->
        <div class="d-flex align-items-center gap-2">

            {{-- ========== GUEST ========== --}}
            @guest
                <a href="{{ route('register') }}"
                   class="btn btn-outline-primary btn-sm fw-bold">
                    Register
                </a>

                <button type="button"
                        class="btn btn-primary btn-sm fw-bold"
                        data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                    Login
                </button>
            @endguest

            {{-- ========== AUTH ========== --}}
            @auth
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit"
                            class="btn btn-danger btn-sm fw-bold">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </div>
</header>
