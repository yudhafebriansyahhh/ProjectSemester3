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
                                    <th>Metode</th>
                                    <th>Jenis</th>
                                    <th>No HP/ No Rekening</th>
                                    <th>Jumlah Penarikan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $i = 1 ?>
                                <?php foreach ($histori_transaksi as $transaksi) : ?>
                                    <tr>
                                        <td><?= $i; ?>.</td>
                                        <td><?= $transaksi->metode; ?></td>
                                        <td><?= $transaksi->jenis; ?></td>
                                        <td><?= $transaksi->nomor; ?></td>
                                        <td><?= $transaksi->jumlah_tarik; ?></td>
                                        <td><?= $transaksi->date; ?></td>
                                        <td>
                                            <?php if ($transaksi->status == "Menunggu Pembayaran") : ?>
                                                <span class="badge bg-label-warning me-1"><?= $transaksi->status; ?></span>
                                            <?php elseif ($transaksi->status == "Success") : ?>
                                                <span class="badge bg-label-success me-1"><?= $transaksi->status; ?></span>
                                            <?php else : ?>
                                                <?= $transaksi->status; ?>
                                            <?php endif; ?>
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