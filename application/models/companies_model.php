<?php
/**
 * Created by PhpStorm.
 * User: vlado
 * Date: 07.12.2018
 * Time: 22:33
 */
class companies_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_companies($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('companies');
			return $query->result_array();
		}

		$query = $this->db->get_where('news', array('slug' => $slug));
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
			'date_publish' => $this->input->post('date_publish'),
		);

		return $this->db->insert('companies', $data);
	}
}
