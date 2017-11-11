<script>
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
  $("#ajaxform").submit(function(e)
  {
    //$("#loading_page").show();
    var saveURL = "<?php echo base_url();?>Customer/save/?method=api";
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
        window.location.replace("<?php echo base_url()?>Customer");

      },
      error: function(jqXHR, textStatus, errorThrown)
      {
        //$("#simple-msg").html('<div class="alert alert-info">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</div>');
        alert('Error:'+textStatus);
        //$("#loading_page").hide();
      }
    });
    //e.preventDefault(); //STOP default action
    //e.unbind();

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
        <h4 class="title">CUSTOMER MANAGEMENT</h4>
        <p class="category">New Customer</p>
    </div>
    <div class="card-content table-responsive">
              <div class="card-content">
                  <form id="ajaxform" name="form-add" method="post" action="">
                    <!-- Content -->
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">BrandCode</label>
                                  <input id="branchcode" name="branchcode" type="text" class="form-control validate[required]" >
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Customer Type</label>
                                  <input id="customertype" name="customertype" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Thai Name</label>
                                  <input id="thainame" name="thainame" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Thai FullName</label>
                                  <input id="thaifullname" name="thaifullname" type="text" class="form-control validate[required]">
                              </div>
                          </div>                              

                      </div>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Eng Name</label>
                                  <input id="engname" name="engname" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Eng FullName</label>
                                  <input id="engfullname" name="engfullname" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Address</label>
                                  <input id="address" name="address" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Province</label>
                                  <input id="province" name="province" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">ZipCode</label>
                                  <input id="zipcode" name="zipcode" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Phone</label>
                                  <input id="phone" name="phone" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Fax</label>
                                  <input id="fax" name="fax" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Mobile</label>
                                  <input id="mobile" name="mobile" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Email</label>
                                  <input id="email" name="email" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Peopleid</label>
                                  <input id="peopleid" name="peopleid" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">Birthdate</label>
                                  <input id="birthdate" name="birthdate" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group label-floating">
                                  <label class="control-label">sex</label>
                                  <input id="sex" name="sex" type="text" class="form-control validate[required]">
                              </div>
                          </div>
                      </div>
                      <!-- Content -->


                      <button id="btn-save" type="submit" class="btn btn-primary pull-right">Update Profile</button>
                      <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>

  </div>
</div>
