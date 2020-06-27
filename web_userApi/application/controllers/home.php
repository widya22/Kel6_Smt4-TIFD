<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();		
        $this->load->model('m_data');
	}

	public function index()
	{
		$this->session->unset_userdata('semua');
		$this->session->unset_userdata('diproses');
		$this->session->unset_userdata('diambil');
		$this->session->unset_userdata('selesai');
		$this->session->unset_userdata('gagal');

		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_home');
	}

	public function register()
	{
		$this->load->view('v_register');
	}

	public function register2()
	{
		$this->load->view('v_register2');
	}

	public function surat_saya(){
		//hapus session
		$this->session->unset_userdata('semua');
		$this->session->unset_userdata('diproses');
		$this->session->unset_userdata('diambil');
		$this->session->unset_userdata('selesai');
		$this->session->unset_userdata('gagal');

		$data_session = array( //menginset session
			'semua' => "semua"
		);
		$this->session->set_userdata($data_session);

		$data['database'] = $this->m_data->tampil_surat()->result_array();
		$this->load->view('v_surat_saya', $data);
	}

	public function surat_diproses(){
		//hapus session
		$this->session->unset_userdata('semua');
		$this->session->unset_userdata('diproses');
		$this->session->unset_userdata('diambil');
		$this->session->unset_userdata('selesai');
		$this->session->unset_userdata('gagal');

		$data_session = array( //menginset session
			'diproses' => "diproses"
		);
		$this->session->set_userdata($data_session);

		$nim=$_SESSION["nim"];
		$status = 'diproses';
		$data['database'] = $this->m_data->tampil_surat2($status)->result_array();
		$this->load->view('v_surat_saya', $data);
	}

	public function surat_diambil(){
		//hapus session
		$this->session->unset_userdata('semua');
		$this->session->unset_userdata('diproses');
		$this->session->unset_userdata('diambil');
		$this->session->unset_userdata('selesai');
		$this->session->unset_userdata('gagal');

		$data_session = array( //menginset session
			'diambil' => "diambil"
		);
		$this->session->set_userdata($data_session);

		$nim=$_SESSION["nim"];
		$status = 'diambil';
		$data['database'] = $this->m_data->tampil_surat2($status)->result_array();
		$this->load->view('v_surat_saya', $data);
	}

	public function surat_selesai(){
		//hapus session
		$this->session->unset_userdata('semua');
		$this->session->unset_userdata('diproses');
		$this->session->unset_userdata('diambil');
		$this->session->unset_userdata('selesai');
		$this->session->unset_userdata('gagal');

		$data_session = array( //menginset session
			'selesai' => "selesai"
		);
		$this->session->set_userdata($data_session);

		$nim=$_SESSION["nim"];
		$status = 'selesai';
		$data['database'] = $this->m_data->tampil_surat2($status)->result_array();
		$this->load->view('v_surat_saya', $data);
	}

	public function surat_gagal(){
		//hapus session
		$this->session->unset_userdata('semua');
		$this->session->unset_userdata('diproses');
		$this->session->unset_userdata('diambil');
		$this->session->unset_userdata('selesai');
		$this->session->unset_userdata('gagal');

		$data_session = array( //menginset session
			'gagal' => "gagal"
		);
		$this->session->set_userdata($data_session);

		$nim=$_SESSION["nim"];
		$status = 'gagal';
		$data['database'] = $this->m_data->tampil_surat2($status)->result_array();
		//variabel database dibungkus denan $data dikirim ke v surat saya seteleah di proses
		//di m data tampil surat 2 lalu data ditampilkan dan dijadikan array
		$this->load->view('v_surat_saya', $data);
	}


// menampilkan semua surat
	function tampil_semua(){ 
		$data=$this->m_data->surat_list();
		echo json_encode($data);
	}

//menampil surat diproses
	function tampil_diproses(){
		$data=$this->m_data->surat_diproses();
		echo json_encode($data);
	}

//menampilkan surat bisadiambil
	function tampil_bisadiambil(){
		$data=$this->m_data->surat_bisadiambil();
		echo json_encode($data);
	}

//menampilkan surat selesai
	function tampil_selesai(){
		$data=$this->m_data->surat_selesai();
		echo json_encode($data);
	}

//menampilkan surat gagal
	function tampil_gagal(){
		$data=$this->m_data->surat_gagal();
		echo json_encode($data);
	}

//menampilkan surat dengan kode
	function get_surat_kode(){
		$kobar=$this->input->get('id');
		$data=$this->m_data->get_surat_by_kode($kobar);
		echo json_encode($data);
	}

}
