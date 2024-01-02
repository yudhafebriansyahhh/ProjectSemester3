<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?= base_url('assets/') ?>img/bg.jpg" class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" class="needs-validation" action="<?= base_url('Auth/changePassword'); ?>">
                    <div class="text-center fw-bold mx-3 mb-4">
                        <p class="lead fw-normal mb-0" style="font-size: 30px;">Change your Password for</p>
                        <h5><?= $this->session->userdata('reset_password') ?></h5>
                    </div>


                    <?= $this->session->flashdata('message'); ?>
                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password1" id="password1" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">New Password</label>
                    </div>
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="form-outline mb-3   ">
                        <input type="password" name="password2" id="password2" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Repeat Password</label>
                    </div>
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>

                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Change Password</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</section>