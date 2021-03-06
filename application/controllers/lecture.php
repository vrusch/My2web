<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lecture extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'lecture_model'));

	}

	public function index()
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


	public function delete()
	{
		maintain_ssl();

		$data['lecture'] = $this->lecture_model->get_lecture();
		$this->load->view('lecture/manage_lecture', isset($data) ? $data : NULL);
	}

	public function view($id = NULL)
	{
		maintain_ssl();

		$data['lecture_item'] = $this->lecture_model->get_lecture($id);
		$this->load->view('lecture/view_lecture', isset($data) ? $data : NULL);
	}

	public function addto($lecture_id)
	{
		$this->form_validation->set_rules('quizz_id', 'Kviz', 'greater_than[0]');
		$this->form_validation->set_message('greater_than[0]', 'musite vybrat kviz');

		if ($this->form_validation->run() === FALSE) {
			$data['lecture'] = $this->lecture_model->get_lecture();
			$this->load->view('lecture/manage_lecture', isset($data) ? $data : NULL);
		} else {
			$quizz_id = $this->input->post('quizz_id');
			$this->lecture_model->set_rel_q_l($lecture_id, $quizz_id);
			$data['lecture'] = $this->lecture_model->get_lecture();
			$this->load->view('lecture/manage_lecture', isset($data) ? $data : NULL);
		}
	}
}
