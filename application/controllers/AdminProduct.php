<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminProduct extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    // function main product
	public function index()
	{
        $data['title'] = 'Produk';
        $data['user'] = $this->user;
        $data['product'] = $this->Product_model->getallproduct();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/templates/topbar');
        $this->load->view('admin/product/product', $data);
        $this->load->view('admin/templates/footer');
    }
    
    public function addProduct()
    {
        
            $data['title'] = 'Tambah Produk';
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
                $this->load->view('admin/product/add_product', $data);
                $this->load->view('admin/templates/footer');  	
            }else{
    
                $this->Product_model->addproduct();
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil ditambah!</div>');
                redirect('adminProduct/index');
            }
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
    // end function main product

    // function varian product

    public function addVariant($id)
    {
        
        $data = [
            'SKU_parent'        => htmlspecialchars($this->input->post('sku',true)),
            'option_name'   	=> htmlspecialchars($this->input->post('name',true)),
            'option_value'     	=> htmlspecialchars($this->input->post('value',true)),
            'option_stok'   	=> htmlspecialchars($this->input->post('stok',true))           
        ];
        $this->db->insert('product_option', $data);
        redirect('adminProduct/singleProduct/' . $id) ;
    }

    public function editVariant()
    {

    }

    public function deleteVariant()
    {

    }
    // end function varian

    // funtion subvariant
    public function addSubvariant($id,$product_id)
    {
        $data['title'] = 'Tambah Subvarian';
        $data['user'] = $this->user;
        $data['variant_id'] = $id; 
        $data['product_id'] = $product_id;

        $this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'jenis opsi harus di isi']);
        $this->form_validation->set_rules('value', 'Value', 'required', ['required' => 'nilai opsi harus di isi']);
        $this->form_validation->set_rules('stock', 'Stock', 'required', ['required' => 'stok harus di isi']);
        
        if ($this->form_validation->run() == false){
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/templates/topbar');
            $this->load->view('admin/product/add_subvariant', $data);
            $this->load->view('admin/templates/footer');
        }else{
            $data = [
                'product_option_id'         => $this->input->post('option_id'),
                'option2_name'   	        => htmlspecialchars($this->input->post('name',true)),
                'option2_value'     	    => htmlspecialchars($this->input->post('value',true)),
                'option2_stok'   	        => htmlspecialchars($this->input->post('stock',true))           
            ];
            $this->db->insert('product_option2', $data);
            // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil ditambah!</div>');
            redirect('adminProduct/singleProduct/' . $product_id) ;
        }
    }

    public function editSubvarian()
    {
        
    }

    public function deleteSubvarian()
    {

    }

}