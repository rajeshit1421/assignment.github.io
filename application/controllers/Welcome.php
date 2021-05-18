<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
    {
        parent::__construct();
       
        $this->load->library('form_validation');
      
        $this->load->model('welcomeModel');
      

        //$this->data['yesterdayDate'] = date('d-m-Y', strtotime(date('Y-m-d')." -1 day"));
    }
	public function index()
	{
		 $this->data['datevalue'] = date('d-m-Y');
		$this->load->library('form_validation');
	/* 	$filter = array('product IN (1,2)' =>null);
		$this->data['DataList'] = $this->welcomeModel->getAllListCount($filter);		 */
		$this->load->view('dashboard/index',$this->data);
	}
	public function ajaxPaginationData()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
           
           $sDate = trim($this->input->post('date', TRUE));
          $filter = array();
		  $filter = array('product IN (1,2)' =>null);
            if($sDate !=''){
				  $filter['created_at'] =  date('Y-m-d', strtotime($sDate));
            }else{
                 $filter['created_at']= date('Y-m-d');
            }
            $this->data['DataList'] = $this->welcomeModel->getAllListCount($filter);
			
            $this->load->view('dashboard/dashboard',$this->data);
        } else {
            show_404();
        }
    } //ajaxPaginationData
}
