<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="col-lg-12">
        <h3 mb-4 text-gray-800><i class="fa fa-fw fa-folder"></i><?= $title; ?></h3>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">Silahkan diisi formnya</div>') ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newJointModal">Tambah Iso</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ISO</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($judul as $j) : ?>

                        <tr>
                            <th scope="row">
                                <?= $i; ?>
                            </th>
                            <td>
                                <?= $j['judul']; ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url() ?>joint/edit_iso/<?php echo $j['id_judul'] ?>"></span><span class="badge badge-success">Edit</span></a>
                                <a href="<?php echo base_url() ?>joint/hapus_iso/<?php echo $j['id_judul'] ?>"><span class="badge badge-danger">Delete</span></a>
                            </td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newJointModal" tabindex="-1" role="dialog" aria-labelledby="newJointModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">ISO title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('joint/inputIso'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Input ISO</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan ISO">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>