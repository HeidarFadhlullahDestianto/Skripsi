<header>
    <div class="container-fluid bg-secondary-subtle py-2 px-2
                d-flex justify-content-between align-items-center">

        {{-- ================= LOGO ================= --}}
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('images/ic3.png') }}"
                 alt="Logo SuperFit"
                 style="height: 40px;">
            <span class="fs-4 fw-bold text-dark">
                SuperFit
            </span>
        </div>

        {{-- ============== AUTH BUTTON ============== --}}
        <div class="d-flex align-items-center gap-2">

            {{-- ========== GUEST (BELUM LOGIN) ========== --}}
            @guest
                <a href="{{ route('register') }}"
                   class="btn btn-light text-primary fw-bold px-3 py-1 rounded">
                    Register
                </a>

                <button type="button"
                        class="btn btn-light text-primary fw-bold px-3 py-1 rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                    Login
                </button>
            @endguest

            {{-- ========== AUTH (SUDAH LOGIN) ========== --}}
            @auth
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit"
                            class="btn btn-danger fw-bold px-3 py-1 rounded">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </div>
</header>
