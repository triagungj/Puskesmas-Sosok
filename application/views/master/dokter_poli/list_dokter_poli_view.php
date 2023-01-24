<div class="container-fluid">
  <?php if ($this->session->jabatan == 'admin') { ?>
    <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_dokter_poli"><i class="fas fa-plus fa-sm"></i> Tambah Dokter Poli</button>
  <?php } ?>
  <div class="table-custom-wrapper">
    <?php if ($dokter_poli != null) { ?>
      <table class="table table-bordered table-custom">
        <tr>
          <th>NO</th>
          <th>NAMA POLI</th>
          <th>NAMA DOKTER</th>
          <th>SPESIALISASI DOKTER</th>
          <?php if ($this->session->jabatan == 'admin') { ?>
            <th colspan="2">AKSI</th>
          <?php } ?>
        </tr>

        <?php
        $no = $offset_index + 1;
        foreach ($dokter_poli as $dokter_poli) : ?>
          <tr>
            <th><?= $no++ ?></th>
            <td><?= $dokter_poli->nama_poli ?></td>
            <td><?= $dokter_poli->nama_dokter ?></td>
            <td><?= $dokter_poli->spesialisasi ?></td>

            <?php if ($this->session->jabatan == 'admin') { ?>

              <td class="text-center">
                <button onclick="showEditModal('<?= $dokter_poli->id_dokter_poli; ?>', '<?= $dokter_poli->id_poli; ?>', '<?= $dokter_poli->id_dokter; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_dokter_poli">
                  <i class="fas fa-edit"></i></button>
              </td>
              <td class="text-center">
                <button onclick="showDeleteModal('<?= $dokter_poli->id_dokter_poli ?>', '<?= $dokter_poli->nama_poli; ?>', '<?= $dokter_poli->nama_dokter; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_dokter_poli">
                  <i class="fas fa-trash"></i></button>
              </td>
            <?php } ?>
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
              <a class="page-link" href="<?= base_url('dokter_poli?page=' . $i); ?>"><?= $i; ?></a>
            </li>
        <?php }
        } ?>
      </ul>

    </nav>
  </div>
  <div style="height: 50px;"></div>

</div>

<div class="modal fade" id="tambah_dokter_poli" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/dokter_poli/form_tambah_dokter_poli');
  ?>
</div>
<div class="modal fade" id="edit_dokter_poli" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/dokter_poli/form_edit_dokter_poli');
  ?>
</div>
<div class="modal fade" id="hapus_dokter_poli" tabindex="-1" role="dialog" aria-hidden="true">
  <?php
  $this->load->view('master/dokter_poli/form_delete_dokter_poli');
  ?>
</div>