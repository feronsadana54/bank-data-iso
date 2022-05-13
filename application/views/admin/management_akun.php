            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="col-lg-12">
                    <h3 mb-4 text-gray-800><i class="fa fa-fw fa-tasks"></i><?= $title; ?></h3>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-6">

                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAkunModal">Tambah Akun</a>
                        <br>
                        <label for="keterangan" class="mr">
                            Keterangan
                            <br> 1 : Admin <br>
                            2 : User
                            <br> 3 : Manager
                        </label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal Akun</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($manage as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['name']; ?></td>
                                        <td><?= $m['username']; ?></td>
                                        <td><?= $m['role_id']; ?></td>
                                        <td><?= date('d M Y', $m['date_created']); ?></td>
                                        <td>

                                            <a href="<?php echo base_url() ?>admin/edit/<?php echo $m['id'] ?>" class="badge badge-primary"> Edit</a>
                                            <a href="<?php echo base_url() ?>admin/hapus_data/<?php echo $m['id'] ?>" class="badge badge-danger"> Hapus</a>
                                            <a href="<?php echo base_url() ?>admin/editpassword/<?php echo $m['id'] ?>" class="badge badge-danger"> Ubah Password</a>

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


            </div>
            <!-- End of Main Content -->

            <!-- Modal -->

            <!-- Modal -->
            <div class="modal fade" id="newAkunModal" tabindex="-1" role="dialog" aria-labelledby="newAkunModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newAkunModalLabel">Tambah akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/manageakun'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
                                </div>
                                <div class="form-group">
                                    <select name="akun_id" id="akun_id" class="form-control">

                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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