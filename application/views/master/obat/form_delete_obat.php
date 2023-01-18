<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('obat/hapus_obat'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Obat </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="idObatDelete" class="text-dark">Hapus obat <b><span id="namaObatDelete"></b></span>?</label>
                    <input hidden required name="id_obat" type="text" class="form-control" id="idObatDelete" />
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
    function showDeleteModal(id_obat, nama_obat) {
        document.getElementById("idObatDelete").value = id_obat;
        document.getElementById("namaObatDelete").innerHTML = nama_obat;
    }
</script>