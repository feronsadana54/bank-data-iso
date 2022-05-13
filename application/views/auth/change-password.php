<div class="container h-100">
    <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
            <div class="brand">
                <img src="<?= base_url() ?>assets/img/logo.png" alt="logo">
            </div>

            <div class="card fat">
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900">Ubah Password untuk</h1>
                        <h5 class="mb-4"><?= $this->session->userdata('reset_username'); ?></h5>
                    </div>

                    <?= $this->session->flashdata('message'); ?>
                    <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password Baru" size="50">
                            <?php echo form_error('password1'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password Baru" size="50">
                            <?php echo form_error('password2'); ?>
                        </div>
                        <div class="form-group m-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                Ubah Password
                            </button>
                        </div>
                        <hr>
                        <div class="mt-4 text-center"><a href="<?= base_url('auth'); ?>">Kembali ke login</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="footer">
                Copyright &copy; &mdash; PT Kereta Api Indonesia DIVRE III Palembang
                <br> 13 Ulu, Kec. Seberang Ulu II, Kota Palembang, Sumatera Selatan
            </div>

        </div>
    </div>
</div>