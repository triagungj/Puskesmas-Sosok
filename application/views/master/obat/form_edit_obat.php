<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('obat/edit_obat'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Obat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_obat" type="text" class="form-control" id="idObatEdit" />
                <div class="mb-3 text-input form-group">
                    <label for="inputNamaObatEdit" class="text-dark">Nama Obat</label>
                    <input required name="nama_obat" type="text" class="form-control" id="inputNamaObatEdit" placeholder="Nama Obat" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputJenisObatEdit" class="text-dark">Jenis Obat</label>
                    <input required name="jenis_obat" type="text" class="form-control" id="inputJenisObatEdit" placeholder="Jenis Obat" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputStokEdit" class="text-dark">Stok Obat</label>
                    <input required name="stok" type="number" class="form-control" id="inputStokEdit" placeholder="Stok Obat" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputSatuanEdit" class="text-dark">Satuan</label>
                    <input required name="satuan" type="text" class="form-control" id="inputSatuanEdit" placeholder="Satuan" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputHargaEdit" class="text-dark">Harga (Rupiah)</label>
                    <input required name="harga" type="number" class="form-control" id="inputHargaEdit" placeholder="Harga Obat" />
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
    function showEditModal(id_obat, nama_obat, jenis_obat, stok, satuan, harga) {
        document.getElementById("idObatEdit").value = id_obat;
        document.getElementById("inputNamaObatEdit").value = nama_obat;
        document.getElementById("inputJenisObatEdit").value = jenis_obat;
        document.getElementById("inputStokEdit").value = stok;
        document.getElementById("inputSatuanEdit").value = satuan;
        document.getElementById("inputHargaEdit").value = harga;
    }
</script>