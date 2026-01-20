<h4>Input Nilai - {{ $kelas->nama_kelas }}</h4>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tugas</th>
            <th>Kuis</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas->mahasiswa as $mhs)
        <tr>
            <form action="{{ route('dosen.nilai.store') }}" method="POST">
                @csrf
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mhs->nim_nik }}</td>
                <td>{{ $mhs->name }}</td>

                <input type="hidden" name="mahasiswa_id" value="{{ $mhs->id }}">
                <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

                <td><input type="number" name="nilai_tugas" class="form-control" required></td>
                <td><input type="number" name="nilai_kuis"  class="form-control" required></td>
                <td><input type="number" name="nilai_uts"   class="form-control" required></td>
                <td><input type="number" name="nilai_uas"   class="form-control" required></td>

                <td>
                    <button class="btn btn-success btn-sm">
                        💾 Simpan
                    </button>
                </td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
