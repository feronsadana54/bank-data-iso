x
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><?= $title; ?></h3>
            </div>
        </div>

        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php foreach ($user_kat as $u) { ?>
                                    <?php echo form_open_multipart('joint/editUpload'); ?>
                                    <input type="hidden" name="id" value="<?php echo $u->id ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="<?= $data['judul']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="bulan" name="bulan" placeholder="<?= $data['bulan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="<?= $data['tahun']; ?>" readonly>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="file" name="userfile" size="20">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary"> Edit Data</button>
                                <?php } ?>
                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </section>
    <!--main content end-->
</section>
<!-- container section start -->