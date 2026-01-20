<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('kaprodi.dosen.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Dosen</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input name="name" class="form-control mb-2" placeholder="Nama" required>
                    <input name="nim_nik" class="form-control mb-2" placeholder="NIK" required>
                    <input name="bidang_keahlian" class="form-control mb-2" placeholder="Bidang Keahlian" required>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
