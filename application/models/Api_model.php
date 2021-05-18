<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

 
		function insert_api($id) { 	
		  $data = array(
				'product' => $id,
				'created_at' =>date('Y-m-d')
		  );
		  $this->db->insert('assigment', $data);
			  if($this->db->affected_rows() > 0)
			  {
			   return true;
			  }
			  else
			  {
			   return false;
			  }
		} 	
	/* End */
}