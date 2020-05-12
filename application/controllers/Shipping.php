<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shipping extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->api_key = "0c4d47ef955ed1e75193719d18d24294";
  }

  public function Province($idprov = NULL){
        
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=$idprov",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $response = json_decode($response, true);
    $response = $response['rajaongkir']['results'];
    $response = json_encode($response);
    // var_dump($response);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response ;
    }
  }

  public function City($idprov = NULL , $idcity = NULL){
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$idcity&province=$idprov",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: $this->api_key"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $response = json_decode($response, true);
    $response = $response['rajaongkir']['results'];
    $response = json_encode($response);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  }


  public function SubDistrict(){
      
    
      
  }


  public function Cost($origin = NULL ,$dest = NULL ,$weight = NULL ,$courier = NULL){
   
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=$origin&destination=$dest&weight=$weight&courier=$courier",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $this->api_key"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $response = json_decode($response, true);
    $response = $response['rajaongkir']['results'][0];
    
    if($response['code'] == 'jne'){
      $response = $response['costs'][1]['cost'][0]['value'];
    }else{
      $response = $response['costs'][0]['cost'][0]['value'];
    }
    
    $response = json_encode($response);
    
    
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
      
  }
}