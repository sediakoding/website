<?php

/**
 * by ilham
 */
class MY_user extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->clogin();
	}

	function cloginA()
	{
		if ($this->session->userdata('login') == TRUE and $this->session->userdata('lvl_akses') == 1) {
		} else {
			redirect('login/?error=harusdaftarlagi&kode=0');
		}
		$this->id_user = $this->session->userdata('id_user');
	}
	function clogin()
	{
		if ($this->session->userdata('login') == TRUE) {
		} else {
			redirect('login/?error=harusdaftarlagi&kode=0');
		}
		$this->id_user = $this->session->userdata('id_user');
	}

	function check_user($id_user = 0)
	{
		if ($id_user != $this->id_user) {
			redirect();
		}
	}
}
