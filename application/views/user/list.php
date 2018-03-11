  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        USER MANAGEMENT
        <small>: Manage user data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Users</h3>
        </div>
        <div class="box-body">
            <a class="btn btn-primary" href="<?php echo base_url()?>User/add" alt="Add News">
                <i class="glyphicon glyphicon-plus"></i>
            </a>  
            <table class="table">
                <thead class="text-primary">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Level</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                    foreach($users as $row){ ?>
                    <tr>
                        <td>&nbsp;<?php echo $row->id?></td>
                        <td>&nbsp;<?php echo $row->username?></td>
                        <td>&nbsp;<?php echo $row->email?></td>
                        <td>&nbsp;<?php echo $row->status?></td>
                        <td>&nbsp;<?php echo $row->level?></td>
                        <td class="text-primary"> 
                            <a href="<?php echo base_url()?>User/edit?id=<?php echo $row->id?>"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                            
                            <a id="btn-del<?php echo $i?>" href="#"><i class="glyphicon glyphicon-trash"></i></a>&nbsp;&nbsp;&nbsp;
                            
                            <script>
                            $("#btn-del<?php echo $i?>").click(function(){
                                if(confirm("Are you sure you want to delete this?")){

                                    $.get( "<?php echo base_url()?>User/del/<?php echo $row->id?>", function( data ) {
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
                    <?php $i++;}?>
                </tbody>
            </table>

          Start creating your amazing application!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Paging
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <div class="card-content table-responsive">


        
        
        
    </div>
</div>

<?php //$this->load->view('user/add');?> 
<?php //$this->load->view('user/edit');?>
<?php $this->load->view('user/del');?> 
<?php $this->load->view('user/changepass');?>  