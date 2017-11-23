<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">USER MANAGEMENT</h4>
        <p class="category">&nbsp;</p>
    </div>
    <div class="card-content table-responsive">


        <a class="btn btn-primary" href="<?php echo base_url()?>User/add">
            <i class="material-icons">add</i>&nbsp;New
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
                        <a href="<?php echo base_url()?>User/edit?id=<?php echo $row->id?>"><i class="material-icons">border_color</i></a>&nbsp;&nbsp;&nbsp;
                        
                        <a id="btn-del<?php echo $i?>" href="#"><i class="material-icons">clear</i></a>&nbsp;&nbsp;&nbsp;
                        
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
    </div>
</div>

<?php //$this->load->view('user/add');?> 
<?php //$this->load->view('user/edit');?>
<?php $this->load->view('user/del');?> 
<?php $this->load->view('user/changepass');?>  