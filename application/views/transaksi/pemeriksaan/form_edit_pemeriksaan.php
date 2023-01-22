<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pemeriksaan/edit_pemeriksaan'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pemeriksaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="inputNoRmEdit" class="text-dark">NO RM</label>
                    <input readonly required name="no_rm" type="text" class="form-control" id="inputNoRmEdit" placeholder="NO RM" minlength="6" maxlength="6">
                </div>
                <div class="form-group">
                    <label for="inputPendaftaranEdit">Data Pendaftaran Pasien</label>
                    <input disabled required type="text" class="form-control" id="inputPendaftaranEdit">
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputKeteranganEdit" class="text-dark">Keterangan Pemeriksaan</label>
                    <textarea required name="keterangan" class="form-control" id="inputKeteranganEdit" placeholder="Keterangan" rows="5">
                    </textarea>
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
    function showEditModal(no_rm, nama_pasien, nik, nama_poli, nama_dokter, keterangan) {
        document.getElementById("inputNoRmEdit").value = no_rm;
        document.getElementById("inputKeteranganEdit").innerHTML = keterangan.replace(/<br\s?\/?>/g, "\n");;
        document.getElementById("inputPendaftaranEdit").value = nama_pasien + ' - ' + nik + ' - ' + nama_poli + ' - ' + nama_dokter;
    }
</script>