<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('tindakan/hapus_tindakan'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Tindakan </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_tindakan" type="text" class="form-control" id="inputIdTindakanDelete" />
                <div class="mb-3 text-input form-group">
                    <label for="idUser" class="text-dark">Hapus Data Tindakan Pasien dengan No RM
                        <b><span id="noRmDelete"></span></b>
                        dengan pasien
                        <b><span id="namaPasienDelete"></span></b>
                        yang mendaftar
                        <b><span id="namaPoliDelete"></span></b> - <span id="namaDokterDelete"></span>?</label>
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
    function showDeleteModal(id_tindakan, no_rm, nama_pasien, nama_poli, nama_dokter) {
        document.getElementById("inputIdTindakanDelete").value = id_tindakan;
        document.getElementById("noRmDelete").innerHTML = no_rm;
        document.getElementById("namaPasienDelete").innerHTML = nama_pasien;
        document.getElementById("namaPoliDelete").innerHTML = nama_poli;
        document.getElementById("namaDokterDelete").innerHTML = nama_dokter;
    }
</script>