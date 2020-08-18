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

	public function addTempData()
	{
		
		if ($this->input->post('dropship-name')){
			$data = [
				'drop_name'  		=> htmlspecialchars($this->input->post('dropship-name',true)),
				'drop_phone'     	=> htmlspecialchars($this->input->post('dropship-phone',true)),
				'drop_province' 	=> htmlspecialchars($this->input->post('dropship-province',true)),
				'drop_city' 		=> htmlspecialchars($this->input->post('dropship-city',true)),
				'drop_subdistrict' 	=> htmlspecialchars($this->input->post('dropship-subdistrict',true)),
				'drop_detail' 		=> htmlspecialchars($this->input->post('dropship-complite-address',true)),
				'courier' 			=> htmlspecialchars($this->input->post('courier',true)),
				'weight' 			=> htmlspecialchars($this->input->post('weight',true)),
				'shopping' 			=> htmlspecialchars($this->input->post('total-shopping',true))
			];
		}else{
			$data = [
				'courier' 			=> htmlspecialchars($this->input->post('courier',true)),
				'weight' 			=> htmlspecialchars($this->input->post('weight',true)),
				'shopping' 			=> htmlspecialchars($this->input->post('total-shopping',true))
			];
		}

		$this->session->set_userdata($data);
		redirect('Home/checkout');
	}

	public function deleteTempData()
	{
		$this->session->unset_userdata('drop_name');
		$this->session->unset_userdata('drop_phone');
		$this->session->unset_userdata('drop_province');
		$this->session->unset_userdata('drop_city');
		$this->session->unset_userdata('drop_subdistrict');
		$this->session->unset_userdata('drop_detail');
		$this->session->unset_userdata('courier');
		$this->session->unset_userdata('weight');
		$this->session->unset_userdata('shopping');
		redirect('Home/myCart');
	}

	public function checkout()
	{
		$data['user'] 		= $this->user;
		$data['backArrow']	= 'home/myCart';
		$data['title']		= 'Checkout';
		$data['button']		= 'Buat Pesanan';
		$data['weight'] 	= $this->weight;

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/simple_topbar',$data);
		$this->load->view('store/checkout',$data);
		$this->load->view('store/templates/footer',$data);
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
	

	public function productOrder(){
		foreach($this->cart->contents() as $key => $value){
			$data = [
				'product_id' 		=> $value['id'],
				'user_id'			=>$this->user['id'],
				'time'				=>time(),
				'product_name'		=>$value['name'],
				'product_image'		=>$value['image'],
				'product_quantity'	=>$value['qty'],
				'product_option'	=>$value['option1']
			];
			$this->db->insert('product_order',$data);
		}
		$detailOrder = [
			'user_id'			=>$this->user['id'],
			'time'				=>time(),
			'courier'			=>$this->session->userdata('courier'),
			'weight'			=>$this->session->userdata('weight'),
			'total'				=>$this->session->userdata('shopping'),
			'was_payed'			=>0,
			'payment_slip'		=>'',
			'dropship_name'		=>$this->session->userdata('drop_name'),
			'dropship_phone'	=>$this->session->userdata('drop_phone'),
			'dropship_address'	=>$this->session->userdata('drop_nation').'/'.$this->session->userdata('drop_province').'/'.$this->session->userdata('drop_city').'/'.$this->session->userdata('drop_subdistrict').'/'.$this->session->userdata('drop_detail') ,
		];
		$this->db->insert('detail_order', $detailOrder);
		$this->cart->destroy();
		redirect('home/transaction');
	}

	public function transaction(){
		$data['user'] 		= $this->user;
		$data['title']		= 'Edit Profil';
		$data['weight'] 	= $this->weight;
		$data['order']		= $this->Order->getOrder();

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/topbar',$data);
		$this->load->view('store/setting/transaction',$data);
		$this->load->view('store/templates/footer',$data);
	}

	public function uploadBill(){
		var_dump($_FILES);
		die();
	}
}
