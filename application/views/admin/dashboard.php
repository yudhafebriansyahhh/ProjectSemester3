<!-- / Navbar -->

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card">
          <div class="card-body" style="height: 180px; display: flex; align-items: center;">
            <div class="col-lg-2 flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" style="fill: currentColor;">
                <path class="text-primary" d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm1.5 1H8c-3.309 0-6 2.691-6 6v1h15v-1c0-3.309-2.691-6-6-6z"></path>
                <path class="text-primary" d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 
        0 0 1-1.072 2.986l-1.192 1.192 1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z"></path>
              </svg>
            </div>
            <div class="col-lg-4 mx-auto">
              <span class="mb-3">Jumlah User</span>
              <h2 class="card-title text-nowrap mb-1"><?= $jmlhNasabah ?></h2>
            </div>
            <a href="<?= base_url('Admin/userData') ?>">Details</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card">
          <div class="card-body" style="height: 180px; display: flex; align-items: center;">
            <div class="col-lg-2 flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" style="fill: currentColor;">
                <path class="text-warning" d="M20 4H4c-1.103 0-2 .897-2 2v2h20V6c0-1.103-.897-2-2-2zM2 18c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-6H2v6zm3-3h6v2H5v-2z"></path></svg>
            </div>
            <div class="col-lg-4 mx-auto">
              <span class="mb-3">Proses Pembayaran</span>
              <h2 class="card-title text-nowrap mb-1"><?= $jumlahMenungguPembayaran ?></h2>
            </div>
            <a href="<?= base_url('Admin/konfirmasiPembayaran') ?>">Details</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card">
          <div class="card-body" style="height: 180px; display: flex; align-items: center;">
            <div class="col-lg-2 flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" style="fill: currentColor;">
              <path class="text-info" d="M19.15 8a2 2 0 0 0-1.72-1H15V5a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 1 1.73 3.49 3.49 0 0 0 7 .27h3.1a3.48 3.48 0 0 0 6.9 
              0 2 2 0 0 0 2-2v-3a1.07 1.07 0 0 0-.14-.52zM15 9h2.43l1.8 3H15zM6.5 19A1.5 1.5 0 1 1 8 17.5 1.5 1.5 0 0 1 6.5 19zm10 0a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5z"></path></svg>
            </div>
            <div class="col-lg-4 mx-auto">
              <span class="mb-3">Proses Penjemputan</span>
              <h2 class="card-title text-nowrap mb-1"><?= $jumlahMenungguPenjemputan ?></h2>
            </div>
            <a href="<?= base_url('Admin/konfirmasiPembayaran') ?>">Details</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card">
          <div class="card-body" style="height: 180px; display: flex; align-items: center;">
            <div class="col-lg-2 flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" style="fill: currentColor;">
              <path class="text-success" d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
            </div>
            <div class="col-lg-4 mx-auto">
              <span class="mb-3">Total Sampah Organik</span>
              <h2 class="card-title text-nowrap mb-1"><?= $jmlhSampahOrganik ?> KG</h2>
            </div>
            <a href="<?= base_url('Admin/insertPoin') ?>">Details</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card">
          <div class="card-body" style="height: 180px; display: flex; align-items: center;">
            <div class="col-lg-2 flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" style="fill: currentColor;">
              <path class="text-danger" d="M15 9.783V4h1V2H8v2h1v5.783l-4.268 9.389a1.992 1.992 0 0 0 .14 1.911A1.99 1.99 0 0 0 6.553 22h10.895a1.99 1.99 0 0 0 
              1.681-.917c.37-.574.423-1.289.14-1.911L15 9.783zm-4.09.631c.06-.13.09-.271.09-.414V4h2v6c0 .143.03.284.09.414L15.177 15H8.825l2.085-4.586z"></path></svg>
            </div>

            <div class="col-lg-4 mx-auto">
              <span class="mb-3">Total Sampah Anorganik</span>
              <h2 class="card-title text-nowrap mb-1"><?= $jmlhSampahAnorganik ?> KG</h2>
            </div>
            <a href="<?= base_url('Admin/insertPoin') ?>">Details</a>
          </div>
        </div>
      </div>



      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>


  <!-- / Layout wrapper -->