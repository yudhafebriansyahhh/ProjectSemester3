<div class="content-wrapper">
    <!-- Content -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"> <?= $judul; ?></h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">

            <div class="col-8">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Isi Data Penjemputan</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('Nasabah/inputpenjemputan') ?>" method="post">
                            <input type="hidden" name="id_nasabah" value="<?= $nasabah['id_nasabah']; ?>">
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Nama</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" name="nama" class="form-control" id="point" placeholder="Masukkan nama" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Alamat</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-merge">

                                        <input type="text" class="form-control" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" name="alamat" class="form-control" id="point" placeholder="Masukkan alamat lengkap" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">No Hp</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-merge">

                                        <input type="text" class="form-control" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" name="no_hp" class="form-control" id="point" placeholder="Masukkan no hp" />
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10 ">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->