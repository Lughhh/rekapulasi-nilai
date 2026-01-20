<div class="sidebar p-3">
    <div class="text-center mb-4">
        <i class="bi bi-mortarboard fs-1"></i>

        {{-- NAMA KAPRODI --}}
        <h6 class="mt-2 mb-0 fw-bold">
            {{ auth()->user()->name }}
        </h6>

        {{-- NIK --}}
        <small>
            NIK : {{ auth()->user()->nim_nik }}
        </small>
    </div>

    <hr class="border-light">

    <a href="{{ route('kaprodi.dashboard') }}"
       class="{{ request()->routeIs('kaprodi.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="{{ route('kaprodi.data-master') }}"
       class="{{ request()->routeIs('kaprodi.data-master*') ? 'active' : '' }}">
        <i class="bi bi-database"></i> Data Master
    </a>

    <a href="{{ route('kaprodi.rekap-nilai') }}"
       class="{{ request()->routeIs('kaprodi.rekap-nilai') ? 'active' : '' }}">
        <i class="bi bi-bar-chart"></i> Rekap Nilai
    </a>

    <a href="{{ route('kaprodi.ekspor-laporan') }}"
       class="{{ request()->routeIs('kaprodi.ekspor-laporan') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-excel"></i> Ekspor Laporan
    </a>
</div>
