<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() 
	{
	 parent::__construct(); 
	 $this->load->helper(array('form', 'url'));
	 $this->load->model('Project');
	 $this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('dashboard');

	}

	public function projects()
	{
		$data['project']=$this->Project->ProjectShow();
		$this->load->view('projects',$data);
	}

	public function projectUpload()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('project', 'Project', 'required');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		$this->form_validation->set_rules('prFile', 'Filetype', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			/*echo "helooo";
			die();*/
			$data['project']=$this->Project->ProjectShow();
			$this->load->view('projects',$data);
		}
		else
		{
		$project_name=$this->input->post('project');
		$project_descr=$this->input->post('desc');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'zip';
		$config['max_size']             = 10000;
		$config['max_width']            = 10024;
		$config['max_height']           = 7680;
   		$this->load->library('upload', $config);

	   if (!$this->upload->do_upload('prFile'))
	   {
	     $error = array('error' => $this->upload->display_errors());
	     //$this->session->set_flashdata('upload_error', $error['error']);
	     $data['project']=$this->Project->ProjectShow();
	     $this->load->view('projects',$data);
	 	}
	   else
		{
		     $fileData = $this->upload->data();
		     $fileName=$fileData['file_name'];
		     $data = array(
	               'project_name' => $project_name,
	               'project_descr' => $project_descr,
	               'project_file' => $fileName,
	               'create_date' => date('y-m-d')
	            );

		   	$insRes=$this->Project->saveProject($data);
		   	if($insRes)
		   	{
		   		$data['project']=$this->Project->ProjectShow();
		   		$this->load->view('projects',$data);
		   	}
		   	else
		   	{
		   		$data['project']=$this->Project->ProjectShow();
		   		$this->load->view('projects',$data);
			}
	   }
	}

	}

	
	public function tableshow()
	{
		$this->load->view('tables');
	}


}
