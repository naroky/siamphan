<script>
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
  $("#ajaxform").submit(function(e)
  {
    //$("#loading_page").show();
    var saveURL = "<?php echo base_url();?>Customer/update/?method=api";
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
    e.preventDefault(); //STOP default action
    //e.unbind();

  });

  $("#btn-save").click(function()
  {
    
    //result = $("#ajaxform").validationEngine("validate");

    //if (result == true)
    //{
      alert("save");
      $("#ajaxform").submit();      
    /*
    } else
    {
      alert("fail");
    }
    */
  });
});
 

</script>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <form id="ajaxform" name="form-add" method="post" action="">
                <?php
                foreach ($cusinfo as $row) {
       
                
                ?>
                <!-- Content -->
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">BrandCode</label>
                              <input id="branchcode" name="branchcode" type="text" class="form-control validate[required]" value="<?php echo $row->branchcode?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Customer Type</label>
                              <input id="customertype" name="customertype" type="text" class="form-control validate[required]" value="<?php echo $row->customertype?>">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Thai Name</label>
                              <input id="thainame" name="thainame" type="text" class="form-control validate[required]" value="<?php echo $row->thainame?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Thai FullName</label>
                              <input id="thaifullname" name="thaifullname" type="text" class="form-control validate[required]" value="<?php echo $row->thaifullname?>">
                          </div>
                      </div>                              

                  </div>
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Eng Name</label>
                              <input id="engname" name="engname" type="text" class="form-control validate[required]" value="<?php echo $row->engname?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Eng FullName</label>
                              <input id="engfullname" name="engfullname" type="text" class="form-control validate[required]" value="<?php echo $row->engfullname?>">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Address</label>
                              <input id="address" name="address" type="text" class="form-control validate[required]" value="<?php echo $row->address?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Province</label>
                              <input id="province" name="province" type="text" class="form-control validate[required]" value="<?php echo $row->province?>">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">ZipCode</label>
                              <input id="zipcode" name="zipcode" type="text" class="form-control validate[required]" value="<?php echo $row->zipcode?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Phone</label>
                              <input id="phone" name="phone" type="text" class="form-control validate[required]" value="<?php echo $row->phone?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Fax</label>
                              <input id="fax" name="fax" type="text" class="form-control validate[required]" value="<?php echo $row->fax?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Mobile</label>
                              <input id="mobile" name="mobile" type="text" class="form-control validate[required]" value="<?php echo $row->mobile?>">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Email</label>
                              <input id="email" name="email" type="text" class="form-control validate[required]" value="<?php echo $row->email?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Peopleid</label>
                              <input id="peopleid" name="peopleid" type="text" class="form-control validate[required]" value="<?php echo $row->peopleid?>">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">Birthdate</label>
                              <input id="birthdate" name="birthdate" type="text" class="form-control validate[required]" value="<?php echo $row->birthdate?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group label-floating">
                              <label class="control-label">sex</label>
                              <input id="sex" name="sex" type="text" class="form-control validate[required]" value="<?php echo $row->sex?>">
                          </div>
                      </div>
                  </div>
                  <!-- Content -->

                  <input id="id" name="id" type="hidden" value="<?php echo $row->id?>">
                  <button id="btn-save" type="button" class="btn btn-primary pull-right">Update Profile</button>
                  <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <div class="clearfix"></div>
                  <?php
                    }
                  ?>
              </form>



        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



