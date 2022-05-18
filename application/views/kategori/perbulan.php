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
                                    <?php echo form_open_multipart('joint/perbulan'); ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Judul File</p>
                                            <select name="id_judul" id="id_judul" class="form-control">

                                                <?php foreach ($getjudul as $gj) : ?>
                                                    <option value="<?= $gj['id_judul']; ?>"><?= $gj['judul']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Bisnis area</p>
                                            <input type="text" class="form-control" id="bisnis_area" name="bisnis_area" placeholder="masukkan kode">
                                        </div>
                                    </div>

                                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="2" hidden>

                                    <div class="form-group">
                                        <div class="row">
                                            <p>File</p>
                                            <input type="file" name="nama_berkas" size="20" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="final">
                                    <button type="submit" class="btn btn-primary" value="upload">Tambah</button>
                                </div>
                                <br>
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