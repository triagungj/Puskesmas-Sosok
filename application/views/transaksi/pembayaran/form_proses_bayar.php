<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pembayaran/proses_pembayaran'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proses ke Pembayaran </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_pembayaran" type="text" class="form-control" id="inputIdPembayaranProses" />
                <div class="mb-3 text-input form-group">
                    <label for="idUser" class="text-dark">Proses ke Pembayaran dengan No RM
                        <b><span id="noRmProses"></span></b>
                        dengan pasien
                        <b><span id="namaPasienProses"></span></b>
                        yang mendaftar
                        <b><span id="namaPoliProses"></span></b> - <span id="namaDokterProses"></span>?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Proses Pembayaran</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showProsesBayarModal(id_pembayaran, no_rm, nama_pasien, nama_poli, nama_dokter) {
        document.getElementById("inputIdPembayaranProses").value = id_pembayaran;
        document.getElementById("noRmProses").innerHTML = no_rm;
        document.getElementById("namaPasienProses").innerHTML = nama_pasien;
        document.getElementById("namaPoliProses").innerHTML = nama_poli;
        document.getElementById("namaDokterProses").innerHTML = nama_dokter;
    }
</script>