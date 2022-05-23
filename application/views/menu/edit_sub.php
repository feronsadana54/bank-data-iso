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
                        <form action="<?= base_url('menu/updatesubmenu'); ?>" method="post">
                        <?php foreach ($user_sub as $um) { ?>
                            <div class="form-group">
                                    <label for="name">Masukkan Role</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $uri ?>">
                                    <select class="custom-select" id="menu_id" name="menu_id">
                                        <?php foreach ($menu as $m) { ?>
                                            <option value="<?= $m['id']; ?>" <?php if ($m['id'] == $um['menu_id']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $m['menu']; ?></option>
                                        <?php } ?>
                                    </select>

                                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="title">Masukkan Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $um['title']; ?>">     
                            </div>
                            <div class="form-group">
                                <label for="url">Masukkan URL</label>
                                <input type="text" class="form-control" id="url" name="url" value="<?php echo $um['url']; ?>">     
                            </div>
                            <div class="form-group">
                                <label for="icon">Masukkan ICON</label>
                                <input type="text" class="form-control" id="icon" name="icon" value="<?php echo $um['icon']; ?>">     
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            <?php } ?>
                        </form>

                    </div>
                </div>
            </div>

            <!--main content end-->
        </section>
        <!-- container section start -->