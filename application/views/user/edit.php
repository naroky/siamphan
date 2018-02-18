<script>
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
  var saveURL;  
  $("#ajaxform").submit(function(e)
  {
    //$("#loading_page").show();
    
    var postData = $(this).serializeArray();
    e.preventDefault(); //STOP default action
    $.ajax(
    {
      url : saveURL,
      type: "POST",
      data : postData,
      success:function(data, textStatus, jqXHR)
      {
        //$("#simple-msg").html('<div class="alert alert-info">Success</div>');
        alert(textStatus+":"+data);
        //$("#loading_page").hide();
        //window.location.replace("<?php echo base_url()?>User");

      },
      error: function(jqXHR, textStatus, errorThrown)
      {
        //$("#simple-msg").html('<div class="alert alert-info">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</div>');
        alert('Error:'+textStatus);
        //$("#loading_page").hide();
      }
    });
    e.unbind();

  });

  $("#btn-save").click(function()
  {
    
    //result = $("#ajaxform").validationEngine("validate");
    saveURL = "<?php echo base_url();?>User/update/?method=api";
    //if (result == true)
    //{
      alert("save");
      $("#ajaxform").submit();      
    //} else
    //{
      //alert("fail");
    //}

  });
});
 

</script>
<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">Product MANAGEMENT</h4>
        <p class="category">New Product</p>
    </div>
    <div class="card-content table-responsive">
              <div class="card-content">
                  <form id="ajaxform" name="form-add" method="post" action="">
                    <?php
                    foreach ($userinfo as $row) {
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Username</label>
                                <input id="username" name="username" type="text" class="form-control" value="<?php echo $row->username?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Fullname</label>
                                <input id="fullname" name="fullname" type="text" class="form-control"  value="<?php echo $row->fullname?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Email address</label>
                                <input id="email" name="email" type="email" class="form-control" value="<?php echo $row->email?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Status</label>


                                <?php 
                                $options = array('1' => 'Active', '2' => 'InActive');
                                $default = $row->status;
                                ?>
                                <?php echo form_dropdown('status', $options, $default,'class="form-control"');?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Level</label>                                                          
                                <?php 
                                $options = array('0' => 'Admin',
                                 '1' => 'Super User',
                                 '2' => 'Sell',
                                 '3' => 'Order',
                                 '4' => 'Packaging',
                                 '5' => 'Delivery',
                                );
                                $default = $row->level;
                                ?>
                                <?php echo form_dropdown('level', $options, $default,'class="form-control"');?>                                
                            </div>
                        </div>
                    </div>


                    <input type="hidden" name="id" id="id" value="<?php echo $row->id?>"> 
                    <button id="btn-save" type="button" class="btn btn-primary pull-right">Update Profile</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div class="clearfix"></div>
                    <?php }?>
                </form>
              </div>
          </div>

  </div>
</div>
                  