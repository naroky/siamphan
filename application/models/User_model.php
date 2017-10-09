<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* User_model
*/
class User_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	
	}


	function getUserAuthen($username)
	{
		$this->db->select('*');
		$this->db->from('siamphan_user');
		$this->db->where('username <=',$username);
		$q=$this->db->get();
		return $q->result();		
		
		
	}	

}
?>