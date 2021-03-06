<script>
$(document).ready(function() {
  var CUST_SEARCH_BOX = "<?php echo base_url();?>customer/search_1chr/?method=api";
  var PROD_SEARCH_BOX = "<?php echo base_url();?>product/search_1chr/?method=api";
  var saveURL;
  //$('#ordDetail').DataTable();
  $( ".datepicker" ).datepicker();
  $( ".datepicker" ).datepicker("option", "dateFormat","yy-mm-dd");

  $('#ordDetail').load("<?php echo base_url();?>Sellorder/loadOrdetail/?method=api&id=<?php echo $orderInfo[0]->id?>");
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
          if (data != "false")
          {
            alert(textStatus);
            $('#order_id').val(data);

          }
          else
          {
            alert(textStatus+":False");

          }
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
  //    e.unbind();

    });




  // Create Order

  $("#customer_search")
  .keyup(function(){
    if ($("#customer_search").val().length == 1)
    {
        // Load data
        $("#search_cust_box").load(CUST_SEARCH_BOX+'&char=' + $("#customer_search").val());

    }
    
    if ($("#customer_search").val().length != 0)
    {
      input = document.getElementById('customer_search');
      filter = input.value.toUpperCase();
      ul = document.getElementById("customer_search");
      li = ul.getElementsByTagName('li');

      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByTagName("a")[0];
          if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      } 
       
    }
        //alert( "Handler for .keyup() called." );
  });


  $("#btn-cust-save").click(function()
  {
    result = $("#ajaxform").validationEngine("validate");
    saveURL = "<?php echo base_url();?>Sellorder/savehdOrder/?method=api";


    if (result == true)
    {
      alert("save");
      $("#ajaxform").submit();      
    } else
    {
      alert("fail");
    }


  });


// Create Order Detail
  $("#product_search")
  .keyup(function(){
    if ($("#product_search").val().length == 1)
    {
        // Load data
        $("#search_prod_box").load(PROD_SEARCH_BOX+'&char=' + $("#product_search").val());

    }
    
    if ($("#product_search").val().length != 0)
    {
      input = document.getElementById('product_search');
      filter = input.value.toUpperCase();
      ul = document.getElementById("product_search");
      li = ul.getElementsByTagName('li');

      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByTagName("a")[0];
          if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      } 
       
    }
        //alert( "Handler for .keyup() called." );
  });


  $("#frmOrdDetail").submit(function(e)
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
        alert(textStatus+":"+data);
        $('#ordDetail').load("<?php echo base_url();?>Sellorder/loadOrdetail/?method=api&id="+$('#order_id').val());
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
        alert('Error:'+textStatus);
      }
    });
//    e.unbind();

  });



  $("#btn-prod-add").click(function()
  {
    result = $("#frmOrdDetail").validationEngine("validate");
    saveURL = "<?php echo base_url();?>Sellorder/saveOrderDetail/?method=api";


    if (result == true)
    {
      alert("save");
      $("#frmOrdDetail").submit();      
    } else
    {
      alert("fail");
    }


  });

    $('#orderdtail_list').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );



});




</script>
<style>
#cust_ul {
    /* Remove default list styling */
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#cust_ul li a {
    border: 1px solid #ddd; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6; /* Grey background color */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black; /* Add a black text color */
    display: block; /* Make it into a block element to fill the whole list */
}

#cust_ul li a:hover:not(.header) {
    background-color: #eee; /* Add a hover effect to all links, except for headers */
}

#prod_ul {
    /* Remove default list styling */
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#prod_ul li a {
    border: 1px solid #ddd; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6; /* Grey background color */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black; /* Add a black text color */
    display: block; /* Make it into a block element to fill the whole list */
}

