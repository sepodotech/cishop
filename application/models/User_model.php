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
}