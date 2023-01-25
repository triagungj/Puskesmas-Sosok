<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <?php foreach ($poli_statistic as $poli) : ?>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $poli->nama_poli; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $poli->total; ?> Pasien</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card border-left-primary shadow py-2 mb-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pendaftaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pendaftaran; ?> Pendaftaran</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-left-primary shadow py-2 mb-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pemeriksaan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pemeriksaan; ?> Pemeriksaan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-left-primary shadow py-2 mb-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Tindakan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_tindakan; ?> Tindakan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4 h-100">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Status Pembayaran Pasien</h6>
                </div>
                <ul id="statusBayarStatisticName" class="d-none">
                    <li>Lunas</li>
                    <li>Belum Lunas</li>
                </ul>
                <ul id="statusBayarStatistic" class="d-none">
                    <li><?= $status_bayar_statistic->lunas; ?></li>
                    <li><?= $status_bayar_statistic->belum_lunas; ?></li>
                </ul>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="statusBayarChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Lunas
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Belum Lunas
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->