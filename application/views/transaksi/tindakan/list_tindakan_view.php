<div class="container-fluid">
    <?php if ($this->session->jabatan == 'dokter') { ?>
        <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="<?= $list_pemeriksaan != null ? "#tambah_tindakan" : "#empty_dialog"  ?>">
            <i class="fas fa-plus fa-sm"></i> Tambah Tindakan
        </button>
    <?php } ?>
    <div class="table-custom-wrapper">
        <?php if ($list_tindakan != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th width="3%">NO</th>
                    <th>NO RM</th>
                    <th>NAMA TINDAKAN</th>
                    <th>PASIEN</th>
                    <th>DOKTER POLI</th>
                    <th width="14%">BIAYA TINDAKAN</th>
                    <th>Obat</th>
                    <th>TANGGAL</th>
                    <?php if ($this->session->jabatan == 'dokter') { ?>
                        <th width="3%" colspan="2">AKSI</th>
                    <?php } ?>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($list_tindakan as $tindakan) : ?>
                    <?php $obat_str = json_encode($tindakan->obat);
                    $obat_str = str_replace(chr(34), '&quot', $obat_str); ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $tindakan->no_rm ?></td>
                        <td><?= $tindakan->nama_tindakan ?></td>
                        <td><?= $tindakan->nama_pasien ?></td>
                        <td><?= $tindakan->nama_poli . ' - ' . $tindakan->nama_dokter ?> (<?= $tindakan->spesialisasi; ?>)</td>
                        <td>Rp. <?= $tindakan->jumlah_biaya ?>,00</td>
                        <td>
                            <?php if ($tindakan->obat != null) { ?>
                                <ul class="pl-3">
                                    <?php foreach ($tindakan->obat as $obat) : ?>
                                        <li><?= $obat->nama_obat ?> (<?= $obat->jumlah_obat; ?> <?= $obat->satuan; ?>) <br /></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php } else { ?>
                                <h6 class="text-center">-</h6>
                            <?php } ?>
                        </td>
                        <td><?= $tindakan->tgl_tindakan ?></td>
                        <?php if ($this->session->jabatan == 'dokter') { ?>
                            <td class="text-center">
                                <button onclick="showEditModal('<?= $tindakan->id_tindakan; ?>', '<?= $tindakan->no_rm; ?>', '<?= $tindakan->nama_pasien; ?>', 
                            '<?= $tindakan->nama_poli; ?>', '<?= $tindakan->nama_dokter; ?>', '<?= $tindakan->nama_tindakan; ?>', 
                            '<?= $tindakan->jumlah_biaya; ?>', '<?= $obat_str ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_tindakan">
                                    <i class="fas fa-edit"></i></button>
                            </td>
                            <td class="text-center">
                                <button onclick="showDeleteModal('<?= $tindakan->id_tindakan; ?>', '<?= $tindakan->no_rm ?>', '<?= $tindakan->nama_pasien; ?>', '<?= $tindakan->nama_poli; ?>', '<?= $tindakan->nama_dokter; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_tindakan">
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
                            <a class="page-link" href="<?= base_url('tindakan?page=' . $i); ?>"><?= $i; ?></a>
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
    $empty_data['empty_desc'] = 'Tidak dapat menambah data tindakan karena belum ada data pemeriksaan baru.';
    $this->load->view('templates/empty_dialog', $empty_data);
    ?>
</div>
<div class="modal fade" id="tambah_tindakan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/tindakan/form_tambah_tindakan');
    ?>
</div>
<div class="modal fade" id="edit_tindakan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/tindakan/form_edit_tindakan');
    ?>
</div>
<div class="modal fade" id="hapus_tindakan" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/tindakan/form_delete_tindakan');
    ?>
</div>