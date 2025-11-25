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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Dashboard</title>

    <style>
        table {
            margin-top: 35px;
            margin-left: 30%;
        }
        a {
            text-decoration: none;
            color: white;
        }
        a:hover {
            text-decoration: none;
            color: white;
        }
        tr td {
            padding: 50px;
        }
 

    </style>
    
</head>
<body>
      <h1 align="center">Dashboard</h1>
<table>
     <tr>
         <td>
             &nbsp;<img src="img/bproduct.png" alt="">
             <a href="home.php?addproduct"> <button type="button" class="btn btn-danger">AddProduct</button></a>
         </td>
         <td>
            &nbsp;<img src="img/bproduct.png" alt="">
            <a href="home.php?viewproduct"><button type="button" class="btn btn-danger">View Product</button></a>
        </td>
        <td>
            <img src="img/bcategorize.png" width="80px" alt="">
            &nbsp; <a href="home.php?addcat"><button type="button" class="btn btn-danger">AddCategories</button></a>
        </td>
         
     </tr>
     <br><br>
     <tr>
        
        <td>
            <img src="img/bcategorize.png" width="80px" alt="">
            &nbsp;<a href="home.php?viewcat"> <button type="button" class="btn btn-danger">View Categories</button></a>
        </td>
        <td>
            <img src="img/buser.png" width="80px" alt="">
            &nbsp; <a href="home.php?viewuser"><button type="button" class="btn btn-danger">View User</button></a>
        </td>
        <td>
            <img src="img/bconfirm.png" width="80px" alt="">
            &nbsp; <a href="home.php?confirm"><button type="button" class="btn btn-danger">View confirm order</button></a>
        </td>
     </tr>
    
</table>


</body>
</html>
