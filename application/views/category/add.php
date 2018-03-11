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
        window.location.replace("<?php echo base_url()?>Category");

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
    saveURL = "<?php echo base_url();?>Category/save/?method=api";
/*    if (result == true)
    {*/
      alert("save");
      $("#ajaxform").submit();      
/*    } else
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
          <h3 class="box-title">New Category</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
            <form id="ajaxform" name="form-add" method="post" action="<?php echo base_url();?>Category/save/?method=api">
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
                            <select id="status" name="status" class="form-control">
                              <option value="1">Enable</option>
                              <option value="2">Disable</option>
                            </select>
                            
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

