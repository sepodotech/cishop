<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	
	public function getAllMenu()
	{
		return $this->db->get('admin_menu')->result_array();
	}

	

	public function updateMenu($id)
	{
		$data = [
        			'id' 		=> $this->input->post('id',true),
        			'menu'		=> $this->input->post('menu',true),
        	];
        $this->db->where('id', $id);
		return $this->db->update('admin_menu', $data);
	}

	public function deleteMenu($id)
	{
		return $this->db->delete('admin_menu', ['id' => $id]);
	}

	//submenu

	public function getSubMenu()
	{
		$query = "SELECT `admin_submenu`.*, `admin_menu`.`menu`
					FROM `admin_submenu` JOIN `admin_menu`
					ON `admin_submenu`.`menu_id` = `admin_menu`.`id`
					";
		return $this->db->query($query)->result_array();

	}

	public function getSubMenuById($id)
	{
		return $this->db->get_where('admin_submenu', ['id' => $id])->result_array();
	}

	public function addSubMenu()
	{
		$data = [
        			
        			'menu_id' 	=> $this->input->post('menu_id'),
        			'title'		=> $this->input->post('title'),
        			'url'		=> $this->input->post('url'),
        			'icon'		=> $this->input->post('icon'),
        			'is_active'	=> $this->input->post('is_active')
        	];
        return $this->db->insert('admin_submenu', $data);
	}

	public function updateSubMenu($id)
	{
		
		$data = [
        			'id' 		=> $this->input->post('id'),
        			'menu_id' 	=> $this->input->post('menu_id',true),
        			'title'		=> $this->input->post('title',true),
        			'url'		=> $this->input->post('url',true),
        			'icon'		=> $this->input->post('icon',true),
        			'is_active'	=> $this->input->post('is_active')
        	];
        $this->db->where('id', $id);
		return $this->db->update('admin_submenu', $data);
	}


	public function deleteSubMenu($id)
	{
		return $this->db->delete('admin_submenu', ['id' => $id]);
	}
}