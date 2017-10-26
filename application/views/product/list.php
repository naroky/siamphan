<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">PROPUCT MANAGEMENT</h4>
        <p class="category">&nbsp;</p>
    </div>
    <div class="card-content table-responsive">

        <a class="btn btn-primary" href="./Customer/add">
            <i class="material-icons">add</i>&nbsp;New
        </a>

        
        <table class="table">
            <thead class="text-primary">
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Province</th>
                <th>Phone</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                <?php foreach($customer as $row){ ?>
                <tr>
                    <td>&nbsp;<?php echo $row->id?></td>
                    <td>&nbsp;<?php echo $row->branchcode?></td>
                    <td>&nbsp;<?php echo $row->thainame?></td>
                    <td>&nbsp;<?php echo $row->customertype?></td>
                    <td>&nbsp;<?php echo $row->province?></td>
                    <td>&nbsp;<?php echo $row->phone?></td>
                    <td class="text-primary">                     
                    <a href="./Customer/edit"><i class="material-icons">border_color</i></a>&nbsp;&nbsp;&nbsp;
                    <a data-toggle="modal" href="#MDDelUser"><i class="material-icons">clear</i></a>&nbsp;&nbsp;&nbsp;
                   
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>


<?php $this->load->view('customer/del');?> 
