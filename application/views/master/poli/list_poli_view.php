<!-- Begin Page Content -->
<div class="container-fluid">

    <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_poli"><i class="fas fa-plus fa-sm"></i> Tambah Poli</button>
    <div class="table-custom-wrapper">
        <?php if ($poli != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NAMA POLI</th>
                    <th colspan="2">AKSI</th>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($poli as $poli) : ?>
                    <tr>
                        <th><?php echo $no++ ?></th>
                        <td><?php echo $poli->nama_poli ?></td>

                        <td class="text-center">
                            <button onclick="showEditModal('<?= $poli->id_poli; ?>', '<?= $poli->nama_poli; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_poli">
                                <i class="fas fa-edit"></i></button>
                        </td>
                        <td class="text-center">
                            <button onclick="showDeleteModal('<?= $poli->id_poli ?>', '<?= $poli->nama_poli; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_poli">
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
                            <a class="page-link" href="<?= base_url('poli?page=' . $i); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>

</div>
<!-- /.container-fluid -->


<div class="modal fade" id="tambah_poli" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/poli/form_tambah_poli');
    ?>
</div>
<div class="modal fade" id="edit_poli" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/poli/form_edit_poli');
    ?>
</div>
<div class="modal fade" id="hapus_poli" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('master/poli/form_delete_poli');
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