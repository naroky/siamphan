<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	
		$this->load->helper('url');
		//$this->load->helper('form');
		//$this->load->library('email');
		//$this->load->library('pagination');
		//$this->load->helper('common');
	}


	public function index()
	{

		$this->load->view('login');

	}

	public function auth()
	{

		$this->load->model('user_model');

		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		$password_encode = MD5($password);
		echo "user:".$username."<br/>";
		$result = $this->user_model->getUserAuthen($username);
		var_dump($result);
		if (count($result) > 0 )
		{
			$user = $result[0];
			echo "pass:".$user->password."<br/>";
			echo "input_pass:".$password_encode."<br/>";
			if ($user->password == $password_encode)
			{
				echo "Login Success";

				$last_access = date("Y-m-d H:i:s");
				$session_array=array(
				'id'=>(string)$user->id,
				'username'=>(string)$user->username,
				'fullname'=>(string)$user->fullname,
				'email'=>(string)$user->email,
				'status'=>(string)$user->status,
				'level'=>(string)$user->level,
				'last_access'=>(string)$last_access
				);
				$this->session->set_userdata('login',$session_array);
				redirect('Home');

			}
			else
			{
				// 4011 Unauthorized:Password miss match
				$this->session->set_userdata('login',"");
				redirect('Login?code=4011');
				//echo "Login Fail";	
			}
			 
		}
		else
		{
			// 4012 Invalid Username
			$this->session->set_userdata('login',"");			
			redirect('Login?code=4012');	
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */