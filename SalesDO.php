 <!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  <?php 
    include('config.php');
  ?>
</script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body onload="Test()">
  <div style="width: 100%;height: 100px;background-color: lightblue;">
    <div style="float: left;width: 88%;height: 100px;">
      <h1 style="margin-left: 10px;">Newspaper Distribution System</h1>
    </div>
    <div style="float: left;width: 10%;height: 100px;">
      <div id="logout" onclick="window.location='logOut.php'">
        Logout
      </div>
    </div>
  </div>
  <div style="width: 10%;height: 545px;background-color:#ff8000;float: left;border-top: 1px solid black;">
    <nav>
          <div class="first" onclick="window.location='home.php'">Home</div>
          <div class="second" onclick="window.location='inventory.php'">Inventory</div>
          <div class="first" onclick="window.location='supplier.php'">Supplier</div>
          <div class="second" onclick="window.location='SalesDO.php'">Sales</div>
          <div class="first" onclick="window.location='orderSystem.php'">Order</div>
          <div class="second" onclick="window.location='viewPayment.php'">Payment</div>
    </nav>    
  </div>
  <div style="width: 90%;height: 545px;float: left;background-color: grey">
    <div style="width: 100%;float: left;height: 45px;"><h2 align="center">Customer Delivery Order</h2></div>
    <div style="margin:10px 20px;float:left;width:90%;height:400px;margin-top:35px;overflow-y: auto;margin-left:80px;">
      <table border="1" style="background-color: white;border-collapse:collapse;width: 100%;">
        <tr><th colspan="5">Delivery Order</th></tr>
        <tr>
          <th>ID</th>
          <th>Order Date</th>
          <th>Order Status</th>
          <th>Insert Pos Laju Tracking Code</th>
          <th>View Delivery Order</th>
        </tr>
          <?php
              $getOrder = mysqli_query($conn,"SELECT * from customer_order")or die(mysqli_error($conn)); 
                      while($GetData = mysqli_fetch_array($getOrder)){
                        $customerOrderID = $GetData['customerOrderID'];
                        $orderDate = $GetData['orderDate'];
                        $order_status = $GetData['order_status'];
                        echo'<form action="" method="post">';
                        echo'<tr>';
                        echo'<td>DO'.sprintf ('%06d', $customerOrderID).'</td>';
                        echo'<td>'.$orderDate.'</td>';
                        echo'<td>'.$order_status.'</td>';
                        echo'<td><a href="editCustomerOrder.php?customerOrderID='.$customerOrderID.'" style="border:1px solid;">Insert Pos Laju Tracking Code</td>';
                        echo'<td><a href="editCustomerOrder.php?customerOrderID='.$customerOrderID.'" style="border:1px solid;">View Delivery Order</td>';
                        echo'</tr>';
                        echo'</form>';
                      }
              if(isset($_POST['delete'])){
                $categoryIDdata = $_POST['delete'];
                $getCategory = mysqli_query($conn,"DELETE from category WHERE categoryID='$categoryIDdata'")or die(mysqli_error($conn));
                  echo'<script>window.location.href="categoryInsert.php";</script>';
              }
            ?>
      </table>
    </div>
  </div>
</body>
</html>