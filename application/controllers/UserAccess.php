<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccess extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->user = $this->User_model->getUserSession();
		$this->weight = 0;
		foreach($this->cart->contents() as $item)
		{
		$this->weight += $item['weight']*$item['qty'];
		}
	}

	public function member(){
		$data['title']		= 'shop';
		$data['user'] 		= $this->user;
		$data['product']	= $this->Product_model->getallproduct();
		$data['weight'] 	= $this->weight;
		
		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/topbar',$data);
		$this->load->view('index',$data);
		$this->load->view('store/templates/footer',$data);
	}
	public function reseller()
	{
		$data['title'] 	= 'Mitra';
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