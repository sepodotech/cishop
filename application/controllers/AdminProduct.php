<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminProduct extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

	public function index()
	{
		$data['title'] = 'Produk';
		$data['user'] = $this->user;
		$data['product'] = $this->Product_model->getallproduct();				

		$this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'nama harus di isi']);
        $this->form_validation->set_rules('category_id', 'Category_id', 'required', ['required' => 'kategori harus di isi']);
        $this->form_validation->set_rules('description', 'Description', 'required', ['required' => 'deskripsi harus di isi']);
        $this->form_validation->set_rules('quantity', 'Quantity', 'required', ['required' => 'Banyak barang harus di isi']);
        $this->form_validation->set_rules('price', 'Price', 'required', ['required' => 'Harga harus di isi']);
        $this->form_validation->set_rules('member_price', 'Member_price', 'required', ['required' => 'Harga coret harus di isi']);
        $this->form_validation->set_rules('weight', 'Weight', 'required', ['required' => 'berat barang harus di isi']);
        $this->form_validation->set_rules('shipping_origin', 'Shipping_origin', 'required', ['required' => 'Asal pengiriman haris di isi']); 
               

        if ($this->form_validation->run() == false){
            $this->load->view('admin/templates/header', $data);
    		$this->load->view('admin/templates/sidebar');
    		$this->load->view('admin/templates/topbar');
            $this->load->view('admin/products/product', $data);
            $this->load->view('admin/templates/footer');  	
    	}else{

            $this->Product_model->addproduct();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil ditambah!</div>');
            redirect('adminProduct/index');
        }
	}

    public function singleProduct($id)
    {
        $data['title'] = 'Detail Produk';
        $data['user'] = $this->user;
        $data['product'] = $this->Product_model->getProductById($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/templates/topbar');
        $this->load->view('admin/product/single_product', $data);
        $this->load->view('admin/templates/footer');
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        $this->Product_model->delete($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">product berhasil dihapus!</div>');
        redirect('adminProduct/index');
    }


}