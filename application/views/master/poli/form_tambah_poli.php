<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('poli/tambah_poli'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Poli Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="inputPoliName" class="text-dark">Nama Poli</label>
                    <input required name="nama_poli" type="text" class="form-control" id="inputPoliName" placeholder="Nama Poli" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>