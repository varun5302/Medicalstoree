<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
<?php
    require("menu.php");
    ?>

<div align="center" style="margin-top: 150px;">
        <h1>
            CATEGORY
        </h1>
    </div>

    <div class="container">
        <div class="row">

<?php
      include('dbcon.php');

       $csel="SELECT * FROM categories";

       $res=mysqli_query($con,$csel);

        $num = mysqli_num_rows($res);
           $i=0;
        if ($num > 0) {
            while ($data = mysqli_fetch_assoc($res)) {
                
                $catidd = $data["catId"];
                $catname = $data["catName"];
                $catimg = $data["catImg"]; 
              ?>

                 <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="allimg/<?php echo $catimg;?>" alt="Product Image" />
                            </div>
                            <div class="product-details">
                                <h2 class="product-title"><?php echo $catname;?></h2>
                                <button class="add-to-cart-btn"><a href="shop.php?cat=<?php echo $catidd;?>">Buy Now</a></button>
                            </div>
                        </div>
                        </div>      

          <?php
            }

        }else{
            echo"<h1 align='center' style='color:red; margin-left:450px; margin-top:50px; '>No Categories</h1>";
        }     

?>

        </div>
    </div>
   


    <footer id="foot">
       <?php
           require("foot.php");
       ?>
    </footer>
</body>
</html>

<style>
    a{
        color: black;
        text-decoration: none;
    }
    a:hover{
        text-decoration: none;
        color:black;
    }
	
.product-card {
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #ccc;
    padding: 10px;
    width: 300px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 60px;
   
}

.product-image {
    width: 100%;
    height: 200px;
    margin-bottom: 10px;
    text-align: center;
}

.product-image img {
    max-width: 100%;
    max-height: 100%;
}

.product-title {
    font-size: 24px;
    margin: 0;
    text-align: center;
}

.product-price {
    font-size: 20px;
    margin: 0;
    text-align: center;
}

.add-to-cart-btn,
.view-btn {
    background-color: cornflowerblue;
    color: #fff;
    border: none;
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
    border-radius: 3px;
    transition: all 0.25s ease;
}

.add-to-cart-btn:hover,
.view-btn:hover { 
    opacity: 0.8;
}


</style>