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
                                    <th>Poin Awal</th>
                                    <th>Transaksi</th>
                                    <th>Jenis Transaksi</th>
                                    <th>Poin Akhir</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $i = 1 ?>
                                <?php foreach ($histori as $us) : ?>
                                    <tr>
                                        <td><?= $i; ?>.</td>
                                        <td><?= $us->poin_awal; ?></td>
                                        <td>
                                            <?php if ($us->jenis_transaksi == "Redeem") : ?>
                                                <span class="text-danger me-1">-<?= $us->transaksi_poin; ?></span>
                                            <?php elseif ($us->jenis_transaksi == "Setor") : ?>
                                                <span class="text-success me-1">+<?= $us->transaksi_poin; ?></span>
                                            <?php else : ?>
                                                <?= $us->transaksi_poin; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $us->jenis_transaksi; ?></td>
                                        <td><?= $us->poin_akhir; ?></td>
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