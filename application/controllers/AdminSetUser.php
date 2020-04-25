<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminSetUser extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index()
	{
		$data['title'] 		= 'User Role';
		$data['user'] 		= $this->user;
		$data['userAccess'] = $this->db->get('user')->result_array();
		$data['role'] 		= $this->db->get('user_role', 'role')->row_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/templates/topbar',$data);
        $this->load->view('admin/user_role/user_admin',$data);
        $this->load->view('admin/templates/footer');
       
	}


	public function update($id)
	{
		$data['title'] 		= 'User Role';
		$data['user'] 		= $this->user;
		$data['edit'] 		= $this->db->get_where('user',['id' => $id])->result_array();

		//validasi data user input
		$this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'menu harus di isi']);
		$this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'judul harus di isi']);
		$this->form_validation->set_rules('role_id', 'Role', 'required', ['required' => 'url harus di isi']);
		
		//jika validasi salah
		if ($this->form_validation->run() == false){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/templates/topbar');
	        $this->load->view('admin/user_role/update_user_admin', $data);
	        $this->load->view('admin/templates/footer');
        }else{
        // jika validasi benar
		$data = [
        			'id' 		=> $this->input->post('id',true),
        			'name'		=> $this->input->post('name',true),
        			'email'		=> $this->input->post('email',true),
        			'role_id'	=> $this->input->post('role_id', true),
        			'is_active'	=> $this->input->post('is_active')
        	];
        $this->db->where('id', $id);
		$this->db->update('user', $data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">akun berhasil diubah!</div>');
        redirect('adminSetUser/index');
    	}
	}

	public function delete($id)	
	{
		return $this->db->delete('user', ['id' => $id]);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">akun berhasil dihapus!</div>');
        redirect('adminSetUser/index');
	}


}