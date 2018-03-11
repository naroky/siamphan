<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
		$this->load->model('product_model');

		$data["product"] = $this->product_model->lists();
		$this->load->view('header',$this->header);
		$this->load->view('product/list',$data);
		$this->load->view('footer');


	}

	public function add()
	{

		$data="";
		$this->load->model('Category_model');
		$data["catelist"] = $this->Category_model->lists();
		
		foreach ($data["catelist"]  as $row) {
			# code...
			//var_dump($row);
			$cate_data[$row->id] = $row->name;
		}
       	$data["cate_data"]	= $cate_data;
		$this->load->view('header',$this->header);
		$this->load->view('product/add',$data);
		$this->load->view('footer');		

	}
	public function save()
	{
		$insert_data = array(
	        'name' =>  $this->input->post('name', TRUE),
	        'code' => $this->input->post('code', TRUE),
	        'category' => $this->input->post('category', TRUE),
		    'status' => $this->input->post('status', TRUE),
			'sell_price' => $this->input->post('sell_price', TRUE),
			'unit' => $this->input->post('unit', TRUE),
			'lastupdate' => date("Y-m-d H:i:s")
		);
		
		$this->load->model('product_model');
		$result = $this->product_model->save($insert_data);
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

		$this->load->model('product_model');
		$result = $this->product_model->delete($id);

	}

	public function edit()
	{
		$data["id"]=$this->input->get("id");
		$this->load->model('product_model');
		$this->load->model('Category_model');
		$data["prodinfo"]  = $this->product_model->getprod($data);
		$data["catelist"] = $this->Category_model->lists();	
		foreach ($data["catelist"]  as $row) {
			# code...
			//var_dump($row);
			$cate_data[$row->id] = $row->name;
		}
		$data["cate_data"] = $cate_data;
		$this->load->view('header',$this->header);
		$this->load->view('product/edit',$data);
		$this->load->view('footer');		

	}


	public function update()
	{
		$id = $this->input->post('id', TRUE);
		$update_data = array(
	        'name' => $this->input->post('name', TRUE),
	        'code' => $this->input->post('code', TRUE),
	        'category' => $this->input->post('category', TRUE),
		    'status' => $this->input->post('status', TRUE),
			'sell_price' => $this->input->post('sell_price', TRUE),
			'unit' => $this->input->post('unit', TRUE),
			'lastupdate' => date("Y-m-d H:i:s")
		);
		$this->load->model('product_model');
		$result = $this->product_model->update($id,$update_data);
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
		$this->load->model('product_model');
		$data["key"] = $this->input->get('char');
		$data["product"] = $this->product_model->prod_searchname($data);
		$this->load->view('product/search_box',$data);



	}			
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */