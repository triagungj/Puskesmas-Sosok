<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('user/edit_user'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="idUserEdit" class="text-dark">Edit User dengan username <b><span id="usernameEdit"></b></span></label>
                    <input hidden required name="id_user" type="text" class="form-control" id="idUserEdit" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputUsername" class="text-dark">Username</label>
                    <input required name="username" type="text" class="form-control" id="inputUsernameEdit" placeholder="Username" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputPassword" class="text-dark">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPasswordEdit" placeholder="Password" />
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputNama" class="text-dark">Nama</label>
                    <input required name="nama" type="nama" class="form-control" id="inputNamaEdit" placeholder="Nama" />
                </div>
                <div class="form-group">
                    <label for="selectJabatan">Jabatan</label>
                    <select required name="jabatan" class="form-control" id="selectJabatanEdit">
                        <option value="" hidden>-</option>
                        <option value="kepala_puskesmas">Kepala Puskesmas</option>
                        <option value="admin">Admin</option>
                        <option value="dokter" hidden>Dokter</option>
                    </select>
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
    function showEditModal(id_user, username, password, nama, jabatan) {
        document.getElementById("idUserEdit").value = id_user;
        document.getElementById("inputUsernameEdit").value = username;
        document.getElementById("usernameEdit").innerHTML = username;
        document.getElementById("inputNamaEdit").value = nama;
        document.getElementById("selectJabatanEdit").value = jabatan;
    }
</script>