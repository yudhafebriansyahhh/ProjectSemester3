          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account /</span> Account Settings </h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="<?= base_url('Nasabah/profile') ?>"><i class="bx bx-user me-1"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= base_url('Nasabah/editProfile') ?>"><i class="bx bx-edit-alt me-1"></i> Edit Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= base_url('Nasabah/changePassword') ?>"><i class="bx bxs-key me-1"></i> Change Password</a>
                    </li>

                    </li>
                  </ul>
                  <div class="card col-sm-8 mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <div class="row">
                      <div class="col-md-2 mx-3">
                        <img src="<?= base_url("assets") ?>/img/profile/<?= $nasabah['gambar']; ?>" alt="user-avatar" class="d-block rounded " height="180" width="180" id="uploadedAvatar" />
                      </div>
                      <div class="col-md-6 mx-auto">
                        <h2 class="text-end-center fw-medium mb-0"><?= $nasabah['nama']; ?></h2>
                        <h5 class="text-end-center fw-light mb-1"><?= $nasabah['email']; ?></h5>
                        <p class="text-start-center fw-light mb-1"><?= $nasabah['alamat']; ?></p>
                        <p class="text-end-center fw-light mb-1"><?= $nasabah['jenis_kelamin']; ?></p>
                        <p class="text-end-center fw-light mb-3"><?= $nasabah['no_hp']; ?></p>
                        <h5 class="text-end-center fw-light mb-1">Bergabung sejak <?= date('d F Y', strtotime($nasabah['date_created'])); ?></h5>


                      </div>
                    </div>
                    <!-- Account -->
                    <div class="card-body">
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