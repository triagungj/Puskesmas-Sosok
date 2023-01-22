<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_pemeriksaan"><i class="fas fa-plus fa-sm"></i> Tambah Pemeriksaan</button>
    <div class="table-custom-wrapper">
        <?php if ($pemeriksaan != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NO RM</th>
                    <th>PASIEN</th>
                    <th width="20%">KELUHAN</th>
                    <th width="30%">KETERANGAN</th>
                    <th>DOKTER POLI</th>
                    <th>TANGGAL</th>
                    <th colspan="2">AKSI</th>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($pemeriksaan as $pemeriksaan) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $pemeriksaan->no_rm ?></td>
                        <td><?= $pemeriksaan->nama_pasien ?></td>
                        <td><?= $pemeriksaan->keluhan ?></td>
                        <td>
                            <p class="m-0"><?= $pemeriksaan->keterangan ?></p>
                        </td>
                        <td><?= $pemeriksaan->nama_poli . ' - ' . $pemeriksaan->nama_dokter ?> (<?= $pemeriksaan->spesialisasi; ?>)</td>
                        <td><?= $pemeriksaan->tgl_pendaftaran ?></td>
                        <td class="text-center">
                            <button onclick="showEditModal('<?= $pemeriksaan->no_rm; ?>', '<?= $pemeriksaan->nama_pasien; ?>', 
                            '<?= $pemeriksaan->nik; ?>', '<?= $pemeriksaan->nama_poli; ?>', '<?= $pemeriksaan->nama_dokter; ?>', '<?= $pemeriksaan->keterangan; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_pemeriksaan">
                                <i class="fas fa-edit"></i></button>
                        </td>
                        <td class="text-center">
                            <button onclick="showDeleteModal('<?= $pemeriksaan->no_rm ?>', '<?= $pemeriksaan->nama_pasien; ?>', '<?= $pemeriksaan->nama_poli; ?>', '<?= $pemeriksaan->nama_dokter; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pemeriksaan">
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
                            <a class="page-link" href="<?= base_url('pemeriksaan?page=' . $i); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>

</div>

<div class="modal fade" id="tambah_pemeriksaan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/pemeriksaan/form_tambah_pemeriksaan');
    ?>
</div>
<div class="modal fade" id="edit_pemeriksaan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/pemeriksaan/form_edit_pemeriksaan');
    ?>
</div>
<div class="modal fade" id="hapus_pemeriksaan" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/pemeriksaan/form_delete_pemeriksaan');
    ?>
</div>