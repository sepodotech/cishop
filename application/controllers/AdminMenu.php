<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminMenu extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index()
	{
		$data['title'] 	= 'Menu Utama';
		$data['user'] 	= $this->user;
		$data ['menu'] 	= $this->Menu_model->getAllMenu();

		$this->form_validation->set_rules('menu', 'Menu', 'required', ['required' => 'Nama menu harus di isi']);

		if ($this->form_validation->run() == false){

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/templates/topbar');
        $this->load->view('admin/menu_management/menu', $data);
        $this->load->view('admin/templates/footer');	
		}else{
			$this->db->insert('admin_menu', ['menu' => $this->input->post('menu')]);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">menu berhasil ditambah!</div>');
            redirect('adminMenu/index');
		}		
		
	}

	public function update($id)
	{
		$data['title'] = 'Menu Utama';
		$data['user'] 	= $this->user;
		$data ['menu'] = $this->db->get_where('admin_menu', ['id' => $id])->row_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required', ['required' => 'Nama menu harus di isi']);

		if ($this->form_validation->run() == false){
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/templates/topbar');
        $this->load->view('admin/menu_management/update_menu', $data);
        $this->load->view('admin/templates/footer');	
		}else{
		
		$this->Menu_model->updateMenu($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">menu berhasil ditambah!</div>');
        redirect('adminMenu/index');
		}		
	}
	public function delete($id)
	{
		$this->Menu_model->deleteMenu($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">menu berhasil dihapus!</div>');
        redirect('adminMenu/index');
	}
}