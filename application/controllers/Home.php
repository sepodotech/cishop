<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->user = $this->User_model->getUserSession();
		$this->weight = 0;
		foreach($this->cart->contents() as $item)
		{
		$this->weight += $item['weight']*$item['qty'];
		}
	}

	public function index()
	{
		if($this->user){
			if ($this->user['role_id'] == 1) {
				redirect('userAccess/ceo');
			} elseif ($this->user['role_id'] == 2 ) {
				redirect('userAccess/admin');
			} elseif ($this->user['role_id'] == 3 && $this->user['member_status'] == 1 ) {
				redirect('userAccess/reseller');
			} elseif ($this->user['role_id'] == 3 && $this->user['member_status'] == 0 ) {
				redirect('userAccess/member');
			}
		}else {
			$data['user'] 		= $this->user;
			$data['product']	= $this->Product_model->getallproduct();
			$data['title']		= 'shop';
			$data['weight'] 	= $this->weight;
			
	
			$this->load->view('store/templates/header',$data);
			$this->load->view('store/templates/topbar',$data);
			$this->load->view('index',$data);
			$this->load->view('store/templates/footer',$data);
		}
	}

	public function singleProduct($id)
	{
		$data['user']			= $this->user;
		$data['product'] 		= $this->Product_model->getProductById($id);
		$data['variants']		= $this->Product_model->getVariantProduct($id);
		$data['title']			= 'Detail Produk';
		$data['weight'] 		= $this->weight;

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/topbar',$data);
		$this->load->view('store/single_product',$data);
		$this->load->view('store/templates/single_product_buttom_navbar',$data);
		$this->load->view('store/templates/footer',$data);
	}

	public function myCart()
	{
		$data['user'] 		= $this->user;
		$data['title']		= 'Keranjang Saya';
		$data['backArrow']	= 'home';
		$data['weight'] 	= $this->weight;
		
		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/simple_topbar',$data);
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
			'weight'	=> $this->input->post('weight'),
			'option1'	=> $this->input->post('option1'),
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

	public function checkout()
	{
		$data['user'] 		= $this->user;
		$data['backArrow']	= 'home/myCart';
		$data['title']		= 'Checkout';
		$data['button']		= 'Buat Pesanan';

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/simple_topbar',$data);
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
		$this->session->unset_userdata('name','phone','province','city','subdistrict','detail','courier','weight','shopping');
		redirect('Home/myCart');
	}
	public function payment()
	{
		$data = [

			'product-name'  		=> $this->input->post('product-name'),
			'qty'     				=> $this->input->post('phone',true),
			'total-shopping' 		=> $this->input->post('total-shopping',true),
			'buyer-name'  			=> $this->input->post('buyer-name',true),
			'phone'     			=> $this->input->post('phone',true),
			'province' 				=> $this->input->post('province',true),
			'city' 					=> $this->input->post('city',true),
			'subdistrict' 			=> $this->input->post('subdistrict',true),
			'detail' 				=> $this->input->post('detail-address',true),
			'courier' 				=> $this->input->post('courier',true)
		];
	}
	/*---------------view/store/setting---------------------*/
	public function profile()
	{
		$data['user'] 		= $this->user;
		$data['title']		= 'Profil';
		$data['weight'] 	= $this->weight;
		$data['backArrow']	= 'home';
		

		$this->form_validation->set_rules('fullname', 'Fullname', 'required', ['required' => 'harus di isi']);
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric', [
			'required' => 'harus di isi',
			'numeric' => 'harus nomer'
			]);
		$this->form_validation->set_rules('nation', 'Nation', 'required', ['required' => 'harus di isi']);
		$this->form_validation->set_rules('subdistrict', 'Subdistrict', 'required', ['required' => 'harus di isi']);
		$this->form_validation->set_rules('complete_address', 'Complete_address', 'required', ['required' => 'harus di isi']);
			
        if ($this->form_validation->run() == false){
			$this->load->view('store/templates/header',$data);
			$this->load->view('store/templates/simple_topbar',$data);
			$this->load->view('store/setting/profile',$data);
			$this->load->view('store/templates/footer',$data);
        }else{
            $data = [
                'name'				=> htmlspecialchars($this->input->post('fullname',true)),
                'user_id'         	=> $this->input->post('user_id'),
                'phone'				=> htmlspecialchars($this->input->post('phone',true)),
                'nation'			=> htmlspecialchars($this->input->post('nation',true)),
				'province'			=> $this->input->post('province',true),
				'city'				=> $this->input->post('city',true),
				'subdistrict'		=> htmlspecialchars($this->input->post('subdistrict',true)),
                'address_id'		=> $this->input->post('address_id'),
                'complete_address'	=> htmlspecialchars($this->input->post('complete_address',true)),           
			];
			$this->db->insert('user_detail',$data);

			if ($this->cart->contents()){
				redirect('Home/myCart');
			}else{
				redirect('home');
			}
		}
	}

	public function editUserDetail(){
		$data['user'] 		= $this->user;
		$data['title']		= 'Edit Profil';
		$data['weight'] 	= $this->weight;
		$data['backArrow']	= 'home/profile';
		

		$this->form_validation->set_rules('fullname', 'Fullname', 'required', ['required' => 'harus di isi']);
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric', [
			'required' => 'harus di isi',
			'numeric' => 'harus nomer'
			]);
		$this->form_validation->set_rules('nation', 'Nation', 'required', ['required' => 'harus di isi']);
		$this->form_validation->set_rules('subdistrict', 'Subdistrict', 'required', ['required' => 'harus di isi']);
		$this->form_validation->set_rules('complete_address', 'Complete_address', 'required', ['required' => 'harus di isi']);
			
        if ($this->form_validation->run() == false){
			$this->load->view('store/templates/header',$data);
			$this->load->view('store/templates/simple_topbar',$data);
			$this->load->view('store/setting/edit_user',$data);
			$this->load->view('store/templates/footer',$data);
        }else{
			$id = $this->input->post('user-detail-id');
			
			$data = [
				'user_detail_id'	=> $this->input->post('user-detail-id'),
                'name'				=> htmlspecialchars($this->input->post('fullname',true)),
                'user_id'         	=> $this->input->post('user_id'),
                'phone'				=> htmlspecialchars($this->input->post('phone',true)),
                'nation'			=> htmlspecialchars($this->input->post('nation',true)),
				'province'			=> $this->input->post('province'),
				'city'				=> $this->input->post('city'),
				'subdistrict'		=> htmlspecialchars($this->input->post('subdistrict',true)),
                'address_id'		=> $this->input->post('address_id'),
                'complete_address'	=> htmlspecialchars($this->input->post('complete_address',true)),           
			];
			$this->db->where('user_detail_id', $id);
			$this->db->update('user_detail',$data);

			if ($this->cart->contents()){
				redirect('Home/myCart');
			}else{
				redirect('home');
			}
		}
	}
	/*---------------getting variant product---------------------*/
	public function getVariantProduct(){

	}
}
