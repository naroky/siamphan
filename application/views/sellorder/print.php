
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <title>ใบสินค้าฝากขาย</title>
  </head>
  <body >

    <div id="ordDoc" class="container-fluid" style="margin:10;padding:10">
            <?php
              foreach ($orderInfo as $row) {
                # code...
                //var_dump($row);
                $order_id = $row->id; 
                $cust_id = $row->cust_id;
                $cust_name = $row->cust_name;
                $cust_address = $row->cust_address;
                $credit = $row->credit;
                $senddate = $row->senddate;
                $total_price = $row->total_price;
                $lastupdate = $row->lastupdate;
                $total_vat = $row->total_vat;
                $status = $row->status;
                $fullname = $row->user_fullname;
                $remark = $row->remark;
              }
            ?>
            <br/>

    <table style="width:100%">
      <tr>
        <td style="width:130px"><img src="<?php echo base_url()?>assets/img/logo_120.png" class="img-responsive"/></td>
        <td> 
          <h3>สยามภัณฑ์บัลลูน</h3>
          20/3 ม.3 ถ.เลียบคลองหก ตำบลคลองหลวง อำเภอคลองหลวง ปทุมธาณี 12120 <br/>
          Tel:084-919-4884 Line ID:siamphnballoon<br/>
        </td>
        <td style="text-align: left"><h4 style="text-align: right">ใบสินค้าฝากขาย</h4></td>
      </tr>
      
    </table>

    <table style="width:100%" border="1">
    <tr>
        <td style="width:50%">
          <h4><?php echo $cust_name?></h4>
          <p><?php echo $cust_address?></p>        
        </td>
        <td>
          <div style="width:100%">
            <div style="float: left; width:50%;">Document No.</div>                
            <div style="text-align:right;"><?php echo $id?></div>
          </div>
          <div style="width:100%"> 
            <div style="float: left; width:50%;">Date.</div>               
            <div style="text-align:right;"><?php 
            $date = date_create($lastupdate);
            echo date_format($date,"d/m/Y");?></div>
          </div>               
          <div style="width:100%"> 
            <div style="float: left; width:50%;">เครดิต</div>               
            <div style="text-align:right;"><?php             
            echo $credit;?></div>
          </div> 
          <div style="width:100%"> 
            <div style="float: left; width:50%;">Staff.</div>               
            <div style="text-align:right;"><?php echo $fullname?></div>
          </div> 
        </td>
      </tr>
    </table>             
    <br/>

    <table id="table_ordDetail" border="1" style="width:100%">
          <thead>
              <th style="text-align: center">ID<br/>ลำดับ</th>
              <th style="text-align: center">ITEMCODE<br/>รหัสสินค้า</th>
              <th style="text-align: center">DESCRIPTION<br/>รายการสินค้า</th>
              <th style="text-align: center">UNIT PRICE<br/>ราคาต่อหน่อย</th>
              <th style="text-align: center">QUANTITY<br/>จำนวน</th>
              <th style="text-align: center">DISCOUNT<br/>ส่วนลด</th>
              <th style="text-align: center">AMOUNT<br/>จำนวนเงิน</th>
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
                  <td style="text-align: center"><?php echo $row->id?></td>
                  <td><?php echo $row->prod_name?></td>
                  <td style="text-align: center"><?php echo $row->prod_code?></td>
                  <td style="text-align: right"><?php echo $row->prod_price?></td>
                  <td style="text-align: right"><?php echo $row->amount?></td>
                  <td style="text-align: right"><?php echo $row->discount?></td>
                  <td style="text-align: right"><?php echo $row->sell_price?></td>
                  
                  <!--td><?php echo $row->unit?></td-->
              </tr>
        
        <?php
        $total = $total + $row->sell_price;
        $i++;
        }
            ?>
    </tbody>
  </table>




  <br/>
    <table style="width:100%" border="1">
      <tr>
        <td style="width:50%"><?php echo num2thai($total)?></td>
        <td> 
          ยอดสุทธิ          
        </td>
        <td style="text-align: left"><?php echo $total?></td>
      </tr>
      
    </table>
  <br/>
    <table style="width:100%" border="1">
      <tr>
        
        <td colspan="2" style="width:50%"> 
          หมายเหตุ          
        </td>
        <td  style="text-align: left">ได้รับสินค้าและบริการตามรายการข้างต้นครบถ้วนถูกต้อง</td>

      </tr>
      <tr>
        <td style="width:25%"<?php echo $remark ?></td>

        <td style="text-align: left">
          <div>ผู้ส่งของ _____________________ </div>
          <div>วันที่ _____________________ </div>
        </td>
        <td style="text-align: left">
          <div>ผู้รับของ _____________________ </div>
          <div>วันที่ _____________________ </div> 
        </td>        
      </tr>      
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>

</html>
