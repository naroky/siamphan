<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
		$data = "";
		$this->load->model('category_model');

		$data["category"] = $this->category_model->lists();
		$this->load->view('header',$this->header);
		$this->load->view('category/list',$data);
		$this->load->view('footer');


	}

	public function add()
	{

		$data="";
		$this->load->view('header',$this->header);
		$this->load->view('category/add',$data);
		$this->load->view('footer');		

	}
	public function save()
	{
		$data = $_REQUEST;
		$insert_data = array(
	        'name' => urldecode($data['name']) ,
	        'status' => $data['status'],
			'lastupdate' => date("Y-m-d H:i:s")
		);
		
		$this->load->model('category_model');
		$result = $this->category_model->save($insert_data);
		if ($result == true)
		{
			echo "Success";	
		} 
		else
		{
			echo "Fail";
		}		
	}

	public function del($id)
	{

		$this->load->model('category_model');
		$result = $this->category_model->delete($id);

	}

	public function edit()
	{
		$data["id"]=$this->input->get("id");
		$this->load->model('category_model');
		$data["cateinfo"]  = $this->category_model->getcate($data);
		
		// Display
		$this->load->view('header',$this->header);
		$this->load->view('category/edit',$data);
		$this->load->view('footer');		

	}


	public function update()
	{
		$data = $_REQUEST;
		//$id = $this->input->post('id', TRUE);
		$id = $data["id"];

		$update_data = array(
	        'name' => $data["name"],
	        'status' => $this->input->post('status', TRUE),
			'lastupdate' => date("Y-m-d H:i:s")
		);
		$this->load->model('category_model');
		$result = $this->category_model->update($id,$update_data);
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