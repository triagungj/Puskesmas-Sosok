<div class="container-fluid">
    <?php if ($this->session->jabatan == 'dokter') { ?>
        <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="<?= $list_pendaftaran != null ? "#tambah_pemeriksaan" : "#empty_dialog"  ?>">
            <i class="fas fa-plus fa-sm"></i> Tambah Pemeriksaan
        </button>
    <?php } ?>
    <div class="table-custom-wrapper">
        <?php if ($pemeriksaan != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NO RM</th>
                    <th>PASIEN</th>
                    <th width="20%">KELUHAN</th>
                    <th width="20%">KETERANGAN</th>
                    <th>DOKTER POLI</th>
                    <th>TANGGAL</th>
                    <?php if ($this->session->jabatan == 'dokter') { ?>
                        <th colspan="2">AKSI</th>
                    <?php } ?>
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
                        <td><?= $pemeriksaan->tgl_pemeriksaan ?></td>
                        <?php if ($this->session->jabatan == 'dokter') { ?>

                            <td class="text-center">
                                <button onclick="showEditModal('<?= $pemeriksaan->no_rm; ?>', '<?= $pemeriksaan->nama_pasien; ?>', 
                            '<?= $pemeriksaan->nik; ?>', '<?= $pemeriksaan->nama_poli; ?>', '<?= $pemeriksaan->nama_dokter; ?>', '<?= $pemeriksaan->keterangan; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_pemeriksaan">
                                    <i class="fas fa-edit"></i></button>
                            </td>
                            <td class="text-center">
                                <button onclick="showDeleteModal('<?= $pemeriksaan->no_rm ?>', '<?= $pemeriksaan->nama_pasien; ?>', '<?= $pemeriksaan->nama_poli; ?>', '<?= $pemeriksaan->nama_dokter; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pemeriksaan">
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
                            <a class="page-link" href="<?= base_url('pemeriksaan?page=' . $i); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>

</div>

<div class="modal fade" id="empty_dialog" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $empty_data['empty_title'] = 'Perhatian';
    $empty_data['empty_desc'] = 'Tidak dapat menambah data pemeriksaan karena belum ada data pendaftaran baru. Harap <b>tambahkan data pendaftaran</b> terlebih dahulu untuk melanjutkan pemeriksaan';
    $this->load->view('templates/empty_dialog', $empty_data);
    ?>
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