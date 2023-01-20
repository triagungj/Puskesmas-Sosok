<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pendaftaran/hapus_pendaftaran'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Pendaftaran </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_pendaftaran" type="text" class="form-control" id="idPendaftaranDelete" />
                <div class="mb-3 text-input form-group">
                    <label for="idUser" class="text-dark">Hapus Pendaftaran Pasien dengan nama
                        <b><span id="namaPasienDelete"></span></b>
                        yang mendaftar poli
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
    function showDeleteModal(id_pendaftaran, nama_pasien, nama_poli, nama_dokter) {
        document.getElementById("idPendaftaranDelete").value = id_pendaftaran;
        document.getElementById("namaPasienDelete").innerHTML = nama_pasien;
        document.getElementById("namaPoliDelete").innerHTML = nama_poli;
        document.getElementById("namaDokterDelete").innerHTML = nama_dokter;
    }
</script>