<?php

class companies extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'companies_model'));

	}

	public function manage()
	{
		maintain_ssl();

		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('adm/manage_companies', isset($data) ? $data : NULL);
	}

	public function create()
	{
		maintain_ssl();
		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_message('required', 'Povinne pole');


		if ($this->form_validation->run() === FALSE) {
			$this->load->view('adm/add_company', isset($data) ? $data : NULL);
		} else {
			$this->companies_model->set_companies();
			$data['companies'] = $this->companies_model->get_companies();
			$this->load->view('adm/manage_companies', isset($data) ? $data : NULL);
		}
	}

	public function delete($id = NULL)
	{
		maintain_ssl();
		if ($this->authentication->is_signed_in()) {
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}

		$this->companies_model->delete_company($id);
		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('adm/manage_companies', isset($data) ? $data : NULL);
	}

	public function update($id = NULL)
	{
		if ($id != '') {

			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_message('required', 'Povinne pole');

			if ($this->form_validation->run() === FALSE) {
				$data['companies_item'] = $this->companies_model->get_companies($id);
				$this->load->view('adm/edit_company', $data);
			} else {
				$this->companies_model->update_company();
				$data['companies'] = $this->companies_model->get_companies();
				$this->load->view('adm/manage_companies', isset($data) ? $data : NULL);
			}
		}
	}
}
