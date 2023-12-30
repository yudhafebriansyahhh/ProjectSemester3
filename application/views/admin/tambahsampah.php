<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"> <?= $judul; ?></h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">

      <div class="col-8">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Sampah</h5>
          </div>
          <div class="card-body">
            <form action="<?= base_url('Sampah/upload') ?>" method="post">

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Sampah</label>
                <div class="col-sm-8">
                  <div class="input-group input-group-merge">
                    <!-- <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span> -->
                    <input type="text" class="form-control" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" name="nama" class="form-control" id="nama" placeholder="Masukkan nama sampah" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Jenis</label>
                <div class="col-sm-8">
                  <div class="input-group input-group-merge">
                    <select class="form-select" id="exampleFormControlSelect1" name="jenis" aria-label="Default select example">
                      <option selected>Jenis Sampah</option>
                      <option value="Organik">Organik</option>
                      <option value="Anorganik">Anorganik</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Poin</label>
                <div class="col-sm-8">
                  <div class="input-group input-group-merge">
                    
                    <input type="text" class="form-control" id="basic-icon-default-fullname" aria-describedby="basic-icon-default-fullname2" name="point" class="form-control" id="point" placeholder="Masukkan jumlah poin" />
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