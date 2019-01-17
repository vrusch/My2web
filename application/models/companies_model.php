<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class companies_model extends CI_Model
{

	public function __construct()
	{
		$this->load->helper(array('email'));
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

	public function get_group_info($group_id)
	{
		$query = $this->db->get_where('4m2w_company_group', array('id' => $group_id));
		return $query->row_array();;
	}

	public function get_mkb($company_id)
	{
		$sql = "SELECT 4m2w_mkb.user_id, 4m2w_mkb.activation, 4m2w_mkb.activation_date, 4m2w_mkb.status, 4m2w_mkb.company_id, a3m_account.username, a3m_account.email FROM `4m2w_mkb` JOIN a3m_account ON 4m2w_mkb.user_id = a3m_account.id WHERE 4m2w_mkb.company_id = ?;";
		$query = $this->db->query($sql, $company_id);
		return $query->row_array();
	}

	public function get_quizzes()
	{
		$query = $this->db->get_where('4m2w_quizzes');
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
		}else{
			$this->db->where(array('account_id' => $account_id));
			$this->db->delete('a3m_rel_account_role');
			$this->db->where(array('user_id' => $account_id));
			$this->db->delete('4m2w_mkb');
			$this->db->where(array('account_id' => $account_id));
			$this->db->delete('a3m_account_details');
			$this->db->where(array('id' => $account_id));
			$this->db->delete('a3m_account');
		}

	}

	public function set_mkb($company_id){
		if ($this->input->post('mkb_username') != '') {
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
			print_r ($this->email->print_debugger());
        }
	}
}

