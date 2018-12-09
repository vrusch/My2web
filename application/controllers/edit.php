<?php
/**
 * Created by PhpStorm.
 * User: vlado
 * Date: 08.12.2018
 * Time: 22:52
 */
//todo: doplnit logiku

class edit extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->model(array('account/account_model'));
	}

	public function adding($page = 'article')
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}

		if ( ! file_exists(APPPATH.'views/edit/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('edit/'.$page, isset($data) ? $data : NULL);
	}
}
