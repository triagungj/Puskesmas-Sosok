<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('user/hapus_user'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus User </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-input form-group">
                    <label for="idUser" class="text-dark">Hapus User dengan username <b><span id="usernameDelete"></b></span>?</label>
                    <input hidden required name="id_user" type="text" class="form-control" id="idUserDelete" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showDeleteModal(id_user, username) {
        document.getElementById("idUserDelete").value = id_user;
        document.getElementById("usernameDelete").innerHTML = username;
    }
</script>