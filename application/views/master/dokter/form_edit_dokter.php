<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('dokter/edit_dokter'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="idUserEdit" class="text-dark">Edit Dokter dengan nama <b><span id="namaEdit"></b></span></label>
                    <input hidden required name="id_dokter" type="text" class="form-control" id="idDokterEdit" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNama" class="text-dark">Nama Dokter</label>
                    <input required name="nama" type="text" class="form-control" id="inputNamaEdit" placeholder="Nama Dokter" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputTglLahir" class="text-dark">Tanggal Lahir</label>
                    <input required name="tgl_lahir" type="date" class="form-control" id="inputTglLahirEdit" placeholder="Tanggal Lahir" />
                </div>
                <div class="form-group">
                    <label for="selectJenisKelaminEdit">Jenis Kelamin</label>
                    <select required name="jenis_kelamin" class="form-control" id="selectJenisKelaminEdit">
                        <option value="" hidden>-</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputSpesialisasi" class="text-dark">Spesialisasi</label>
                    <input required name="spesialisasi" type="text" class="form-control" id="inputSpesialisasiEdit" placeholder="Spesialisasi" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showEditModal(id_dokter, nama_dokter, tgl_lahir, jk, spesialisasi) {
        document.getElementById("idDokterEdit").value = id_dokter;
        document.getElementById("inputNamaEdit").value = nama_dokter;
        document.getElementById("namaEdit").innerHTML = nama_dokter;
        document.getElementById("inputTglLahirEdit").value = tgl_lahir;
        document.getElementById("selectJenisKelaminEdit").value = jk;
        document.getElementById("inputSpesialisasiEdit").value = spesialisasi;
    }
</script>