<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('tindakan/tambah_tindakan'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemeriksaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectIdPendaftaran" class="text-dark">Data Pemeriksaan</label>
                    <select required name="no_rm" class="form-control" id="selectIdPendaftaran">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_pemeriksaan as $pemeriksaan) : ?>
                            <option value="<?= $pemeriksaan->no_rm; ?>"><?= $pemeriksaan->no_rm; ?> - <?= $pemeriksaan->nama_pasien; ?> - <?= $pemeriksaan->nik; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNamaTindakan" class="text-dark">Tindakan</label>
                    <input required name="nama_tindakan" class="form-control" id="inputNamaTindakan" placeholder="Nama Tindakan">
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputJumlahBiaya" class="text-dark">Biaya Tindakan (Rupiah)</label>
                    <input required name="jumlah_biaya" type="number" class="form-control" id="inputJumlahBiaya" placeholder="Biaya" min="0" />
                </div>
                <div class="form-group">
                    <label class="text-dark">Obat</label>
                    <?php foreach ($list_obat as $obat) : ?>
                        <div class="form-check d-flex align-items-center mb-2" style="min-height: 40px;">
                            <input name="id_obat[]" onclick="onChangeCheck(<?= $obat->id_obat; ?>)" value="<?= $obat->id_obat; ?>" class="form-check-input" type="checkbox" id="obatCheck<?= $obat->id_obat; ?>" <?= $obat->stok == 0 ? 'disabled' : ''; ?>>
                            <label class="form-check-label" for="obatCheck<?= $obat->id_obat; ?>">
                                <?= $obat->nama_obat; ?> (Stok: <?= $obat->stok; ?>)
                            </label>
                            <input required name="jumlah_obat[]" type="number" class="form-control ml-4 mr-2" id="inputStokObat<?= $obat->id_obat; ?>" placeholder="Jumlah Obat (<?= $obat->satuan; ?>)" min="1" max="<?= $obat->stok; ?>" style="width: 200px;" hidden disabled />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script>
    function onChangeCheck(id) {
        var isChecked = document.getElementById("obatCheck" + id).checked;
        document.getElementById("inputStokObat" + id).hidden = !isChecked;
        document.getElementById("inputStokObat" + id).disabled = !isChecked;
    }
</script>