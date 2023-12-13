<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?= base_url('assets/') ?>img/bg.jpg" class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" class="needs-validation" action="">
                <div class="text-center fw-bold mx-3 mb-0">
                        <p class="lead fw-normal mb-0" style="font-size: 30px;">Sign in with</p>

                        <button type="button" class="btn btn-success btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <!-- Email input -->
                    <div class="form-outline mb-1">
                        <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" value="<?= set_value('email'); ?>" placeholder="Enter a valid email address" />
                        <label class="form-label" for="form3Example3">Email address</label>                        
                    </div>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    
                    

                    <!-- Password input -->
                    <div class="form-outline mb-1">
                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" value="<?= set_value('password'); ?>" placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?= base_url('Auth/register')?>" class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
