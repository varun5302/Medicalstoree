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
    <title>Edit Products</title>
    <style>
       #md{

border: 5px solid #f05462;
border-radius: 15px;
margin-left: 40%;
height: 50vh;
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

input[type="text"] {
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
      
             if($("#catname").val()==""){
             alert("Categories Name is empty..");
               return false;
             }

             if($("#catimg").val()==""){
             alert("Categories Image is empty..");
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
         $id=$_GET["edit"];      

         $selq = "SELECT * FROM categories WHERE catId='$id'";

         $res=mysqli_query($con, $selq); 

         $data=mysqli_fetch_assoc($res);  
      
         $catid = $data["catId"];
         $catname = $data["catName"];
         $catimg = $data["catImg"]; 
 
        
     
       if($_SERVER['REQUEST_METHOD']=='POST'){

        $ucatid = $data["catId"];
        $ucatname = $_POST["catname"];

        $file_name = $_FILES['catimg']['name'];
        $file_tmp = $_FILES['catimg']['tmp_name'];
        // $file_destination = 'allimg' . $file_name; 

       
        move_uploaded_file($file_tmp,"../allimg/$file_name");
       
        $usql="UPDATE categories SET catName=' $ucatname', catImg='$file_name' WHERE catId='$id'";

        $ures=mysqli_query($con, $usql);

        if($ures){
            ?>
              <script>
                    alert("edit successfully ");
                     window.location = "home.php";
                </script>
            <?php
            
        }

       }  
        
 ?>




    <div align="center"><h1>Edit Categories</h1><br><br><br><br><br></div>
    <div id="md">
        <div id="d2">
            <form method="POST" enctype="multipart/form-data">
                <label for="catname">Categories Name:</label><br>
                <input type="text" id="catname" name="catname" value="<?php echo $catname; ?>"><br><br>
                <label for="catimg">Categories Image:</label>
                <input type="file" id="catimg" name="catimg" value="<?php echo $catimg; ?>"><br><br>
                <img src="../allimg/<?php echo $catimg; ?>" width="100px" alt="">
                <input id="sub" type="submit" value="Submit">
            </form>
        </div>
    </div>


</body>
</html>
