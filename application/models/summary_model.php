<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class summary_model extends CI_Model
{

	public function __construct()
	{
		$this->load->helper(array('email', 'date'));
		$this->load->library(array('email'));
		$this->load->database();
	}

	public function get_all_students()
	{
	}
}
