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
    <title>viewcat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <style>
        table {
            border-collapse: collapse;
            margin-top: 5%;
            margin-left: 22%;
            width: 75%;
        }
        
        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        #mtr {
            color: white;
            background-color: #f05462;
        }

        #h1 {
            margin-left: 50%;
        }
    </style>
</head>
<body>
    <h1 id="h1">Categories Table</h1>
    <table>
        <tr id="mtr">
             <th>No</th>
            <th>Categories Id</th>
            <th>Categories Name</th>
            <th>Categories img</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
        <?php
        include('../dbcon.php');

        $selq = "SELECT * FROM categories";
        $res = mysqli_query($con, $selq);
        $num = mysqli_num_rows($res);
           $i=0;
        if ($num > 0) {
            while ($data = mysqli_fetch_assoc($res)) {

                $catid = $data["catId"];
                $catname = $data["catName"];
                $catimg = $data["catImg"]; 
                $i++;
        ?>
                <tr>
                      <td><?php echo $i; ?></td>
                    <td><?php echo $catid; ?></td>
                    <td><?php echo $catname; ?></td>
                    <td><img src="../allimg/<?php echo $catimg; ?>" width="100px" alt=""></td>
                    <td><a onClick="return confirm('Are you sure');" href='catedit.php?edit=<?php echo $catid; ?>'><img src="img/icons8-edit-32.png" width="25px" alt=""></a></td>
                    <td><a onClick="return confirm('Are you sure');" href='catdelete.php?dele=<?php echo $catid; ?>'><img src="img/delete.png" width="25px" alt=""></a></td>
                </tr>
        <?php
            }
        } else {
            echo " <td>No Categories</td>";
        }

       
        ?>
    </table>

  
    
    
</body>
</html>
