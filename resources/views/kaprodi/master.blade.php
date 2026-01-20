@extends('layouts.app')

@section('title', 'Data Master')
@section('page-title', 'Data Master')

@section('content')

<h2 class="text-2xl font-bold mb-6">Data Master</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <a href="#" class="card text-center hover:bg-gray-50">
        <i class="fas fa-user-graduate text-3xl text-indigo-500 mb-2"></i>
        <p class="font-semibold">Mahasiswa</p>
    </a>

    <a href="#" class="card text-center hover:bg-gray-50">
        <i class="fas fa-chalkboard-teacher text-3xl text-pink-500 mb-2"></i>
        <p class="font-semibold">Dosen</p>
    </a>

    <a href="#" class="card text-center hover:bg-gray-50">
        <i class="fas fa-book text-3xl text-teal-500 mb-2"></i>
        <p class="font-semibold">Mata Kuliah</p>
    </a>

    <a href="#" class="card text-center hover:bg-gray-50">
        <i class="fas fa-door-open text-3xl text-orange-500 mb-2"></i>
        <p class="font-semibold">Kelas</p>
    </a>
</div>

@endsection
