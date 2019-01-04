<?php

class company extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'companies_model'));
	}

	public function index()
	{
		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('mkb/manage_companies', isset($data) ? $data : NULL);
	}

	public function create()
	{
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

	public function add_students($id = NULL)
	{
		$data['company'] = $this->companies_model->get_companies($id);
		$this->load->view('adm/add_students', isset($data) ? $data : NULL);
	}

	public function csv_parse()
	{
		$data['company'] = $this->companies_model->get_companies($_POST['id']);
		if(isset($_FILES['csv_file']))
		{
			$csv = $_FILES['csv_file']['tmp_name'];
			$pol = 0;
			$opencsv = fopen($csv,"r");

			$delimiter = $this->companies_model->detectDelimiter($opencsv);
			var_dump($delimiter);
			while (($row = fgetcsv($opencsv, 10000, $delimiter)) != FALSE)
			{
				//print_r($row);
				$data['zaci'][$pol]['name'] = $row[0];
				$data['zaci'][$pol]['surname'] = $row[1];
				$data['zaci'][$pol]['email'] = $row[2];
				$data['zaci'][$pol]['username'] = $this->companies_model->gen_username($row[0], $row[1]);
				$pol++;
			}
		}
		$data['company']['phase'] = '1';
		$this->load->view('adm/add_students', isset($data) ? $data : NULL);
	}

	public function add_finaly()
	{
		//todo: datum
		//todo: vlozit do tabulky users vratit id a zapisat do tab zaci par companyid - zakid
		$this->companies_model->add_user();

		$this->load->view('adm/manage_companies', isset($data) ? $data : NULL);
		var_dump ($_POST);
	}
}
