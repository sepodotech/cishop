<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	public function getAllProduct()
	{
        $this->db->select('*');
        $this->db->from('product');
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key =>$value) {
            $data[$key] = $value;
        }
        foreach($data as $key=>$result){
            $this->db->select('*');
            $this->db->from('product_option');
            $this->db->where('SKU_parent',$result['SKU']);
            $query2 = $this->db->get()->result_array();
            foreach ($query2 as $key2 => $result2) {
                $data[$key]['option1'][$key2] = $result2;
            }
        }
            foreach ($data as $key2 => $result2) {
                $this->db->select('*');
                $this->db->from('product_option2');
                $this->db->where('product_option_id',$result2['id']);
                $query3 = $this->db->get()->result_array();
                foreach ($query3 as $key3 => $result3) {
                    $data[$key]['option1'][$key2]['option2'][$key3] = $result3;
                }
            }
        return $data;
    }
        
	

    public function getProductById($id)
    {
        
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id',$id);
        $query = $this->db->get()->result_array();
        $data = [];
        // query product
        foreach ($query as $key =>$value) {
            $data[$key] = $value;
        }
        // query first option
        foreach($data as $key=>$result){
            $this->db->select('*');
            $this->db->from('product_option');
            $this->db->where('SKU_parent',$result['SKU']);
            $query2 = $this->db->get()->result_array();
            foreach ($query2 as $key2 => $result2) {
                $data[$key]['option1'][$key2] = $result2;
            }
        }
        // query second option
        foreach ($data as $key =>$result) {
            foreach ($query2 as $key2 => $result2) {
                
                $this->db->select('*');
                $this->db->from('product_option2');
                $this->db->where('product_option_id',$result2['id']);
                $query3 = $this->db->get()->result_array();
                foreach ($query3 as $key3 => $result3) {
                    $data[$key]['option1'][$key2]['option2'][$key3] = $result3;
                }
            }
        }
    
        return $data[0];
    }

    public function getVariantProduct($sku) 
    {
        $result = $this->db->get_where('product_option' , ['SKU_parent' => $sku])->result_object();
        $result = json_encode($result);
        return $result;
    }
	public function addProduct()
	{
		$data = [
                    
                    'image'     		=> $this->_uploadimage(),
                    'name'   			=> htmlspecialchars($this->input->post('name',true)),
                    'category_id'     	=> htmlspecialchars($this->input->post('category_id',true)),
                    'description'   	=> htmlspecialchars($this->input->post('description',true)),
                    'quantity'     		=> htmlspecialchars($this->input->post('quantity',true)),
                    'price'  			=> htmlspecialchars($this->input->post('price',true)),
                    'member_price'      => htmlspecialchars($this->input->post('member_price',true)),
                    'weight' 			=> htmlspecialchars($this->input->post('weight',true)),
                    'shipping_origin'   => htmlspecialchars($this->input->post('in_slider'))                   
            ];
        $this->db->insert('product', $data);
	}

	private function _uploadimage()
	{
        $data = $_FILES['image']['name'];
        $dt = md5($data);
        $config['upload_path']          = './assets/upload/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $dt;
        $config['max_size']             = 5140;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            return $this->upload->data('file_name');
        }

        return 'default.jpg';
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete('product', ['id' => $id]);
    }

    private function _deleteImage($id)
    {
    $dt = $this->getProductById($id);
    
    
        if ($dt['image'] != "default.jpg") {
            $filename = explode(".", $dt['image'])[0];
            return array_map('unlink', glob(FCPATH."./assets/upload/products/$filename.*"));
        }
    }
    public function createOrder()
    {
        
    }

}