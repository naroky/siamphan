<script>
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
  $("#ajaxform").submit(function(e)
  {
    //$("#loading_page").show();
    var saveURL = "<?php echo base_url();?>Category/save/?method=api";
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    alert(saveURL);
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
        //window.location.replace("<?php echo base_url()?>Product");

      },
      error: function(jqXHR, textStatus, errorThrown)
      {
        //$("#simple-msg").html('<div class="alert alert-info">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</div>');
        alert('Error:'+textStatus);
        //$("#loading_page").hide();
      }
    });
    e.preventDefault(); //STOP default action
    e.unbind();

  });

  $("#btn-save").click(function()
  {
    
    result = $("#ajaxform").validationEngine("validate");

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
                                  <label class="control-label">Name</label>
                                  <input id="name" name="name" type="text" class="form-control" >
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Status</label>
                                  <select id="code" name="code" class="form-control">
                                    <option value="1">Enable</option>
                                    <option value="2">Disable</option>
                                  </select>
                                  
                              </div>
                          </div>
                      </div>
                    
                      <button id="btn-save" type="submit" class="btn btn-primary pull-right">Update Profile</button>
                      <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>

  </div>
</div>
