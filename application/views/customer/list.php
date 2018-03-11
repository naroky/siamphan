<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CUSTOMER MANAGEMENT
        <small>:manage customer data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Customer</h3>
        </div>
        <div class="box-body">
        <a class="btn btn-primary" href="<?php echo base_url()?>Customer/add">
            <i class="glyphicon glyphicon-plus"></i>
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


                    ?>
                <tr>
                    <td>&nbsp;<?php echo $row->id?></td>
                    <td>&nbsp;<?php echo $row->branchcode?></td>
                    <td>&nbsp;<?php echo $row->thainame?></td>
                    <td>&nbsp;<?php echo $row->customertype?></td>
                    <td>&nbsp;<?php echo $row->province?></td>
                    <td>&nbsp;<?php echo $row->phone?></td>
                    <td class="text-primary">                     
                    <a href="<?php echo base_url()?>Customer/edit?id=<?php echo $row->id?>"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                    <a id="btn-del<?php echo $i?>" href="#"><i class="glyphicon glyphicon-trash"></i></a>&nbsp;&nbsp;&nbsp;
                    
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
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">CUSTOMER MANAGEMENT</h4>
        <p class="category">Show Customer</p>
    </div>
    <div class="card-content table-responsive">

        
    </div>
</div>


<?php $this->load->view('customer/del');?> 
