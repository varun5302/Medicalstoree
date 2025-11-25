<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>cart</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

<style>
     #q{
        width:50%;
     }
     #ucart{
        border-radius: 55px;
        height:7vh;
        color: #007bff;
     }
     #ucart:hover{
        background-color:  #ffb524;
     }  
   
</style>

    <body>

    <?php
  
  require("menu.php");
  include('dbcon.php');
  
  session_start();
  
  if($_SESSION["pass"] == null){
    ?>
     <script>
     window.location="form/form.php";
     </script>
       
   <?php    
   }
 if(isset($_SESSION['pass'])){

  $userquery = "SELECT * FROM userlogin WHERE user_pass='" . $_SESSION['pass'] ."'";
  $res = mysqli_query($con, $userquery);   
  $data = mysqli_fetch_assoc($res);
         
  $uid = $data['user_id'];
}
  if(isset($_GET['productid'])){
      $id = $_GET['productid'];
       
      
      $check_query = "SELECT COUNT(*) as count FROM cart WHERE pro_id = '$id' AND user_id = '$uid'";
      $check_res = mysqli_query($con, $check_query);
      $check_data = mysqli_fetch_assoc($check_res);
      
   
      if($check_data['count'] == 0) {
          $sq = "SELECT * FROM product WHERE product_id ='$id'";
          $res = mysqli_query($con, $sq);
          $data = mysqli_fetch_assoc($res);
          
          $pname = $data['product_name'];
          $pimg = $data['product_img'];
          $pprice = $data['product_price'];
          
          $ins = "INSERT INTO `cart`(`pro_id`, `pro_name`, `pro_img`, `pro_price`, `pro_quantity`, `user_id`) VALUES ('$id', '$pname', '$pimg', '$pprice', '1', '$uid')";
          $ress = mysqli_query($con, $ins);
      
          if($ress){
              ?>
              <script>alert("Product Added Successfully!");</script>
              <?php
          } else {
              ?>
              <script>alert("Product Not Added!");</script>
              <?php
          }
      } else {       
         ?>
          <script>
          alert("Product already exists in cart!");
          </script>
          <?php
      }
      
     
  }
  ?>
  

         <h1 align="center" style="margin-top: 80px;">Cart</h1>
        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                <?php 
            
            if(isset($uid)){
                     $csel="SELECT * FROM  cart WHERE user_id ='$uid'";      
                
                       $r=mysqli_query($con,$csel);
                        $total = 0;
                       while($cdata=mysqli_fetch_assoc($r)){

                          $Productsimg =$cdata['pro_img'];
                          $ProductsName =$cdata['pro_name'];
                          $ProductsPrice =$cdata['pro_price'];
                          $ProductsQuantity =$cdata['pro_quantity'];
                         
                          $total += $cdata['pro_price'];
                         
                       ?>
            <form method="POST">
                  <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="allimg/<?php echo $Productsimg;?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $ProductsName;?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $ProductsPrice;?></p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                              
                                 
                                        <input  id="q" class="cart_qty" data-prod-price="<?php echo $cdata['pro_price']; ?>" data-prodid="<?php echo $cdata['pro_id']; ?>" type="number" name="ProductQuantity" value="1" min="1" oninput="updateTotal(this.value)">
                                   
                                       
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4" id="<?php echo $cdata['pro_id']; ?>" class="qty_lbl"><?php echo $ProductsPrice;?></p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            
                            </tr>
                           
                        </tbody>
          <?php            
             }
             ?>
          <?php
             }
             ?>

                     </table>
                               <button id="ucart">UPDATE CART</button>
                           
                </div>
                </form>

      <?php 
         
           
         $usql="UPDATE `cart` SET `pro_price`='',`pro_quantity`='[value-6]' WHERE";
       
       ?>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                
                                
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4"><?php if(isset($total)){echo $total.'/-';} ?></p>
                            </div>
                            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed to Buy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->

        <footer id="foot">
       <?php
           require("foot.php");
       ?>
  </footer>
        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>
<script>


$(".cart_qty").change(function(){
    var quantity = $(this).val();
    var prod_id = $(this).attr('data-prodid');
    var price = $(this).attr('data-prod-price');

  
    if(quantity > 10) {
        alert("Please minimum  10 item .");
        $(this).val(10); 
        return; 
    }

    var total = price * quantity;
    document.getElementById(prod_id).innerHTML = total + "/-";
});

    
</script>
</html>