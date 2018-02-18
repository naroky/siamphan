<ul id="prod_ul">
  <?php 
  foreach ($product as $row) {
?>
  <li><a href="#" onclick="Prod_select(<?php echo $row->id?>,'<?php echo $row->name?>','<?php echo $row->code?>','<?php echo $row->sell_price?>','<?php echo $row->unit?>')"><?php echo $row->name?></a></li>

<?php
  }
  ?>
</ul>
<script>
function Prod_select(id,name,code,sell_price,unit)
{
	$( "#prod_ul" ).hide();		
	alert("id:"+id+",name:"+name+",sellprice:"+sell_price+",unit:"+unit);
	$('#product_search').val(name);
	$('#cust_id').val(id);
	$('#prod_code').val(code);	
	$('#prod_price').val(sell_price);
	$('#unit').val(unit);
}
</script>