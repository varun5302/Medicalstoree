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
<?php
     

     $id=$_GET["dele"];

     $dsql="DELETE FROM categories WHERE catId='$id'";

     $dres=mysqli_query($con,$dsql);

     if($dres){
        ?>
         <script>
             alert("delete successfully ");
             window.location = "home.php";
         </script>
      <?php  
     }
     else{
        echo"error";
     }

?>