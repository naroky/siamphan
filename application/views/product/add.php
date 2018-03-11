<script>
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
  $("#ajaxform").submit(function(e)
  {
    //$("#loading_page").show();
    var saveURL = "<?php echo base_url();?>Product/save/?method=api";
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
    /*
    result = $("#ajaxform").validationEngine("validate");

    if (result == true)
    {*/
      alert("save");
      $("#ajaxform").submit();      
    /*
    } else
    {
      alert("fail");
    }*/

  });
});
</script>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PRODUCT MANAGEMENT
        <small>:Manage product data</small>
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
          <h3 class="box-title">New Product</h3>
        </div>
        <div class="box-body">
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
                            <label class="control-label">Code</label>
                            <input id="code" name="code" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Category</label>
                            <?php 
                              echo form_dropdown('category', $cate_data, '','id="category" name="category" class="form-control"');

                            ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Status</label>
                            <select id="status" name="status" class="form-control">
                             <option value="1">Enable</option>
                             <option value="2">Disable</option>
                            </select>
                        </div>
                    </div>                              

                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Sell Price</label>
                            <input id="sell_price" name="sell_price" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Unit</label>
                            <input id="unit" name="unit" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <button id="btn-save" type="button" class="btn btn-primary pull-right">Update Profile</button>
                <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div class="clearfix"></div>
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

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">Product MANAGEMENT</h4>
        <p class="category">New Product</p>
    </div>
    <div class="card-content table-responsive">
              <div class="card-content">
                  
              </div>
          </div>

  </div>
</div>
