<!DOCTYPE html>
<html>
<head>
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style> 
    .sidebar-mahasiswa,
.sidebar-dosen {
    width: 250px;
    min-height: 100vh;
    background: #9b6bb3;
    color: #fff;
    padding: 20px 15px;
}

.profile .icon-top {
    font-size: 42px;
}

.profile h6 {
    font-weight: 600;
}

.profile small {
    font-size: 12px;
    opacity: 0.9;
}

.menu {
    list-style: none;
    padding: 0;
    margin-top: 20px;
}

.menu li {
    margin-bottom: 8px;
}

.menu a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #fff;
    text-decoration: none;
    padding: 10px 12px;
    border-radius: 8px;
    transition: 0.2s;
}

.menu a:hover {
    background: rgba(255,255,255,0.15);
}

.menu li.active a {
    background: rgba(255,255,255,0.25);
    font-weight: 600;
}

    </style>

</head>
<body>

<div class="d-flex">
    @include('layouts.sidebar-mahasiswa-v2')
    <div class="flex-grow-1">
        @include('layouts.topbar-mahasiswa')

        <div class="p-4">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
