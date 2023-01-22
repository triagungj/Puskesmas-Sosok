<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('obat/tambah_obat'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Obat Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="inputNamaObat" class="text-dark">Nama Obat</label>
                    <input required name="nama_obat" type="text" class="form-control" id="inputNamaObat" placeholder="Nama Obat" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputJenisObat" class="text-dark">Jenis Obat</label>
                    <input required name="jenis_obat" type="text" class="form-control" id="inputJenisObat" placeholder="Jenis Obat" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputStok" class="text-dark">Stok Obat</label>
                    <input required name="stok" type="number" class="form-control" id="inputStok" placeholder="Stok Obat" min="0" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputSatuan" class="text-dark">Satuan</label>
                    <input required name="satuan" type="text" class="form-control" id="inputSatuan" placeholder="Satuan" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputHarga" class="text-dark">Harga (Rupiah)</label>
                    <input required name="harga" type="number" class="form-control" id="inputHarga" placeholder="Harga Obat" min="0" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>