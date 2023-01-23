<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('tindakan/edit_tindakan'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tindakan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input hidden required name="id_tindakan" type="text" class="form-control" id="inputIdTindakanEdit">

                    <label for="selectIdPendaftaran" class="text-dark">Data Pemeriksaan</label>
                    <input disabled required type="text" class="form-control" id="inputNoRmEdit" placeholder="NO RM" minlength="6" maxlength="6">
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNamaTindakan" class="text-dark">Tindakan</label>
                    <input required name="nama_tindakan" class="form-control" id="inputNamaTindakanEdit" placeholder="Nama Tindakan">
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputJumlahBiaya" class="text-dark">Biaya Tindakan (Rupiah)</label>
                    <input required name="jumlah_biaya" type="number" class="form-control" id="inputJumlahBiayaEdit" placeholder="Biaya" min="0" />
                </div>
                <div class="form-group">
                    <label class="text-dark">Obat</label>
                    <?php foreach ($list_obat as $obat) : ?>
                        <div class="form-check d-flex align-items-center mb-2" style="min-height: 40px;">
                            <input name="id_obat[]" onclick="onChangeCheckEdit(<?= $obat->id_obat; ?>)" value="<?= $obat->id_obat; ?>" class="form-check-input" type="checkbox" id="obatCheckEdit<?= $obat->id_obat; ?>">
                            <label class="form-check-label" for="obatCheckEdit<?= $obat->id_obat; ?>">
                                <?= $obat->nama_obat; ?> (Stok: <?= $obat->stok; ?>)
                            </label>
                            <input required name="jumlah_obat[]" type="number" class="form-control ml-4 mr-2" id="inputStokObatEdit<?= $obat->id_obat; ?>" placeholder="Jumlah Obat (<?= $obat->satuan; ?>)" min="1" max="<?= $obat->stok; ?>" style="width: 200px;" hidden disabled />
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
    function showEditModal(id_tindakan, no_rm, nama_pasien, nama_poli, nama_dokter, nama_tindakan, jumlah_biaya, list_obat) {
        document.getElementById("inputIdTindakanEdit").value = id_tindakan;
        document.getElementById("inputNoRmEdit").value = no_rm + ' - ' + nama_pasien + ' - ' + nama_poli + ' - ' + nama_dokter;
        document.getElementById("inputNamaTindakanEdit").value = nama_tindakan;
        document.getElementById("inputJumlahBiayaEdit").value = jumlah_biaya;
        var obat_arr = list_obat.replace(/&quot/g, '"');
        var data_obat = JSON.parse(obat_arr);

        for (var i = 0; i < data_obat.length; i++) {
            var obat = data_obat[i];
            document.getElementById("obatCheckEdit" + obat.id_obat).checked = true;
            document.getElementById("inputStokObatEdit" + obat.id_obat).hidden = false;
            document.getElementById("inputStokObatEdit" + obat.id_obat).disabled = false;
            document.getElementById("inputStokObatEdit" + obat.id_obat).value = obat.jumlah_obat;
            document.getElementById("inputStokObatEdit" + obat.id_obat).max = parseInt(obat.stok) + parseInt(obat.jumlah_obat);
        }
    }

    function onChangeCheckEdit(id) {
        var isChecked = document.getElementById("obatCheckEdit" + id).checked;
        document.getElementById("inputStokObatEdit" + id).hidden = !isChecked;
        document.getElementById("inputStokObatEdit" + id).disabled = !isChecked;
    }
</script>