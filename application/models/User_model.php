<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getAllUser()
	{
		return $this->db->get('user')->result_array();
	}

	public function getUser()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(['email' => $this->session->userdata('email')]);
		$query = $this->db->get()->row_array();
		$data = [];
		foreach ($query as $key =>$value) {
			$data[$key] = $value;
		}
		foreach($data as $key=>$result){
            $this->db->select('*');
            $this->db->from('user_address');
            $this->db->where('user_id',$data['id']);
			$query2 = $this->db->get()->row_array();
            foreach ($query2 as $key2 => $result2) {
                $data['address'][$key2] = $result2;
            }
        }
		return $data;


	}
}