<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pasien/hapus_pasien'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Pasien </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="idPasienDelete" class="text-dark">Hapus Pasien dengan nama <b><span id="namaPasienDelete"></span></b>?</label>
                    <input hidden required name="id_pasien" type="text" class="form-control" id="idPasienDelete" />
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
    function showDeleteModal(id_pasien, nama_pasien) {
        document.getElementById("idPasienDelete").value = id_pasien;
        document.getElementById("namaPasienDelete").innerHTML = nama_pasien;
    }
</script>