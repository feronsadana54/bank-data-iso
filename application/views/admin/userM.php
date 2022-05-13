 <!--main content start-->
 <section id="main-content">
     <section class="wrapper">
         <!--overview start-->
         <div class="row">
             <div class="col-lg-12">
                 <h3 class="page-header"><?= $title; ?></h3>

             </div>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <section class="panel">

                     <div class="panel-body">
                         <div class="tab-pane" id="chartjs">
                             <div class="row">
                                 <div class="col-lg-6">
                                     <section class="panel">
                                         <?= $this->session->flashdata('messsage'); ?>
                                         <form class="form-horizontal " method="post" action="<?= base_url(); ?>Admin/user_management">


                                             <!-- Kategori File -->
                                             <table class="table table-striped table-dark">
                                                 <thead>
                                                     <tr>
                                                         <th scope="col">No</th>
                                                         <th scope="col">Nama</th>
                                                         <th scope="col">Username</th>
                                                         <th scope="col">Role</th>
                                                         <th scope="col" colspan="2">AKSI</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php $i = 1; ?>
                                                     <?php foreach ($users as $s) : ?>
                                                         <tr>
                                                             <th scope="row"><?= $i; ?></th>
                                                             <td><?= $s['name']; ?></td>
                                                             <td><?= $s['username']; ?></td>
                                                             <td><?= $s['role_id']; ?></td>
                                                             <td>

                                                                 <a href="<?php echo base_url() ?>admin/edit/<?php echo $s['id'] ?>" class="badge badge-primary"> Edit</a>
                                                                 <a href="<?php echo base_url() ?>Admin/hapus_data/<?php echo $s['id'] ?>" class="badge badge-danger"> Hapus</a>

                                                             </td>

                                                         </tr>

                                                         <?php $i++; ?>
                                                     <?php endforeach; ?>
                                                 </tbody>
                                             </table>
                                         </form>
                                     </section>
                                 </div>
                             </div>
                         </div>
                     </div>
             </div>
         </div>
         </div>