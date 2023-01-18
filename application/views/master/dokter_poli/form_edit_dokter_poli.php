<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('dokter_poli/edit_dokter_poli'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Dokter Poli</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_dokter_poli" type="text" class="form-control" id="idDokterPoliEdit" />
                <div class="mb-3 form-group">
                    <label for="selectIdPoliEdit">Poli</label>
                    <select required name="id_poli" class="form-control" id="selectIdPoliEdit">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_poli as $poli) : ?>
                            <option value="<?= $poli->id_poli; ?>"><?= $poli->nama_poli; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 form-group">
                    <label for="selectIdDokterEdit">Dokter</label>
                    <select required name="id_dokter" class="form-control" id="selectIdDokterEdit">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_dokter as $dokter) : ?>
                            <option value="<?= $dokter->id_dokter; ?>"><?= $dokter->nama_dokter; ?> - <?= $dokter->spesialisasi; ?></option>
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
    function showEditModal(id_dokter_poli, id_poli, id_dokter) {
        document.getElementById("idDokterPoliEdit").value = id_dokter_poli;
        document.getElementById("selectIdPoliEdit").value = id_poli;
        document.getElementById("selectIdDokterEdit").value = id_dokter;
    }
</script>