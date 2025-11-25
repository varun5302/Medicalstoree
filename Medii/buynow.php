<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container2 {
    margin-left: 550px;
    width: 30%;
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
.container {
    margin-top: 40px;
    margin-left: 550px;
    width: 30%;
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
#sel{
    width: 40%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
#q {
    width: 3%;
    border-radius: 96px;
    padding: 5px;
}
#qq{
  margin-left: 421px;
}
.cart_form{
    background: #f2f2f2;
    padding: 10px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<?php
   session_start();
     include ('dbcon.php');
      
     if($_SESSION["user"]==null){
      header("location:form/form.php");
   }

        $i=$_GET['id'];

        $psel = "SELECT * FROM product WHERE product_id='$i'";

        $res = mysqli_query($con, $psel);

       $data = mysqli_fetch_assoc($res);
       
      
       $prodname = $data["product_name"];
       $prodprice = $data["product_price"];
       $tprodprice = $data["product_price"];
    ?>
    <h1 align="center">Proceed to Buy</h1>
 <form method="POST">
<div class="cart_form">
 
    <h4>Product name <span class="price" style="color:black"> <b style="margin-right: 533px;">Product Quantity</b>&nbsp;&nbsp;&nbsp; <b>Product price</b></span></h4>
    <p>
        <span><?php echo $prodname;?></span> 
        <span id="qq">
            <input id="q" type="number" name="ProductQuantity" value="1" min="1" oninput="updateTotal(this.value)">
        </span> 
        <span class="price" id="productPrice"><?php echo $prodprice."/-";?></span>
    </p>
      
    <hr>
      
    <p>Total <span class="price" style="color:black"><b id="totalPrice"><?php echo $tprodprice."/-";?></b></span></p>
</div>


<div class="row">
  <div class="col-75">
    <div class="container">
     
      
        <div class="row">
          <div class="col-50">
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" >
            
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state">
              </div>
              <div class="col-50">
                <label for="zip">PinCode</label>
                <input type="text" id="zip" name="zip">
              </div>
              <div class="col-50">
              <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <select name="payment" id="sel">
                <option value="sele">Select Payment</option>
                <option value="cod">cash on delivery</option>
                <option value="online">online payment</option>
            </select>
              </div>
            </div>
          </div>

        </div>
        <input type="submit" id="sub" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
 
</div>


<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
       
      $fullname=$_POST['fullname'];
      $address=$_POST['address'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $zip=$_POST['zip'];
      $payment=$_POST['payment'];
      $ProductQuantity=$_POST['ProductQuantity'];
      $tprodprice=$prodprice*$ProductQuantity;
    
           $ins="INSERT INTO `buy_product`( `Full_Name`, `Address`, `City`, `State`, `PinCode`, `Product_name`, `Product_Quantity`, `Product_price`, `Payment`, `t_product_price`) VALUES 
           ('$fullname','$address','$city','$state','$zip','$prodname','$ProductQuantity',' $prodprice','$payment','$tprodprice')";

            $res=mysqli_query($con,$ins);

            if($res){
              ?>
              <script>
                      alert("ordered successfully");
                      window.location = "shop.php";
              </script>
             <?php 
            }
    }



?>

<script>

$(document).ready(function(){
 
  $("#fname,#city,#state").keyup(function () {

this.value = this.value.replace(/[^a-z A-Z]/g, '');
});

$('#zip').keyup(function () {
this.value = this.value.replace(/[^0-9\.]/g, '');
});

 $("#sub").click(function(){

   if($("#fname").val()==""){
        alert("Full Name is empty..");
        return false;
   } 

   if($("#adr").val()==""){
        alert("Address is empty..");
        return false;
   } 

   if($("#city").val()==""){
        alert("City  is empty..");
        return false;
   } 

   if($("#state").val()==""){
        alert("State  is empty..");
        return false;
   } 

   if($("#zip").val()==""){
        alert("Pincode  is empty..");
        return false;
   } 

   

   if($("#zip").val().length !=6){
     alert("Please enter only 6 digit number..");
        return false;
   }
   if($("#sel").val()=="sele"){
    alert("Please select a payment method.");
    return false;
  }

 });

   


});


function updateTotal(quantity) {
    var price = <?php echo $tprodprice; ?>;
    var total = price * quantity;
    document.getElementById("totalPrice").innerHTML = total + "/-";
}

</script>

</body>
</html>

