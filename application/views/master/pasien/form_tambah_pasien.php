<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pasien/tambah_pasien'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="inputNamaPasien" class="text-dark">Nama Pasien</label>
                    <input required name="nama_pasien" type="text" class="form-control" id="inputNamaPasien" placeholder="Nama Pasien" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNik" class="text-dark">NIK Pasien</label>
                    <input required name="nik" type="text" class="form-control" id="inputNik" placeholder="NIK Pasien" />
                </div>
                <div class="form-group">
                    <label for="selectJenisKelamin">Jenis Kelamin</label>
                    <select required name="jenis_kelamin" class="form-control" id="selectJenisKelamin">
                        <option value="" hidden>-</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputTglLahir" class="text-dark">Tanggal Lahir</label>
                    <input required name="tgl_lahir" type="date" class="form-control" id="inputTglLahir" placeholder="Tanggal Lahir" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputAlamat" class="text-dark">Alamat</label>
                    <input required name="alamat" type="text" class="form-control" id="inputAlamat" placeholder="Alamat Pasien" />
                </div>

                <div class="form-group">
                    <label for="selectAgama">Agama</label>
                    <select required name="agama" class="form-control" id="selectAgama">
                        <option value="" hidden>-</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNoHp" class="text-dark">Alamat</label>
                    <input required name="no_hp" type="text" class="form-control" id="inputNoHp" placeholder="No HP Pasien" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>