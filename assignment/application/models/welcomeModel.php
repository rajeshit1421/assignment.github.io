<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class welcomeModel extends CI_Model
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
	function getAllListCount($filter=array()){
		
	//print_r(count($filter));exit;
			$this->db->select(" id,sum(case when product = '1' then 1 else 0 end) AS productaCount,sum(case when product = '2' then 1 else 0 end) AS productbCount");
			$this->db->from('assigment');
				if(count($filter)>0){
				$this->db->where($filter);
			} 
			$this->db->group_by('product'); 
			$query = $this->db->get();
		
			if($query->num_rows()>0){
				return $query->result_array();
			}
		
		return FALSE;
		
	}// end getAllList function
}