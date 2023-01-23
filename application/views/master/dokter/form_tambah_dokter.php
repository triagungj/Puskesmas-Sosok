<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('dokter/tambah_dokter'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="inputUsername" class="text-dark">Username</label>
                    <input required name="username" type="text" class="form-control" id="inputUsername" placeholder="Username" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputPassword" class="text-dark">Password</label>
                    <input required name="password" type="password" class="form-control" id="inputPassword" placeholder="Password" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNama" class="text-dark">Nama Dokter</label>
                    <input required name="nama" type="text" class="form-control" id="inputNama" placeholder="Nama Dokter" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputTglLahir" class="text-dark">Tanggal Lahir</label>
                    <input required name="tgl_lahir" type="date" class="form-control" id="inputTglLahir" placeholder="Tanggal Lahir" />
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
                    <label for="inputSpesialisasi" class="text-dark">Spesialisasi</label>
                    <select required name="spesialisasi" class="form-control" id="inputSpesialisasi">
                        <option value="" hidden>-</option>
                        <option value="Umum">Umum</option>
                        <option value="Gizi">Gizi</option>
                        <option value="Mata">Mata</option>
                        <option value="Gigi">Gigi</option>
                        <option value="KIA">KIA</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>