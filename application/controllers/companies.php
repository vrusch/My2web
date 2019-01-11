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

	public function index()
	{
		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('companies/manage_companies', isset($data) ? $data : NULL);
	}

	public function manage_mkb($company_id)
	{
		$data['company'] = $this->companies_model->get_companies($company_id);
		$data['mkb'] = $this->companies_model->get_mkb($company_id);
		$this->load->view('companies/manage_mkb', isset($data) ? $data : NULL);
	}

	public function create_mkb($company_id)
	{
		$this->form_validation->set_rules(
			'mkb_username', 'MKB username',
			'min_length[3]|max_length[10]|is_unique[a3m_account.username]',
			array(
				'is_unique'     => 'This %s already exists.'
			)
		);
		$this->form_validation->set_rules(
			'mkb_email', 'MKB email',
			'valid_email|is_unique[a3m_account.email]',
			array(
				'valid_email'     => 'This not valid email address.',
				'is_unique'     => 'This %s already exists.'
			)
		);
		if ($this->form_validation->run() === FALSE) {
			$data['company'] = $this->companies_model->get_companies($company_id);
			$this->load->view('companies/create_mkb', isset($data) ? $data : NULL);
		} else {
			$user_id = $this->companies_model->set_mkb($company_id);
			$this->companies_model->send_reg_mail($user_id, 'mkb'); //todo poslat mail
			$data['company'] = $this->companies_model->get_companies($company_id);
			$this->load->view('companies/manage_companies', isset($data) ? $data : NULL);
		}
	}

	public function manage_quizzes($company_id)
	{
		$data['company'] = $this->companies_model->get_companies($company_id);
		$this->load->view('companies/manage_quizzes', isset($data) ? $data : NULL);
	}

	public function create()
	{
		$this->form_validation->set_rules(
			'name', 'Název společnosti',
			'required|min_length[3]|max_length[40]|is_unique[4m2w_companies.name]',
			array(
				'required'      => 'You have not provided %s.',
				'is_unique'     => 'This %s already exists.'
			)
		);
		$this->form_validation->set_rules(
			'mkb_username', 'MKB username',
			'min_length[3]|max_length[10]|is_unique[a3m_account.username]',
			array(
				'is_unique'     => 'This %s already exists.'
			)
		);
		$this->form_validation->set_rules(
			'mkb_email', 'MKB email',
			'valid_email|is_unique[a3m_account.email]',
			array(
				'valid_email'     => 'This not valid email address.',
				'is_unique'     => 'This %s already exists.'
			)
		);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('companies/add_company', isset($data) ? $data : NULL);
		} else {
			$user_id = $this->companies_model->set_company();

			//send activation email ak firma ma mkb
			if ($user_id){
				$this->companies_model->send_reg_mail($user_id, 'mkb'); //todo poslat mail
			}
			$data['companies'] = $this->companies_model->get_companies();
			$this->load->view('companies/manage_companies', isset($data) ? $data : NULL);
		}
	}

	public function delete($id = NULL)
	{
		$this->companies_model->delete_company($id);
		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('companies/manage_companies', isset($data) ? $data : NULL); //todo: mazat ziakov
	}

	public function edit($id = NULL)
	{
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_message('required', 'Povinne pole');

			if ($this->form_validation->run() === FALSE) {
				$data['company_item'] = $this->companies_model->get_companies($id);
				$this->load->view('companies/edit_company', $data);
			} else {
				$this->companies_model->edit_company($id);
				$data['companies'] = $this->companies_model->get_companies();
				$this->load->view('companies/manage_companies', isset($data) ? $data : NULL);
			}
	}

	public function add_students($id = NULL)
	{
		$data['company'] = $this->companies_model->get_companies($id);
		$this->load->view('companies/add_students', isset($data) ? $data : NULL);
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
			//var_dump($delimiter);
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
		//var_dump($data);
		$this->load->view('companies/add_students', isset($data) ? $data : NULL);
	}

	public function add_finaly($company_id = NULL)
	{
		// rozdelit POST podminka aktivace? notifikace?
		$students = $_POST;
		foreach ($students as $students_item){

			if ($students_item['addzaka']){
				$user_id = $this->companies_model->add_students($students_item, $company_id);
				if ($students_item['eactivation']){
				$this->companies_model->send_reg_mail($user_id, 'student'); //todo poslat mail
				}
			}
		}
		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('companies/manage_companies', isset($data) ? $data : NULL);
	}

	public function add_groups($company_id = NULL)
	{
		$this->form_validation->set_rules('group1', 'nova skupina zaku', 'min_length[3]');


		if ($this->form_validation->run() === FALSE) {
			$data['company'] = $this->companies_model->get_companies($company_id);
			$data['groups'] = $this->companies_model->get_groups($company_id);
			$this->load->view('companies/add_groups', isset($data) ? $data : NULL);
		} else {
			$group = $this->input->post('group1');
			$this->companies_model->set_groups($company_id, $group);
			$data['company'] = $this->companies_model->get_companies($company_id);
			$data['groups'] = $this->companies_model->get_groups($company_id);
			$this->load->view('companies/add_groups', isset($data) ? $data : NULL);
		}
	}

	public function delgroup($company_id = NULL, $group_id = NULL){
		$this->companies_model->delete_group($company_id, $group_id);
		$data['company'] = $this->companies_model->get_companies($company_id);
		$data['groups'] = $this->companies_model->get_groups($company_id);
		$this->load->view('companies/add_groups', isset($data) ? $data : NULL);
	}

	public function addStoG($company_id = NULL, $phase = NULL)
	{
		if (!isset($phase)) {
		$data['company'] = $this->companies_model->get_companies($company_id);
		$data['groups'] = $this->companies_model->get_groups($company_id);
		$data['students'] = $this->companies_model->get_students($company_id);
		$this->load->view('companies/add_s_to_g', isset($data) ? $data : NULL);
		}
		if ($phase == '1'){
			$data = $_POST;
			$group_id = $data['group_id'];
			unset($data['group_id']);
			$this->companies_model->add_students_to_group($company_id, $group_id, $data);
			$data['company'] = $this->companies_model->get_companies($company_id);
			$data['groups'] = $this->companies_model->get_groups($company_id);
			$data['students'] = $this->companies_model->get_students($company_id);
			$this->load->view('companies/add_s_to_g', isset($data) ? $data : NULL);
		}
	}
}
