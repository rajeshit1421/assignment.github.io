<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
		
class General extends REST_Controller {
	
	private $__queryStatus = FALSE;
	private $__id = NULL;
	private $__encId = NULL;
	private $banner_path = "";
	private $document_path = "";
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('Api_model');
	}//end constructor

	public function index(){		
		show_404();
	}//end index function
	
	 /**

     * url: {site-path}/api/lite/General/getbanner
     * @param: {"banner_type":""}
     * method: post
     */
	
	public function getApiData_get()
	{
		$responseData = array();
		$responseArr = array();
        $failMsg = "ID Required";
        $getdata = $_GET['id'];
		if($getdata!=''){
			
			$result = $this->Api_model->insert_api($getdata);
		}else{ 
			$responseArr['response_code'] = 204;
			$responseArr['response_msg'] = $failMsg;
			$responseArr['response_data'] = $responseData;
		    $this->response($responseArr, 200); 
	    }
		
		if(count($result)>0){
			$responseData = $result;
		}
		if(count($responseData) == true)
        {		 
			$responseArr['response_code'] = 200;
			$responseArr['response_msg'] = 'Success';		
			$responseArr['response_data'] = $result;
          	$this->response($responseArr, 200); 
	    }else{ 
			$responseArr['response_code'] = 204;
			$responseArr['response_msg'] = $failMsg;
			$responseArr['response_data'] = $responseData;
		    $this->response($responseArr, 200); 
	    }
	}	
	/* Token Validation */
	 public function validateToken($tokenArr=array())
	{ 
		if(count($tokenArr))
		{
			$systemToken = md5(md5(SMART_CITY_API_KEY).$tokenArr['rnum']);
			
			if((strtotime(date('H:i:s')) - $tokenArr['rnum'])  > 120 ){
				$responseArr['response_code'] = 85;
			     $responseArr['response_msg'] = "Request time expired.";
			     $this->response($responseArr, 200); 
			}
			if($systemToken == $tokenArr['token']){
				return true;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}
	/* END NEW API FOR SMART CITY BHOPAL */
}//end class General


