<?php

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

	public function set_companies()
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name'),
			'division' => $this->input->post('division'),
			'department' => $this->input->post('department'),
			'notes' => $this->input->post('notes')
		);

		return $this->db->insert('4m2w_companies', $data);
	}

	public function update_company()
	{
		$this->load->helper('url');

		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'division' => $this->input->post('division'),
			'department' => $this->input->post('department'),
			'notes' => $this->input->post('notes')
		);

		$this->db->set($data);
		$this->db->where('id', $data['id']);
		$this->db->update('4m2w_companies');
	}

	public function delete_company($id = FALSE)
	{
		if ($id === FALSE) { //todo: zmazat ziakov a vo vsetkych tabulkach caskadovo podla ID
			$query = $this->db->order_by('date_publish', 'DESC')->get('4m2w_companies');
			return $query->result_array();
		}

		$this->db->delete('4m2w_companies', array('id' => $id));
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

	function add_user() {
//todo: vratit si ID: $this->db->insert_id()
	}
}
