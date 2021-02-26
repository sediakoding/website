<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_master extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->cloginAkses();
	}

	private function clogin()
	{
		if ($this->session->userdata('login') == TRUE /*AND $this->session->userdata('lvl_akses')==1*/) {
		} else {
			redirect('login/?error=harusdaftarlagi&kode=0');
		}
		$this->id_user = $this->session->userdata('id_user');
	}
	private function cloginAkses()
	{
		if ($this->session->userdata('login') == TRUE and $this->session->userdata('lvl_akses') == 1) {
		} else {
			redirect('login/?error=tidakmemilikiAkses&kode=0');
		}
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$this->listHotel();
	}
	//+++++++++++++++++++++++++++

	public function listHotel()
	{
		$d = [
			'judul' => "Hotel",
			'listhotel' => "active", //menu
			'isi' => "master/daftarHotel",
			'sql' => $this->M_master->getHotelList($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}
	public function user()
	{
		$this->cloginAkses();
		$d = [
			'judul' => "User",
			'barUser' => "active", //menu
			'isi' => "master/user",
			'sql' => $this->M_master->getUser($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}


	//++++++++++++++++++++++++++++++++++++++++++

	public function listHotel_save($value = '')
	{
		$this->M_master->saveListHotel();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master');
	}
	public function user_save($value = '')
	{
		$this->cloginAkses();
		$cp = $this->M_master->saveUser();
		if ($cp == 1) {
			$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		} else {
			$this->session->set_flashdata('pesan', 'Data gagal disimpan');
		}
		redirect('C_master/user');
	}

	//++++++++++++++++++++++++++++++++++++++++++

	public function listHotel_edit($value = '')
	{
		$d = [
			'judul' => "Hotel",
		];
		$this->load->view('master/editDaftarHotel', $d);
	}
	public function userEdit($value = '')
	{
		$d = [
			'judul' => "User",
		];
		$this->load->view('master/editUser', $d);
	}

	//++++++++++++++++++++++++++++++++++++++++++++

	public function listHoteledit_save($value = '')
	{

		$this->M_master->upHotel();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master');
	}
	public function useredit_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->upUser();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/user');
	}

	//+++++++++++++++++++++++++++++++++++++++

	public function listHotelDel($value = '')
	{
		$this->M_master->delListHotel();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master');
	}
	public function userDel($value = '')
	{
		$this->cloginAkses();
		$this->M_master->delUser();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master/user');
	}

	//+++++++++++++++++++++++++++++++++++++



}
