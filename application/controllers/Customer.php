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
		if ($this->input->get('method') == "api")
		{
			// API


		}
		else
		{

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
		$this->load->model('customer_model');

		$data["customer"] = $this->customer_model->lists();
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

		$insert_data = array(
	        'branchcode' => $this->input->post('branchcode', TRUE),
	        'customertype' => $this->input->post('customertype', TRUE),
	        'thainame' => urldecode($this->input->post('thainame', TRUE)),
		    'thaifullname' => urldecode($this->input->post('thaifullname', TRUE)),
			'engname' => urldecode($this->input->post('engname', TRUE)),
			'engfullname' => urldecode($this->input->post('engfullname', TRUE)),
			'address' => urldecode($this->input->post('address', TRUE)),
			'province' => urldecode($this->input->post('province', TRUE)),
			'zipcode' => $this->input->post('zipcode', TRUE),
			'phone' => $this->input->post('phone', TRUE),
			'fax' => $this->input->post('fax', TRUE),
			'mobile' => $this->input->post('mobile', TRUE),
			'email' => $this->input->post('email', TRUE),
			'peopleid' => urldecode($this->input->post('peopleid', TRUE)),
			'birthdate' => $this->input->post('birthdate', TRUE),
			'sex' => $this->input->post('sex', TRUE),
			'lastupdate' => date("Y-m-d H:i:s")
		);
		
		var_dump($insert_data);

		$this->load->model('customer_model');
		$result = $this->customer_model->save($insert_data);
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
		$this->load->model('customer_model');
		$result = $this->customer_model->delete($id);

	}

	public function edit()
	{
		$data["id"]=$this->input->get("id");
		$this->load->model('customer_model');
		$data["cusinfo"]  = $this->customer_model->getcust($data);
		
		// Display
		$this->load->view('header',$this->header);
		$this->load->view('customer/edit',$data);
		$this->load->view('footer');		

	}

	public function update()
	{
		$id = $this->input->post('id', TRUE);
		$update_data = array(
	        'branchcode' => $this->input->post('branchcode', TRUE),
	        'customertype' => $this->input->post('customertype', TRUE),
	        'thainame' => $this->input->post('thainame', TRUE),
		    'thaifullname' => $this->input->post('thaifullname', TRUE),
			'engname' => $this->input->post('engname', TRUE),
			'engfullname' => $this->input->post('engfullname', TRUE),
			'address' => $this->input->post('address', TRUE),
			'province' => $this->input->post('province', TRUE),
			'zipcode' => $this->input->post('zipcode', TRUE),
			'phone' => $this->input->post('phone', TRUE),
			'fax' => $this->input->post('fax', TRUE),
			'mobile' => $this->input->post('mobile', TRUE),
			'email' => $this->input->post('email', TRUE),
			'peopleid' => $this->input->post('peopleid', TRUE),
			'birthdate' => $this->input->post('birthdate', TRUE),
			'sex' => $this->input->post('sex', TRUE),
			'lastupdate' => date("Y-m-d H:i:s")
		);
		$this->load->model('customer_model');
		$result = $this->customer_model->update($id,$update_data);
		if ($result == true)
		{
			echo "Success";	
		} 
		else
		{
			echo "Fail";
		}
		
	}
	public function search_1chr()
	{

		$data = "";
		$this->load->model('customer_model');
		$data["key"] = $this->input->get('char');
		$data["customer"] = $this->customer_model->cust_searchname($data);
		$this->load->view('customer/search_box',$data);



	}	
		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */