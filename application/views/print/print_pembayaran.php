<?php $this->load->view('templates/header') ?>

<body>
    <div class="print-page vh-100">
        <div class="container row">
            <div class="col-6">
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
                <div style="height: 15px;"></div>
                <div class="print-body">
                    <h6 class="text-headline">NOTA PEMBAYARAN PASIEN</h6>
                    <div style="height: 15px;"></div>
                    <div class="table-pembayaran">
                        <table class="w-100 ">
                            <tr>
                                <th width="38%">NAMA</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->nama_pasien; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">NIK</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->nik; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">ALAMAT</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->alamat; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">POLI</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->nama_poli; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">DOKTER</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->nama_dokter; ?> (<?= $pembayaran->spesialisasi; ?>)</td>
                            </tr>
                            <tr>
                                <th width="38%">TGL DAFTAR</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->tgl_pendaftaran; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">KELUHAN</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->keluhan; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">KET. PEMERIKSAAN</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->keterangan; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">TINDAKAN</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pembayaran->nama_tindakan; ?></td>
                            </tr>
                        </table>
                        <hr>
                        <div>
                            <h6><b>Rincian Biaya</b></h6>
                            <table class="w-100">
                                <tr>
                                    <td width="40%">- Biaya Tindakan</td>
                                    <td class="text-right" width="60%">Rp. <?= $pembayaran->jumlah_biaya; ?>,00</td>
                                </tr>
                                <?php foreach ($pembayaran->obat as $obat) : ?>
                                    <tr>
                                        <td>- <?= $obat->nama_obat; ?> (<?= $obat->jumlah_obat; ?> <?= $obat->satuan; ?>) @<?= $obat->harga; ?> </td>
                                        <td class="text-right">Rp. <?= $obat->harga * $obat->jumlah_obat; ?>,00</td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Pembayaran</td>
                                    <td class="text-right"><b>Rp. <?= $pembayaran->total_pembayaran; ?>,00</b></td>
                                </tr>
                            </table>

                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                            <div class="text-center">
                                Tayan Hulu, <?= date("Y-m-d"); ?>
                                <br /> <b>Petugas</b> <br />
                                <div style="height:50px"> </div>
                                ............................... <br />
                                <?= $this->session->nama_user; ?>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
    <?php $this->load->view('templates/footer') ?>

    <style type="text/css">
        .print-pendaftaran {
            background-color: #F7D2DE;
        }

        @media print and (width: 28cm) and (height: 10cm) {
            @page {
                margin: 5cm;
            }

            .vendorListHeading th {
                color: white !important;
            }
        }

        @page {
            size: A4 landscape;
            margin: 0;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>