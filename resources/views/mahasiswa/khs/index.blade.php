<h4>Ambil KRS</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Semester</th>
            <th>Jumlah Mahasiswa</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas as $k)
        <tr>
            <td>{{ $k->nama_kelas }}</td>
            <td>{{ $k->mataKuliah->nama_mk }}</td>
            <td>{{ $k->dosen->name }}</td>
            <td>{{ $k->semester }}</td>
            <td>{{ $k->jumlah_mahasiswa }}</td>
            <td>
                <form action="{{ route('mahasiswa.krs.store',$k->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm">Ambil</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
