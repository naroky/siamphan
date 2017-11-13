<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* User_model
*/
class Category_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	
	}

	function lists()
	{
		$this->db->select('*');
		$this->db->from('siamphan_category');
		$q=$this->db->get();
		return $q->result();		
	}

	function getcate($data)
	{
		$id = $data["id"];
		$this->db->select('*');
		$this->db->from('siamphan_category');
		$this->db->where("id","$id");
		$q=$this->db->get();
		return $q->result();		
	}

	function save($data)
	{
		
		$result = $this->db->insert('siamphan_category', $data); 
		return $result;
	}

	function update($id,$data)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('siamphan_category', $data);
		return $result;
	}
	
	function delete($id)
	{

		$this->db->where('id', $id);
		$result = $this->db->delete('siamphan_category');
		return $result;
	}



}
?>