
    <!-- Navbar -->

        <div class="content-wrapper">
            <!-- Content -->
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Bootstrap Table with Header - Light -->
                <div class="card">
                    <h5 class="card-header"><?php echo $judul; ?></h5>
                    <hr>
                    <div class="card-header col-md-6 ">
                            <a href="<?=base_url('Admin/TambahPoin')?>" class="btn btn-info mb-2 bx bx-plus me-sm-1"> Tambah Data</a>
							
						</div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>id</th>
                                    <th>Nama Nasabah</th>
                                    <th>Nama Sampah</th>
                                    <th>Nama Admin</th>
                                    <th>Point</th>
                                    <th>Berat</th>
                                    <th>Tanggal</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                <?php $i = 1 ?>
                                <?php foreach ($poin as $us): ?>
                                    <tr>
                                        <td>
                                            <?= $i; ?>.
                                        </td>
                                        <td>
                                            <?= $us['nama_nasabah']; ?>
                                        </td>
                                        <td>
                                            <?= $us['nama_sampah']; ?>
                                        </td>
                                        <td>
                                            <?= $us['nama_admin']; ?>
                                        </td>
                                        <td>
                                            <?= $us['poin']; ?>
                                        </td>
                                        <td>
                                            <?= $us['berat'];?>
                                        </td>
                                        <td>
                                            <?= $us['date'];?>
                                        </td>
                                    
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item tombol-hapus" href="<?= base_url('Admin/DeletePoin/') . $us['id_setor'];?>"><i class="bx bx-trash me-1"></i> Delete</a>
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