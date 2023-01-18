<div class="container-fluid">
  <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_dokter"><i class="fas fa-plus fa-sm"></i> Tambah Dokter</button>
  <div class="table-custom-wrapper">
    <?php if ($dokter != null) { ?>
      <table class="table table-bordered table-custom">
        <tr>
          <th>NO</th>
          <th>NAMA DOKTER</th>
          <th>USERNAME</th>
          <th>PASSWORD</th>
          <th>TANGGAL LAHIR</th>
          <th>JENIS KELAMIN</th>
          <th>SPESIALISASI</th>
          <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no = $offset_index + 1;
        foreach ($dokter as $dokter) : ?>
          <tr>
            <th><?php echo $no++ ?></th>
            <td><?php echo $dokter->nama_dokter ?></td>
            <td><?php echo $dokter->username ?></td>
            <td>
              <div class="d-flex justify-content-between align-middle">
                <div>
                  <span id="passShow<?= $no; ?>" class="d-none"><?= $dokter->password ?></span>
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
            <td><?php echo $dokter->tgl_lahir ?></td>
            <td><?php echo $dokter->jenis_kelamin ?></td>
            <td><?php echo $dokter->spesialisasi ?></td>

            <td class="text-center">
              <button onclick="showEditModal('<?= $dokter->username; ?>', '<?= $dokter->id_dokter ?>', '<?= $dokter->id_user; ?>', '<?= $dokter->nama_dokter; ?>', '<?= $dokter->tgl_lahir; ?>', '<?= $dokter->jenis_kelamin; ?>', '<?= $dokter->spesialisasi; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_dokter">
                <i class="fas fa-edit"></i></button>
            </td>
            <td class="text-center">
              <button onclick="showDeleteModal('<?= $dokter->id_user ?>', '<?= $dokter->nama_dokter; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_user">
                <i class="fas fa-trash"></i></button>
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
              <a class="page-link" href="<?= base_url('dokter?page=' . $i); ?>"><?= $i; ?></a>
            </li>
        <?php }
        } ?>
      </ul>

    </nav>
  </div>
  <div style="height: 50px;"></div>

</div>

<div class="modal fade" id="tambah_dokter" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/dokter/form_tambah_dokter');
  ?>
</div>
<div class="modal fade" id="edit_dokter" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/dokter/form_edit_dokter');
  ?>
</div>
<div class="modal fade" id="hapus_user" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/dokter/form_delete_dokter');
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