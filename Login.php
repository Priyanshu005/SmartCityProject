<?php

class Login extends CI_Controller
{

    function __construct() {
        parent::__construct();        
        $this->load->library('Rest', array(
            'server' => 'http://localhost/smart_city_webservices',
            'api_key'  => 'REST API',
            'api_name' => 'X-API-KEY',
            'http_user' => 'admin',
            'http_pass' => '1234',
            'http_auth' => 'basic',
        ));       
    }
	
  
    function get($id1=0)
	{      
      $id = $this->uri->uri_to_assoc(3);
      $params = $this->uri->assoc_to_uri($id);
      $params = str_replace("%20","+",$params);
      $this->rest->format('application/json');
      $user = $this->rest->get('index.php/LOGIN_REST/data/'.$params,'','');
      $this->rest->debug();
    }

    
   function post($id=0) {
    
        $this->rest->format('application/json');
        $params = $this->input->post(NULL,TRUE);
        $user = $this->rest->post('index.php/LOGIN_REST/data/',$params,'');
        
        $this->rest->debug();
    }

function password($id=0) {
    
        $this->rest->format('application/json');
        $params = $this->input->post(NULL,TRUE);
        $user = $this->rest->post('index.php/LOGIN_REST/password/',$params,'');
        
        $this->rest->debug();
    }

  function activeuser($id=0) {
    
        $this->rest->format('application/json');
        $params = $this->input->post(NULL,TRUE);
        $user = $this->rest->post('index.php/LOGIN_REST/activeuser/',$params,'');
        
        $this->rest->debug();
    }
}



























