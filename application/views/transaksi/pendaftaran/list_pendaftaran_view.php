<div class="container-fluid">
    <?php if ($this->session->jabatan == 'admin') { ?>
        <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_pendaftaran"><i class="fas fa-plus fa-sm"></i> Tambah Pendaftaran</button>
    <?php } ?>
    <div class="table-custom-wrapper">
        <?php if ($pendaftaran != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NAMA PASIEN</th>
                    <th>NIK</th>
                    <th>ALAMAT</th>
                    <th>OPSI DAFTAR</th>
                    <th width="30%">KELUHAN</th>
                    <th>DOKTER POLI</th>
                    <th>TANGGAL DAFTAR</th>
                    <th>PRINT</th>
                    <?php if ($this->session->jabatan == 'admin') { ?>
                        <th colspan="2">AKSI</th>
                    <?php } ?>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($pendaftaran as $pendaftaran) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $pendaftaran->nama_pasien ?></td>
                        <td><?= $pendaftaran->nik ?></td>
                        <td><?= $pendaftaran->alamat ?></td>
                        <td><?= $pendaftaran->opsi ?> <?= $pendaftaran->nomor_kartu != null ? '(' . $pendaftaran->nomor_kartu . ')' : ''; ?></td>
                        <td><?= $pendaftaran->keluhan ?></td>
                        <td><?= $pendaftaran->nama_poli . ' - ' . $pendaftaran->nama_dokter ?> (<?= $pendaftaran->spesialisasi; ?>)</td>
                        <td><?= $pendaftaran->tgl_pendaftaran ?></td>
                        <?php if ($this->session->jabatan == 'admin') { ?>

                            <td class="text-center">
                                <form action="<?= base_url('pendaftaran/print_pendaftaran'); ?>" method="post" target="_blank">
                                    <input hidden type="text" name="id_pendaftaran" value="<?= $pendaftaran->id_pendaftaran; ?>">
                                    <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" ">
                                    <i class=" fas fa-print"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                                <button onclick="showEditModal('<?= $pendaftaran->id_pendaftaran; ?>', '<?= $pendaftaran->id_pasien; ?>', 
                                '<?= $pendaftaran->keluhan; ?>', '<?= $pendaftaran->opsi; ?>', '<?= $pendaftaran->nomor_kartu; ?>', '<?= $pendaftaran->id_dokter_poli; ?>', 
                                )" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_pendaftaran">
                                    <i class="fas fa-edit"></i></button>
                            </td>
                            <td class="text-center">
                                <button onclick="showDeleteModal('<?= $pendaftaran->id_pendaftaran ?>', '<?= $pendaftaran->nama_pasien; ?>', '<?= $pendaftaran->nama_poli; ?>', '<?= $pendaftaran->nama_dokter; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pendaftaran">
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
                            <a class="page-link" href="<?= base_url('pendaftaran?page=' . $i); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>

</div>

<div class="modal fade" id="tambah_pendaftaran" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/pendaftaran/form_tambah_pendaftaran');
    ?>
</div>
<div class="modal fade" id="edit_pendaftaran" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/pendaftaran/form_edit_pendaftaran');
    ?>
</div>
<div class="modal fade" id="hapus_pendaftaran" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/pendaftaran/form_delete_pendaftaran');
    ?>
</div>