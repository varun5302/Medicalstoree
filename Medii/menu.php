<?php
session_start();
include("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/menu.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>


    <script>
           $(document).ready(function(){
    $("#redirectButton").click(function(){
        // Change the URL to the desired destination
        window.location.href = "https://example.com/destination-page";
    });
});
         
   </script>

  <style>
      #a{
        text-decoration: none;
        color: white;
        font-size: 14px;
      }
      #a:hover{
        color: aqua;
      }
  </style>
</head>

<body>

    <div id="menu_content">
        <div id="smenu">
            <img src="img/logo.png" width="100px">
            <h3 style="color: white; margin-top: 10px;">V-H</h3>
        </div>


        <div id="menu">
            <ul>
                <li><a class="a" style="font-size:14px" href="main.php">Home</a></li>
                <li><a class="a"  style="font-size:14px" href="shop.php">Online Buy</a></li>
                <li><a class="a"  style="font-size:14px" href="category.php">Category</a></li>
                <li><a class="a"  style="font-size:14px" href="">Contact us</a></li>
                <li><a class="a"  style="font-size:14px" href="404.php">About</a></li>
            </ul>
        </div>

        <form method="POST">
            <input list="searchdata" name="search" id="search"/>&nbsp;&nbsp;<span id="se"><a id="a" href="shop.php?search"><i class="fa fa-search" style="font-size:25px;cursor: pointer;"></i></a></span>
            <?php
               
               
                $sq="SELECT product_name FROM `product`";
               
                 $res=mysqli_query($con,$sq);
                 ?>
                 
                      <datalist id="searchdata">
              <?php

                 while($data=mysqli_fetch_assoc($res)){
                    ?>
                    <option><?php echo $data['product_name'];?></option>

              <?php
                 }
            ?>
            
                
                
            </datalist>
        </form>
       <?php 
       

if(isset($_SESSION['pass'])){

       if($_SESSION["pass"]==null){

        header("location:form/form.php");
     }
      $userquery = "SELECT * FROM userlogin WHERE user_pass='" . $_SESSION['pass'] ."'";
      $res=mysqli_query($con,$userquery);   
      $data=mysqli_fetch_assoc($res);
         
      $uid=$data['user_id'];
        $csel="SELECT * FROM  cart WHERE user_id ='$uid'";      
        $r=mysqli_query($con,$csel); 
        $count = mysqli_num_rows($r);
    }
        ?>
         <div style="color: white;margin-top: 19px; margin-left: 55px;">
              <span id="cart" > <a id="form"  href="cart.php"> <i class="fa fa-shopping-cart" style="font-size:20px"></i><span><?php if(isset($count)){echo $count;} ?></span></a></span> 
        </div>

        <div style="margin-left: 50px;">
            <?php
                   
               if(isset($_SESSION["user"])){
                ?>
                       <span ><a  id="form" href="logout.php"> <i class="fa fa-user" style="font-size:20px; padding-top: 17px;  margin-top: 8px;cursor: pointer;"><span>Logout</span></i></a></span>
                <?php

               }else{
                ?>
                    <span ><a  id="form" href="form/form.php"> <i class="fa fa-user" style="font-size:20px; padding-top: 17px;  margin-top: 8px;cursor: pointer;"><span>Login</span></i></a></span>
                <?php
                
               }

            ?>

          
        </div>

    </div>
   
</body>

</html>

<style>
    #form{

   text-decoration:none ;
    color: white;
}
#form:hover{
    font-size: 15px;
     color: aqua;
    
}
 </style>