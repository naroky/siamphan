<script>
$(document).ready(function() {
  var saveURL;
    // Javascript method's body can be found in assets/js/demos.js
  $("#ajaxform").submit(function(e)
  {
    //$("#loading_page").show();
    var postData = $(this).serializeArray();
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
        window.location.replace("<?php echo base_url()?>Category");

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
    saveURL = "<?php echo base_url();?>Category/update/?method=api";
    /*
    result = $("#ajaxform").validationEngine("validate");

    if (result == true)
    {
      */
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
        CATEGORY MANAGEMENT
        <small>:Manage category data</small>
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
          <h3 class="box-title">Edit Category</h3>
        </div>
        <div class="box-body">

          <form id="ajaxform" name="form-add" method="post" action="">
              <?php
              foreach ($cateinfo as $row) {
                if ($row->status == 1)
                {
                  $enable_select = "Selected";
                  $disable_select = "";
                }
                else
                {
                  $enable_select = "";
                  $disable_select = "Selected";

                }
              
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
                            <label class="control-label">Status</label>
                            <select id="status" name="status" class="form-control">
                              <option value="1" <?php echo $enable_select?>>Enable</option>
                              <option value="2" <?php echo $disable_select?>>Disable</option>
                            </select>
                            
                        </div>
                    </div>  
                  
                </div>
                
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