<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getUserSession()
	{
		$this->db->select('id');
		$test = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('user_id');
		$test2 = $this->db->get('user_detail')->result_array();

		$a = [];
		foreach($test2 as $key =>$value ){
			$a[$key] = $value['user_id'];
		}

		 if ($test == NULL){
			$test['id'] = "0";
		 }

		if (in_array($test['id'],$a)){
			$this->db->select('user.* , user_detail.*');
			$this->db->from('user');
			$this->db->join('user_detail', 'user.id = user_detail.user_id', 'left');
			$this->db->where(['email' => $this->session->userdata('email')]);
			return $this->db->get()->row_array();
		}else{
			return $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
	}

	
}