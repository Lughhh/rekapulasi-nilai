<h4>Ambil KRS</h4>
<form method="POST" action="{{ route('mahasiswa.krs.store') }}">
@csrf
<select name="kelas_id" class="form-control mb-2">
@foreach($kelas as $k)
<option value="{{ $k->id }}">
{{ $k->mataKuliah->nama }} - {{ $k->nama_kelas }}
</option>
@endforeach
</select>
<button class="btn btn-primary">Ambil</button>
</form>

<h4 class="mt-4">Nilai Akhir</h4>
<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Mata Kuliah</th>
<th>Tugas</th>
<th>Kuis</th>
<th>UTS</th>
<th>UAS</th>
<th>Nilai Akhir</th>
<th>Grade</th>
</tr>
</thead>
<tbody>
@foreach($krs as $i => $k)
<tr>
<td>{{ $i+1 }}</td>
<td>{{ $k->kelas->mataKuliah->nama }}</td>
<td>{{ $k->nilai->tugas ?? '-' }}</td>
<td>{{ $k->nilai->kuis ?? '-' }}</td>
<td>{{ $k->nilai->uts ?? '-' }}</td>
<td>{{ $k->nilai->uas ?? '-' }}</td>
<td><b>{{ $k->nilai->nilai_akhir ?? '-' }}</b></td>
<td><span class="badge bg-success">{{ $k->nilai->grade ?? '-' }}</span></td>
</tr>
@endforeach
</tbody>
</table>
