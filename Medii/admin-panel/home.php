<?php
   session_start();
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Admin Panel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>



</script>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Hii <?php echo $nam;?></h1>
        </div>
        <br><br>
        <ul>
            <li><a href="home.php?dashboard" ><img src="img/dashboard (2).png" alt="">&nbsp; <span>Dashboard</span></a> </li>
            <li class="li"><a href="home.php?addcat"><img src="img/categorize.png"  width="37px" alt="">&nbsp;<span>AddCategories</span></a> </li>
            <li class="li"><a href="home.php?viewcat"><img src="img/categorize.png"  width="37px" alt="">&nbsp;<span>View Categories</span></a> </li>
            <li class="li"><a href="home.php?addproduct"><img src="img/product.png"  width="37px" alt="">&nbsp;<span>AddProduct</span></a> </li>
            <li class="li"><a href="home.php?viewproduct"><img src="img/product.png"  width="37px" alt="">&nbsp;<span>View Product</span></a> </li>
            <li class="li"><a href="home.php?viewuser"><img src="img/user.png"  width="37px" alt="">&nbsp;<span>View User</span></a> </li>
            <li class="li"><a href="home.php?confirm_ordered"><img src="img\confirm.png"  width="37px" alt="">&nbsp;<span>confirm order</span></a> </li>
            
            <li class="li"><a href="logout.php"><img src="img/logout.png" width="37px" alt="">&nbsp; <span>LogOut</span></a></li>
        </ul>
    </div>

    <div id="content">
           
    </div>

    <?php
     if(isset($_GET["dashboard"])){
        include("dashboard.php");
     }
     if(isset($_GET["confirm"])){
      include("confirm_ordered.php");
   }

    if(isset($_GET["viewcat"])){
       include("viewcat.php");
    }
    if(isset($_GET["addproduct"])){
        include("insert_product.php");
     }

    if(isset($_GET["viewproduct"])){
        include("viewproduct.php");
     }
    
     if(isset($_GET["viewuser"])){
        include("viewuser.php");
     }
     if(isset($_GET["addcat"])){
        include("insert_categories.php");
     }

     if(isset($_GET["confirm_ordered"])){
        include("confirm_ordered.php");
     }
   
    
    ?>
</body>

</html>
