<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
			redirect('Login');
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
		$this->load->model('user_model');
		//var_dump($this->header["session"]["fullname"]);
		$data["users"] = $this->user_model->lists();
		$this->load->view('header',$this->header);
		$this->load->view('user/list',$data);
		$this->load->view('footer');


	}


	public function add()
	{

		$data="";
		var_dump($this->header["session"]);
		$this->load->view('header',$this->header);
		$this->load->view('user/add',$data);
		$this->load->view('footer');		

	}
	public function save()
	{
		$data = $_REQUEST;
/*
array(5) {
  ["method"]=>
  string(3) "api"
  ["username"]=>
  string(5) "aaaaa"
  ["email"]=>
  string(15) "aaaaa@admin.com"
  ["password"]=>
  string(4) "1234"
  ["re_password"]=>
  string(4) "1234"
}

*/
		if ($data['password'] == $data['re_password'])
		{
			$insert_data = array(
		        'username' => urldecode($data['username']) ,
		        'email' => urldecode($data['email']) ,
		        'fullname' => urldecode($data['fullname']) ,
		        'password' => urldecode(md5($data['password'])) ,
		        'status' => urldecode($data['status']) ,
		        'level' => $data['level'],
				'lastlogin' => date("Y-m-d H:i:s")
			);
			
			$this->load->model('user_model');
			$result = $this->user_model->save($insert_data);
			if ($result == true)
			{
				echo "Success";	
			} 
			else
			{
				echo "Fail";
			}		

		}
		else
		{
			echo "Fail";
		}
	}

	public function del($id)
	{

		$this->load->model('user_model');
		$result = $this->user_model->delete($id);

	}

	public function edit()
	{
		$data["id"]=$this->input->get("id");
		$this->load->model('user_model');
		$data["userinfo"]  = $this->user_model->getuser($data);
		//var_dump($data["userinfo"]);
		// Display
		$this->load->view('header',$this->header);
		$this->load->view('user/edit',$data);
		$this->load->view('footer');		

	}


	public function update()
	{
		$data = $_REQUEST;
		//$id = $this->input->post('id', TRUE);
		$id = $data["id"];
		$update_data = array(
	        'username' => urldecode($data['username']) ,
	        'email' => urldecode($data['email']) ,
	        'fullname' => urldecode($data['fullname']) ,
	        'status' => urldecode($data['status']) ,
	        'level' => $data['level'],
			'lastlogin' => date("Y-m-d H:i:s")
		);
		var_dump($update_data);
		$this->load->model('user_model');
		$result = $this->user_model->update($id,$update_data);
		if ($result == true)
		{
			echo "Success";	
		} 
		else
		{
			echo "Fail";
		}

	}


		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */