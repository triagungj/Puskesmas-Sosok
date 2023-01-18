<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('poli/hapus_poli'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Poli </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="idPoliDelete" class="text-dark">Hapus <b><span id="namaPoliDelete"></b></span>?</label>
                    <input hidden required name="id_poli" type="text" class="form-control" id="idPoliDelete" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showDeleteModal(id_poli, nama_poli) {
        document.getElementById("idPoliDelete").value = id_poli;
        document.getElementById("namaPoliDelete").innerHTML = nama_poli;
    }
</script>