<!-- / Navbar -->

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="col-lg-8 mb-4 order-1">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-2 mx-4">
                            <div class="card-body mb-3 d-flex justify-content-center">
                                <div class="flex-shrink-0">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="<?= base_url('assets') ?>/img/profile/<?= $nasabah['gambar'] ?>" alt="user-avatar" class="d-block rounded-circle" height="100" width="100" id="uploadedAvatar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"> <!-- Mengganti col-sm-6 menjadi col-sm-9 -->
                            <div class="card-body" style="height: 180px;">
                                <h5 class="card-title text-primary mt-3">Selamat Datang, <?= $nasabah['nama']; ?> 🎉</h5>
                                <p class="mb-4">
                                    Siap Menjaga <span class="fw-bold">Lingkungan? </span> Ayo kumpulkan lebih banyak sampah untuk didaur ulang dan dapatkan
                                    <span class="fw-bold">reward</span> menarik!!!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body" style="height: 180px;">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url('assets') ?>/Admin/assets/img/icons/unicons/chart-success.png" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="<?= base_url("Nasabah/redeemPoints") ?>">Redeem</a>
                                            <a class="dropdown-item" href="<?= base_url("Nasabah/redeemPoints") ?>">History</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Poin</span>
                                <h3 class="card-title text-nowrap mb-1"><?= $nasabah['poin']; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body" style="height: 180px;">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url('assets') ?>/Admin/assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="<?= base_url("Nasabah/penarikan") ?>">Tarik</a>
                                            <a class="dropdown-item" href="<?= base_url("Nasabah/historyTransaksi") ?>">History</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Saldo</span>
                                <h4 class="card-title text-nowrap mb-1">Rp. <?= $nasabah['saldo']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4 order-1">
                <div class="card overflow-hidden mb-4" style="height: 375px">
                    <h5 class="card-header fw-bold">History Penyetoran Sampah</h5>
                    <div class="card-body" id="vertical-example">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="sticky-top">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sampah</th>
                                        <th>Jenis Sampah</th>
                                        <th>Berat</th>
                                        <th>Poin</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($histori as $us) : ?>
                                        <tr>
                                            <td><?= $i; ?>.</td>
                                            <td><?= isset($us['nama_sampah']) ? $us['nama_sampah'] : ''; ?></td>
                                            <td><?= isset($us['jenis']) ? $us['jenis'] : ''; ?></td>
                                            <td><?= isset($us['berat']) ? $us['berat'] : ''; ?></td>
                                            <td><label class="text-success">+<?= isset($us['poin']) ? $us['poin'] : ''; ?></label></td>
                                            <td><?= isset($us['date']) ? $us['date'] : ''; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>

                                </tbody>

                                <tfoot class="table-border-bottom-0">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sampah</th>
                                        <th>Jenis Sampah</th>
                                        <th>Berat</th>
                                        <th>Poin</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url('assets') ?>/Admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Payments</span>
                                <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                                <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url('assets') ?>/Admin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1">Transactions</span>
                                <h3 class="card-title mb-2">$14,857</h3>
                                <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                            </div>
                        </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Profile Report</h5>
                                            <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <small class="text-success text-nowrap fw-medium"><i class="bx bx-chevron-up"></i> 68.2%</small>
                                            <h3 class="mb-0">$84,686k</h3>
                                        </div>
                                    </div>
                                    <div id="profileReportChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">