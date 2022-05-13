    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="rowa">
                <div class="col-lg-12">
                    <h3 mb-4 text-gray-800><i class="fas fa-fw fa-key"></i><?= $title; ?></h3>
                </div>
            </div>

            <aside>
                <div class="center">
                    <div class="ava"> <img src="<?= base_url() ?>assets/img/LOGO-CP.jpg" alt="logo">  
                </div>
            </aside>
        
         <article>
            <div class="container">
                
                <div class="boxcp">
                    <div class="col-CP">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('user/changepassword'); ?>" method="POST">
                            <div class="form-group">
                                <label for="current_password">Password lama</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?php echo form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1">Password Baru</label>
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?php echo form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?php echo form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </article>

            <!--main content end-->
        </section>
        <!-- container section start -->
        </section>