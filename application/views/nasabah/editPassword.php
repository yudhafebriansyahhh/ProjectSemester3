          <!-- Content wrapper -->
          <div class="content-wrapper">

              <!-- Content -->
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
              <div class="container-xxl flex-grow-1 container-p-y">
                  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account /</span> Account Settings </h4>

                  <div class="row">
                      <div class="col-md-6">
                          <ul class="nav nav-pills flex-column flex-md-row mb-3">
                              <li class="nav-item">
                                  <a class="nav-link" href="<?= base_url('Nasabah/profile') ?>"><i class="bx bx-user me-1"></i> Profile</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?= base_url('Nasabah/editProfile') ?>"><i class="bx bx-edit-alt me-1"></i> Edit Profile</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link active" href="<?= base_url('Nasabah/changePassword') ?>"><i class="bx bxs-key me-1"></i> Change Password</a>
                              </li>

                              </li>
                          </ul>
                          <div class="card mb-4">
                              <h4 class="card-header"><?= $judul; ?></h4>
                              <!-- Account -->
                              <form action="<?= base_url('Nasabah/changePassword') ?>" method="post" enctype="multipart/form-data">
                                  <hr class="my-0" />
                                  <div class="card-body">
                                      <div class="mb-3">
                                          <label class="form-label" for="basic-default-fullname">Current Password</label>
                                          <input type="password" class="form-control" id="currentPassword" name="currentPassword"" />
                                          <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                                      </div>
                                      <div class=" mb-3">
                                          <label class="form-label" for="basic-default-company">New Password</label>
                                          <input type="password" class="form-control" id="newPassword1" name="newPassword1" />
                                          <?= form_error('newPassword1', '<small class="text-danger pl-3">', '</small>'); ?>
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label" for="basic-default-company">Recreate New Password</label>
                                          <input type="password" class="form-control" id="newPassword2" name="newPassword2" />
                                          <?= form_error('newPassword2', '<small class="text-danger pl-3">', '</small>'); ?>
                                      </div>
                                      <div class="mb-3">

                                          <button type="submit" class="btn btn-primary">Ubah Password</button>

                                      </div>
                              </form>
                              <!-- /Account -->
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