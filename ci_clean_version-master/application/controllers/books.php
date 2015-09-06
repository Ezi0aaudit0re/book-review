<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class books extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function allbooks()
	{
		$this->load->model('user');
		$allbooks = $this->user->allbooks();
		$maxid = $this->user->getmaxid();
		$lastthree = $this->user->lastthree($maxid);
		// echo "<pre>";
		// var_dump($lastthree);
		$this->load->view('allbooks', array('info'=> $this->session->userdata('info'),
											 'books'=>$allbooks,
											  'lastthree'=>$lastthree));
	}
	public function add()
	{
		$this->load->model('user');
		$author = $this->user->allauthors();
		// echo "<pre>";
		// var_dump($author);
		$this->load->view('add', array('author'=>$author));
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	public function registermessage()
	{
		if($this->session->flashdata('sucess') && $this->session->flashdata('sucess') != FALSE)
		{
			// var_dump($this->session->flashdata('sucess'));
			$this->load->view('index', array('message'=>$this->session->flashdata('sucess')));
		}
		else if($this->session->flashdata('error') && $this->session->flashdata('error') != FALSE)
		{
			$this->load->view('index', array('message'=>$this->session->flashdata('error')));
		}
		else
		{
			$this->load->view('index');
		}
	}
	public function bookpage($id ,$name, $author)
	{
		$name = str_replace("%20", " ", $name);
		$author = str_replace("%20", " ", $author);
		
		$this->load->model('user');
		$review = $this->user->getreview($id);
		$this->load->view('bookpage', array('name' => $name,
											 'author'=>$author,
											  'review'=>$review) );
	}
	public function users($id)
	{
		$this->load->model('user');
		$userinfo = $this->user->userinfo($id);
		$totalreviews=$this->user->totalreviews($id);
		$review = $this->user->getreviewbyuser($id);
		$this->load->view('user', array('userinfo'=> $userinfo,
										 'totalreviews'=>$totalreviews,
										 'reviews'=>$review));
	}
	
	

}

//end of main controller