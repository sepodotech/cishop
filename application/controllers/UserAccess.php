<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccess extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function member()
	{
		$data['user'] = $this->user;

		$this->load->view('admin/templates/header', $data);
		$this->load->view('member/templates/topbar', $data);
		$this->load->view('member/index',$data);
        $this->load->view('admin/templates/footer');
	}

	public function admin()
	{
		$data['title'] 	= 'Pesanan';
		$data['user'] 	= $this->user;

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/transactions/index', $data);
        $this->load->view('admin/templates/footer');
	}

	public function ceo()
	{
		$data['title'] 	= 'Dashboard';
		$data['user'] 	= $this->user;

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/templates/footer');
	}
}