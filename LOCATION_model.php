<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LOCATION_model extends CI_Model{
    function __construct() {
        $this->userTbl = 'city_master';
        $this->userTb2 = 'state_master';
        $this->userTb3 = 'photo_master';
        $this->userTb4 = 'location_master';
		$this->load->database();
    }

    function getRows($params = array()){
       
        $this->db->select('*');
        $this->db->from($this->userTb2);
        //fetch data by conditions
    
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
                
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
		}            
            $query = $this->db->get();
             
				$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            
        
        return $result;
    }


    function getPlaces($params = array()){
       
        $this->db->select('*');
        $this->db->from($this->userTb4);
        //fetch data by conditions
    
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
                
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }            
            $query = $this->db->get();
             
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            
        
        return $result;
    }




function getPortfolio($params = array()){
       
        $this->db->select('*');
        $this->db->from($this->userTb3);
        //fetch data by conditions
    
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
                
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }            
            $query = $this->db->get();
             
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            
        
        return $result;
    }


    function getCityRows($params = array()){
       
        $this->db->select('*');
        $this->db->from($this->userTbl);
        //fetch data by conditions
    
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
                
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }            
            $query = $this->db->get();
             
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            
        
        return $result;
    }


    function getCatRows($params = array()){
       
        $this->db->select('*');
        $this->db->from('categories_master');
        //fetch data by conditions
    
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
                
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }            
            $query = $this->db->get();
             
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            
        
        return $result;
    }

public function insert($data = array()) { 
        //insert user data to users table
      //  print_r($data); die();
    
        $insert = $this->db->insert($this->userTbl, $data);

        return $insert;
          
    }
function update($id,$data = array()) {
        //printf($user_id);
        //print_r($data);
        $this->db->where('id', $id);
        $result = $this->db->update($this->userTbl, $data);
        return $result;
    }  

function updatePassword($mobile,$data = array()) {
        //printf($user_id);
        //print_r($data);
        $this->db->where('mobile', $mobile);
        $result = $this->db->update($this->userTbl, $data);
        return $result;
    }  
    
}