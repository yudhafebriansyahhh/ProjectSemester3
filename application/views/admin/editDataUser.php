<div class="layout-page">
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mt-3">
                <h5 class="card-header"><?php echo $judul; ?></h5>
                <div class="card-body">
                    <form action="<?= base_url('admin/prosesEditData/'.$nasabah['id_nasabah']); ?>" method="post">
                        <input type="hidden" name="id_nasabah" value="<?= $nasabah['id_nasabah']; ?>">
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nasabah['nama']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $nasabah['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?= $nasabah['password']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $nasabah['alamat']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" <?= ($nasabah['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= ($nasabah['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="tel" class="form-control" id="no_hp" name="no_hp" value="<?= $nasabah['no_hp']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="saldo" class="form-label">Saldo</label>
                            <input type="number" class="form-control" id="saldo" name="saldo" value="<?= $nasabah['saldo']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="poin" class="form-label">Point</label>
                            <input type="number" class="form-control" id="poin" name="poin" value="<?= $nasabah['poin']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
