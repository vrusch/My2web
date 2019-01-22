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

	public function edit($company_id, $current = NULL, $subpagecontent = NULL, $data = NULL)
	{
		$data['company'] = $this->companies_model->get_companies($company_id);
		$data['groups'] = $this->companies_model->get_groups($company_id);
		$data['students'] = $this->companies_model->get_students($company_id);
		$data['mkb'] = $this->companies_model->get_mkb($company_id);
		$data['quizzes'] = $this->companies_model->get_quizzes();
		if ($current === NULL){
			$data['display'] = array('page' => 'edit', 'current' => 'home');
		}else{
			$data['display'] = array('page' => $subpagecontent, 'current' => $current);
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
				$this->companies_model->send_reg_mail($user_id, 'mkb');
			}
			$data['companies'] = $this->companies_model->get_companies();
			$this->load->view('companies/manage_companies', isset($data) ? $data : NULL);
		}
	}

	public function ban_company($company_id)
	{
		$this->companies_model->ban_company_tree($company_id);
		$this->edit($company_id);
	}

	public function un_ban_company($company_id)
	{
		$this->companies_model->un_ban_company_tree($company_id);
		$this->edit($company_id);
	}

	public function delete_company($company_id)
	{
		$this->companies_model->del_company($company_id);
		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('companies/manage_companies', isset($data) ? $data : NULL);
	}

	public function add_group($company_id)
	{
		$this->form_validation->set_rules('group1', 'Nová skupina', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->edit($company_id, 'menu1');
		} else {
			$group_name = $this->input->post('group1');
			$this->companies_model->set_groups($company_id, $group_name);
			$this->edit($company_id, 'menu1');
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
		$this->form_validation->set_rules(
			'mkb_firstname', 'mkb_firstname',
			'min_length[3]|max_length[15]'
		);
		$this->form_validation->set_rules(
			'mkb_lastname', 'mkb_lastname',
			'min_length[2]|max_length[15]'
		);

		if ($this->form_validation->run() === FALSE) {
			$this->edit($company_id, 'menu4', 'edit');
		} else {
			$user_id = $this->companies_model->set_mkb($company_id);

			//send activation email ak firma ma mkb
			if ($user_id){
				$this->companies_model->send_reg_mail($user_id, 'mkb');
			}
			$this->edit($company_id, 'menu4', 'edit');;
		}
	}

	public function create_mkb_from($company_id, $mkb_id){

		$this->companies_model->set_mkb_from($company_id, $mkb_id);

		$this->companies_model->send_reg_mail($mkb_id, 'mkb'); //todo poslat mail o pridani role nie aktivacny

		$this->edit($company_id, 'menu4', 'edit');;
	}

	public function delete_mkb($company_id, $mkb_id){
		$this->companies_model->del_mkb($mkb_id);
		$this->edit($company_id, 'menu4', 'edit');
	}

	public function add_students_to_group($company_id){
		$post = $_POST;
		$group_id = $post['group_id'];
		unset($post['group_id']);
		$this->companies_model->add_students_to_group($company_id, $group_id, $post);
		$this->edit($company_id, 'menu2', 'edit');
	}

	public function detectDelimiter($fh)
	{
		$delimiters = ["\t", ";", "|", ","];
		$data_1 = null; $data_2 = null;
		$delimiter = $delimiters[0];
		foreach($delimiters as $d) {
			$data_1 = fgetcsv($fh, 4096, $d);
			if(($data_1) > ($data_2)) {
				$delimiter = ($data_1) > ($data_2) ? $d : $delimiter;
				$data_2 = $data_1;
			}
			rewind($fh);
		}
		return $delimiter;
	}

	function gen_username($firstname, $lastname) {
		$name1 = strtolower(substr($firstname, 0, 2));
		$name2 = strtolower(substr($lastname, 0, 6));
		$nrRand = rand(10, 99);
		return $name1 . $name2 . $nrRand;
	}

	public function csv_parse($company_id) //todo: pridat kontrolu ci uz neexistuje
	{
		if(isset($_FILES['csv_file']))
		{
			$csv = $_FILES['csv_file']['tmp_name'];
			$pol = 0;
			$opencsv = fopen($csv,"r");

			$delimiter = $this->detectDelimiter($opencsv);
			//var_dump($delimiter);
			while (($row = fgetcsv($opencsv, 10000, $delimiter)) != FALSE)
			{
				//print_r($row);
				$data['zaci'][$pol]['name'] = $row[0];
				$data['zaci'][$pol]['surname'] = $row[1];
				$data['zaci'][$pol]['email'] = $row[2];
				$data['zaci'][$pol]['username'] = $this->gen_username($row[0], $row[1]);
				$pol++;
			}
		}
		$this->edit($company_id, 'home', 'students_new', $data);
	}

	public function add_students($company_id)
	{
		$this->db->select('id');
		$query = $this->db->get_where('a3m_acl_role', array('name' => 'Student'));
		$student_role = $query->row_array();
		$new_students = $_POST;
		foreach ($new_students as $students_item){

			if ($students_item['addzaka']){
				$user_id = $this->companies_model->add_new_students($students_item, $company_id, $student_role);
					//$this->companies_model->send_reg_mail($user_id, 'student'); //todo poslat mail
			}
		}
		$this->edit($company_id);
	}

	public function add_student($company_id)
	{
		$this->db->select('id');
		$query = $this->db->get_where('a3m_acl_role', array('name' => 'Student'));
		$student_role = $query->row_array();
		//todo: napisat validaciu formulara cez ajax alebo JS
		$students_item['username'] = $this->input->post('username');
		$students_item['email'] = $this->input->post('email');
		$students_item['name'] = $this->input->post('firstname');
		$students_item['surname'] = $this->input->post('lastname');
		$user_id = $this->companies_model->add_new_students($students_item, $company_id, $student_role);
		//$this->companies_model->send_reg_mail($user_id, 'student'); //todo poslat mail

		$this->edit($company_id);
	}

	public function manage_quizzes($company_id, $group_id)
	{
		var_dump($_POST);
		var_dump($company_id);
		var_dump($group_id);
	}
}
