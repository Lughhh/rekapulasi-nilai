<form method="POST" action="{{ route('dosen.nilai.simpan') }}">
@csrf

<table class="table table-bordered">
<thead>
<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Tugas</th>
    <th>Kuis</th>
    <th>UTS</th>
    <th>UAS</th>
</tr>
</thead>

<tbody>
@foreach($krs as $i => $k)
<tr>
    <td>{{ $i+1 }}</td>
    <td>{{ $k->mahasiswa->nim_nik }}</td>
    <td>{{ $k->mahasiswa->name }}</td>

    <input type="hidden" name="krs_id[]" value="{{ $k->id }}">

    <td><input name="tugas[]" class="form-control" required></td>
    <td><input name="kuis[]" class="form-control" required></td>
    <td><input name="uts[]" class="form-control" required></td>
    <td><input name="uas[]" class="form-control" required></td>
</tr>
@endforeach
</tbody>
</table>

<button class="btn btn-primary">💾 Simpan Nilai</button>
</form>
