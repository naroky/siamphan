<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sellorder extends CI_Controller {

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

			$this->menu["menu_active"] = "Home";
			//$this->load->model("cp_model");
			$this->load->helper('url');
			$this->load->helper('math');
			//$this->load->library('email');
			//$this->load->library('pagination');
			//$this->load->helper('common');
		}
	}	

	public function index()
	{
		$this->lists();

	}
	
	public function lists()
	{
		$this->load->model('sellorder_model');
		$data["sellorder"] = $this->sellorder_model->lists();
		$this->load->view('header',$this->header);
		$this->load->view('sellorder/list',$data);
		$this->load->view('footer');


	}


	public function add()
	{

		$data="";
		//var_dump($this->header["session"]["fullname"]);
		$data["fullname"] = $this->header["session"]["fullname"];
		$this->load->view('header',$this->header);
		$this->load->view('sellorder/add',$data);
		$this->load->view('footer');		

	}

	public function savehdOrder()
	{
		$data = $_REQUEST;
		$create_data = array(
	        'cust_id' => urldecode($data['cust_id']) ,
	        'cust_name' => urldecode($data['cust_name']) ,
	        'cust_address' => urldecode($data['cust_address']) ,
	        'credit' => urldecode($data['credit']) ,
	        'senddate' => $data['senddate'],
	        'user_fullname' => $data['fullname'],
			'total_price' => '0',
			'total_vat' => '0',
			'lastupdate' => date("Y-m-d H:i:s")
		);
		
		$this->load->model('sellorder_model');
		$result = $this->sellorder_model->savehdorder($create_data);
		if ($result != false)
		{

			echo $result;	
		} 
		else
		{
			echo "Fail";
		}			

	}



	public function saveOrderDetail()
	{
		$data = $_REQUEST;
/*
product_search:โซดาไฟ 1x20
prod_code:AC-001
prod_price:800.00
unit:ลัง
amount:10
sell_price:8000
order_id:10


 id              int(11) NOT NULL AUTO_INCREMENT,
   sellorder_id    int(11) NULL,
   status          int(11) NULL COMMENT '''1.no vat, 2.include vat''',
   lastupdare      datetime(0) NULL,
   prod_price      decimal(10, 2) NULL,
   prod_name       varchar(200)
                   CHARACTER SET utf8
                   COLLATE utf8_general_ci
                   NULL,
   prod_code       varchar(20)
                   CHARACTER SET utf8
                   COLLATE utf8_general_ci
                   NULL,
   prod_vat        decimal(10, 2) NULL,
   amount          int(10) NULL,
   sell_price      decimal(10, 2) NULL,

*/
   		if (isset($data['status']))
   		{
   			$vat = ($data['sell_price'] * 7) / 107;
   			$net_price = $data['sell_price'] - $vat;
   			$vat_status = 2;
   		}
   		else
   		{
   			$vat=0;
   			$net_price = $data['sell_price'] ;
   			$vat_status = 1;
   		}
		$insert_data = array(
	        'sellorder_id' => urldecode($data['order_id']) ,
	        'status' => urldecode($vat_status) ,
	        'prod_price' => urldecode($data['prod_price']) ,
	        'prod_name' => urldecode($data['product_search']) ,
	        'prod_code' => urldecode($data['prod_code']) ,
			'prod_vat' => $vat,
	        'amount' => $data['amount'],
	        'sell_price' => $data['sell_price'],
	        'net_price' => $net_price,
			'lastupdare' => date("Y-m-d H:i:s")
		);
		
		$this->load->model('sellorder_model');
		$result = $this->sellorder_model->savedetail($insert_data);
		if ($result == true)
		{
			echo "Success";	
		} 
		else
		{
			echo "Fail";
		}		
	}

	function loadOrdetail()
	{
		$data["order_id"] = $this->input->get('id');
		$this->load->model('sellorder_model');
		$result = $this->sellorder_model->detail_lists($data);
		$data["result"] = $result;
		$this->load->view('sellorder/orderlist_table',$data);

	}


	public function del($id)
	{

		$this->load->model('sellorder_model');
		$result = $this->sellorder_model->delSellorder($id);
		if ($result == true)
		{
			$result = $this->sellorder_model->delOrdDetail($id);

		}

	}

	public function edit()
	{
		$data["order_id"]=$this->input->get("id");
		$data["id"]=$this->input->get("id");
		$this->load->model('sellorder_model');
		$data["orderInfo"]  = $this->sellorder_model->getSellorder($data);
		$data["orderList"]  = $this->sellorder_model->detail_lists($data);
		
		// Display
		$this->load->view('header',$this->header);
		$this->load->view('sellorder/edit',$data);
		$this->load->view('footer');		

	}

	public function printOrder()
	{
		$data["order_id"]=$this->input->get("id");
		$data["id"]=$this->input->get("id");
		$this->load->model('sellorder_model');
		$data["orderInfo"]  = $this->sellorder_model->getSellorder($data);
		$data["orderList"]  = $this->sellorder_model->detail_lists($data);
		// Display
		$this->load->view('sellorder/print',$data);
	}


	public function update()
	{
		$data = $_REQUEST;
		//$id = $this->input->post('id', TRUE);
		$id = $data["id"];
		$update_data = array(
	        'username' => urldecode($data['username']) ,
	        'email' => urldecode($data['email']) ,
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

	function delordItem()
	{
		$data = $_REQUEST;
		$id = $data["id"];		
		$this->load->model('sellorder_model');
		$result = $this->sellorder_model->delordItem($id);	
	}

		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */