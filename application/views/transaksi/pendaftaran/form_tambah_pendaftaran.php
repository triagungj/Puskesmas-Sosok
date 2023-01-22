<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pendaftaran/tambah_pendaftaran'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pendaftaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectIdPasien">Pasien</label>
                    <select required name="id_pasien" class="form-control" id="selectIdPasien">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_pasien as $pasien) : ?>
                            <option value="<?= $pasien->id_pasien; ?>"><?= $pasien->nama_pasien; ?> - <?= $pasien->nik; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputKeluhan" class="text-dark">Keluhan Pasien</label>
                    <textarea required name="keluhan" type="text" class="form-control" id="inputKeluhan" placeholder="Keluhan" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="selectIdDokterPoli">Dokter Poli</label>
                    <select required name="id_dokter_poli" class="form-control" id="selectIdDokterPoli">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_dokter_poli as $dokter_poli) : ?>
                            <option value="<?= $dokter_poli->id_dokter_poli; ?>"><?= $dokter_poli->nama_poli; ?> - <?= $dokter_poli->nama_dokter; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>