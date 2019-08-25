<?php

class Location extends CI_Controller
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
      $user = $this->rest->get('index.php/LOCATION_REST/data/'.$params,'','');
      $this->rest->debug();
    }


     function getPlace($id1=0)
  {      
      $id = $this->uri->uri_to_assoc(3);
      $params = $this->uri->assoc_to_uri($id);
      $params = str_replace("%20","+",$params);
      $this->rest->format('application/json');
      $user = $this->rest->get('index.php/LOCATION_REST/place/'.$params,'','');
      $this->rest->debug();
    }

  function getCity($id1=0)
  {      
      $id = $this->uri->uri_to_assoc(3);
      $params = $this->uri->assoc_to_uri($id);
      $params = str_replace("%20","+",$params);
      $this->rest->format('application/json');
      $user = $this->rest->get('index.php/LOCATION_REST/dataCity/'.$params,'','');
      $this->rest->debug();
    }


     function getCat($id1=0)
  {      
      $id = $this->uri->uri_to_assoc(3);
      $params = $this->uri->assoc_to_uri($id);
      $params = str_replace("%20","+",$params);
      $this->rest->format('application/json');
      $user = $this->rest->get('index.php/LOCATION_REST/dataCat/'.$params,'','');
      $this->rest->debug();
    }



       function getPortfolio($id1=0)
  {      
      $id = $this->uri->uri_to_assoc(3);
      $params = $this->uri->assoc_to_uri($id);
      $params = str_replace("%20","+",$params);
      $this->rest->format('application/json');
      $user = $this->rest->get('index.php/LOCATION_REST/portfolio/'.$params,'','');
      $this->rest->debug();
    }

    
   function post($id=0) {
    
        $this->rest->format('application/json');
        $params = $this->input->post(NULL,TRUE);
        $user = $this->rest->post('index.php/LOCATION_REST/data/',$params,'');
        
        $this->rest->debug();
    }


}



























