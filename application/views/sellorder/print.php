
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body >
    <h1>Hello, world!</h1>
    <div id="ordDoc" class="container-fluid" style="margin:10;padding:10">
    

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
                $fullname = $row->user_fullname;
                $remark = $row->remark;
              }

            ?>
    <div class="row">
      <div class="col-md-6"></div>                
      <div class="col-md-6">
        
        <h4 style="text-align: right">ใบสินค้าฝากขาย</h4>
      </div>                
            
    </div>
            
    <div class="row">
      <div class="col-md-6 border border-dark">                
        <h4><?php echo $cust_name?></h4>
        <p><?php echo $cust_address?></p>
      </div> 
      <div class="col-md-6 border border-left-0 border-dark">
        <div class="col-md-12" style=""> 
          <label class="col-md-5">Document No.</label>                
          <span class="col-md-3"><?php echo $id?></span>               
        </div>
        <div class="col-md-12">
          <label class="col-md-5">Date.</label>                
          <span class="col-md-3"><?php echo $lastupdate?></span>               
        </div>
        <div class="col-md-12">
          <label class="col-md-5">Duedate.</label>                
          <span class="col-md-3"><?php echo $duedate?></span>               
        </div>
        <div class="col-md-12">
          <label class="col-md-5">Staff.</label>                
          <span class="col-md-3"><?php echo $fullname?></span>               
        </div>
      </div>         
    </div>


  <div class="row">
      <div class="card-content table-responsive">
          <table id="table_ordDetail" class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>ITEMCODE</th>
                    <th>DESCRIPTION</th>
                    <th>UNIT PRICE</th>
                    <th>QUANTITY</th>
                    <th>DISCOUNT</th>
                    <th>AMOUNT</th>
                    <!--th>Unit</th-->
                </thead>
                <tbody>
                  <?php 
                  $i=0;
                  $total = 0;
                  foreach ($orderList as $row)
                  {
              ?>
                
                    <tr>
                        <td><?php echo $row->id?></td>
                        <td><?php echo $row->prod_name?></td>
                        <td><?php echo $row->prod_code?></td>
                        <td><?php echo $row->prod_price?></td>
                        <td><?php echo $row->amount?></td>
                        <td><?php echo $row->discount?></td>
                        <td><?php echo $row->sell_price?></td>
                        
                        <!--td><?php echo $row->unit?></td-->
                    </tr>
              
              <?php
              $total = $total + $row->sell_price;
              $i++;
              }
                  ?>
          </tbody>
        </table>     
      </div>
  </div>
  <div class="row">
    <div class="col-md-6  border border-dark" >     
        <span class="col-md-3"><?php echo num2thai($total)?></span>               
    </div>
    <div class="col-md-6  border border-dark border-left-0"> 
      <div class="col-md-12"> 
        <label class="col-md-3">Total</label>                
        <span class="col-md-3"><?php echo $total?></span>               
      </div>        
    </div>
  </div>
  <br/>
  <div class="row">
    <div class="col-md-2 border border-dark">     
        หมายเหตุ               
    </div>
    <div class="col-md-4 border border-dark border-left-0">     
        &nbsp;
    </div>
    <div class="col-md-6 border border-dark  border-left-0"> 
      ได้รับสินค้าและบริการตามรายการข้างต้นครบถ้วนถูกต้อง    
    </div>
  </div>
  <div class="row">
    <div class="col-md-2  border border-dark  border-top-0">     
        <?php echo $remark ?>              
    </div>
    <div class="col-md-4  border border-dark border-left-0 border-top-0">     
        <div>ผู้ส่งของ _____________________ </div>
        <div>วันที่ _____________________ </div>
    </div>
    <div class="col-md-6 border border-dark border-left-0 border-top-0"> 
        <div>ผู้รับของ _____________________ </div>
        <div>วันที่ _____________________ </div> 
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>

</html>
