<?php

class img extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper', 'file'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model'));
	}

	public function index()
	{
		maintain_ssl();
		$data['files'] = get_dir_file_info('./resource/img',TRUE,FALSE);
		$this->load->view('adm/images', isset($data) ? $data : NULL);
	}

	public function upload()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//$this->load->view('adm/upload_images', isset($data) ? $data : NULL);
		echo 'upload';
	}

	public function manipulate()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//$this->load->view('adm/upload_images', isset($data) ? $data : NULL);
		echo 'manipulate';
	}

	public function delete()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//$this->load->view('adm/upload_images', isset($data) ? $data : NULL);
		echo 'delete';
	}
}
