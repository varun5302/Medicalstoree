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

  <title>viewproduct</title>
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

    <h1 id="h1">Product Table</h1>



    <table>
      <tr id="mtr">
      <th>No</th>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product img</th>
        <th>Product Price</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>


      <?php
      include ('../dbcon.php');

      $selq = "SELECT * FROM product";
      $res = mysqli_query($con, $selq);
      $num = mysqli_num_rows($res);
      $i = 0;
      if ($num > 0) {
        while ($data = mysqli_fetch_assoc($res)) {

          $prodid = $data["product_id"];
          $prodname = $data["product_name"];
          $prodimg = $data["product_img"];
          $prodprice = $data["product_price"];

          $i++;
          ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $prodid;?></td>
            <td><?php echo $prodname;?></td>
            <td><img src="../allimg/<?php echo $prodimg;?>" width="100px" alt=""></td>
            <td><?php echo $prodprice;?>/-</td>
            <td><a onClick="return confirm('Are you sure');" href="proedit.php?pedit=<?php echo $prodid;?>"><img src="img/icons8-edit-32.png" width="25px" alt=""></a></td>
            <td><a onClick="return confirm('Are you sure');" href="prodelete.php?pdelete=<?php echo $prodid;?>">"><img src="img/delete.png" width="25px" alt=""></a></td>
          </tr>
          <?php
        }
      } else {
        echo " <td>No Product</td>";
      }


      ?>




    </table>

  </body>

  </html>

</body>

</html>