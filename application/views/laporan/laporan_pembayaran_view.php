<div class="container-fluid ">
    <form id="monthForm" action="<?= base_url('laporan/laporan_pembayaran'); ?>" method="get">
        <div class="d-flex align-items-end mb-4">
            <h6>Bulan: </h6>
            <input onchange="onMonthChange()" value="<?= $this->input->get('month'); ?>" name="month" type="month" class="form-control ml-2" style="width: 200px;" max="<?= date("Y-m"); ?>">
        </div>
    </form>
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
                    <th>STATUS</th>
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
                        </td>
                        <td>
                            <div class="px-3 mb-1">
                                <?php if ($pembayaran->status == 'Lunas') { ?>
                                    <div class="rounded bg-success text-center">
                                        <i class="fas fa-check text-light"></i>
                                    </div>
                                <?php } else { ?>
                                    <div class="rounded bg-danger text-center">
                                        <i class="fas fa-times text-light"></i>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="text-center"><b><?= $pembayaran->status ?></b></div>
                            <?= $pembayaran->status == 'Lunas' ? 'Dibayar pada ' . $pembayaran->tgl_pembayaran : '' ?>

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
                            <a class="page-link" href="<?= base_url('laporan/laporan_pembayaran?page=' . $i . '&month=' . $this->input->get('month')); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>
</div>
<script>
    function onMonthChange() {
        document.getElementById('monthForm').submit();
    }
</script>