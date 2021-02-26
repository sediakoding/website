<?php
$akses = $this->session->userdata('lvl_akses');
if ($akses == 1) {
  require 'sidebar_admin.php';
} else {
  require 'sidebar_user.php';
}
