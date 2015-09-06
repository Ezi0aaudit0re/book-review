<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model('user');
	}
	public function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[cpassword]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		if ($this->form_validation->run()==TRUE)
		{
			$this->user->add($this->input->post());
		}
		else
		{
			$this->session->set_flashdata('error', 'login details were not correct');
			redirect('/books/registermessage');
		}

	}
	public function signin()
	{
		$info = $this->user->getdata($this->input->post());
		if(empty($info))
		{
			$this->session->set_flashdata('error', 'user doesnot exist');
			redirect('/books/registermessage');
		}
		else
		{
			$this->session->set_userdata('info', $info);
			redirect('/books/allbooks');
		}
		
	}
	public function addreview()
	{
		$this->user->addbook($this->input->post());
		$bookid = $this->user->bookid($this->input->post());
		$this->user->addreview($bookid, $this->input->post());
		
		redirect('/books/add');
	}
	public function review($id)
	{	
		$aid['id'] = $id;
		
		$this->user->addreview($aid, $this->input->post());
	}
}
?>