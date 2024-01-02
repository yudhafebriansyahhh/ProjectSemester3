<!-- Navbar -->

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <!-- Bootstrap Table with Header - Light -->
        <div class="card">
            <h5 class="card-header"><?php echo $judul; ?></h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No HP</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php $i = 1 ?>
                            <?php foreach ($nasabah as $us) : ?>
                        <tr>
                            <td>
                                <?= $i; ?>.
                            </td>
                            <td>
                                <?= $us['nama']; ?>
                            </td>
                            <td>
                                <?= $us['alamat']; ?>
                            </td>
                            <td>
                                <?= $us['jenis_kelamin']; ?>
                            </td>
                            <td>
                                <?= $us['no_hp']; ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item tombol-hapus" href="<?= base_url('Admin/hapusNasabah/') . $us['id_nasabah']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>


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
        <!-- Bootstrap Table with Header - Light -->