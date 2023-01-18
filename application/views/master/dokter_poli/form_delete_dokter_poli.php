<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('dokter_poli/hapus_dokter_poli'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus User </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="idUser" class="text-dark">Hapus Dokter <b><span id="namaDokterDelete"></span></b> pada poli <b><span id="namaPoliDelete"></span></b>?</label>
                    <input hidden required name="id_dokter_poli" type="text" class="form-control" id="idDokterPoliDelete" />
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
    function showDeleteModal(id_dokter_poli, nama_poli, nama_dokter) {
        document.getElementById("idDokterPoliDelete").value = id_dokter_poli;
        document.getElementById("namaDokterDelete").innerHTML = nama_dokter;
        document.getElementById("namaPoliDelete").innerHTML = nama_poli;
    }
</script>