#prod_ul li a:hover:not(.header) {
    background-color: #eee; /* Add a hover effect to all links, except for headers */
}
</style>
<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">ORDER INFOMATION</h4>
        <p class="category">Order Header</p>
    </div>
    <div class="card-content table-responsive">
      <div class="card-content">
        <div class="" lass="row">
          <form id="ajaxform">
            <div class="col-md-12">
                <div class="form-group label-floating">
                    <label class="control-label">Search for name..:</label>
                    <input type="text" id="customer_search" name="customer_search"  class="form-control">
                    <div id="search_cust_box">
                    </div>
                </div>
            </div>

            <?php
              foreach ($orderInfo as $row) {
                # code...
                //var_dump($row);
                $order_id = $row->id; 
                $cust_id = $row->cust_id;
                $cust_name = $row->cust_name;
                $cust_address = $row->cust_address;
                $duedate = $row->duedate;
                $senddate = $row->senddate;
                $total_price = $row->total_price;
                $lastupdate = $row->lastupdate;
                $total_vat = $row->total_vat;
                $status = $row->status;
              }

            ?>
             <div class="col-md-5">
                <div class="form-group label-floating">
                    <label class="control-label">Name</label>
                    <input id="cust_name" name="cust_name" type="text" class="form-control" value="<?php echo $cust_name?>">
                </div>
            </div>         
            <div class="col-md-5">
                <div class="form-group label-floating">
                    <label class="control-label">Address</label>
                    <input id="cust_address" name="cust_address" type="text" class="form-control"  value="<?php echo $cust_address?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <script>
                      $(document).ready(function() {
                        $("#duedate").datepicker( "setDate" , "<?php echo $duedate?>" );
                      })
                    </script>
                    <label class="control-label">Due Date</label>
                    <input id="duedate" name="duedate" type="text" class="datepicker form-control" value=" "/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <script>
                      $(document).ready(function() {
                        $("#senddate").datepicker( "setDate" , "<?php echo $senddate?>" );
                      })
                    </script>                  
                    <label class="control-label">Send Date</label>
                    <input id="senddate" name="senddate" type="text" class="datepicker form-control" value=" ">
                </div>
            </div>          
            <div class="col-md-12">
                <div class="form-group label-floating">
                    <input type="hidden" id="cust_id" name="cust_id"  value="<?php echo $cust_id?>"/>
                    <input type="hidden" id="id" name="cust_id"  value="<?php echo $id?>"/>
                    <button id="btn-cust-save" type="button" class="btn btn-primary pull-right">Save</button>
                    <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div> 
          </form>           
        </div>

      </div>
    </div>
</div>
<div class="col-md-5">
  <div class="card">
    <div class="card-content table-responsive">
      <div class="card-content">
        <div class="" lass="row">
          <form id="frmOrdDetail">
            
          
            <div class="col-md-12">
                <div class="form-group label-floating">
                    <label class="control-label">Search for product..:</label>
                    <input type="text" id="product_search" name="product_search"  class="form-control">
                    <div id="search_prod_box">
                    </div>
                </div>

            </div>
            <div class="row">
              <div class="col-md-5">
                  <div class="form-group label-floating">
                      <label class="control-label">Code</label>
                      <input id="prod_code" name="prod_code" type="text" class="form-control">
                  </div>
              </div> 
            </div>
            <div class="row">
              <div class="col-md-5">
                  <div class="form-group label-floating">
                      <label class="control-label">Product Price</label>
                      <input id="prod_price" name="prod_price" type="text" class="form-control" >
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group label-floating">
                      <label class="control-label">Unit</label>
                      <input id="unit" name="unit" type="text" class="form-control">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                  <div class="form-group label-floating">
                      <label class="control-label">Amount</label>
                      <input id="amount" name="amount" type="text" class="form-control" >
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group label-floating">
                      <label class="control-label">Sell Price</label>
                      <input id="sell_price" name="sell_price" type="text" class="form-control">
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="col-md-5">
                  <div class="form-group label-floating">
                      <label class="control-label">Include VAT</label>
                      <input id="status" name="status" type="checkbox" value="1" class="form-control" >
                  </div>
              </div>
            </div>                        
            <div class="col-md-12">
                <div class="form-group label-floating">
                    <input type="hidden" id="order_id" name="order_id" value=''/>
                    <button id="btn-prod-add" type="button" class="btn btn-primary pull-left">Add</button>
                    
                </div>
            </div> 
          </form>             
        </div>

      </div>
    </div>

  </div>

</div>
<div class="col-md-7">
  <div class="card">
    <div class="card-content table-responsive">
      <div id="ordDetail">
     
      </div>
    </div>
  </div>
</div>
