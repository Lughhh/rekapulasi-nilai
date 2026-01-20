<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIAKAD')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background:#f4f6f9; }

        .sidebar {
            width:260px;
            min-height:100vh;
            background:#9b6bb3;
            color:#fff;
        }

        .sidebar a {
            color:#fff;
            padding:12px 20px;
            display:flex;
            align-items:center;
            gap:10px;
            text-decoration:none;
            border-radius:6px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background:rgba(255,255,255,.2);
        }

        .topbar {
            background:#fff;
            border-bottom:1px solid #ddd;
            padding:12px 24px;
        }

        .avatar {
            width:36px;
            height:36px;
            border-radius:50%;
            background:#adb5bd;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:bold;
            color:#fff;
        }
    </style>
</head>
<body>

<div class="d-flex">

    {{-- SIDEBAR --}}
    @include('layouts.sidebar-kaprodi')

    {{-- MAIN --}}
    <div class="flex-grow-1">

        {{-- TOPBAR --}}
        <div class="topbar d-flex justify-content-between align-items-center">
            <h6 class="mb-0">@yield('header', 'Sistem Informasi Akademik')</h6>

            <div class="d-flex align-items-center gap-3">
                <div class="text-end">
                    <div class="fw-bold">{{ auth()->user()->name }}</div>
                    <small class="text-muted">NIK :{{ auth()->user()->nim_nik }}</small>
                </div>

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm">
                        <i class="bi bi-box-arrow-right"></i>
                        
                    </button>
                </form>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="p-4">
            @yield('content')
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
