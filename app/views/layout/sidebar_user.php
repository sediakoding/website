    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="<?= base_url() ?>/assets/img/logo-small.png">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="#" class="simple-text logo-normal">
                <?= namaAPP ?>
                <!-- <div class="logo-image-big">
            <img src="<?= base_url() ?>/assets/img/logo-big.png">
          </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="<?= isset($beranda) ? $beranda : '' ?>">
                    <a href="<?= base_url() ?>">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?= isset($listRooms) ? $listRooms : '' ?>">
                    <a href="<?= base_url() ?>C_hotel">
                        <i class="nc-icon nc-bullet-list-67"></i>
                        <p>Kamar Hotel</p>
                    </a>
                </li>

                <li class="active-pro">
                    <a href="<?= base_url() ?>/upgrade.html">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>