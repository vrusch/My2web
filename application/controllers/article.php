<?php
/**
 * Created by PhpStorm.
 * User: vrusc
 * Date: 10.12.2018
 * Time: 14:45
 */
class article extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->model(array('account/account_model'));
	}


	public function create ($page = 'create')
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}

		if ( ! file_exists(APPPATH.'views/articles/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();

		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('articles/'.$page, isset($data) ? $data : NULL);
	}
}
