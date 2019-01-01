<?php

class course extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'course_model'));

	}

	public function manage()
	{
		maintain_ssl();

		$data['course'] = $this->course_model->get_course();
		$this->load->view('course/manage_course', isset($data) ? $data : NULL);
	}

	public function new_course()
	{
		maintain_ssl();
		$this->form_validation->set_rules('tema', 'Nazev', 'required');
		$this->form_validation->set_rules('course', 'Text', 'required');
		$this->form_validation->set_message('required', 'Povinne pole');


		if ($this->form_validation->run() === FALSE) {
			$this->load->view('course/add_course', isset($data) ? $data : NULL);
		} else {
			$this->course_model->set_course();
			$data['course'] = $this->course_model->get_course();
			$this->load->view('course/manage_course', isset($data) ? $data : NULL);
		}
	}
}
