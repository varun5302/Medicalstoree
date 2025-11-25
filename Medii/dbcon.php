<?php

   $con=mysqli_connect( "localhost","root", "", "php_project"); 
        
   if($con){
     // echo"Done";
   }else{
     echo mysqli_connect_errno();
   }
?>