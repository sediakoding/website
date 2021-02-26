<?php

/**
 * 
 */
class M_master extends CI_model
{

	function __construct()
	{
		# code...
	}


	public function getHotelList($nama = '')
	{
		$cari = "SELECT * FROM tbl_hotel_user Where nama_hotel like '%$nama%'";
		return $this->db->query($cari);
	}

	public function getUser($nama = '')
	{
		$cari = "
		SELECT *, tbl_user.id
		FROM tbl_user,tbakses   
		WHERE tbl_user.lvl_akses=tbakses.id
		and tbl_user.username like '%$nama%'
		order by tbl_user.lvl_akses";
		return $this->db->query($cari);
	}

	//================================================

	public function getHotelId($id = '')
	{
		$cari = "SELECT * FROM tbl_hotel_user WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getUserId($id = '')
	{
		$cari = "SELECT * FROM tbl_user WHERE id='$id'";
		return $this->db->query($cari);
	}
	//=======================================

	public function saveListHotel($id = '')
	{
		$txtemail = $_POST['txt_email'];
		$txtnama = $_POST['txt_name'];
		$txt_owner = $_POST['txt_owner'];
		$txt_no = $_POST['txt_no'];

		$sql = "INSERT INTO tbl_hotel_user (email, nama_hotel, pemilik, no_hp) 
		VALUES ('$txtemail', '$txtnama', '$txt_owner', '$txt_no')";
		$this->db->query($sql);
	}
	public function saveUser($id = '')
	{
		$namapeg = $_POST['namapeg'];
		$nama = $_POST['nama'];
		$pwd = $_POST['pwd'];
		$lvl = $_POST['lvl'];

		if ($nama == null or $pwd == null or $lvl == null) {
			return 0;
		}

		if ($this->cekUser($nama, $pwd) == 1) {
			return 0;
		}

		$sql = "INSERT INTO tbl_user (id_user,username, pwd, lvl_akses) VALUES ('$namapeg','$nama', '$pwd', '$lvl')";
		$this->db->query($sql);
		return 1;
	}
	//===================================

	public function upHotel($id = '')
	{
		$txtid = $_POST['txt_id'];
		$txtemail = $_POST['txt_email'];
		$txtnm = $_POST['txt_name'];
		$txt_owner = $_POST['txt_owner'];
		$txt_no = $_POST['txt_no'];

		$sql = "UPDATE tbl_hotel_user SET email='$txtemail', nama_hotel='$txtnm', pemilik='$txt_owner', no_hp='$txt_no' WHERE id = '$txtid'";
		$this->db->query($sql);
	}
	public function upUser($id = '')
	{
		$id_user = $_POST['namapeg'];
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$pwd = $_POST['pwd'];
		$lvl = $_POST['lvl'];
		$sql = "UPDATE tbl_user SET id_user='$id_user',username='$nama', pwd='$pwd', lvl_akses='$lvl' WHERE id='$kode'";
		$this->db->query($sql);
	}



	//===================================

	public function delListHotel($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tbl_hotel_user WHERE id = '$txtindeks'";
		$this->db->query($sql);
	}
	public function delUser($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tbl_user WHERE id = '$txtindeks'";
		$this->db->query($sql);
	}
	//=====================================

	public function getAkses($id = '')
	{
		$cari = "SELECT * from tbakses";
		return $this->db->query($cari);
	}

	public function cekUser($nama = '', $pwd = '')
	{
		$cari = "SELECT * FROM tbl_user where username LIKE '$nama' or pwd LIKE '$pwd'";
		$c = $this->db->query($cari);
		if ($r = $c->row_array()) {
			return 1;
		} else {
			return 0;
		}
	}


	///========================================
	public function getProfilUser($id = '')
	{
		$cari = "
		SELECT tbl_hotel_user.nama, tbl_hotel_user.nip, email, username,tbl_user.lvl_akses,tbl_hotel_user.id,id_user
		FROM tbl_user, tbl_hotel_user
		WHERE tbl_user.id_peg = tbl_hotel_user.id 
		and tbl_user.id_user = '$id'
		";
		return $this->db->query($cari);
	}
}
