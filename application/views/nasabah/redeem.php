<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4"><span class="text-muted fw-medium"><?= $judul; ?></span>
        </h4>
        <div class="row">
            <div class="col-lg-12 order-lg-2 order-1 align-self-end mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang di Halaman Redeem Point!!🎉</h5>
                                <p class="mb-4"><span class="fw-medium"></span> Ayo kumpulkan lebih banyak sampah dan dapatkan lebih banyak point!!!</p>

                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?= base_url('assets') ?>/Admin/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-light-img="illustrations/man-with-laptop-light.png" data-app-dark-img="illustrations/man-with-laptop-dark.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">50 Poin</h5>
                                <p class="mb-1">Tukar 50 poin menjadi Rp 5.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="50">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">100 Poin</h5>
                                <p class="mb-1">Tukar 100 poin menjadi Rp 10.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="100">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">150 Poin</h5>
                                <p class="mb-1">Tukar 150 poin menjadi Rp 15.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="150">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">200 Poin</h5>
                                <p class="mb-1">Tukar 200 poin menjadi Rp 20.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="200">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">250 Poin</h5>
                                <p class="mb-1">Tukar 250 poin menjadi Rp 25.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="250">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">300 Poin</h5>
                                <p class="mb-1">Tukar 300 poin menjadi Rp 30.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="300">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">350 Poin</h5>
                                <p class="mb-1">Tukar 350 poin menjadi Rp 35.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="350">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">400 Poin</h5>
                                <p class="mb-1">Tukar 400 poin menjadi Rp 40.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="400">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">450 Poin</h5>
                                <p class="mb-1">Tukar 450 poin menjadi Rp 45.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="450">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 col-12 align-self-end order-4 mb-4 mx-auto">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 mb-4">
                                <img src="https://media.giphy.com/media/OccMlQrNO0YU4zFchY/giphy.gif" height="140" alt="Target User" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">500 Poin</h5>
                                <p class="mb-1">Tukar 500 poin menjadi Rp 50.000-,</p>
                                <form action="<?= base_url("Nasabah") ?>/cek_redeem" method="post">
                                    <div class="demo-inline-spacing">
                                        <input type="hidden" name="points_to_redeem" value="500">
                                        <button type="submit" class="btn btn-lg btn-primary redeem-button">Tukar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->