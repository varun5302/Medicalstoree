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
    <title>Insert Products</title>
<style>
#md{

    border: 5px solid #f05462;
    border-radius: 15px;
    margin-left: 40%;
    height: 70vh;
    width: 30%;
}
#d2{
    margin-top: 25px;
}
   form {
  
    width: 300px;
    margin: 0 auto;
}

label {
    display: block;
   
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    height: 5vh;
    margin-top: 5px;
}

select {
    width: 100%;
    height: 5vh;
    margin-top: 5px;
}

input[type="file"] {
    margin-top: 5px;
}

input[type="submit"] {
    display: block;
    width: 150px;
    height: 25px;
    border-radius: 5px;
    margin: 10px auto;
}
#sub{
   cursor: pointer;
}

#sub:hover{
   background-color: #f05462;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
   $(document).ready(function(){

    $("#sub").click(function(){
  
         if($("#productname").val()==""){
         alert("Product Name is empty..");
           return false;
         }

         if($("#productkeywords").val()==""){
         alert("Product Keywords is empty..");
           return false;
         }

         if($("#category").val()=="select"){
         alert("select categories is empty..");
           return false;
         }

         if($("#productimage").val()==""){
         alert("Product Image is empty..");
           return false;
         }

         if($("#productprice").val()==""){
         alert("Product Price is empty..");
           return false;
         }
    });

     $("#catname").keyup(function(){
         this.value=this.value.replace(/[^a-zA-Z ]/g,"");
     });

});

</script>
</head>
<body>
 <div align="center"><h1>Insert Products</h1><br><br><br><br><br></div>
<div id="md">
    <div id="d2">
        <form method="POST" enctype="multipart/form-data">
            <label for="productname">Product Name:</label><br>
            <input type="text" id="productname" name="productname"><br><br>
            <label for="productkeywords">Product Keywords:</label><br>
            <input type="text" id="productkeywords" name="productkeywords"><br><br>
            
            
            <label for="category">Select a categories:</label>
            <select id="category" name="category">
            <option value="select">SELECT CATEGORIES</option>
         <?php
                
                include('../dbcon.php');

                        $selq = "SELECT * FROM categories";
                        $res = mysqli_query($con, $selq);
                        $num = mysqli_num_rows($res);
                       
                        if ($num > 0) {
                            while ($data = mysqli_fetch_assoc($res)) {

                                $catid = $data["catId"];
                                $catname = $data["catName"];
                                ?>
                                <option value="<?php echo $catid;?>"><?php echo $catname;?></option>
                    <?php
                            }
                        }
             ?>
                
            </select><br><br>
            <label for="productimage">Product Image:</label>
            <input type="file" id="productimage" name="productimage"><br><br>
            <label for="product-price">Product Price:</label><br>
            <input type="number" id="productprice" name="productprice"><br><br>
            <input id="sub" type="submit" value="Submit">
        </form>

    </dvi>
</div>

<?php
    include('../dbcon.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $prodname = $_POST['productname'];
        $prodkeyword = $_POST['productkeywords'];
        $prodcat = $_POST['category'];
      
        $file_name = $_FILES['productimage']['name'];
        $file_tmp = $_FILES['productimage']['tmp_name'];
        
        $prodprice = $_POST['productprice'];
       
        move_uploaded_file($file_tmp,"../allimg/$file_name");
       
        $insq = "INSERT INTO `product`(`product_name`, `product_kyeword`, `catId`, `product_img`, `product_price`) VALUES (' $prodname','$prodkeyword',' $prodcat','$file_name','$prodprice')";
        $res = mysqli_query($con, $insq);

        if($res){
    ?>
            <script>
                alert("INSERT SUCCESS");
            </script>
    <?php
        }
    }
    ?>



</body>
</html>