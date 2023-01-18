<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('poli/edit_poli'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Poli</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="idPoliEdit" class="text-dark">Edit Poli</label>
                    <input hidden required name="id_poli" type="text" class="form-control" id="idPoliEdit" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNamaPoliEdit" class="text-dark">Nama Poli</label>
                    <input required name="nama_poli" type="text" class="form-control" id="inputNamaPoliEdit" placeholder="Nama Poli" />
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
    function showEditModal(id_poli, nama_poli) {
        document.getElementById("idPoliEdit").value = id_poli;
        document.getElementById("inputNamaPoliEdit").value = nama_poli;
    }
</script>