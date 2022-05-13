    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="rowa">
                <div class="col-lg-12">
                    <h3 class="page-header"><?= $title; ?></h3>

                </div>
            </div>



            <div class="rowa">
                <div class="col-lg-12">
                    <section class="panel">

                        <div class="panel-body">
                            <div class="tab-pane" id="chartjs">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <section class="panel">


                                            <?= $this->session->flashdata('messsage'); ?>
                                            <div class="navbar-form navbar-right">
                                                <form class="form-horizontal " method="post" action="<?= base_url(); ?>joint/search">

                                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                            </div>
                                            </form>
                                            <form class="form-horizontal " method="post" action="<?= base_url(); ?>joint/komputer">



                                                <!-- Kategori File -->
                                                <table class="table table-striped table-dark" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Judul</th>
                                                            <th scope="col">Nama Berkas</th>
                                                            <th scope="col">Tanggal Input</th>
                                                            <th scope="col">bussinnes_area</th>
                                                            <th scope="col" colspan="2">AKSI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($data as $d) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $d['judul_file']; ?></td>
                                                                <td><?= $d['nama_berkas']; ?></td>
                                                                <td><?= $d['tanggal']; ?></td>
                                                                <td><?= $d['bussinnes_area']; ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url() ?>Joint/hapus_data_triwulan/<?php echo $d['id'] ?>" class="badge badge-danger"> Hapus</a>
                                                                    <a href="<?php echo base_url(); ?>Joint/download_triwulan/<?php echo $d['nama_berkas']; ?>" class="badge badge-success"> Download</a>
                                                                </td>
                                                            </tr>

                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>

                                        </section>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
        </section>
        </div>
        </dixv>

    </section>
    <!--main content end-->
    </section>
    <!-- container section start -->