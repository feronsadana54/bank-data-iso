<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                            <div class="form-group">
                                <input type="username" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username" value="<?php echo set_value('username'); ?>" size="50">
                                <?php echo form_error('username'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Reset Password
                            </button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Kembali ke login</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer">
        Copyright &copy; &mdash; PT Kereta Api Indonesia DIVRE III Palembang
        <br> 13 Ulu, Kec. Seberang Ulu II, Kota Palembang, Sumatera Selatan
    </div>

</div>