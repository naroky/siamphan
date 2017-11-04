<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">CUSTOMER MANAGEMENT</h4>
        <p class="category">Show Customer</p>
    </div>
    <div class="card-content table-responsive">

        <a class="btn btn-primary" href="./Customer/add">
            <i class="material-icons">add</i>&nbsp;New
        </a>

        
        <table class="table">
            <thead class="text-primary">
                <th>ID</th>
                <th>Branch Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>Province</th>
                <th>Phone</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                <?php 
                $i=0;
                foreach($customer as $row){ 


                    ?>;
                <tr>
                    <td>&nbsp;<?php echo $row->id?></td>
                    <td>&nbsp;<?php echo $row->branchcode?></td>
                    <td>&nbsp;<?php echo $row->thainame?></td>
                    <td>&nbsp;<?php echo $row->customertype?></td>
                    <td>&nbsp;<?php echo $row->province?></td>
                    <td>&nbsp;<?php echo $row->phone?></td>
                    <td class="text-primary">                     
                    <a href="./Customer/edit?id=<?php echo $row->id?>"><i class="material-icons">border_color</i></a>&nbsp;&nbsp;&nbsp;
                    <a id="btn-del<?php echo $i?>" href="#"><i class="material-icons">clear</i></a>&nbsp;&nbsp;&nbsp;
                    
                    <script>
                    $("#btn-del<?php echo $i?>").click(function(){
                        if(confirm("Are you sure you want to delete this?")){

                            $.get( "<?php echo base_url()?>Customer/del/<?php echo $row->id?>", function( data ) {
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
                <?php 
                    $i++;
                }?>
            </tbody>
        </table>
    </div>
</div>


<?php $this->load->view('customer/del');?> 
