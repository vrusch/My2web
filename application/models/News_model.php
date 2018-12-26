<?php
/**
 * Created by PhpStorm.
 * User: vlado
 * Date: 07.12.2018
 * Time: 22:33
 */
class news_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->order_by('date_publish', 'DESC')->get('4m2w_news');
			return $query->result_array();
		}

		$query = $this->db->get_where('4m2w_news', array('slug' => $slug));
		return $query->row_array();
	}

	public function set_news()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text'),
			'date_publish' => $this->input->post('date_publish')
		);

		return $this->db->insert('4m2w_news', $data);
	}
}
