<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class LOCATION_REST extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('LOCATION_model');
         $this->load->model('Manageorderotpmodel');
    }    

    public function data_get($id_param = NULL){
        $arr = array('conditions'=>$this->_get_args);
        $login = $this->LOCATION_model->getRows($arr);
       

        if($login) {           
            $results['state'] = $login;
            $this->response($results, 200);
        } else {
               $this->response(NULL, 404);
        }
    }


     public function portfolio_get($id_param = NULL){
        $arr = array('conditions'=>$this->_get_args);
        $login = $this->LOCATION_model->getPortfolio($arr);
       

        if($login) {           
            $results['portfolio'] = $login;
            $this->response($results, 200);
        } else {
               $this->response(NULL, 404);
        }
    }

 public function place_get($id_param = NULL){
        $arr = array('conditions'=>$this->_get_args);
        $login = $this->LOCATION_model->getPlaces($arr);
       

        if($login) {           
            $results['serach'] = $login;
            $this->response($results, 200);
        } else {
               $this->response(NULL, 404);
        }
    }

     public function dataCity_get($id_param = NULL){
        $arr = array('conditions'=>$this->_get_args);
        $login = $this->LOCATION_model->getCityRows($arr);
       

        if($login) {           
            $results['city'] = $login;
            $this->response($results, 200);
        } else {
               $this->response(NULL, 404);
        }
    }


     public function dataCat_get($id_param = NULL){
        $arr = array('conditions'=>$this->_get_args);
        $login = $this->LOCATION_model->getCatRows($arr);
       

        if($login) {           
            $results['city'] = $login;
            $this->response($results, 200);
        } else {
               $this->response(NULL, 404);
        }
    }

function data_post() {
       
       $registration_data = array();
       $otp = rand(100000, 999999);
        $registration_data['first_name'] = $this->input->post('first_name');
        $registration_data['last_name'] = $this->input->post('last_name');
        $registration_data['password'] = $this->input->post('password');
        $registration_data['email'] = $this->input->post('email');
        $registration_data['mobile'] = $this->input->post('mobile');
        $registration_data['gender'] = $this->input->post('gender');
        $registration_data['photo'] = $this->input->post('photo');
        $registration_data['otp'] =$otp; 
        $registration_data['active'] = $this->input->post('active');

        $response =array();
       
       
      if(array_key_exists("id",$this->input->input_stream())) {
            
            $id = $this->input->post('id');                         
            $results = $this->LOCATION_model->update($id,$registration_data);
            
            if($results=== TRUE) {       
                $response['status'] = "200";
                $response['msg'] ="update success";  
                $response1[] = $response;
                $res['msg'] = $response1;
                 $this->response($res, 200);    
            } else {
                $response =array();
                $response['status'] = "400";
                $response['msg'] ="update Fail"; 
                $response1[] = $response;
                $res['msg'] = $response1;
                 $this->response($res, 404);  
            }
        
        }else{
            $results = $this->LOCATION_model->insert($registration_data);
        
            if($results=== TRUE) {       
                $response['status'] = "200";
                $response['msg'] ="Insert success";  
                $response1[] = $response;
                $res['msg'] = $response1;
                 $this->response($res, 200);    
            } else {
    
                $response['status'] = "400";
                $response['msg'] ="Insert Fail"; 
                $response1[] = $response;
                $res['msg'] = $response1;
                 $this->response($res, 404);  
            }
            
        }

}



	 
}