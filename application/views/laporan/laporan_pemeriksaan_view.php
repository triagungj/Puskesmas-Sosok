<div class="container-fluid">
    <form id="monthForm" action="<?= base_url('laporan/laporan_pemeriksaan'); ?>" method="get">
        <div class="d-flex align-items-end mb-4">
            <h6>Bulan: </h6>
            <input onchange="onMonthChange()" value="<?= $this->input->get('month'); ?>" name="month" type="month" class="form-control ml-2" style="width: 200px;" max="<?= date("Y-m"); ?>">
        </div>
    </form>
    <div class="table-custom-wrapper">
        <?php if ($pemeriksaan != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NO RM</th>
                    <th>PASIEN</th>
                    <th>OPSI PENDAFTARAN</th>
                    <th width="20%">KELUHAN</th>
                    <th width="20%">KETERANGAN</th>
                    <th>DOKTER POLI</th>
                    <th>TANGGAL</th>
                </tr>
                <?php
                $no = $offset_index + 1;
                foreach ($pemeriksaan as $pemeriksaan) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $pemeriksaan->no_rm ?></td>
                        <td><?= $pemeriksaan->nama_pasien ?></td>
                        <td><?= $pemeriksaan->opsi ?> <?= $pemeriksaan->nomor_kartu != null ? '(' . $pemeriksaan->nomor_kartu . ')' : ''; ?></td>
                        <td><?= $pemeriksaan->keluhan ?></td>
                        <td>
                            <p class="m-0"><?= $pemeriksaan->keterangan ?></p>
                        </td>
                        <td><?= $pemeriksaan->nama_poli . ' - ' . $pemeriksaan->nama_dokter ?> (<?= $pemeriksaan->spesialisasi; ?>)</td>
                        <td><?= $pemeriksaan->tgl_pemeriksaan ?></td>
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
                            <a class="page-link" href="<?= base_url('laporan/laporan_pemeriksaan?page=' . $i . '&month=' . $this->input->get('month')); ?>"><?= $i; ?></a>
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