<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online buy</title>
    <link href="css\shop.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php
    require ("menu.php");
    ?>

    <div align="center" id="tc">
        <h1>PRODUCT </h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Category List -->
                <div class="category-list">
                    <h2>Categories</h2>
                    <ul>
                    <li><a href="shop.php?allprod">All Product</a></li><br>
                        <?php
                        include ('dbcon.php');

                        $csel = "SELECT * FROM categories";

                        $res = mysqli_query($con, $csel);

                        $num = mysqli_num_rows($res);
                        $i = 0;
                        if ($num > 0) {
                            while ($data = mysqli_fetch_assoc($res)) {
                                $prod_id = $data["catId"];
                                $catname = $data["catName"];

                                ?>
                                <li><a href="shop.php?prodid=<?php echo $prod_id; ?>"><?php echo $catname; ?></a></li><br>



                                <?php
                            }

                        } else {
                            echo "<h1 style='color:red;'>No Categories</h1>";
                        }

                        ?>
                    </ul>
                </div>
            </div>




            <div class="col-md-9">
                <!-- Product Cards -->
                <div class="row">

                    <?php
                    include ('dbcon.php');

                    $psel = "SELECT * FROM product";
                    
                    if(isset($_GET['prodid'])) {
                        $prod_id = $_GET['prodid'];
                        $psel .= " WHERE catId='$prod_id'";
                    }

                    if(isset($_GET['allprod'])) {
                      
                        $psel = "SELECT * FROM product";
                    }


                    if(isset($_GET['cat'])) {
                        $i=$_GET['cat'];
                        $psel = "SELECT * FROM product WHERE catId='$i'";
                    }

                    if(isset($_GET['search'])) {
                        $i=$_GET['search'];
                        $psel = "select * from product where product_name like '%$i%' ";
                    }

                    $res = mysqli_query($con, $psel);

                    $num = mysqli_num_rows($res);
                    $i = 0;
                    if ($num > 0) {
                        while ($data = mysqli_fetch_assoc($res)) {

                            $prodid = $data["product_id"];
                            $prodname = $data["product_name"];
                            $prodimg = $data["product_img"];
                            $prodprice = $data["product_price"];
                            ?>

                            <div class="col-md-4">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="allimg/<?php echo $prodimg; ?>" alt="Product Image" />
                                    </div>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                         <?php echo $prodname; ?>
                                        </h2>
                                        <h4 class="product-price">
                                            <?php echo $prodprice . "/-"; ?>
                                        </h4>
                                        <button class="add-to-cart-btn"><a href="buynow.php?id=<?php echo  $prodid;?>">Buy Now</a></button>
                                        <a href="cart.php?productid=<?php echo  $prodid;?>"><button class="view-btn"><i class="fa fa-shopping-cart"style="font-size:15px"></i></button></a>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }

                    } else {
                        echo "<h1 align='center' style='color:red; margin-left:450px; margin-top:50px; '>No Product</h1>";
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>

</body>

<footer id="foot">
    <?php
    require ("foot.php");
    ?>
</footer>

</html>
<style>
    #foot {
        margin-top: 200px;
    }

    #tc {
        margin-top: 100px;
    }

    .category-list {
        margin-top: 60px;

    }

    .category-list h2 {
        margin-top: 0;
    }

    .category-list ul {
        list-style-type: none;
        padding: 0;
    }

    .category-list ul li {
        margin-bottom: 10px;
    }

    .category-list ul li a {
        color: #333;
        text-decoration: none;
    }

    .category-list ul li a:hover {
        color: #555;
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
        margin-top: 20px;
        height: 500px;
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
        height: 140px;
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
    a{
        text-decoration: none;
        color:black;
    }
    a:hover{
        text-decoration: none;
        color:black;
    }
</style>