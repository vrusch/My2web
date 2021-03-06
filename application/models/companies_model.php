<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class companies_model extends CI_Model
{

	public function __construct()
	{
		$this->load->helper(array('email', 'date'));
		$this->load->library(array('email'));
		$this->load->database();
	}

	public function get_companies($company_id = FALSE)
	{
		if ($company_id === FALSE)
		{
			$query = $this->db->get('4m2w_companies');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_companies', array('id' => $company_id));
		return $query->row_array();
	}

	public function get_groups($company_id)
	{
		$query = $this->db->get_where('4m2w_company_group', array('company_id' => $company_id));
		return $query->result_array();
	}

	public function get_students($company_id = FALSE)
	{
		if ($company_id === FALSE)
		{
			$query = $this->db->get('4m2w_students');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_students', array('company_id' => $company_id));
		return $query->result_array();
	}

	public function get_student_info($student_id)
	{
		$sql = "SELECT a3m_account.id, a3m_account.username, a3m_account.email, a3m_account_details.firstname, a3m_account_details.lastname FROM a3m_account INNER JOIN a3m_account_details ON a3m_account_details.account_id = a3m_account.id WHERE a3m_account.id = ?";
		$query = $this->db->query($sql, $student_id);
		return $query->row_array();
	}

	public function get_account_info($student_id)
	{
		$query = $this->db->get_where('a3m_account', array('id' => $student_id));
		return $query->row_array();
	}

	public function get_group_info($group_id)
	{
		$query = $this->db->get_where('4m2w_company_group', array('id' => $group_id));
		return $query->row_array();;
	}

	public function get_mkb($company_id)
	{
		$sql = "SELECT 4m2w_mkb.user_id, 4m2w_mkb.activation, 4m2w_mkb.activation_date, 4m2w_mkb.company_id, a3m_account.username, a3m_account.email, a3m_account.suspendedon FROM `4m2w_mkb` JOIN a3m_account ON 4m2w_mkb.user_id = a3m_account.id WHERE 4m2w_mkb.company_id = ?;";
		$query = $this->db->query($sql, $company_id);
		return $query->row_array();
	}

	public function get_quizzes()
	{
		$query = $this->db->get('4m2w_quizzes');
		return $query->result_array();
	}

	public function get_quizzes_by_group($company_id, $groups_id)
	{

		$query = $this->db->query("SELECT 
				  4m2w_company_quizzes.company_id, 4m2w_company_quizzes.group_id, 4m2w_company_quizzes.quiz_id, 4m2w_quizzes.name
				FROM 4m2w_company_quizzes 
				JOIN 4m2w_quizzes 
				ON 4m2w_company_quizzes.quiz_id = 4m2w_quizzes.id 
				AND 4m2w_company_quizzes.company_id = '$company_id' 
				AND 4m2w_company_quizzes.group_id = '$groups_id'");
		return $query->result_array();
	}

	public function set_groups($company_id, $group_name)
	{
		$this->db->insert('4m2w_company_group', array('company_id' => $company_id, 'name_of_group' => $group_name));
	}

	public function del_group($company_id, $group_id)
	{
		$this->db->delete('4m2w_company_group', array('company_id' => $company_id, 'id' => $group_id));
	}

	public function ban_company_tree($company_id)
	{
		$this->load->helper('date');
		$date = mdate('%Y-%m-%d %H:%i:%s', now());
		//4m2w_companies; id,status
		$data = array(
			'status' => 'banned'
		);
		$this->db->where('id', $company_id);
		$this->db->update('4m2w_companies', $data);
		//4m2w_mkb
		$this->db->select('user_id');
		$query = $this->db->get_where('4m2w_mkb', array('company_id' => $company_id));
		$mkb = $query->row_array();

		//4m2w_students
		$this->db->select('student_id');
		$query = $this->db->get_where('4m2w_students', array('company_id' => $company_id));
		$students = $query->result_array();

		//a3m_account
		$data = array(
			'suspendedon' => $date
		);
		$this->db->where('id', $mkb['user_id']);
		$this->db->update('a3m_account', $data);

		foreach ($students as $students_item){
			$this->db->where('id', $students_item['student_id']);
			$this->db->update('a3m_account', $data);
		}
	}

	public function un_ban_company_tree($company_id)
	{
		//4m2w_companies; id,status
		$data = array(
			'status' => NULL
		);
		$this->db->where('id', $company_id);
		$this->db->update('4m2w_companies', $data);
		//4m2w_mkb
		$this->db->select('user_id');
		$query = $this->db->get_where('4m2w_mkb', array('company_id' => $company_id));
		$mkb = $query->row_array();

		//4m2w_students
		$this->db->select('student_id');
		$query = $this->db->get_where('4m2w_students', array('company_id' => $company_id));
		$students = $query->result_array();

		//a3m_account
		$data = array(
			'suspendedon' => NULL
		);
		$this->db->where('id', $mkb['user_id']);
		$this->db->update('a3m_account', $data);

		foreach ($students as $students_item){
			$this->db->where('id', $students_item['student_id']);
			$this->db->update('a3m_account', $data);
		}
	}

	public function del_company($company_id)
	{
		$this->db->where('id', $company_id);
		$this->db->delete('4m2w_companies');
		//4m2w_mkb
		$this->db->select('user_id');
		$query = $this->db->get_where('4m2w_mkb', array('company_id' => $company_id));
		$mkb = $query->row_array();

		//4m2w_students
		$this->db->select('student_id');
		$query = $this->db->get_where('4m2w_students', array('company_id' => $company_id));
		$students = $query->result_array();

		//a3m_account
		$this->db->where('id', $mkb['user_id']);
		$this->db->delete('a3m_account');
		$this->db->where('account_id', $mkb['user_id']);
		$this->db->delete('a3m_account_details');
		$this->db->where('account_id', $mkb['user_id']);
		$this->db->delete('a3m_rel_account_role');

		//4m2w_mkb
		$this->db->where('company_id', $company_id);
		$this->db->delete('4m2w_mkb');

		foreach ($students as $students_item){
			$this->db->where('id', $students_item['student_id']);
			$this->db->delete('a3m_account');
			$this->db->where('account_id', $students_item['student_id']);
			$this->db->delete('a3m_account_details');
			$this->db->where('account_id', $students_item['student_id']);
			$this->db->delete('a3m_rel_account_role');
			$this->db->where('student_id', $students_item['student_id']);
			$this->db->delete('4m2w_students');
		}
	}

	public function set_company()
	{
		$data = array(
			'name' => $this->input->post('name')
		);
		$this->db->insert('4m2w_companies', $data);
		$company_id = $this->db->insert_id();

		if ($this->input->post('mkb_username') != '') {
			$user_id = $this->set_mkb($company_id);
		}
		return isset($user_id) ? $user_id : NULL;
	}

	public function set_name_company($company_id)
	{
		$data = array(
			'name' => $this->input->post('company_name')
		);
		$this->db->where('id', $company_id);
		$this->db->update('4m2w_companies', $data);
	}

	public function add_students_to_group($company_id, $group_id, $students)
	{
		foreach ($students as $key => $row){
			if (!$this->db->replace('4m2w_students', array('student_id' => $key, 'company_id' => $company_id, 'group_id' => $group_id))){
				$error = $this->db->error();
				print_r($error);
				//todo: zpracovani DB chyby
			};
		}
	}

	public function del_mkb($account_id)
	{
		$query = $this->db->get_where('a3m_rel_account_role', array('account_id' => $account_id));
		$rel_account_role = count($query->result_array());
		if ($rel_account_role > 1) {
			$this->db->select('id');
			$query = $this->db->get_where('a3m_acl_role', array('name' => 'MKB'));
			$mkb_role_id = $query->row_array();
			$this->db->where(array('account_id' => $account_id, 'role_id' => $mkb_role_id['id']));
			$this->db->delete('a3m_rel_account_role');
			$this->db->where(array('user_id' => $account_id));
			$this->db->delete('4m2w_mkb');
			$this->db->where(array('student_id' => $account_id));
			$this->db->delete('4m2w_students');
		}else{
			$this->db->where(array('account_id' => $account_id));
			$this->db->delete('a3m_rel_account_role');
			$this->db->where(array('user_id' => $account_id));
			$this->db->delete('4m2w_mkb');
			$this->db->where(array('account_id' => $account_id));
			$this->db->delete('a3m_account_details');
			$this->db->where(array('id' => $account_id));
			$this->db->delete('a3m_account');
			$this->db->where(array('student_id' => $account_id));
			$this->db->delete('4m2w_students');
		}

	}

	public function set_mkb($company_id){
			$this->load->helper('date');
			$data_user = array(
				'username' => $this->input->post('mkb_username'),
				'email' => $this->input->post('mkb_email'),
				'createdon' => mdate('%Y-%m-%d %H:%i:%s', now())
			);
			if (!$query_user = $this->db->insert('a3m_account', $data_user)) {
				$error = $this->db->error();
				print_r($error);
				//todo: zpracovani DB chyby
			}
			$user_id = $this->db->insert_id();

			//ziskat id MKB role
			$this->db->select ('id');
			$query = $this->db->get_where('a3m_acl_role', array('name' => 'MKB'));
			$mkb_id = $query->row_array();
			$data_a3m_rel_account_role = array(
				'account_id' => $user_id,
				'role_id' => $mkb_id['id']
			);
			if (!$query_rel_account_role = $this->db->insert('a3m_rel_account_role', $data_a3m_rel_account_role)) {
				$error = $this->db->error();
				print_r($error);
				//todo: zpracovani DB chyby
			}

			$data_mkb = array(
				'company_id' => $company_id,
				'user_id' => $user_id
			);
			if (!$query_mkb = $this->db->insert('4m2w_mkb', $data_mkb)) {
				$error = $this->db->error();
				print_r($error);
				//todo: detekce DB chyby
			}

			$data_student = array(
				'company_id' => $company_id,
				'student_id' => $user_id,
				'group_id' => '0',
				'attribut' => 'mkb'
			);
			if (!$query_mkb = $this->db->insert('4m2w_students', $data_student)) {
				$error = $this->db->error();
				print_r($error);
				//todo: detekce DB chyby
			}

			if( $this->input->post('mkb_lastname') == FALSE){
				$data_acc_detail = array(
					'account_id' => $user_id,
					'firstname' => NULL,
					'lastname' => NULL
				);
			}else{
				$data_acc_detail = array(
					'account_id' => $user_id,
					'firstname' => $this->input->post('mkb_firstname'),
					'lastname' => $this->input->post('mkb_lastname')
				);
			}

			if (!$query_mkb = $this->db->insert('a3m_account_details', $data_acc_detail)) {
				$error = $this->db->error();
				print_r($error);
				//todo: detekce DB chyby
			}
		return isset($user_id) ? $user_id : NULL;
	}

	public function set_mkb_from($company_id, $user_id){
		$this->db->select ('id');
		$query = $this->db->get_where('a3m_acl_role', array('name' => 'MKB'));
		$mkb_id = $query->row_array();
		$data_a3m_rel_account_role = array(
			'account_id' => $user_id,
			'role_id' => $mkb_id['id']
		);
		if (!$query_rel_account_role = $this->db->insert('a3m_rel_account_role', $data_a3m_rel_account_role)) {
			$error = $this->db->error();
			print_r($error);
			//todo: zpracovani DB chyby
		}

		$data_mkb = array(
			'company_id' => $company_id,
			'user_id' => $user_id
		);
		if (!$query_mkb = $this->db->insert('4m2w_mkb', $data_mkb)) {
			$error = $this->db->error();
			print_r($error);
			//todo: detekce DB chyby
		}

		$data_student = array(
			'attribut' => 'mkb'
		);
		$this->db->where('student_id', $user_id);
		if (!$query_mkb = $this->db->update('4m2w_students', $data_student)) {
			$error = $this->db->error();
			print_r($error);
			//todo: detekce DB chyby
		}
	}

	function send_reg_mail($user_id, $role =NULL)
	{
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));

		// Set reset datetime
		$time = $this->account_model->update_sent_activation($user_id);

		// Load email library
		$this->load->library('email');

		// Set up email preferences
		$config['mailtype'] = 'html';
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'localhost';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['newline'] = '\r\n';
		$config['MIME-Version'] = '1.0';
		$config['header'] = 'MIME-Version: 1.0';
		$config['header'] = 'Content-type:text/html;charset=UTF-8';

		// Initialise email lib
		$this->email->initialize($config);

		// Generate reset password url
		$password_reset_url = site_url('account/reset_password?id=' . $user_id . '&token=' . sha1($user_id . $time . $this->config->item('password_reset_secret')));

		var_dump($password_reset_url);
		// Send reset password email
		//$this->email->from($this->config->item('password_reset_email', 'reset_password_email_sender'));
		$this->email->from('googus@seznam.cz');
		$this->email->to('v.rusch@gmail.com'); //todo: zatial testovaci mail, spravne z 4m2w_mkb
		$this->email->subject('bla bla');
		$this->email->message($this->load->view('account/activation_email', array(
			'username' => 'mkb1', //todo: dodat spavne username z 4m2w_mkb
			'password_reset_url' => anchor($password_reset_url, $password_reset_url)
		), TRUE));

		if ($this->email->send()) {
        // Load reset password sent view
			//print_r ($this->email->print_debugger());
        } else {
        //if the email could not be sent it will display the error
        //should not happen if you have email configured correctly
			print_r('NEPOSLALO SE TO');
			//print_r ($this->email->print_debugger());
        }
	}

	function add_new_students($students_item, $company_id, $student_role){
		// a3m_account, a3m_account_details, a3m_rel_account_role, 4m2w_students
		$data_a3m_account = array(
			'username' => $students_item['username'],
			'email' => $students_item['email'],
			'createdon' => mdate('%Y-%m-%d %H:%i:%s', now())
		);
		$this->db->insert('a3m_account', $data_a3m_account);
		$user_id = $this->db->insert_id();

		$data_a3m_account_details = array(
			'account_id' => $user_id,
			'firstname' => $students_item['name'],
			'lastname' => $students_item['surname']
		);
		$this->db->insert('a3m_account_details', $data_a3m_account_details);

		$data_a3m_rel_account_role = array(
			'account_id' => $user_id,
			'role_id' => $student_role['id']
		);
		$this->db->insert('a3m_rel_account_role', $data_a3m_rel_account_role);

		$data_4m2w_students = array(
			'student_id' => $user_id,
			'company_id' => $company_id,
			'group_id' => 0
		);
		$this->db->insert('4m2w_students', $data_4m2w_students);
		return $user_id;
	}

	function get_all_quizzes_by_company($company_id){
		$this->db->order_by('group_id', 'ASC');
		$query = $this->db->get_where('4m2w_company_quizzes', array('company_id' => $company_id));
		return ($query->result_array());
	}

	function get_quizz_info($quizz_id){
		$query = $this->db->get_where('4m2w_quizzes', array('id' => $quizz_id));
		return ($query->row_array());
	}

	function get_std_indiv($company_id, $student_id = NULL){
		if ($student_id == NULL){
			$query = $this->db->get_where('4m2w_indiv_quizzes', array('company_id' => $company_id));
			return ($query->result_array());
		} else {
			$query = $this->db->get_where('4m2w_indiv_quizzes', array('company_id' => $company_id, 'student_id' => $student_id));
			return ($query->result_array());
		}
	}

}

