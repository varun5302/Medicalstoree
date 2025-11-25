<?php
   
   include('../dbcon.php');
   
   if($_SESSION["auser"]==null){
      header("location:adminloging.php");
   }
    $userquery = "SELECT * FROM admin WHERE admin_user_name='" . $_SESSION['auser'] ."'";
    $res=mysqli_query($con,$userquery);   
    $data=mysqli_fetch_assoc($res);
       
    $nam=$data['admin_name'];
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>confirm order</title>
</head>

<body>

  <!DOCTYPE html>
  <html>

  <head>
    <style>
      table {
        border-collapse: collapse;
        margin-top: 5%;
        margin-left: 22%;
        width: 75%;
      }

      th,
      td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
      }

      #mtr {
        color: white;
        background-color: #f05462;
      }

      #h1 {

        margin-left: 50%;
      }
    </style>
  </head>

  <body>

    <h1 id="h1">confirm order Table</h1>



    <table>
      <tr id="mtr">
      <th>No</th>
        <th>Full Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>PinCode</th>
        <th>Product Name</th>
        <th>Product Quantity</th>
        <th>Product Price</th>
        <th>Payment</th>
        <th>Total Product Price</th>
      </tr>


      <?php
      include ('../dbcon.php');

      $selq = "SELECT * FROM buy_product";
      $res = mysqli_query($con, $selq);
      $num = mysqli_num_rows($res);
      $i = 0;
      if ($num > 0) {
        while ($data = mysqli_fetch_assoc($res)) {

          $uid = $data["id"];
          $uname = $data["Full_Name"];
          $uadd = $data["Address"];
          $ucity = $data["City"];
          $ustate = $data["State"];
          $uopin = $data["PinCode"];
          $upn = $data["Product_name"];
          $upq = $data["Product_Quantity"];
          $uprice = $data["Product_price"];
          $upayment = $data["Payment"];
          $utp = $data["t_product_price"];

          $i++;
          ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $uname;?></td>
            <td><?php echo $uadd;?></td>
            <td><?php echo $ucity;?></td>
            <td><?php echo $ustate;?></td>
            <td><?php echo $uopin;?></td>
            <td><?php echo $upn;?></td>
            <td><?php echo $upq;?></td>
            <td><?php echo $uprice;?></td>
            <td><?php echo $upayment;?></td>
            <td><?php echo $utp;?></td>
            </tr>
          <?php
        }
      } else {
        echo " <td>No order</td>";
      }


      ?>




    </table>

  </body>

  </html>

</body>

</html>