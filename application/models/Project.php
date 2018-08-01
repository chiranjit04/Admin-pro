<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Model
{
	
	public function __construct() 
	{
	 parent::__construct(); 
	 $this->load->database();
	}

	public function saveProject($data)
	{
		return $this->db->insert('project', $data); 
	}

	public function ProjectShow()
	{
		$query = $this->db->get('project')->result();
		return $query;

	}
}
?>