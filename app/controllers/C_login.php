<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function index()
	{
		$this->load->model('M_set');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$c=$this->db->get_where('tbl_user',array('username' => $username,'pwd' => $password));
  		if($c->num_rows() >0)
  			{ 

				$cari_kd=("SELECT *
					FROM tbl_user
					WHERE username LIKE '$username' and pwd='$password' ");
				$c=$this->db->query($cari_kd);
				$tm_cari=$c->result_array()[0];

				$id=$tm_cari['id_user'];
				$hak_akses=$tm_cari['lvl_akses'];

				$_SESSION['id_user']=$id;
				$_SESSION['lvl_akses']=$hak_akses;
				$_SESSION['login']=TRUE;
				$ckakses=$this->M_set->get_setAksesUSer()->row()->status;
				
				if ($hak_akses==1) {
				redirect('C_beranda');
				}elseif($hak_akses==2 and $ckakses==1) {
				redirect('C_beranda');
				}

				
				
		}
  			// echo "string".$hak_akses .''.$ckakses;
     		redirect('login/?error=tidakterdaftar&kode=0');
	
	} 

	public function logout($value='')
	{
		$this->session->sess_destroy();       
        $this->session->set_userdata('login', FALSE);
        redirect('login/?error=logout&kode=0');
	}

}
