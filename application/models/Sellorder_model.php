<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* User_model
*/
class Sellorder_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	
	}

	function lists()
	{
		$this->db->select('*');
		$this->db->from('siamphan_sellorder');
		$q=$this->db->get();
		return $q->result();		
	}

	function detail_lists($data)
	{
		$id = $data["order_id"];		
		$this->db->select('*');
		$this->db->from('siamphan_orderdetail');
		$this->db->where("sellorder_id","$id");		
		$q=$this->db->get();
		return $q->result();		
	}	


	function getSellorder($data)
	{
		$id = $data["id"];
		$this->db->select('*');
		$this->db->from('siamphan_sellorder');
		$this->db->where("id","$id");
		$q=$this->db->get();
		return $q->result();		
	}

	function savehdorder($data)
	{
		$result = $this->db->insert('siamphan_sellorder', $data); 
		if ($result  == true)
		{
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
		else
		{
			return false;
		}
		

	}

	function savedetail($data)
	{
		
		$result = $this->db->insert('siamphan_orderdetail', $data); 
		return $result;
	}

	function update($id,$data)
	{
		echo "id:".$id."<br/>";
		var_dump($data);
		$this->db->where('id', $id);
		$result = $this->db->update('siamphan_sellorder', $data);
		var_dump($result);
		return $result;
	}
	
	function delSellorder($id)
	{

		$this->db->where('id', $id);
		$result = $this->db->delete('siamphan_sellorder');
		return $result;
	}


	function delOrdDetail($id)
	{

		$this->db->where('order_id', $id);
		$result = $this->db->delete('siamphan_orderdetail');
		return $result;
	}

	function delordItem($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('siamphan_orderdetail');

		return $result;
	}


}
?>