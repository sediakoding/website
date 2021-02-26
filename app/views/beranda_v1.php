<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
<?php
require 'layout/head.php';
?>

<body class="">
    <div class="wrapper ">
        <?php
        require 'layout/sidebar.php';
        ?>
        <div class="main-panel">

            <!-- Navbar -->
            <?php
            require 'layout/header.php';
            ?>
            <!-- End Navbar -->

            <?php
            // KONTEN
            if (empty($isi)) {
                require 'layout/isi.php';
            } else {
                $this->load->view($isi);
            }
            ?>

            <!-- footer -->
            <?php
            require 'layout/footer.php';
            ?>
            <!-- footer -->

        </div>
    </div>

</body>
<!-- JS -->
<?php
require 'layout/js.php';
?>
<!-- JS -->

</html>