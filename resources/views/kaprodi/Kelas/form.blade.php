<div class="mb-2">
    <label>Nama Kelas</label>
    <input name="nama_kelas" class="form-control"
           value="{{ $k->nama_kelas ?? '' }}">
</div>

<div class="mb-2">
    <label>Mata Kuliah</label>
    <select name="mata_kuliah_id" class="form-control">
        @foreach($mataKuliah as $mk)
            <option value="{{ $mk->id }}"
                @selected(($k->mata_kuliah_id ?? '')==$mk->id)>
                {{ $mk->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-2">
    <label>Dosen</label>
    <select name="dosen_id" class="form-control">
        @foreach($dosen as $d)
            <option value="{{ $d->id }}"
                @selected(($k->dosen_id ?? '')==$d->id)>
                {{ $d->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-2">
    <label>Semester</label>
    <input type="number" name="semester" class="form-control"
           value="{{ $k->semester ?? '' }}">
</div>
