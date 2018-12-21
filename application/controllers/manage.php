<?php

class manage extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper', 'form'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'news_model'));
	}

	public function companies()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News archive';

		$this->load->view('adm/manage_companies', isset($data) ? $data : NULL);
	}

	public function slogan()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//$data['news'] = $this->news_model->get_news();
		//$data['title'] = 'News archive';

		$this->load->view('adm/manage_slogan', isset($data) ? $data : NULL);
	}

	public function courses()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//$data['news'] = $this->news_model->get_news();
		//$data['title'] = 'News archive';

		$this->load->view('course/manage_course', isset($data) ? $data : NULL);
	}

	public function lectures()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//$data['news'] = $this->news_model->get_news();
		//$data['title'] = 'News archive';

		$this->load->view('lecture/manage_lecture', isset($data) ? $data : NULL);
	}

	public function assignment()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//$data['news'] = $this->news_model->get_news();
		//$data['title'] = 'News archive';

		$this->load->view('adm/manage_assignment', isset($data) ? $data : NULL);
	}
}
