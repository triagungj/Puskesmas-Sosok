<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" 
    data-target="#tambah_user"><i class="fas fa-plus fa-sm"></i>Tambah User</button>

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>ID USER</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>JABATAN</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($user as $user) : ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $user->id_user ?></td>
            <td><?php echo $user->username ?></td>
            <td><?php echo $user->password ?></td>
            <td><?php echo $user->jabatan ?></td>
            <td><div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></td>
            <td><div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></td>
        </tr>

    <?php endforeach; ?>

    </table>

</div>


<!-- Modal -->
<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hallo Selamat Datang
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>