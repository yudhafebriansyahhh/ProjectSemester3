<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?= base_url('assets/') ?>img/bg.jpg" class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" class="needs-validation" action="">
                <div class="text-center fw-bold mx-3 mb-0">
                        <p class="lead fw-normal mb-0" style="font-size: 30px;">Registrasi</p>

                       
                    </div>

                    <div class="divider d-flex align-items-center my-4">

                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <!-- Email input -->

                    <div class="form-outline mb-1">
                        <input type="text" name="nama" id="form3Example3" class="form-control form-control-lg" value="<?= set_value('nama'); ?>" placeholder="Masukkan nama" />
                        <label class="form-label" for="form3Example3">Nama</label>                        
                    </div>
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    
                    <div class="form-outline mb-1">
                        <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" value="<?= set_value('email'); ?>" placeholder="Masukkan Email" />
                        <label class="form-label" for="form3Example3">Email address</label>                        
                    </div>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    
                    <!-- Password input -->
                    <div class="form-outline mb-1">
                        <input type="password" name="password1" id="form3Example4" class="form-control form-control-lg" value="<?= set_value('password'); ?>" placeholder="Masukkan Password" />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>

                    <div class="form-outline mb-1">
                        <input type="password" name="password2" id="form3Example4" class="form-control form-control-lg" value="<?= set_value('password2'); ?>" placeholder="Masukkan Password" />
                        <label class="form-label" for="form3Example4">ReType-Password</label>
                    </div>
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>

                    <div class="form-outline mb-1">
                        <input type="text" name="alamat" id="form3Example3" class="form-control form-control-lg" value="<?= set_value('alamat'); ?>" placeholder="Masukkan Alamat" />
                        <label class="form-label" for="form3Example3">Alamat</label>                        
                    </div>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    
                    <div class="form-outline mb-1">
                        <input type="text" name="no_hp" id="form3Example3" class="form-control form-control-lg" value="<?= set_value('no_hp'); ?>" placeholder="Masukkan No Hp" />
                        <label class="form-label" for="form3Example3">No hp</label>                        
                    </div>
                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    <br>
                    
                    <div class="form-group">
                        <select class="form-select" name="jenis_kelamin" value="<?= set_value('jenis_kelamin');?>" aria-label="Default select example">
                            <option selected>Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label class="form-label" for="form3Example3"></label>
                    </div>
                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>

                    <div class="d-flex justify-content-between align-items-center">

                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="<?= base_url('Auth')?>" class="link-danger">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
