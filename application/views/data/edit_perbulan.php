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
                        <?php foreach ($user_kat as $u) { ?>
                            <?php echo form_open_multipart('joint/update_perbulan'); ?>
                            <input type="hidden" name="id" value="<?php echo $u->id ?>">
                            <div class="form-group">
                                <label for="nama_file">Nama File</label>
                                <input type="text" class="form-control" id="nama_file" name="nama_file" placeholder="Masukkan nama file">
                                <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="judul_file">Judul File</label>
                                <input type="text" class="form-control" id="judul_file" name="judul_file" value="<?= $perbulan['judul_file']; ?>" readonly>
                                <?php echo form_error('url', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="bisnis_area">Bisnis Area</label>
                                <input type="text" class="form-control" id="bisnis_area" name="bisnis_area" placeholder="Masukkan kode bisnis area">
                            </div>
                            <div class="form-group">
                                <label for="mengetahui">Mengetahui</label>
                                <input type="text" class="form-control" id="mengetahui" name="mengetahui" placeholder="Masukkan nama mengetahui">
                            </div>
                            <div class="form-group">
                                <label for="petugas">Petugas</label>
                                <input type="text" class="form-control" id="petugas" name="petugas" placeholder="Masukkan nama petugas">
                            </div>
                            <!-- <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" id="bulan" class="form-control">
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">tahun</label>
                                <select name="tahun" id="tahun" class="form-control">
                                    <option value="<?= $perbulan['tahun']; ?>">Data Saat ini tahun : <?= $perbulan['tahun']; ?></option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div> -->


                            <div class=" form-group">
                                <button type="submit" class="btn btn-primary">Ubah Menu</button>
                            </div>
                    </div>
                    </form>
                <?php } ?>
                </div>
            </div>
            </div>

            <!--main content end-->
        </section>
        <!-- container section start -->