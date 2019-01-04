<?php

class images extends CI_Controller
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
		$this->load->view('adm/manage_images', isset($data) ? $data : NULL);
	}

	public function upload()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('adm/upload_images', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('adm/manage_images', $data);
		}
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
