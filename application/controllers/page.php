<?php

class page extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper', 'form'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'news_model'));
	}

	public function upload_images()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//$data['news'] = $this->news_model->get_news();
		//$data['title'] = 'News archive';

		$this->load->view('adm/upload_images', isset($data) ? $data : NULL);
	}
}
