<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pendaftaran/edit_pendaftaran'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pendaftaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_pendaftaran" type="text" class="form-control" id="idPendaftaranEdit" />
                <div class="form-group">
                    <label for="selectIdPasienEdit">Pasien</label>
                    <select disabled required name="id_pasien" class="form-control" id="selectIdPasienEdit">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_pasien as $pasien) : ?>
                            <option value="<?= $pasien->id_pasien; ?>"><?= $pasien->nama_pasien; ?> - <?= $pasien->nik; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputKeluhanEdit" class="text-dark">Keluhan Pasien</label>
                    <input required name="keluhan" type="text" class="form-control" id="inputKeluhanEdit" placeholder="Keluhan" />
                </div>

                <div class="form-group">
                    <label for="selectIdDokterPoliEdit">Dokter Poli</label>
                    <select required name="id_dokter_poli" class="form-control" id="selectIdDokterPoliEdit">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_dokter_poli as $dokter_poli) : ?>
                            <option value="<?= $dokter_poli->id_dokter_poli; ?>"><?= $dokter_poli->nama_poli; ?> - <?= $dokter_poli->nama_dokter; ?></option>
                        <?php endforeach; ?>
                    </select>
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
    function showEditModal(id_pendaftaran, id_pasien, keluhan, id_dokter_poli) {
        document.getElementById("idPendaftaranEdit").value = id_pendaftaran;
        document.getElementById("selectIdPasienEdit").value = id_pasien;
        document.getElementById("inputKeluhanEdit").value = keluhan;
        document.getElementById("selectIdDokterPoliEdit").value = id_dokter_poli;
    }
</script>