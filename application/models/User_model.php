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


	function lists()
	{
		$this->db->select('*');
		$this->db->from('siamphan_user');
		$q=$this->db->get();
		return $q->result();		
	}

	function getUserAuthen($username)
	{
		$this->db->select('*');
		$this->db->from('siamphan_user');
		$this->db->where('username <=',$username);
		$q=$this->db->get();
		return $q->result();		
		
		
	}	

	function getuser($data)
	{
		$id = $data["id"];
		$this->db->select('*');
		$this->db->from('siamphan_user');
		$this->db->where("id","$id");
		$q=$this->db->get();
		return $q->result();		
	}

	function save($data)
	{
		$result = $this->db->insert('siamphan_customer', $data); 
		return $result;
	}

	function update($id,$data)
	{

		$this->db->where('id', $id);
		$result = $this->db->update('siamphan_customer', $data);
		
		return $result;
	}
	
	function delete($id)
	{

		$this->db->where('id', $id);
		$result = $this->db->delete('siamphan_customer');
		return $result;
	}	

}
?>