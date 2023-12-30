<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <
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
                                    <th>Nasabah</th>
                                    <th>Metode</th>
                                    <th>Jenis</th>
                                    <th>No HP/ No Rekening</th>
                                    <th>Jumlah Penarikan</th>
                                    <th>Nama Penerima</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $i = 1 ?>
                                <?php foreach ($transaksi as $us) : ?>
                                    <tr>
                                        <td><?= $i; ?>.</td>
                                        <td><?= $us->nama; ?></td>
                                        <td><?= $us->metode; ?></td>
                                        <td><?= $us->jenis; ?></td>
                                        <td><?= $us->nomor; ?></td>
                                        <td><?= $us->jumlah_tarik; ?></td>
                                        <td><?= $us->penerima; ?></td>
                                        <td><?= $us->date; ?></td>
                                        <td>
                                            <?php if ($us->status == "Menunggu Pembayaran") : ?>
                                                <span class="badge bg-label-warning me-1"><?= $us->status; ?></span>
                                            <?php elseif ($us->status == "Success") : ?>
                                                <span class="badge bg-label-success me-1"><?= $us->status; ?></span>
                                            <?php else : ?>
                                                <?= $us->status; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($us->status == "Menunggu Pembayaran") : ?>
                                                <a href="<?= base_url('admin/prosesPembayaran/' . $us->id_transaksi); ?>" class="btn btn-warning">Proses Pembayaran</a>
                                            <?php else : ?>
                                                <a href="" class="btn btn-success">Pembayaran Berhasil</a>
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