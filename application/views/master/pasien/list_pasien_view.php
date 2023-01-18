<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if ($this->session->jabatan != 'kepala_puskesmas') { ?>

        <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#tambah_pasien"><i class="fas fa-plus fa-sm"></i> Tambah Pasien</button>
    <?php } ?>
    <div class="pt-4 table-custom-wrapper">
        <?php if ($pasien != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NAMA PASIEN</th>
                    <th>NIK</th>
                    <th>JENIS KELAMIN</th>
                    <th>TANGGAL LAHIR</th>
                    <th>ALAMAT</th>
                    <th>AGAMA</th>
                    <th>NO HP</th>
                    <?php if ($this->session->jabatan != 'kepala_puskesmas') { ?>
                        <th colspan="2">AKSI</th>
                    <?php } ?>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($pasien as $pasien) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $pasien->nama_pasien ?></td>
                        <td><?= $pasien->nik ?></td>
                        <td><?= $pasien->jenis_kelamin ?></td>
                        <td><?= $pasien->tgl_lahir ?></td>
                        <td><?= $pasien->alamat ?></td>
                        <td><?= $pasien->agama ?></td>
                        <td><?= $pasien->no_hp ?></td>
                        <?php if ($this->session->jabatan != 'kepala_puskesmas') { ?>

                            <td class="text-center">
                                <button onclick="showEditModal('<?= $pasien->id_pasien; ?>', 
                        '<?= $pasien->nama_pasien; ?>', '<?= $pasien->nik; ?>', '<?= $pasien->jenis_kelamin; ?>', 
                        '<?= $pasien->tgl_lahir; ?>', '<?= $pasien->alamat; ?>', '<?= $pasien->agama; ?>', 
                        '<?= $pasien->no_hp; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_pasien">
                                    <i class="fas fa-edit"></i></button>
                            </td>
                            <td class="text-center">
                                <button onclick="showDeleteModal('<?= $pasien->id_pasien ?>', '<?= $pasien->nama_pasien; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pasien">
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
                            <a class="page-link" href="<?= base_url('pasien?page=' . $i); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>

</div>
<!-- /.container-fluid -->


<div class="modal fade" id="tambah_pasien" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/pasien/form_tambah_pasien');
    ?>
</div>
<div class="modal fade" id="edit_pasien" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/pasien/form_edit_pasien');
    ?>
</div>
<div class="modal fade" id="hapus_pasien" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/pasien/form_delete_pasien');
    ?>
</div>

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>