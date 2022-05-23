            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="col-lg-12">
                    <h3 mb-4 text-gray-800><i class="fa fa-fw fa-folder-open"></i><?= $title; ?></h3>
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
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Submenu</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Active</th>
                                    <th scope="col" colspan="2">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td><?= $sm['is_active']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Menu/hapus/<?php echo $sm['id'] ?>" class="badge badge-danger"> Hapus</a>
                                            <a href="<?php echo base_url() ?>Menu/edit_submenu/<?php echo $sm['id'] ?>" class="badge badge-info">Edit</a>
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
            <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Submenu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('menu/submenu'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan nama submenu">
                                </div>
                                <div class="form-group">
                                    <select name="menu_id" id="menu_id" class="form-control">

                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan url submenu">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan icon submenu">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                        <label for="is_active" class="form-check-label">Apakah aktif?</label>
                                    </div>
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