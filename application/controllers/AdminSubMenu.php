<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminSubMenu extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index()
	{
		$data['title'] 		= 'Sub Menu';
		$data['user'] 		= $this->user;
		$data ['menu'] 		= $this->Menu_model->getAllMenu();
		$data['subMenu'] 	= $this->Menu_model->getSubMenu();

		
		$this->form_validation->set_rules('menu_id', 'Menu', 'required', ['required' => 'menu harus di isi']);
		$this->form_validation->set_rules('title', 'Title', 'required', ['required' => 'judul harus di isi']);
		$this->form_validation->set_rules('url', 'Url', 'required', ['required' => 'url harus di isi']);
		$this->form_validation->set_rules('icon', 'Icon', 'required', ['required' => 'icon harus di isi']);

		if ($this->form_validation->run() == false){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/templates/topbar');
	        $this->load->view('admin/menu_management/submenu', $data);
	        $this->load->view('admin/templates/footer');
        }else{
        	
        	$this->Menu_model->addSubMenu();
        	$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil ditambah!</div>');
            redirect('adminSubMenu/index');
        }
	}

	public function update($id)
	{
		$data['title'] 		= 'Sub Menu';
		$data['user'] 		= $this->user;
		$data['Menu'] 		= $this->Menu_model->getSubMenu();
		$data['subMenu'] 	= $this->Menu_model->getSubMenuById($id);
		
		$this->form_validation->set_rules('menu_id', 'Menu_id', 'required', ['required' => 'menu harus di isi']);
		$this->form_validation->set_rules('title', 'Title', 'required', ['required' => 'judul harus di isi']);
		$this->form_validation->set_rules('url', 'Url', 'required', ['required' => 'url harus di isi']);
		$this->form_validation->set_rules('icon', 'Icon', 'required', ['required' => 'icon harus di isi']);

		if ($this->form_validation->run() == false){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/templates/topbar');
	        $this->load->view('admin/menu_management/update_submenu', $data);
	        $this->load->view('admin/templates/footer');
	        
        }else{


        	$this->Menu_model->updateSubMenu($id);
        	$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil diubah!</div>');
        	//if success updated redirect
            redirect('adminSubMenu/index');
        }
	}

	public function delete($id)
	{
		$this->Menu_model->deleteSubMenu($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil dihapus!</div>');
		//if success deleted redirect
        redirect('adminSubMenu/index');
	}
}