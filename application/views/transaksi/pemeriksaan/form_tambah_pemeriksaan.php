<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pemeriksaan/tambah_pemeriksaan'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemeriksaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="inputNoRm" class="text-dark">NO RM</label>
                    <input required name="no_rm" type="text" class="form-control" id="inputNoRm" placeholder="NO RM" minlength="6" maxlength="6">
                </div>
                <div class="form-group">
                    <label for="selectIdPendaftaran">Data Pendaftaran Pasien</label>
                    <select required name="id_pendaftaran" class="form-control" id="selectIdPendaftaran">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_pendaftaran as $pendaftaran) : ?>
                            <option value="<?= $pendaftaran->id_pendaftaran; ?>"><?= $pendaftaran->nama_pasien; ?> - <?= $pendaftaran->nik; ?> - <?= $pendaftaran->nama_poli; ?> - <?= $pendaftaran->nama_dokter; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputKeterangan" class="text-dark">Keterangan Pemeriksaan</label>
                    <textarea required name="keterangan" class="form-control" id="inputKeterangan" placeholder="Keterangan"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>