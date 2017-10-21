<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">USER MANAGEMENT</h4>
        <p class="category">&nbsp;</p>
    </div>
    <div class="card-content table-responsive">

        <button class="btn btn-primary" data-toggle="modal" data-target="#MDAddUser">
            <i class="material-icons">add</i>&nbsp;New
        </button>

        
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
                <?php foreach($users as $row){ ?>
                <tr>
                    <td>&nbsp;<?php echo $row->id?></td>
                    <td>&nbsp;<?php echo $row->username?></td>
                    <td>&nbsp;<?php echo $row->email?></td>
                    <td>&nbsp;<?php echo $row->status?></td>
                    <td>&nbsp;<?php echo $row->level?></td>
                    <td class="text-primary">                     
                    <a data-toggle="modal" href="#MDEditUser"><i class="material-icons">border_color</i></a>&nbsp;&nbsp;&nbsp;
                    <a data-toggle="modal" href="#MDDelUser"><i class="material-icons">clear</i></a>&nbsp;&nbsp;&nbsp;
                    <a data-toggle="modal" href="#MDChangePass"><i class="material-icons">restore</i></a>&nbsp;&nbsp;&nbsp;  
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('user/add');?> 
<?php $this->load->view('user/edit');?>
<?php $this->load->view('user/del');?> 
<?php $this->load->view('user/changepass');?>  