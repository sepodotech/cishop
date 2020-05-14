<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->weight = 0;
		foreach($this->cart->contents() as $item)
		{
		$this->weight += $item['weight']*$item['qty'];
		}
	}

	public function index()
	{
		$data['user'] 		= $this->user;
		$data['product']	= $this->Product_model->getallproduct();
		$data['title']		= 'shop';
	
		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/topbar',$data);
		$this->load->view('index',$data);
		$this->load->view('store/templates/footer');
	}

	public function singleProduct($id)
	{
		$data['user']			= $this->user;
		$data['singleProduct'] 	= $this->Product_model->getProductById($id);
		$data['title']			= 'Detail Produk';

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/topbar',$data);
		$this->load->view('store/single_product',$data);
		$this->load->view('store/templates/single_product_buttom_navbar',$data);
		$this->load->view('store/templates/footer');
	}

	public function myCart()
	{
		
		$data['user'] 		= $this->user;
		$data['title']		= 'Keranjang Saya';
		$data['backArrow']	= 'home';
		$data['getAddress']	= $this->User_model->getUserAddress();
		$data['weight'] 	= $this->weight;
		
		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/order_topbar',$data);
		$this->load->view('store/my_cart',$data);
		$this->load->view('store/templates/footer',$data);
	}

	public function addCart()
	{
		
		$data = [
			'id'		=> $this->input->post('id'),
			'name'		=> $this->input->post('name'),
			'qty'		=> htmlspecialchars($this->input->post('qty',true)),
			'price'		=> $this->input->post('price'),
			'image'		=> $this->input->post('image'),
			'weight'	=> $this->input->post('weight')	
		];
		
	$this->cart->insert($data);
	
	redirect('home/index');
	}

	public function removeCart($rowid)
	{
		$this->cart->remove($rowid);
		redirect('home/myCart');
	}

	public function updateCart()
	{
		$data = [
			'rowid'		=> $this->input->post('rowid'),
			'qty'		=> htmlspecialchars($this->input->post('qty', true))
		];
		$this->cart->update($data);
		redirect('home/myCart');
	}

	public function setting()
	{
		$data['user'] 		= $this->user;
		$data['title']		= 'Setting';

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/setting',$data);
		$this->load->view('store/templates/footer');
	}

	public function checkout()
	{
		$data['user'] 		= $this->user;
		$data['backArrow']	= 'home/myCart';
		$data['title']		= 'Checkout';
		$data['button']		= 'Buat Pesanan';

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/order_topbar',$data);
		$this->load->view('store/checkout',$data);
		$this->load->view('store/templates/footer');
	}

	public function addTempAddress()
	{
		$data = [

			'name'  		=> htmlspecialchars($this->input->post('name',true)),
			'phone'     	=> htmlspecialchars($this->input->post('phone',true)),
			'province' 		=> htmlspecialchars($this->input->post('province',true)),
			'city' 			=> htmlspecialchars($this->input->post('city',true)),
			'subdistrict' 	=> htmlspecialchars($this->input->post('subdistrict',true)),
			'detail' 		=> htmlspecialchars($this->input->post('detail-address',true)),
			'courier' 		=> htmlspecialchars($this->input->post('courier',true)),
			'weight' 		=> htmlspecialchars($this->input->post('weight',true)),
			'shopping' 		=> htmlspecialchars($this->input->post('total-shopping',true))
			
		];
		$this->session->set_userdata($data);
		redirect('Home/checkout');
	}

	public function deleteTempAddress()
	{
		$this->session->unset_userdata('name','phone','province','city','subdistrict','detail','courier','weight');
		redirect('Home/myCart');
	}
}
