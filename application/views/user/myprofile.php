    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="rowa">
                <div class="col-lg-12">
                    <h3 mb-4 text-gray-800><i class="fas fa-fw fa-user"></i><?= $title; ?></h3>
                </div>
            </div>

            <br>


            <div class="col-lg-4">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                    </div>
                    <div class="team-content">
                        <h3 class="name"><?= $user['name']; ?></h3>
                        <!-- <h4 class="title"><?= $role['role']; ?></h4> -->
                    </div>
                    <ul class="social">
                        <li class="sejak">Sejak <?= date('d M Y', $user['date_created']); ?></li>
                    </ul>
                </div>
            </div>

            <!--main content end-->
        </section>
        <!-- container section start -->