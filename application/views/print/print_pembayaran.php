<?php $this->load->view('templates/header') ?>
<div class="print-page">
    <div class="container">
        <div class="row align-items-center header">
            <div class="col-12 text-center pt-2">
                <div>
                    <h6 class="text-headline">PEMERINTAH KABUPATEN SANGGAU</h6>
                    <h6 class="text-headline">DINAS KESEHATAN</h6>
                    <h6 class="text-headline">PUSAT KESEHATAN MASYARAKAT SOSOK</h6>
                    <div class="m-0 text-address">
                        Jalan Oevang Oeray No. 33 Telp. (0563) 28831 Kecamatan Tayan Hulu 78562
                    </div>
                    <div class="m-0 text-address">
                        Telp. (0274) 773169 Fax. (0274) 773092, email: rsaj@kulonprogokab.go.id
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 50px;"></div>
        <div class="print-body">
            <h6 class="text-headline">NOTA PEMBAYARAN PASIEN</h6>
            <div style="height: 50px;"></div>
            <div class="table-pembayaran">
                <table class="w-100 ">
                    <tr>
                        <th width="40%">NAMA</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->nama_pasien; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">NIK</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->nik; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">ALAMAT</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->alamat; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">POLI</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->nama_poli; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">DOKTER</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->nama_dokter; ?> (<?= $pembayaran->spesialisasi; ?>)</td>
                    </tr>
                    <tr>
                        <th width="40%">TANGGAL PENDAFTARAN</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->tgl_pendaftaran; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">KELUHAN</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->keluhan; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">TINDAKAN</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->nama_tindakan; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">TINDAKAN</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pembayaran->nama_tindakan; ?></td>
                    </tr>
                </table>
                <div>
                    <div style="height: 50px;"> </div>
                    <h5><b>Rincian Biaya</b></h5>
                    <table class="w-100">
                        <tr>
                            <td width="20%">- Biaya Tindakan</td>
                            <td width="40%">Rp. <?= $pembayaran->jumlah_biaya; ?>,00</td>
                        </tr>
                        <?php foreach ($pembayaran->obat as $obat) : ?>
                            <tr>
                                <td>- <?= $obat->nama_obat; ?> (<?= $obat->jumlah_obat; ?> <?= $obat->satuan; ?>) @<?= $obat->harga; ?> </td>
                                <td>Rp. <?= $obat->harga * $obat->jumlah_obat; ?>,00</td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">Total Pembayaran</td>
                            <td width="40%"><b>Rp. <?= $pembayaran->total_pembayaran; ?>,00</b></td>
                        </tr>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    window.print();
</script>
<?php $this->load->view('templates/footer') ?>