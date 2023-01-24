<div class="container-fluid">
    <div class="table-custom-wrapper">
        <?php if ($pendaftaran != null) { ?>
            <table class="table table-bordered table-custom">
                <tr>
                    <th>NO</th>
                    <th>NAMA PASIEN</th>
                    <th>NIK</th>
                    <th>ALAMAT</th>
                    <th>OPSI DAFTAR</th>
                    <th width="20%">KELUHAN</th>
                    <th>DOKTER POLI</th>
                    <th>TANGGAL DAFTAR</th>
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
                            <a class="page-link" href="<?= base_url('laporan/laporan_pendaftaran?page=' . $i); ?>"><?= $i; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

        </nav>
    </div>
    <div style="height: 50px;"></div>

</div>