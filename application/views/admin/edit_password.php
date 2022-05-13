    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="rowa">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i>Kereta Api Indonesia </h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i>Home</li>
                        <li><i class="fa fa-laptop"></i><?= $title; ?></li>
                    </ol>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('admin/updatepassword'); ?>" method="post">
                            <div class="form-group">
                                <?php foreach ($user_edit as $u) { ?>
                                    <label for="name">Masukkan Password</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $u->id ?>">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru">
                                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            <?php } ?>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>