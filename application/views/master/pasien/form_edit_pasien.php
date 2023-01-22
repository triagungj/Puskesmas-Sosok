<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pasien/edit_pasien'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pasien </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="inputIdPasienEdit" class="text-dark">Edit Pasien dengan nama <b><span id="namaPasienEdit"></b></span></label>
                    <input hidden required name="id_pasien" type="text" class="form-control" id="inputIdPasienEdit" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNamaPasienEdit" class="text-dark">Nama Pasien</label>
                    <input required name="nama_pasien" type="text" class="form-control" id="inputNamaPasienEdit" placeholder="Nama Pasien" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNikEdit" class="text-dark">NIK Pasien</label>
                    <input required name="nik" type="text" class="form-control" id="inputNikEdit" placeholder="NIK Pasien" minlength="16" maxlength="16" />
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
                    <label for="inputTglLahirEdit" class="text-dark">Tanggal Lahir</label>
                    <input required name="tgl_lahir" type="date" class="form-control" id="inputTglLahirEdit" placeholder="Tanggal Lahir" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputAlamatEdit" class="text-dark">Alamat</label>
                    <input required name="alamat" type="text" class="form-control" id="inputAlamatEdit" placeholder="Alamat Pasien" />
                </div>

                <div class="form-group">
                    <label for="selectAgamaEdit">Agama</label>
                    <select required name="agama" class="form-control" id="selectAgamaEdit">
                        <option value="" hidden>-</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNoHpEdit" class="text-dark">Alamat</label>
                    <input required name="no_hp" type="text" class="form-control" id="inputNoHpEdit" placeholder="No HP Pasien" />
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
    function showEditModal(id_pasien, nama_pasien, nik, jenis_kelamin, tgl_lahir, alamat, agama, no_hp) {
        document.getElementById("inputIdPasienEdit").value = id_pasien;
        document.getElementById("inputNamaPasienEdit").value = nama_pasien;
        document.getElementById("inputNikEdit").value = nik;
        document.getElementById("selectJenisKelaminEdit").value = jenis_kelamin;
        document.getElementById("inputTglLahirEdit").value = tgl_lahir;
        document.getElementById("inputAlamatEdit").value = alamat;
        document.getElementById("selectAgamaEdit").value = agama;
        document.getElementById("inputNoHpEdit").value = no_hp;
    }
</script>