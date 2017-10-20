<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">Simple Table</h4>
        <p class="category">Here is a subtitle for this table</p>
    </div>
    <div class="card-content table-responsive">
        <table class="table">
            <thead class="text-primary">
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Level</th>
                <th>Lastlogin</th>
            </thead>
            <tbody>
                <?php foreach($users as $row){ ?>
                <tr>
                    <td>&nbsp;<?php echo $row->id?></td>
                    <td>&nbsp;<?php echo $row->username?></td>
                    <td>&nbsp;<?php echo $row->email?></td>
                    <td>&nbsp;<?php echo $row->status?></td>
                    <td>&nbsp;<?php echo $row->level?></td>
                    <td class="text-primary">&nbsp;<?php echo $row->lastlogin?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>