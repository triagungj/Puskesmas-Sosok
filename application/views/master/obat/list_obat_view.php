<!-- Begin Page Content -->
<div class="container-fluid">

    <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_obat"><i class="fas fa-plus fa-sm"></i> Tambah Obat</button>
    <div class="table-custom-wrapper">
        <?php if ($obat != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NAMA OBAT</th>
                    <th>JENIS OBAT</th>
                    <th>HARGA</th>
                    <th>SATUAN</th>
                    <th>STOK</th>
                    <th colspan="3">AKSI</th>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($obat as $obat) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $obat->nama_obat ?></td>
                        <td><?= $obat->jenis_obat ?></td>
                        <td>Rp. <?= $obat->harga ?></td>
                        <td><?= $obat->satuan ?></td>
                        <td><?= $obat->stok ?></td>
                        <td class="text-center">
                            <button onclick="showTambahStokModal('<?= $obat->id_obat; ?>', 
                            '<?= $obat->nama_obat; ?>', '<?= $obat->stok; ?>', 
                            '<?= $obat->satuan; ?>')" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah_stok_obat">
                                <i class="fas fa-plus"></i></button>
                        </td>
                        <td class="text-center">
                            <button onclick="showEditModal('<?= $obat->id_obat; ?>', 
                            '<?= $obat->nama_obat; ?>', '<?= $obat->jenis_obat; ?>', 
                            '<?= $obat->stok; ?>', '<?= $obat->satuan; ?>', '<?= $obat->harga; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_obat">
                                <i class="fas fa-edit"></i></button>
                        </td>
                        <td class="text-center">
                            <button onclick="showDeleteModal('<?= $obat->id_obat ?>', '<?= $obat->nama_obat; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_obat">
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
                            <a class="page-link" href="<?= base_url('obat?page=' . $i); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>

</div>
<!-- /.container-fluid -->
<div class="modal fade" id="tambah_stok_obat" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/obat/form_tambah_stok_obat');
    ?>
</div>
<div class="modal fade" id="tambah_obat" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/obat/form_tambah_obat');
    ?>
</div>
<div class="modal fade" id="edit_obat" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/obat/form_edit_obat');
    ?>
</div>
<div class="modal fade" id="hapus_obat" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/obat/form_delete_obat');
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