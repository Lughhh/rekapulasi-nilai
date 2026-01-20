<div class="sidebar-mahasiswa">
    <div class="profile text-center">
        <i class="bi bi-mortarboard-fill icon-top"></i>
        <h6 class="mt-2 mb-0">{{ auth()->user()->name }}</h6>
        <small>NIM : {{ auth()->user()->nim_nik }}</small>
    </div>

    <hr>

    <ul class="menu">
        <li class="{{ request()->is('mahasiswa/dashboard') ? 'active' : '' }}">
            <a href="{{ route('mahasiswa.dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        <li class="{{ request()->is('mahasiswa/ambil-krs') ? 'active' : '' }}">
            <a href="{{ route('mahasiswa.krs') }}">
                <i class="bi bi-jurnal-check"></i> Ambil KRS
            </a>
        </li>

        <li class="{{ request()->is('mahasiswa/daftar-nilai') ? 'active' : '' }}">
            <a href="{{ route('mahasiswa.nilai') }}">
                <i class="bi bi-clipboard-data"></i> Daftar Nilai
            </a>
        </li>

        <li class="{{ request()->is('mahasiswa.nilai.cetak') ? 'active' : '' }}">
            <a href="{{ route('mahasiswa.nilai.cetak') }}" target="_blank">
                <i class="bi bi-printer"></i> Cetak Nilai
             </a>
        </li>
    </ul>
</div>
