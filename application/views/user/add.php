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
    
    result = $("#ajaxform").validationEngine("validate");
    saveURL = "<?php echo base_url();?>user/save/?method=api";
    if (result == true)
    {
      alert("save");
      $("#ajaxform").submit();      
    } else
    {
      alert("fail");
    }

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
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group label-floating">
                                <label class="control-label">Username</label>
                                <input type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group label-floating">
                                <label class="control-label">Email address</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Password</label>
                                <input id="password" name="password" type="Password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Re-Password</label>
                                <input id="re_password" name="re_password" type="Password" class="form-control">
                            </div>
                        </div>                              

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Status</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Level</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button id="btn-save" type="button" class="btn btn-primary pull-right">Update Profile</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div class="clearfix"></div>
                </form>
              </div>
          </div>

  </div>
</div>
                  