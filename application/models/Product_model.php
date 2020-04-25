<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	public function getAllProduct()
	{
		return $this->db->get('product')->result_array();
	}

	public function getProductById($id)
	{
		return $this->db->get_where('product',['id' => $id])->row_array();
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

}