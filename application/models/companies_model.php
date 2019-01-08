<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class companies_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_companies($id = FALSE)
	{
		if ($id === FALSE)
		{
			$query = $this->db->get('4m2w_companies');
			return $query->result_array();
		}

		$query = $this->db->get_where('4m2w_companies', array('id' => $id));
		return $query->row_array();
	}

	public function set_company()
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name')
		);
		$this->db->insert('4m2w_companies', $data);
		$company_id = $this->db->insert_id();

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

			$data_a3m_rel_account_role = array(
				'account_id' => $user_id,
				'role_id' => '4' //todo: !!!!! vlozit sparavne id role 'MKB'
			);
			if (!$query_rel_account_role = $this->db->insert('a3m_rel_account_role', $data_a3m_rel_account_role)) {
				$error = $this->db->error();
				print_r($error);
				//todo: zpracovani DB chyby
			}

			$data_mkb = array(
				'mkb_username' => $this->input->post('mkb_username'),
				'mkb_email' => $this->input->post('mkb_email'),
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

	public function add_students($id = NULL)
	{
		$this->load->helper('date');
		$this->gen_username();
		//todo vlozit sravne id na rolu Studenta
		//vlozit meno priezvisko do a3m_account_details
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
	}

	public function edit_company($id = NULL)
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name'),
		);
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('4m2w_companies');
	}

	public function delete_company($id = FALSE)
	{
		if ($id === FALSE) {
			echo 'chyba neni co mazat';
		} else {
			$query = $this->db->get_where('4m2w_mkb', array('company_id' => $id));
			$del_data = $query->row_array();
			if (!$del_data){
				$this->db->delete('4m2w_companies', array('id' => $id));
			} else {
				$this->db->delete('a3m_rel_account_role', array('account_id' => $del_data['user_id']));//a3m_rel_account_role
				$this->db->delete('a3m_account', array('id' => $del_data['user_id']));//a3m_account
				$this->db->delete('4m2w_mkb', array('user_id' => $del_data['user_id']));//4m2w_mkb
				$this->db->delete('4m2w_companies', array('id' => $id));//todo: zmazat ziakov
			}
		}
	}

	public function get_groups($company_id = NULL)
	{
		if ($company_id === NULL)
		{
			echo 'neni co hledat';
		} else {
			$query = $this->db->get_where('4m2w_company_group', array('company_id' => $company_id));
		}
		return $query->result_array();
	}

	public function set_groups($company_id = NULL, $group = NULL)
	{
		if ($company_id === NULL)
		{
			echo 'neni co ukladat';
		} else {
			if ($group != ''){
				$this->db->insert('4m2w_company_group', array('company_id' => $company_id, 'name_of_group' => $group));
			}
		}
		return;
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

	function send_reg_mail($user_id = NULL)
	{
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));

		// Set reset datetime
		$time = $this->account_model->update_sent_activation($user_id);

		// Load email library
		$this->load->library('email');

		// Set up email preferences
		$config['mailtype'] = 'html';

		// Initialise email lib
		$this->email->initialize($config);

		// Generate reset password url
		$password_reset_url = site_url('account/reset_password?id=' . $user_id . '&token=' . sha1($user_id . $time . $this->config->item('password_reset_secret')));
var_dump($password_reset_url);
		// Send reset password email
        $this->email->from($this->config->item('password_reset_email', 'reset_password_email_sender'));
        $this->email->to('v.rusch@gmail.com'); //todo: zatial testovaci mail, spravne z 4m2w_mkb
        $this->email->subject('reset_password_email_subject');
        $this->email->message($this->load->view('account/activation_email', array(
        'username' => 'mkb1', //todo: dodat spavne username z 4m2w_mkb
        'password_reset_url' => anchor($password_reset_url, $password_reset_url)
        ), TRUE));
        /*if ($this->email->send()) {
        // Load reset password sent view
        } else {
        //if the email could not be sent it will display the error
        //should not happen if you have email configured correctly
        echo $this->email->print_debugger();
        }*/
		return;
	}
}
