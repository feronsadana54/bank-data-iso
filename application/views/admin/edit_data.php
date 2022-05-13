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
                        <form action="<?= base_url('admin/update'); ?>" method="post">
                            <div class="form-group">
                                <?php foreach ($user_edit as $u) { ?>
                                    <label for="name">Masukkan Nama</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $u->id ?>">

                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="<?php echo $u->name ?>">

                                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Masukkan Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="<?php echo $u->username ?>">
                                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="role_id">Pilih Role</label>
                                <select name="role_id" id="role_id" class="form-control">

                                    <?php foreach ($role as $r) : ?>
                                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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