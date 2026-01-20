<h3 align="center">KARTU HASIL STUDI</h3>
<p>Nama: {{ $mahasiswa->name }}</p>
<p>NIM: {{ $mahasiswa->nim }}</p>

<table width="100%" border="1" cellspacing="0">
<tr>
    <th>Mata Kuliah</th>
    <th>Nilai</th>
    <th>Grade</th>
</tr>
@foreach($nilai as $n)
<tr>
    <td>{{ $n->krs->kelas->mataKuliah->nama_mk }}</td>
    <td>{{ $n->nilai_akhir }}</td>
    <td>{{ $n->grade }}</td>
</tr>
@endforeach
</table>

<script>
    window.print();
</script>
