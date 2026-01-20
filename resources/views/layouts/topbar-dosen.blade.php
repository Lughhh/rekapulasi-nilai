<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <div class="d-flex align-items-center gap-3">
        <i class="bi bi-list fs-4"></i>
        <span class="fw-semibold fs-5">
            @yield('title')
        </span>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger btn-sm">
            <i class="bi bi-box-arrow-right"></i>
        </button>
    </form>
</nav>
