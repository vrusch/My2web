<?php

class lecture extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'lecture_model'));

	}

	public function manage()
	{
		maintain_ssl();

		$data['lecture'] = $this->lecture_model->get_lecture();
		$this->load->view('lecture/manage_lecture', isset($data) ? $data : NULL);
	}

	public function create()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}

		$this->form_validation->set_rules('name', 'Název', 'required');
		$this->form_validation->set_message('required', 'Povinne pole');


		if ($this->form_validation->run() === FALSE) {
			$this->load->view('lecture/create_lecture', isset($data) ? $data : NULL);
		} else {
			$this->lecture_model->add_lecture();
			$data['lecture'] = $this->lecture_model->get_lecture();
			$this->load->view('lecture/manage_lecture', isset($data) ? $data : NULL);
		}
	}

	public function edit()
	{
		maintain_ssl();

		$data['lecture'] = $this->lecture_model->get_lecture();
		$this->load->view('lecture/manage_lecture', isset($data) ? $data : NULL);
	}

	public function add_to_course()
	{
		maintain_ssl();

		$data['lecture'] = $this->lecture_model->get_lecture();
		$this->load->view('lecture/manage_lecture', isset($data) ? $data : NULL);
	}
}
