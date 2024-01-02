<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?= base_url('assets/') ?>img/bg.jpg" class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" class="needs-validation" action="<?=base_url('Auth/forgotpassword');?>">
                    <div class="text-center fw-bold mx-3 mb-4">
                        <p class="lead fw-normal mb-0" style="font-size: 30px;">Forgot Your Password</p>

                       
                    </div>

                   
                    <?= $this->session->flashdata('message'); ?>
                    <!-- Email input -->
                    <div class="form-outline mb-1">
                        <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" value="<?= set_value('email'); ?>" placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>



                    

                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Reset Password</button>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Back To Login <a href="<?= base_url('Auth/index') ?>" class="link-danger">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>