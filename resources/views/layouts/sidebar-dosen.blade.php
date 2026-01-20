<div class="bg-white border-end vh-100 p-3" style="width:250px">
    <h5 class="fw-bold mb-4">DOSEN</h5>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('dosen.dashboard') }}" class="nav-link">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('nilai.index') }}" class="nav-link">
                <i class="bi bi-pencil-square"></i> Input / Rekap Nilai
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('dosen.cetak-nilai') }}" class="nav-link">
                <i class="bi bi-printer"></i> Cetak Nilai
            </a>
        </li>
    </ul>
</div>
