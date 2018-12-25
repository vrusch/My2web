<?php

class news extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'news_model'));
	}

	public function manage()
	{
		maintain_ssl();
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News archive';
		$this->load->view('news/manage_news', isset($data) ? $data : NULL);
	}

	public function update($slug = NULL)
	{
		$data['news_item'] = $this->news_model->get_news($slug);
		if (empty($data['news_item']))
		{
			show_404();
		}
		$data['title'] = $data['news_item']['title'];
		$this->load->view('news/update', $data);
	}

	public function view($slug = NULL)
	{
		maintain_ssl();
		$data['news_item'] = $this->news_model->get_news($slug);
		if (empty($data['news_item']))
		{
			show_404();
		}
		$data['title'] = $data['news_item']['title'];
		$this->load->view('news/view', $data);
	}

	public function create()
	{
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}

		//$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('text', 'Text', 'required');
		//$this->form_validation->set_message('required', 'Povinne pole');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('news/create', isset($data) ? $data : NULL);
		}
		else
		{
			$this->news_model->set_news();
			$this->load->view('news/success', isset($data) ? $data : NULL);
		}
	}
}
