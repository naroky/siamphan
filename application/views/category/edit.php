<script>
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
  $("#ajaxform").submit(function(e)
  {
    //$("#loading_page").show();
    var saveURL = "<?php echo base_url();?>Product/update/?method=api";
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
        window.location.replace("<?php echo base_url()?>Product");

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
                    <?php
                    foreach ($prodinfo as $row) {
           
                    
                    ?>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Name</label>
                                  <input id="name" name="name" type="text" class="form-control" value="<?php echo $row->name?>">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Code</label>
                                  <input id="code" name="code" type="text" class="form-control" value="<?php echo $row->code?>">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Category</label>
                                  <input id="category" name="category" type="text" class="form-control" value="<?php echo $row->category?>">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Status</label>
                                  <input id="status" name="status" type="text" class="form-control" value="<?php echo $row->status?>">
                              </div>
                          </div>                              

                      </div>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Sell Price</label>
                                  <input id="sell_price" name="sell_price" type="text" class="form-control" value="<?php echo $row->sell_price?>">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Unit</label>
                                  <input id="unit" name="unit" type="text" class="form-control" value="<?php echo $row->unit?>">
                              </div>
                          </div>
                      </div>
                     
                      <input id="id" name="id" type="hidden" value="<?php echo $row->id?>">
                      <button id="btn-save" type="submit" class="btn btn-primary pull-right">Update Profile</button>
                      <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <div class="clearfix"></div>
                      <?php
                        }
                      ?>                      
                  </form>
              </div>
          </div>

  </div>
</div>
