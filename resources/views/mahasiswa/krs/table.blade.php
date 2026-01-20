<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Mata Kuliah</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kelas as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->nama_kelas }}</td>
            <td>{{ $k->mataKuliah->nama_mk }}</td>
            <td>{{ $k->semester }}</td>
            <td>
                <form method="POST" action="{{ route('mahasiswa.krs.store', $k->id) }}">
                    @csrf
                    <button class="btn btn-sm btn-primary">Ambil</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Tidak ada kelas tersedia</td>
        </tr>
        @endforelse
    </tbody>
</table>
