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
                        <form action="<?= base_url('menu/updatemenu'); ?>" method="post">
                            <div class="form-group">
                                <?php foreach ($user_menu as $um) { ?>
                                    <label for="name">Masukkan Nama</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $um->id ?>">
                                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan nama" value="<?php echo $um->menu ?>">

                                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            <?php } ?>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!--main content end-->
        </section>
        <!-- container section start -->