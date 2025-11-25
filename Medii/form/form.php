<?php
session_start();
   include("../dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>login & Sign up</title>
  <link rel="stylesheet" href="./style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div id="container" class="container">
    <!-- FORM SECTION -->
    <div class="row">
        <!-- SIGN UP -->
        <div class="col align-items-center flex-col sign-up">
            <div class="form-wrapper align-items-center">
                <form id="signup-form" method="POST">
                    <div class="form sign-up">
                    <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input id="username" type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input id="username" type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input id="email" type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input id="password" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input id="confirm_password" type="password" name="confirm_password" placeholder="Confirm password" required>
                        </div>
                        <button id="sub" name="submit" type="submit">
                            Sign up
                        </button>
                        <p>
                            <span>
                                Already have an account?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Sign in here
                                <br><br>
                                <span style="font-size:15px;"> <a style="text-decoration: none; color: black;" href="../main.php">Home</a></span>
                            </b>
                        </p>
                    </div>
                </form>
            </div>
        </div>


<?php
 
  if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $uname = $_POST['username'];
    $uemail = $_POST['email'];
    $upass =md5($_POST['password']);
  
      $uins="INSERT INTO `userlogin`(`user_name`, `user_email`, `user_pass`,`name`) VALUES ('$uname','$uemail','$upass','$name')";

      $res=mysqli_query($con, $uins);

      if($res){
        ?>

                <script>
                   // alert("Insert successfully");
                </script>

        <?php
      }
  }
?>





        <!-- END SIGN UP -->
        <!-- SIGN IN -->
        <div class="col align-items-center flex-col sign-in">
            <div class="form-wrapper align-items-center">
                <form id="signin-form" method="POST">
                    <div class="form sign-in">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input id="signin_username" type="text" name="usernamee" placeholder="Username" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input id="signin_password" type="password" name="passwordd" placeholder="Password" required>
                        </div>
                        <button type="submit" name="sub">
                            Sign in
                        </button>
                        <p>
                            <b>
                                Forgot password?
                            </b>
                        </p>
                        <p>
                            <span>
                                Don't have an account?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Sign up here
                                <br><br>
                                <span style="font-size:15px;"> <a style="text-decoration: none; color: black;" href="../main.php">Home</a></span>
                            </b>
                        </p>
                    </div>
                </form>
            </div>
            <div class="form-wrapper">
            </div>
        </div>
        <!-- END SIGN IN -->


    <?php
    if(isset($_POST['sub'])){
        $username = $_POST["usernamee"];
        $pass = md5($_POST["passwordd"]);
    
        $query="SELECT * FROM userlogin WHERE user_name='$username' AND user_pass='$pass'";
        $result=mysqli_query($con,$query);
        $count=mysqli_num_rows($result);
        
      

        if($count==1){
            $data=mysqli_fetch_assoc($result);

            $name=$data['name'];

            $_SESSION["user"]=$name;
            $_SESSION["pass"]= $pass;
            
            ?>
             <script>
                    alert("loging successfully "+"Hii <?php echo $name;?>");
                    window.location = "../main.php";
                </script>
             <?php
             exit(); 
        } else {
            ?>
              <script>
                    alert("loging failed  ");
                </script>


            <?php
        }
    }
    
    ?>


    </div>
    <!-- END FORM SECTION -->
    <!-- CONTENT SECTION -->
    <div class="row content-row">
        <!-- SIGN IN CONTENT -->
        <div class="col align-items-center flex-col">
            <div class="text sign-in">
                <h2>
                    Welcome
                    <br>
                </h2>
            </div>
            <div class="img sign-in">
            </div>
        </div>
        <!-- END SIGN IN CONTENT -->

        <!-- SIGN UP CONTENT -->
        <div class="col align-items-center flex-col">
            <div class="img sign-up">
            </div>
            <div class="text sign-up">
                <h2>
                    Join with A-N
                </h2>
            </div>
        </div>
        <!-- END SIGN UP CONTENT -->
    </div>
    <!-- END CONTENT SECTION -->
</div>
<!-- partial -->
<script  src="./script.js"></script>

<script>
$(document).ready(function(){


$("#sub").click(function(){

 if( $("#password").val() == $("#confirm_password").val()){
    alert("insert successful");
   
 }else{
    alert("password doesn't match");
    return false;
 }

});

    
    

});


</script>

</body>
</html>
