<table id="table_ordDetail" class="table table-hover">
      <thead>
          <th>ID</th>
          <th>Name</th>
          <th>Code</th>
          <th>Sell Price</th>
          <th>Amount</th>
          <th>Action</th>
          <!--th>Unit</th-->
      </thead>
      <tbody>
      	<?php 
        $i=0;
        foreach ($result as $row)
		    {
		?>
			
          <tr>
              <td><?php echo $row->id?></td>
              <td><?php echo $row->prod_name?></td>
              <td><?php echo $row->prod_code?></td>
              <td><?php echo $row->sell_price?></td>
              <td><?php echo $row->amount?></td>
              <td><button id="btn-delItem<?php echo $i?>" name="btn-delItem">Delete</button></td>
              <script>
              $("#btn-delItem<?php echo $i?>").click(function(){
                  if(confirm("Are you sure you want to delete this?")){

                      $.get( "<?php echo base_url();?>Sellorder/delordItem/?method=api&id=<?php echo $row->id?>", function( data ) {
                          location.reload();
                          //e.preventDefault(); //STOP default action
                      });
                  }
                  else{
                      return false;
                  }
              });
              </script> 
              <!--td><?php echo $row->unit?></td-->
          </tr>
		
		<?php
    $i++;
		}
      	?>
      </tbody>
    </table>