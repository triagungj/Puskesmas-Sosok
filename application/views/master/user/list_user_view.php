<div class="container-fluid">
  <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_user"><i class="fas fa-plus fa-sm"></i>Tambah User</button>
  <div class="table-custom-wrapper">
    <?php if ($user != null) { ?>
      <table class="table table-bordered table-custom">
        <tr>
          <th>NO</th>
          <th>USERNAME</th>
          <th>NAMA</th>
          <th>PASSWORD</th>
          <th>JABATAN</th>
          <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no = $offset_index + 1;
        foreach ($user as $user) : ?>
          <tr>
            <th><?= $no++ ?></th>
            <td><?= $user->username ?></td>
            <td><?= $user->nama ?></td>
            <td>
              <div class="d-flex justify-content-between align-middle">
                <div>
                  <span id="passShow<?= $no; ?>" class="d-none"><?= $user->password ?></span>
                  <span id="passHide<?= $no; ?>">********</span>
                </div>

                <button id="btnShowPass<?= $no; ?>" onclick="showUserPassword(<?= $no; ?>)" class="btn p-0 m-0 text-small">
                  <i class="fa fa-eye-slash"></i>
                </button>
                <button id="btnHidePass<?= $no; ?>" onclick="hideUserPassword(<?= $no; ?>)" class="btn p-0 m-0 text-small d-none">
                  <i class="fa fa-eye"></i>
                </button>
              </div>
            </td>
            <td><?= str_replace("_", " ", ucwords($user->jabatan, "_")) ?></td>

            <td class="text-center">
              <button onclick="showEditModal('<?= $user->id_user ?>', '<?= $user->username; ?>', '<?= $user->password; ?>', '<?= $user->nama; ?>','<?= $user->jabatan; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_user">
                <i class="fas fa-edit"></i></button>
            </td>

            <td class="text-center">
              <?php if ($this->session->id_user != $user->id_user) { ?>
                <button onclick="showDeleteModal('<?= $user->id_user ?>', '<?= $user->username; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_user">
                  <i class="fas fa-trash"></i>
                </button>
              <?php } ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php } else {
      $this->load->view('templates/empty_state');
    } ?>
  </div>

  <hr>

  <div class="d-flex justify-content-center mt-4">
    <nav>
      <ul class="pagination">
        <?php if ($total_page != 1) {
          for ($i = 1; $i <= $total_page; $i++) { ?>
            <li class="page-item <?= $i == $page_index ? 'active' : ''; ?>">
              <a class="page-link" href="<?= base_url('user?page=' . $i); ?>"><?= $i; ?></a>
            </li>
        <?php }
        } ?>
      </ul>

    </nav>
  </div>
  <div style="height: 50px;"></div>

</div>

<div class="modal fade" id="tambah_user" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/user/form_tambah_user');
  ?>
</div>
<div class="modal fade" id="edit_user" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/user/form_edit_user');
  ?>
</div>
<div class="modal fade" id="hapus_user" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/user/form_delete_user');
  ?>
</div>

<script>
  function showUserPassword(index) {
    document.getElementById("btnShowPass" + index).classList.add("d-none");
    document.getElementById("btnHidePass" + index).classList.remove("d-none");

    document.getElementById("passShow" + index).classList.remove("d-none");
    document.getElementById("passHide" + index).classList.add("d-none");
  }

  function hideUserPassword(index) {
    document.getElementById("btnShowPass" + index).classList.remove("d-none");
    document.getElementById("btnHidePass" + index).classList.add("d-none");

    document.getElementById("passShow" + index).classList.add("d-none");
    document.getElementById("passHide" + index).classList.remove("d-none");
  }
</script>