<div class="container-xxl flex-grow-1 container-p-y ">
    <div class="row">
        <div class="col-lg-8 mb-4 order-1 mb-3 mx-4">

            <div class="card">
                <h5 class="card-header">
                    <?= $judul; ?>
                </h5>
                <div class="mb-3 mx-4">
                    <form action="<?=base_url('Admin/prosesInsertPoin')?>" method="post">
                    <label for="defaultSelect" class="form-label mb-0 col-8">Pilih Nasabah</label>
                    <select name="id_nasabah" required class="form-select col-8">
                        <?php foreach ($nasabah_list as $nasabah): ?>
                            <option value="<?php echo $nasabah['id_nasabah']; ?>">
                                <?php echo $nasabah['nama']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 mx-4">
                    <label for="defaultSelect" class="form-label mb-0 col-8">Pilih Sampah</label>
                    <select name="id_sampah" required class="form-select col-8">
                        <?php foreach ($sampah_list as $sampah): ?>
                            <option value="<?php echo $sampah['id_sampah']; ?>">
                                <?php echo $sampah['nama']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="mb-3 mx-4">
                    <label for="defaultFormControlInput" class="form-label mb-0">Berat Sampah</label>
                    <input type="text" class="form-control" id="defaultFormControlInput"
                        placeholder="Masukkan Berat Sampah" name="berat" aria-describedby="defaultFormControlHelp" />
                </div>
                <div class="row justify-content">
                    <div class="col-sm-10 mb-3 mx-4">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
                </form>
            </div>
        </div>