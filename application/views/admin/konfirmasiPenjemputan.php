<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $i = 1 ?>
                                <?php foreach ($jemput as $us) : ?>
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
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?= base_url('admin/prosesPenjemputan/' . $us->id_penjemputan); ?>"><i class="bx bx-edit-alt me-1"></i> Konfirmasi Penjemputan</a>
                                                    <a class="dropdown-item" href="<?= base_url('admin/selesaikanPenjemputan/' . $us->id_penjemputan); ?>"><i class="bx bx-check-circle me-1"></i> Selesaikan Penjemputan</a>
                                                </div>
                                            </div>
                                        </td>
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