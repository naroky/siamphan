<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* User_model
*/
class Customer_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	
	}

	function lists()
	{
		$this->db->select('*');
		$this->db->from('siamphan_customer');
		$q=$this->db->get();
		return $q->result();		
	}


}
?>