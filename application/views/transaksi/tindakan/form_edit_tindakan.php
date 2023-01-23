<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pemeriksaan/edit_pemeriksaan'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tindakan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input hidden required name="id_tindakan" type="text" class="form-control" id="inputIdTindakanEdit" placeholder="NO RM" minlength="6" maxlength="6">

                    <label for="selectIdPendaftaran" class="text-dark">Data Pemeriksaan</label>
                    <input readonly required name="no_rm" type="text" class="form-control" id="inputNoRmEdit" placeholder="NO RM" minlength="6" maxlength="6">
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
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showEditModal(no_rm, nama_pasien, nik, nama_poli, nama_dokter, keterangan) {
        document.getElementById("inputNoRmEdit").value = no_rm;
        document.getElementById("inputKeteranganEdit").innerHTML = keterangan.replace(/<br\s?\/?>/g, "\n");
        document.getElementById("inputPendaftaranEdit").value = nama_pasien + ' - ' + nik + ' - ' + nama_poli + ' - ' + nama_dokter;
    }
</script>