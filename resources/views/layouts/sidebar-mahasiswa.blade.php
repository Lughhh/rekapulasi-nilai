<div class="sidebar">

    <div class="profile">
        <i class="fa-solid fa-graduation-cap"></i>
        <div class="name">Mahasiswa A</div>
        <div class="nim">NIK : MHS001</div>
    </div>

    <hr>

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="{{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}">
        <i class="fa-solid fa-gauge"></i>
        Dashboard
    </a>

    <a href="{{ route('mahasiswa.nilai') }}"
       class="{{ request()->routeIs('mahasiswa.nilai') ? 'active' : '' }}">
        <i class="fa-solid fa-list"></i>
        Daftar Nilai
    </a>

    <a href="{{ route('mahasiswa.khs') }}"
       class="{{ request()->routeIs('mahasiswa.khs') ? 'active' : '' }}">
        <i class="fa-solid fa-file-pdf"></i>
        Cetak Nilai
    </a>

</div>
