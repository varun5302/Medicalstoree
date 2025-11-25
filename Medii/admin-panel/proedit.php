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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
<style>
#md{

    border: 5px solid #f05462;
    border-radius: 15px;
    margin-left: 40%;
    height: 90vh;
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

<?php
         $id=$_GET["pedit"];      

         $selq = "SELECT * FROM product WHERE product_id='$id'";

         $res=mysqli_query($con, $selq); 

         $data=mysqli_fetch_assoc($res);  
        
         $prodid = $data["product_id"];
         $prodname = $data["product_name"];
         $prodcat = $data["catId"];
         $prodkeyword = $data["product_kyeword"];
         $prodimg = $data["product_img"];
         $prodprice = $data["product_price"];
 
         $scelq = "SELECT * FROM categories";

             $cres = mysqli_query($con, $scelq);
                               
             $cdata = mysqli_fetch_assoc($cres) ;

             $catname = $cdata["catName"];
     
             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $uprodname = $_POST["productname"];
                $uprodcat = $_POST["category"];
                $uprodkeyword = $_POST["productkeywords"];
                $uprodprice = $_POST["productprice"];
            
               
                $file_name = $_FILES['productimage']['name'];
                $file_tmp = $_FILES['productimage']['tmp_name'];
                move_uploaded_file($file_tmp, "../allimg/$file_name");
            
                
                if ($uprodcat != 'select') {
                    $usql = "UPDATE `product` SET `product_name`='$uprodname',`product_kyeword`='$uprodkeyword',`catId`='$uprodcat',`product_img`='$file_name',`product_price`='$uprodprice' WHERE product_id='$id'";
                    $ures = mysqli_query($con, $usql);
            
                    if ($ures) {
                        ?>
                        <script>
                            alert("Edit successful");
                            window.location = "home.php"; 
                        </script>
                        <?php
                    } else {
                        echo "Error updating record: " . mysqli_error($con);
                    }
                } else {
                    echo "Please select a category";
                }
            }
        
 ?>








 <div align="center"><h1>Edit Products</h1><br><br><br><br><br></div>
<div id="md">
    <div id="d2">
        <form method="POST" enctype="multipart/form-data">
            <label for="productname">Product Name:</label><br>
            <input type="text" id="productname" name="productname" value="<?php echo  $prodname;?>"><br><br>
            <label for="productkeywords">Product Keywords:</label><br>
            <input type="text" id="productkeywords" name="productkeywords"  value="<?php echo  $prodkeyword; ?>"><br><br>
            
            
            <label for="category">Select a categories:</label>
            <select id="category" name="category">
            <option value="select" ><?php echo  $catname; ?></option>
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
            <img src="../allimg/<?php echo $prodimg; ?>" width="100px" alt="">
            <label for="product-price">Product Price:</label><br>
            <input type="number" id="productprice" name="productprice" value="<?php echo $prodprice;?>" ><br><br>
            <input id="sub" type="submit" value="Submit">
        </form>

    </dvi>
</div>





</body>
</html>