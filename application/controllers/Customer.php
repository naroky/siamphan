<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$header = array();
		$lastid = 0;
		if(!$this->session->userdata('login'))
		{
			redirect('login');
			exit();
		}
		else
		{
			$this->header['session']=$this->session->userdata('login');
			$data['title'] = 'Mobile Portal Administation : Login';
			$data['project'] = 'Mobile Portal';

			//$this->load->view('header',$data);
			//$this->load->model('chart_model');
			//$this->config->load('time_config',TRUE);
		}

		$this->menu["menu_active"] = "Home";
		//$this->load->model("cp_model");
		//$this->load->helper('url');
		//$this->load->helper('form');
		//$this->load->library('email');
		//$this->load->library('pagination');
		//$this->load->helper('common');
	}	

	public function index()
	{
		$this->lists();

	}
	
	public function lists()
	{
		$data = "";
		$this->load->model('Customer_model');

		$data["customer"] = $this->Customer_model->lists();
		$this->load->view('header',$this->header);
		$this->load->view('customer/list',$data);
		$this->load->view('footer');


	}

	public function add()
	{

		$data="";
		$this->load->view('header',$this->header);
		$this->load->view('customer/add',$data);
		$this->load->view('footer');		

	}
	public function save()
	{

		$this->load->model('User_model');

	}

	public function delete()
	{

		$this->load->model('User_model');

	}

	public function edit()
	{
		$data="";
		$this->load->model('User_model');
		$this->load->view('header',$this->header);
		$this->load->view('customer/edit',$data);
		$this->load->view('footer');		

	}

	public function update()
	{

		$this->load->model('User_model');

	}
		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */