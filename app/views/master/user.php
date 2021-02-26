<div class="content">
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->

  <div class=" card">
    <div class="card-body">
      <div class="well">
        <a class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Tambah Data</a>
      </div>
      <?php
      $message = $this->session->flashdata('pesan');
      echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
      ?>
      <table class="table table-striped table-bordered">
        <tr>
          <th colspan="6">
            <div class="row">
              <div class="col-md-8">
                <form method="get">
                  <div class="input-group">
                    <input type="Search" class="form-control" name="strnama" placeholder="Nama <?= $judul ?>...">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Cari</button>
                    </span>
                  </div><!-- /input-group -->
                </form>
              </div>
              <div class="col-md-4 pull-left">

              </div>
            </div>


          </th>
        </tr>
        <tr>
          <th style="background-color: gainsboro;">
            <font>No.</font>
          </th>
          <th style="background-color: gainsboro;">
            <font>Nama Pegawai</font>
          </th>
          <th style="background-color: gainsboro;">
            <font>Username</font>
          </th>
          <th style="background-color: gainsboro;">
            <font>Password</font>
          </th>
          <th style="background-color: gainsboro;">
            <font>Level Akses</font>
          </th>
          </th>
          <th width="16%" style="background-color: gainsboro;">
            <font>Menu</font>
          </th>
        </tr>

        <?php
        $no = 1;
        if ($sql->num_rows() > 0) {

          foreach ($sql->result_array() as $tampil) {
            $idpeg = $tampil['id_user'];
            $gidpeg = $this->M_master->getHotelId($idpeg);
            $tm_cari = $gidpeg->row_array();
            $nm_peg = $tm_cari['nama_hotel'];
        ?>
            <tr>
              <td>
                <font size=""><?php echo $no++ ?></font>
              </td>
              <td>
                <font size=""><?php echo $nm_peg ?></font>
              </td>
              <td>
                <font size=""><?php echo $tampil['username'] ?></font>
              </td>
              <td>
                <font size=""><?php echo $tampil['pwd'] ?></font>
              </td>
              <td>
                <font size=""><?php echo $tampil['nama_level'] ?></font>
              </td>
              <td>
                <a class='open_modal btn btn-primary btn-sm' id='<?php echo  $tampil['id']; ?>'>Edit</a>
                <a class='btn btn-danger btn-sm' onclick="confirm_modal('<?= base_url() ?>C_master/userDel?&modal_id=<?= $tampil['id'] ?>');">Hapus</a>
              </td>
            </tr>
        <?php
          }
        }
        ?>
      </table>


    </div>
  </div>
</div>
<!-- Modal Popup untuk Add-->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Input <?= $judul ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body">
        <form action="<?= base_url() ?>C_master/user_save" name="modal_popup" enctype="multipart/form-data" method="POST">

          <table class="table1" width="100%">
            <tr>
              <td>&nbsp;<b>Nama Pegawai :</b></td>
            </tr>
            <tr>
              <td>
                <select name="namapeg" id="lvl" class="form-control">
                  <option value="">-Pilih Pegawai-</option>
                  <?php
                  $sql_row = $this->M_master->getHotelList();
                  foreach ($sql_row->result_array() as $sql_res) {
                  ?>
                    <option value="<?php echo $sql_res["id"]; ?>"><?php echo $sql_res["nama_hotel"]; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>&nbsp;<b>Nama User :</b></td>
            </tr>

            <tr>
              <td><input type="text" name="nama" id="nama" class="form-control" required /></td>
            </tr>
            <tr>
              <td>&nbsp;<b>Password :</b></td>
            </tr>
            <tr>
              <td><input type="text" name="pwd" class="form-control" required /></td>
            </tr>
            <tr>
              <td>&nbsp;<b>Level Akses :</b></td>
            </tr>
            <tr>
              <td>
                <select name="lvl" id="lvl" class="form-control">
                  <option value="">-Pilih Level Akses-</option>
                  <?php
                  $sql_row = $this->M_master->getAkses();
                  foreach ($sql_row->result_array() as $sql_res) {
                  ?>
                    <option value="<?php echo $sql_res["id"]; ?>"><?php echo $sql_res["nama_level"]; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </td>
            </tr>
          </table>

          <br>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">
              Confirm
            </button>

            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
              Cancel
            </button>
          </div>

        </form>



      </div>


    </div>
  </div>
</div>
</div>

<!-- Modal Popup untuk Edit-->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Hapus <?= $judul ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body">

        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>



        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a class="btn btn-danger" id="delete_link">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Javascript untuk popup modal Edit-->
<script type="text/javascript">
  $(document).ready(function() {
    $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
      $.ajax({
        url: "<?= base_url() ?>C_master/userEdit",
        type: "GET",
        data: {
          modal_id: m,
        },
        success: function(ajaxData) {
          $("#ModalEdit").html(ajaxData);
          $("#ModalEdit").modal('show', {
            backdrop: 'true'
          });
        }
      });
    });
  });
</script>

<!-- Javascript untuk popup modal Delete-->
<script type="text/javascript">
  function confirm_modal(delete_url) {
    $('#modal_delete').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('delete_link').setAttribute('href', delete_url);
  }
</script>