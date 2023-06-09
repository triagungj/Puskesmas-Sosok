<div class="container-fluid pt-4">
    <div class="table-custom-wrapper">
        <?php if ($list_pembayaran != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NO RM</th>
                    <th>PASIEN</th>
                    <th>KELUHAN</th>
                    <th>PEMERIKSAAN</th>
                    <th width="25%">TINDAKAN</th>
                    <th width="15%">RINCIAN </th>
                    <th width="12%">PEMBAYARAN</th>
                    <?php if ($this->session->jabatan == 'admin') { ?>
                        <th>AKSI</th>
                    <?php } ?>
                    <th>PRINT</th>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($list_pembayaran as $pembayaran) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $pembayaran->no_rm ?></td>
                        <td><?= $pembayaran->nama_pasien ?></td>
                        <td><?= $pembayaran->keluhan ?></td>
                        <td><?= $pembayaran->keterangan ?></td>
                        <td>
                            <?= $pembayaran->nama_tindakan ?> <br />
                            <hr>
                            Ditangani <?= $pembayaran->nama_poli; ?> (<?= $pembayaran->nama_dokter ?>)
                        </td>
                        <td>
                            Baya Tindakan: <br /> <b>Rp. <?= $pembayaran->jumlah_biaya; ?>,00</b> <br />
                            <?php if ($pembayaran->obat != null) { ?>
                                <hr>
                                Biaya Obat: <br />
                                <ul class="pl-3">
                                    <?php foreach ($pembayaran->obat as $obat) : ?>
                                        <li>
                                            <?= $obat->nama_obat; ?> (<?= $obat->jumlah_obat; ?> <?= $obat->satuan; ?> @<?= $obat->harga; ?>):
                                            <b>Rp. <?= $obat->jumlah_obat * $obat->harga; ?>,00</b>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php } ?>
                        </td>
                        <td class="text-justify">
                            Total Bayar: <b>Rp. <?= $pembayaran->total_pembayaran; ?>,00</b> <br />
                            <hr>
                            Status: <b><?= $pembayaran->status ?></b> <br /><?= $pembayaran->status == 'Lunas' ? '(Dibayar pada ' . $pembayaran->tgl_pembayaran . ')' : '' ?>
                        </td>
                        <?php if ($this->session->jabatan == 'admin') { ?>

                            <td class="text-center">
                                <?php if ($pembayaran->status == "Belum Lunas") { ?>
                                    <input hidden name="id_pembayaran" type="text" value="<?= $pembayaran->id_pembayaran; ?>">
                                    <button onclick="showProsesBayarModal('<?= $pembayaran->id_pembayaran; ?>', '<?= $pembayaran->no_rm; ?>', 
                                '<?= $pembayaran->nama_pasien; ?>', '<?= $pembayaran->nama_poli; ?>', 
                                '<?= $pembayaran->nama_dokter; ?>')" type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#proses_bayar">
                                        PROSES BAYAR</button>
                                <?php } else { ?>
                                    <button disabled class="btn btn-warning btn-sm">
                                        <i class="fas fa-check"></i>
                                    </button>
                                <?php } ?>
                            </td>
                        <?php } ?>
                        <td class="text-center">
                            <form action="<?= base_url('pembayaran/print_pembayaran'); ?>" method="post" target="_blank">
                                <input hidden type="text" name="id_pembayaran" value="<?= $pembayaran->id_pembayaran; ?>">
                                <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" ">
                                    <i class=" fas fa-print"></i>
                                </button>
                            </form>
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
                            <a class="page-link" href="<?= base_url('pembayaran?page=' . $i); ?>"><?= $i; ?></a>
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