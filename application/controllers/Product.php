<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function getVariantProduct($optionId){
        $product = $this->Product_model->getVariantProduct($optionId);
        $product = json_encode($product);
        echo $product;
    }
}