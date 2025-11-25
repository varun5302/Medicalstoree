

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>A-N MED</title>
</head>

<body>
<?php
    require("menu.php");
    ?>
  

    <div id="mbanner">
        <div id="bdiv">
            <span id="im">
                <img src="img/medicine.png" alt="" style="margin-top: 150px; margin-left: 80px; margin-bottom: 70px;">

            </span>
            <span id="mcon">
                Welcome To Our <br>
                <span id="mcon2">Online Medicine</span>
                <br>
                <span id="mbtn">
                    <button id="buybt2"><a href="shop.php">Buy Now</a></button>
                </span>
            </span>


        </div>

    </div>

    <div style="display: flex; margin-top: 50px;">

        <div style="margin-left: 105px; ">
            <img src="img/de.png" width="150px" alt="" style="margin-left: 22px;">
            <h2 style="font-size: 25px; font-weight: bold;">FAST DELIVERY</h2>
        </div>

        <div style="margin-left: 315px;">
            <img src="img/license.png" width="150px" alt="" style="margin-left: 82px;">
            <h2 style="font-size: 25px; font-weight: bold;">LICENSE OF GOVERNMENT</h2>
        </div>

        <div style="margin-left: 295px;">
            <img src="img/24-hours.png" width="150px" alt="" style="margin-left: 10px;">
            <h2 style="font-size: 25px; font-weight: bold;">SUPPORT24/7</h2>

        </div>

    </div>

    <div  style="margin-left: 680px;margin-top: 50px;">
        <button id="buybt"><a href="shop.php">Buy Now</a></button>
    </div>
    <hr style="width: 50%;border: 2px solid;">
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
    #foot{
        margin-top: 50px;
    }
    a{
        text-decoration: none;
        color:black;
        font-size: medium;
    }
    a:hover{
        text-decoration: none;
        color:black;
    }
</style>