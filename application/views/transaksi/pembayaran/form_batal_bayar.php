<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pembayaran/batalkan_pembayaran'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Batalkan Pembayaran </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_pembayaran" type="text" class="form-control" id="inputIdPembayaran" />
                <div class="mb-3 text-input form-group">
                    <label for="idUser" class="text-dark">Batalkan Pembayaran dengan No RM
                        <b><span id="noRmBatal"></span></b>
                        dengan pasien
                        <b><span id="namaPasienBatal"></span></b>
                        yang mendaftar
                        <b><span id="namaPoliBatal"></span></b> - <span id="namaDokterBatal"></span>?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Batalkan Pembayaran</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showBatalBayarModal(id_pembayaran, no_rm, nama_pasien, nama_poli, nama_dokter) {
        document.getElementById("inputIdPembayaran").value = id_pembayaran;
        document.getElementById("noRmBatal").innerHTML = no_rm;
        document.getElementById("namaPasienBatal").innerHTML = nama_pasien;
        document.getElementById("namaPoliBatal").innerHTML = nama_poli;
        document.getElementById("namaDokterBatal").innerHTML = nama_dokter;
    }
</script>