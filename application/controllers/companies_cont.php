<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class companies_cont extends CI_Controller
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

	public function edit_company_name($company_id)
	{
		$this->companies_model->set_name_company($company_id);
		$this->edit($company_id);
	}

	public function edit($company_id, $current = NULL)
	{
		$data['company'] = $this->companies_model->get_companies($company_id);
		$data['groups'] = $this->companies_model->get_groups($company_id);
		$data['students'] = $this->companies_model->get_students($company_id);
		$data['mkb'] = $this->companies_model->get_mkb($company_id);
		$data['quizzes'] = $this->companies_model->get_quizzes();
		if ($current === NULL){
			$data['display'] = array('page' => 'edit', 'current' => 'home');
		}else{
			$data['display'] = array('page' => 'edit', 'current' => $current);
		}
		$this->load->view('companies/edit_company', isset($data) ? $data : NULL);
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

	public function add_group($company_id)
	{
		$this->form_validation->set_rules('group1', 'Nová skupina', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->edit($company_id, 'menu1');
		} else {
			$group_name = $this->input->post('group1');
			$this->companies_model->set_groups($company_id, $group_name);
			$this->edit($company_id, 'menu1');;
		}
	}

	public function del_group($company_id, $group_id){
		$this->companies_model->del_group($company_id, $group_id);
		$this->edit($company_id, 'menu1');
	}

	public function create_mkb($company_id){
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
			$this->edit($company_id, 'menu4');
		} else {
			$user_id = $this->companies_model->set_mkb($company_id);

			//send activation email ak firma ma mkb
			if ($user_id){
				$this->companies_model->send_reg_mail($user_id, 'mkb'); //todo poslat mail
			}
			$this->edit($company_id, 'menu4');;
		}

	}

	public function delete_mkb($company_id, $mkb_id){

		$this->edit($company_id, 'menu4');
	}

	public function email($company_id){ //todo: jenom testovaci sendmail
		$this->companies_model->send_reg_mail($company_id);
	}
}
