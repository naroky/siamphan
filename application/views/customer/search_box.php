<ul id="cust_ul">
  <?php 
  foreach ($customer as $row) {
?>
  <li><a href="#" onclick="Cust_select(<?php echo $row->id?>,'<?php echo $row->thainame?>','<?php echo $row->mobile?>','<?php echo $row->address." ".$row->province." ".$row->zipcode."<br/>Tel. ".$row->phone." Mobile ".$row->mobile. " Fax ".$row->fax ?>')"><?php echo $row->thainame?></a></li>

<?php
  }
  ?>
</ul>
<script>
function Cust_select(id,thainame,mobile,address)
{
	$( "#cust_ul" ).hide();		
	//alert("id:"+id+",name:"+thainame+",mobile:"+mobile+",address:"+address);
	$('#customer_search').val(thainame);
	$('#cust_id').val(id);
	$('#cust_name').val(thainame);
	$('#cust_address').val(address);
}
</script>