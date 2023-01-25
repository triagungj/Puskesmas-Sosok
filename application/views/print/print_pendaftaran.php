<?php $this->load->view('templates/header') ?>

<body>
    <div class="print-page vh-100">
        <div class="container row">
            <div class="col-6 print-pendaftaran">
                <div class="row align-items-center header">
                    <div class="col-12 text-center pt-2">
                        <div>
                            <h6 class="text-headline">PEMERINTAH KABUPATEN SANGGAU</h6>
                            <h6 class="text-headline">DINAS KESEHATAN</h6>
                            <h6 class="text-headline">PUSAT KESEHATAN MASYARAKAT SOSOK</h6>
                            <div class="mb-1 text-address">
                                Jalan Oevang Oeray No. 33 Telp. (0563) 28831 Kecamatan Tayan Hulu 78562
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 25px;"></div>
                <div class="print-body">
                    <h6 class="text-headline">KARTU PENDAFTARAN PASIEN</h6>
                    <div style="height: 25px;"></div>
                    <div class="table-pendaftaran">
                        <table class="w-100 ">
                            <tr>
                                <th width="38%">NAMA</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->nama_pasien; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">NIK</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->nik; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">ALAMAT</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->alamat; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">POLI</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->nama_poli; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">DOKTER</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->nama_dokter; ?> (<?= $pendaftaran->spesialisasi; ?>)</td>
                            </tr>
                            <tr>
                                <th width="38%">TGL DAFTAR</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->tgl_pendaftaran; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">OPSI DAFTAR</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->opsi; ?></td>
                            </tr>
                            <tr>
                                <th width="38%">NOMOR KARTU</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->nomor_kartu != null ? $pendaftaran->nomor_kartu : '-' ?></td>
                            </tr>
                            <tr>
                                <th width="38%">KELUHAN</th>
                                <td width="2%">:</td>
                                <td width="60%"><?= $pendaftaran->keluhan; ?> </td>
                            </tr>
                        </table>
                    </div>
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

</body>

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
        size: A5 landscape;
        margin: 0;
    }

    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }
    }
</style>