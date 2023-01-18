<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('dokter_poli/tambah_dokter_poli'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter Poli Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectIdPoli">Poli</label>
                    <select required name="id_poli" class="form-control" id="selectIdPoli">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_poli as $poli) : ?>
                            <option value="<?= $poli->id_poli; ?>"><?= $poli->nama_poli; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectIdDokter">Dokter</label>
                    <select required name="id_dokter" class="form-control" id="selectIdDokter">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_dokter as $dokter) : ?>
                            <option value="<?= $dokter->id_dokter; ?>"><?= $dokter->nama_dokter; ?> - <?= $dokter->spesialisasi; ?></option>
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