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

            <br>

            <div class="rowa">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo form_open_multipart('joint/inputiso'); ?>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">
                                        </div>
                                        <div class="form-group">
                                            <select name="kategori" id="kategori" class="form-control">
                                                <?php foreach ($judul as $j) : ?>
                                                    <option value="<?= $j['id']; ?>"><?= $j['kategori']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
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
                                        <!--  <br>
                                        <div class="form-group">
                                            <input type="file" name="userfile" size="20">
                                        </div> -->


                                    </div>
                                    <div class="modal-footer">
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