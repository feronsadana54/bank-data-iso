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
                        <?php foreach ($temp as $fi) { ?>
                            <?php echo form_open_multipart('joint/update_triwulan');?>
                            <input type="hidden" name="id" value="<?php echo $fi->id ?>">
                            <input type="hidden" name="id_judul" value="<?php echo $fi->id_judul ?>">
                            <div class="form-group">
                                <label for="nama">Nama Berkas</label>
                                <input type="text" class="form-control" id="nama_berkas_lama" name="nama_berkas_lama" placeholder="Masukkan nama file" value="<?= $fi->nama_berkas; ?>" readonly>
                                <input type="file" class="form-control-file mt-3" name="nama_berkas" id="nama_berkas">
                                <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="bisnis_area">Bisnis Area</label>
                                <input type="text" class="form-control" id="bisnis_area" name="bisnis_area" placeholder="Masukkan kode bisnis area" value="<?= $fi->bisnis_area ?>">
                            </div>
                            <div class=" form-group">
                                <button type="submit" class="btn btn-primary" value="upload">Submit</button>
                            </div>
                            </div>
                    </form>
                    <?php } ?>
                </div>
            </div>

            <!--main content end-->
        </section>
        <!-- container section start -->