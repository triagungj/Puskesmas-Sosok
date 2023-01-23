<div class="container-fluid pt-4">
    <div class="table-custom-wrapper">
        <?php if ($list_pembayaran != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NO RM</th>
                    <th>PASIEN</th>
                    <th>DOKTER POLI</th>
                    <th>TOTAL BAYAR</th>
                    <th>STATUS</th>
                    <th>TANGGAL BAYAR</th>
                    <th>PRINT</th>
                    <th>AKSI</th>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($list_pembayaran as $pembayaran) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $pembayaran->no_rm ?></td>
                        <td><?= $pembayaran->nama_pasien ?></td>
                        <td><?= $pembayaran->nama_poli; ?> (<?= $pembayaran->nama_dokter ?>)</td>
                        <td>Rp. <?= $pembayaran->total_pembayaran; ?>,00</td>
                        <td><?= $pembayaran->status ?></td>
                        <td class="text-center"><?= $pembayaran->tgl_pembayaran ?? '-' ?></td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pendaftaran">
                                <i class="fas fa-print"></i></button>
                        </td>
                        <td class="text-center">
                            <?php if ($pembayaran->status == "Belum Lunas") { ?>
                                <input hidden name="id_pembayaran" type="text" value="<?= $pembayaran->id_pembayaran; ?>">
                                <button onclick="showProsesBayarModal('<?= $pembayaran->id_pembayaran; ?>', '<?= $pembayaran->no_rm; ?>', 
                                '<?= $pembayaran->nama_pasien; ?>', '<?= $pembayaran->nama_poli; ?>', 
                                '<?= $pembayaran->nama_dokter; ?>')" type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#proses_bayar">
                                    <i class="fas fa-check"></i></button>
                            <?php } else { ?>
                                <button onclick="showBatalBayarModal('<?= $pembayaran->id_pembayaran; ?>', '<?= $pembayaran->no_rm; ?>', 
                                '<?= $pembayaran->nama_pasien; ?>', '<?= $pembayaran->nama_poli; ?>', 
                                '<?= $pembayaran->nama_dokter; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#batalkan_bayar">
                                    <i class="fas fa-undo"></i></button>
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
                            <a class="page-link" href="<?= base_url('pemeriksaan?page=' . $i); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>
</div>
<div class="modal fade" id="proses_bayar" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/pembayaran/form_proses_bayar');
    ?>
</div>
<div class="modal fade" id="batalkan_bayar" tabindex="-1" role="dialog" aria-hidden="true">
    <?php
    $this->load->view('transaksi/pembayaran/form_batal_bayar');
    ?>
</div>