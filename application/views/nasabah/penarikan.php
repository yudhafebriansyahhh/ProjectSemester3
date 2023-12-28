<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-1">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="card">
                <form action="<?= base_url('Nasabah/penarikan') ?>" method="post">
                    <h5 class="card-header"><?= $judul; ?></h5>
                    <div class="mb-3 mx-4">
                        <label for="defaultSelect" class="form-label mb-0 col-8">Pilih Metode Pembayaran</label>
                        <select id="defaultSelect" name="metode" class="form-select col-8">
                            <option>Default select</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Dompet Digital">Dompet Digital</option>
                        </select>
                    </div>

                    <!-- Formulir Bank Transfer -->
                    <div class="mb-3 mx-4 bank-form" style="display: none;">
                        <label for="defaultSelectBank" class="form-label mb-0 col-8">Pilih Bank</label>
                        <select id="defaultSelectBank" name="jenis_bank" class="form-select col-8">
                            <option>Default select</option>
                            <option value="Bank BRI">Bank BRI</option>
                            <option value="Bank BNI">Bank BNI</option>
                            <option value="Bank BCA">Bank BCA</option>
                            <option value="Bank Mandiri">Bank Mandiri</option>
                            <option value="Bank Syariah Mandiri">Bank Syariah Mandiri</option>
                        </select>
                    </div>
                    <div class="mb-3 mx-4 bank-form" style="display: none;">
                        <label for="defaultFormControlInputBank" class="form-label mb-0">No Rekening</label>
                        <input type="text" class="form-control" id="defaultFormControlInputBank" name="nomor_rekening" placeholder="Masukkan Nomor Rekening" aria-describedby="defaultFormControlHelp" />
                    </div>

                    <!-- Formulir Dompet Digital -->
                    <div class="mb-3 mx-4 dompet-form" style="display: none;">
                        <label for="defaultSelectDompet" class="form-label mb-0 col-8">Pilih Dompet Digital</label>
                        <select id="defaultSelectDompet" name="jenis_dompet" class="form-select col-8">
                            <option value="Dana">Dana</option>
                            <option value="Go-Pay">Go-Pay</option>
                            <option value="Shopee Pay">Shopee Pay</option>
                            <option value="OVO">OVO</option>
                            <option value="Link Aja">Link Aja</option>
                        </select>
                    </div>
                    <div class="mb-3 mx-4 dompet-form" style="display: none;">
                        <label for="defaultFormControlInputDompet" class="form-label mb-0">No Handphone</label>
                        <input type="text" class="form-control" id="defaultFormControlInputDompet" name="nomor_hp" placeholder="Masukkan Nomor Handphone" aria-describedby="defaultFormControlHelp" />
                    </div>
                    <div class="mb-3 mx-4">
                        <label for="JumlahPembayaran" class="form-label mb-0 col-8">Jumlah Penarikan</label>
                        <div class="input-group input-group-merge mb-3 col-8">
                            <span class="input-group-text">Rp. </span>
                            <input type="number" class="form-control" id="defaultFormControlInputDompet" name="jumlah_tarik" placeholder="Masukkan Jumlah Penarikan" aria-describedby="defaultFormControlHelp" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 mx-4">Request Penarikan</button>
                </form>
            </div>
        </div>