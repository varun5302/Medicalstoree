<?php
    session_start();
    include('../dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin loging</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        #maindiv{
            border-radius: 25px ;
            position:fixed ;
            border: 3px solid;
            width: 400px;
            height: 450px;
            margin-left: 550px;
            margin-top: 100px;
            border-color: #4D88D7;
        }
        #div1{
            padding-left: 70px;
        }
        #div2{
            padding-left: 87px;
        }
        #tx1,#tx2{
            width: 200px;
            border: none;
            border-bottom: 2px solid;
            border-color: #4D88D7;
            outline: none;
            text-align: center;
        }
        #sub,#res{
            margin-top: 15px;
            width: 80px;
            height: 30px;
            border-radius: 4px ;
            color: aliceblue;
            font-size: 17px;
            font-weight: bold;
            background-color: #4D88D7;
            cursor: pointer;
            margin: 10px;
            margin-top: 30px;
        }
        #sub:hover,#res:hover{
            background-color: black;
        }

       
        @media screen and (max-width: 768px) {
            #maindiv {
                width: 90%;
                height: auto;
                margin: 50px auto;
            }
            #div1, #div2 {
                padding-left: 0;
                text-align: center;
            }
            #tx1, #tx2, #sub, #res {
                width: 80%;
                margin: 5px auto;
            }
        }
    </style>

    <script>
          $(document).ready(function(){
       
            $("#sub").click(function(){

                if($("#tx1").val()==""){ 

              alert("username is empty");
               return  false;
                }
            });
            

          });
 

    </script>
</head>
<body>
 
    <div id="maindiv">
        <div id="div1">
            <img src="img/userimg.png" />
        </div>
        <div id="div2">
            <form method="POST">
                <label id="label1"><b>UserName</b></label>
                <br>
                <input type="text" id="tx1" name="UserName"/>
                <br><br>
                <label id="label2"><b>Password</b></label>
                <br>
                <input type="password" id="tx2" name="password"/>
                <br>
                <input type="submit" id="sub" value="Login"/>
                <input type="reset" id="res"/>
            </form>
        </div>
    </div>


    <?php
        

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username=$_POST["UserName"];
            $pass=md5($_POST["password"]);
          

            $query="SELECT * FROM admin WHERE admin_user_name='$username' and admin_pass='$pass'";
            $result=mysqli_query($con,$query);
            $count=mysqli_num_rows($result);
             
            if($count==1){

               
                $_SESSION["auser"]=$username;
               
                 header('location:home.php');
                
               
            }else{
                  
                echo "<script>

                    Swal.fire({
                        title: 'Loging fail',
                        text: 'invalid username/password.  Please try again',
                        icon: 'error'
                      });
                    
            </script>";

            }
        }
    ?>

</body>
</html>
