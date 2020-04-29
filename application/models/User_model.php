<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getAllUser()
	{
		return $this->db->get('user')->result_array();
	}

	public function getUserAddress()
	{
		return $this->db->get('user_address')->result_array();
	}

	public function joinUserAddress()
	{
		$this->db->select('user.*, user_address.*')
						->from('user')
						 ->join('user_address','user.id = user_address.user_id');
		$query = $this->db->get();
		return $query->result();
	}
}