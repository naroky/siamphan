<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CATEGORY MANAGEMENT
        <small>:Manage category data</small>
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
          <h3 class="box-title">All Category data</h3>
        </div>
        <div class="box-body">

            <a class="btn btn-primary" href="<?php echo base_url()?>Category/add">
                <i class="glyphicon glyphicon-plus"></i>
            </a>        
            <table class="table">
                <thead class="text-primary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                    foreach($category as $row){ ?>
                    <tr>
                        <td>&nbsp;<?php echo $row->id?></td>
                        <td>&nbsp;<?php echo $row->name?></td>
                        <td>&nbsp;<?php echo ($row->status=1 ? "ใช้งาน" : "ไม่ใช้งาน") ?></td>
                        <td class="text-primary"> 
                        <a href="<?php echo base_url()?>Category/edit?id=<?php echo $row->id?>"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                        
                        <a id="btn-del<?php echo $i?>" href="#"><i class="glyphicon glyphicon-trash"></i></a>&nbsp;&nbsp;&nbsp;
                        
                        <script>
                        $("#btn-del<?php echo $i?>").click(function(){
                            if(confirm("Are you sure you want to delete this?")){

                                $.get( "<?php echo base_url()?>Category/del/<?php echo $row->id?>", function( data ) {
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



