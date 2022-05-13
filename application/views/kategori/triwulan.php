    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="rowa">
                <div class="col-lg-12">
                    <h3 mb-4 text-gray-800><i class="fas fa-fw fa-check-square"></i>ISO</h3>
                </div>
            </div>

            <?= $this->session->flashdata('message'); ?>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <br>

            <div class="rowa">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo form_open_multipart('joint/halaman_triwulan'); ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Judul File</p>
                                            <select name="judul_file" id="judul_file" class="form-control">

                                                <?php foreach ($getjudul as $gj) : ?>
                                                    <option value="<?= $gj['judul']; ?>"><?= $gj['judul']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Kode Bussinnes Area</p>
                                            <input type="text" class="form-control" id="bussinnes_area" name="bussinnes_area" placeholder="masukkan kode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>File</p>
                                            <input type="file" name="userfile" size="20" class="form-control">
                                        </div>
                                    </div>



                                    <!-- <div class="form-group">
                        <select name="bulan" id="bulan" class="form-control">
                          <option value="Januari">Januari</option>
                          <option value="Februari">Februari</option>
                          <option value="Maret">Maret</option>
                          <option value="April">April</option>
                          <option value="Mei">Mei</option>
                          <option value="Juni">Juni</option>
                          <option value="Juli">Juli</option>
                          <option value="Agustus">Agustus</option>
                          <option value="September">September</option>
                          <option value="Oktober">Oktober</option>
                          <option value="November">November</option>
                          <option value="Desember">Desember</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <select name="tahun" id="tahun" class="form-control">
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                          <option value="2025">2025</option>
                        </select>
                      </div> -->
                                    <!-- <br>
                      <div class="form-group">
                        <input type="file" name="userfile" size="20">
                      </div> -->


                                </div>
                                <div class="final">
                                    <button type="submit" class="btn btn-primary" value="upload">Tambah</button>
                                </div>
                                </form>
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