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
            <h6 class="text-headline">KARTU PENDAFTARAN PASIEN</h6>
            <div style="height: 50px;"></div>
            <div class="table-pendaftaran">
                <table class="w-100 ">
                    <tr>
                        <th width="40%">NAMA</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pendaftaran->nama_pasien; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">NIK</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pendaftaran->nik; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">ALAMAT</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pendaftaran->alamat; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">POLI</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pendaftaran->nama_poli; ?></td>
                    </tr>
                    <tr>
                        <th width="40%">DOKTER</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pendaftaran->nama_dokter; ?> (<?= $pendaftaran->spesialisasi; ?>)</td>
                    </tr>
                    <tr>
                        <th width="40%">TANGGAL PENDAFTARAN</th>
                        <td width="2%">:</td>
                        <td width="58%"><?= $pendaftaran->tgl_pendaftaran; ?></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>
<style>
    @page {
        size: A5 landscape;
        margin: 10%;
    }
</style>
<script>
    window.print();
</script>
<?php $this->load->view('templates/footer') ?>