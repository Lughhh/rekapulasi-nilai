<div class="sidebar-dosen">
    <div class="profile text-center">
        <i class="bi bi-mortarboard-fill icon-top"></i>
        <h6 class="mt-2 mb-0">{{ auth()->user()->name }}</h6>
        <small>NIK : {{ auth()->user()->nim_nik }}</small>
    </div>

    <hr>

    <ul class="menu">
        <li class="{{ request()->is('dosen/dashboard') ? 'active' : '' }}">
            <a href="{{ route('dosen.dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        <li class="{{ request()->is('dosen/nilai*') ? 'active' : '' }}">
            <a href="{{ route('dosen.kelas') }}">
                <i class="bi bi-pencil-square"></i> Input / Rekap Nilai
            </a>
        </li>

        <li class="{{ request()->is('dosen/cetak-nilai*') ? 'active' : '' }}">
            <a href="{{ route('dosen.cetak-nilai') }}">
                <i class="bi bi-printer"></i> Cetak Nilai
            </a>
        </li>
    </ul>
</div>
