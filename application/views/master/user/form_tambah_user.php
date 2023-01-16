<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('user/tambah_user'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
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
                    <label for="inputNama" class="text-dark">Nama</label>
                    <input required name="nama" type="nama" class="form-control" id="inputNama" placeholder="Nama" />
                </div>
                <div class="form-group">
                    <label for="selectJabatan">Jabatan</label>
                    <select required name="jabatan" class="form-control" id="selectJabatan">
                        <option value="" hidden>-</option>
                        <option value="Kepala_puskesmas">Kepala Puskesmas</option>
                        <option value="Admin">Admin</option>
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