<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function getOrder(){
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $detail = $this->db->get_where('user_detail', ['user_id' => $user['id']])->row_array();

        $this->db->select('user_detail.*,detail_order.*');
        $this->db->from('user_detail');
        $this->db->join('detail_order', 'user_detail.user_id = detail_order.user_id','left');
        $this->db->where('user_detail.user_id', $user['id']);
        $data = $this->db->get()->result_array();

        $order = [];
        foreach ($data as $key =>$value){
            $order[$key] = $value;
        }

        foreach ($order as $key => $value){
            $this->db->select('*');
            $this->db->from('product_order');
            $this->db->where('time',$value['time']);
            $query = $this->db->get()->result_array();
            foreach($query as $key2 => $value2){
                $order[$key]['product_order'][$key2] = $value2;
            }
        }
       if ($detail == NUll){
           return NULL;
       }else{
           return $order[0];
       }
    }

    public function uploadBill(){
        $data = $_FILES['image']['name'];
        $dt = md5($data);
        $config['upload_path']          = './assets/upload/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $dt;
        $config['max_size']             = 5140;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            return $this->upload->data('file_name');
        }
    }
}