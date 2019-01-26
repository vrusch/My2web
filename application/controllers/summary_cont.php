<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class summary_cont extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'summary_model'));
	}

	public function index($current = NULL, $subpagecontent = NULL, $data = NULL)
	{
		$data['students'] = $this->summary_model->get_all_students();
		if ($current === NULL){
			$data['display'] = array('page' => 'edit', 'current' => 'home');
		}else{
			$data['display'] = array('page' => $subpagecontent, 'current' => $current);
		}
		$this->load->view('summary/summary', isset($data) ? $data : NULL);
	}
}
