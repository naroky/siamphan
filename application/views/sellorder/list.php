<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">PROPUCT MANAGEMENT</h4>
        <p class="category">&nbsp;</p>
    </div>
    <div class="card-content table-responsive">

        <a class="btn btn-primary" href="<?php echo base_url()?>Sellorder/add">
            <i class="material-icons">add</i>&nbsp;New
        </a>        
        <table class="table">
            <thead class="text-primary">
                <th>ID</th>
                <th>Order Code</th>
                <th>Customer</th>
                <th>Due Date</th>
                <th>Send Date</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                <?php 
                $i=0;

                foreach($sellorder as $row){ ?>
                <tr>
                    <td>&nbsp;<?php echo $row->id?></td>
                    <td>&nbsp;<?php echo $row->cust_id?></td>
                    <td>&nbsp;<?php echo $row->cust_name?></td>
                    <?php $duedate=date_create($row->duedate);?>
                    <td>&nbsp;<?php echo date_format($duedate,"Y/m/d");?></td>
                    <?php $senddate=date_create($row->senddate);?>
                    <td>&nbsp;<?php echo date_format($senddate,"Y/m/d");?></td>
                    <td>&nbsp;<?php echo $row->total_price?></td>
                    <td>&nbsp;<?php echo ($row->status == 1) ? "Enabled" : "Disabled" ?></td>
                    <td class="text-primary"> 
                    <a href="<?php echo base_url()?>Product/edit?id=<?php echo $row->id?>"><i class="material-icons">border_color</i></a>&nbsp;&nbsp;&nbsp;
                    
                    <a id="btn-del<?php echo $i?>" href="#"><i class="material-icons">clear</i></a>&nbsp;&nbsp;&nbsp;
                    
                    <script>
                    $("#btn-del<?php echo $i?>").click(function(){
                        if(confirm("Are you sure you want to delete this?")){

                            $.get( "<?php echo base_url()?>Product/del/<?php echo $row->id?>", function( data ) {
                                location.reload();
                                //e.preventDefault(); //STOP default action
                            });
                        }
                        else{
                            return false;
                        }
                    });
                    </script>                     
                    </td>
                </tr>
                <?php $i++; }?>
            </tbody>
        </table>
    </div>
</div>
