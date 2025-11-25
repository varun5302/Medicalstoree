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
    
    th, td {
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    #mtr{
      color: white;
        background-color: #f05462;
    }
    #h1{
     
      margin-left: 50%;
    }
    </style>
    </head>
    <body>
    
    <h1 id="h1">User Table</h1>
    
  
    
    <table>
      <tr id="mtr">
        <th>User Id</th>
        <th>User Name</th>
        <th>User Email</th>
      </tr>



      <?php
      include ('../dbcon.php');

      $selq = "SELECT * FROM userlogin";
      $res = mysqli_query($con, $selq);
      $num = mysqli_num_rows($res);
    
      if ($num > 0) {
        while ($data = mysqli_fetch_assoc($res)) {

          $uid = $data["user_id"];
          $uname = $data["name"];
          $uemail = $data["user_email"];
         
         
          ?>
          <tr>
            <td><?php echo $uid;?></td>
            <td><?php echo $uname;?></td>
            <td><?php echo $uemail;?></td>  
          </tr>
          <?php
        }
      } else {
        echo " <td>No user</td>";
      }


      ?>

     
    </table>
    
    </body>
    </html>
    
</body>
</html>