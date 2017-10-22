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
                <th>Branch Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>Province</th>
                <th>Phone</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                <?php foreach($customer as $row){ var_dump($row);?>
                <tr>
                    <td>&nbsp;<?php echo $row->id?></td>
                    <td>&nbsp;<?php echo $row->branchcode?></td>
                    <td>&nbsp;<?php echo $row->thainame?></td>
                    <td>&nbsp;<?php echo $row->customertype?></td>
                    <td>&nbsp;<?php echo $row->province?></td>
                    <td>&nbsp;<?php echo $row->phone?></td>
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