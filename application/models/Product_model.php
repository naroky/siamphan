<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* User_model
*/
class Product_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	
	}

	function lists()
	{
		$this->db->select('*');
		$this->db->from('siamphan_product');
		$q=$this->db->get();
		return $q->result();		
	}

	function getprod($data)
	{
		$id = $data["id"];
		$this->db->select('*');
		$this->db->from('siamphan_product');
		$this->db->where("id","$id");
		$q=$this->db->get();
		return $q->result();		
	}

	function save($data)
	{
		$result = $this->db->insert('siamphan_product', $data); 
		return $result;
	}

	function update($id,$data)
	{
		echo "id:".$id."<br/>";
		var_dump($data);
		$this->db->where('id', $id);
		$result = $this->db->update('siamphan_product', $data);
		var_dump($result);
		return $result;
	}
	
	function delete($id)
	{

		$this->db->where('id', $id);
		$result = $this->db->delete('siamphan_product');
		return $result;
	}

	function prod_searchname($data)
	{
		$key = $data["key"];

		$this->db->select('*');
		$this->db->from('siamphan_product');
		$this->db->where("name LIKE '$key%'");	
		$q=$this->db->get();
		return $q->result();			
	}


}
?>