          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account /</span> Account Settings </h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="<?= base_url('Nasabah/profile') ?>"><i class="bx bx-user me-1"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?= base_url('Nasabah/editProfile') ?>"><i class="bx bx-bell me-1"></i> Edit Profile</a>
                    </li>

                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <form action="<?= base_url('Nasabah/updateProfile') ?>" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="col-sm-12">
                          <label for="upload" class="form-label">Foto Profil</label>
                          <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="<?= base_url("assets") ?>/img/profile/<?= $nasabah['gambar']; ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper col-md-8">
                              <div class="mb-3 col-sm-5">
                                <input type="file" name="profile_picture" class="form-control" id="upload" accept="image/png, image/jpeg" />
                              </div>
                              <div class="col-sm-5 d-flex align-items-center">
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" onclick="resetFileInput()">
                                  <i class="bx bx-reset d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Reset</span>
                                </button>
                                <p class="text-muted mb-0 ms-3">Allowed JPG, GIF or PNG. Max size of 800K</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <hr class="my-0" />
                      <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nama Lengkap</label>
                          <input type="text" class="form-control" id="nama" name="nama" value="<?= $nasabah['nama']; ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Alamat</label>
                          <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $nasabah['alamat']; ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Jenis Kelamin</label>
                          <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $nasabah['jenis_kelamin']; ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">No Hp</label>
                          <input type="text" class="form-control" name="no_hp" value="<?= $nasabah['no_hp']; ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <input type="text" class="form-control" name="email" value="<?= $nasabah['email']; ?>" />
                            <span class="input-group-text" id="email">@example.com</span>
                          </div>
                          <div class="form-text mb-3 ">You can use letters, numbers & periods</div>

                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

                        </div>
                    </form>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                          <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account tombol-hapus">Deactivate Account</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">

            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
          </div>

          <!-- Overlay -->
          <div class="layout-overlay layout-menu-toggle"></div>
          </div>
          <!-- / Layout wrapper -->