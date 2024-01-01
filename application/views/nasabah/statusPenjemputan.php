<div class="content-wrapper">
    <!-- Content -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"> <?= $judul; ?></h4>

        <!-- Basic Layout & Basic with Icons --

    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Halaman Penjemputan</h4>

            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url('Nasabah/pesanpenjemputan') ?>"><i class="bx bx-user me-1"></i> Request Penjemputan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('Nasabah/historypenjemputan') ?>"><i class="bx bx-time me-1"></i> Status Penjemputan</a>
                        </li>

                        </li>
                    </ul>
                    <div class="col-lg-12 mb-4 order-1">
                        <div class="card">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                            <h5 class="card-header"><?= $judul; ?></h5>
                            <div class="card">
                                <div class="table-responsive text-nowrap mx-4">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No Hp</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php $i = 1 ?>
                                            <?php foreach ($histori as $us) : ?>
                                                <tr>
                                                    <td><?= $i; ?>.</td>
                                                    <td><?= $us->nama; ?></td>
                                                    <td><?= $us->alamat; ?></td>
                                                    <td><?= $us->no_hp; ?></td>
                                                    <td>
                                                        <?php if ($us->status == "Waiting") : ?>
                                                            <span class="badge bg-label-warning me-1"><i class='bx bx-timer'></i> <?= $us->status; ?></span>
                                                        <?php elseif ($us->status == "On Progress") : ?>
                                                            <span class="badge bg-label-info me-1"><i class='bx bxs-truck'></i> <?= $us->status; ?></span>
                                                        <?php else : ?>
                                                            <span class="badge bg-label-success me-1"><i class='bx bxs-check-circle'></i> <?= $us->status; ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $us->date; ?></td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


    <!-- / Content -->













    <