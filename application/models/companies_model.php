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

		$slug = url_title($this->input->post('name'), 'dash', TRUE);

		$data = array(
			'name' => $this->input->post('name'),
			'slug' => $slug,
			'division' => $this->input->post('division'),
			'department' => $this->input->post('department'),
			'notes' => $this->input->post('notes')
		);

		return $this->db->insert('4m2w_companies', $data);
	}

	public function update_company()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('name'), 'dash', TRUE);

		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'slug' => $slug,
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
		if ($id === FALSE) {
			$query = $this->db->order_by('date_publish', 'DESC')->get('4m2w_companies');
			return $query->result_array();
		}

		$this->db->delete('4m2w_companies', array('id' => $id));
	}
}
