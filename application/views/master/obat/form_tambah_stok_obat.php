<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('obat/tambah_stok_obat'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stok Obat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_obat" type="text" class="form-control" id="idObatTambahStok" />
                <input hidden required name="stok" type="text" class="form-control" id="stokObatTambahStok" />
                <div class="mb-3 text-input form-group">
                    <label for="inputNamaObatTambahStok" class="text-dark">Nama Obat</label>
                    <input disabled required name="nama_obat" type="text" class="form-control" id="inputNamaObatTambahStok" placeholder="Nama Obat" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputStokTambahStok" class="text-dark">Quantitas (<span id="satuanObatTambahStok"></span>)</label>
                    <input required name="stok_input" type="number" class="form-control" id="inputStokTambahStok" placeholder="Stok Obat" value="0" min="0" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Stok</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showTambahStokModal(id_obat, nama_obat, stok, satuan) {
        document.getElementById("inputStokTambahStok").value = 0;
        document.getElementById("idObatTambahStok").value = id_obat;
        document.getElementById("inputNamaObatTambahStok").value = nama_obat;
        document.getElementById("stokObatTambahStok").value = stok;
        document.getElementById("satuanObatTambahStok").innerHTML = satuan;
    }
</script>