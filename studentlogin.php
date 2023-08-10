<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/studentregist.css">
    <style>
        .err{
            color: red;
            font-size: 13px
        }
    </style>
</head>

<body>




<?php
error_reporting(0);
include_once('connection.php');

session_start();


if (isset($_POST["submit"])) {

    $email= $_POST['email'];
    $lpass= $_POST['lpass'];
    $err = "";
    $p_err = "";

    if($user == ""){
        $err = "* Enter name";
    }

    if($lpass == ""){

        $p_err = "* Enter password";
    }


    else{

    
    $sql = "SELECT * FROM student WHERE email='$email'";
    

    $result=mysqli_query($connect,$sql);
    

    if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($lpass, $row['password'])) {
                $_SESSION['username']=$email;
                header('location: studentpage.php?email='.$email);
                echo "Succuss" ;
            } else {
                $p_err = "* Incorrect password";
            }
                
            
        }
    }
    else{

    $err = "* User not found";
               
    }
 
    // else{
        
    //     echo "error";
    // }
}
}
if(isset($_POST['regist'])){
    header('location: studentregist.php');
}
?>
<form action="" method="POST">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>Explore student managment System</p>
                <input type="submit" value="Register" name="regist" />
            </div>
            <div class="col-md-9 register-right">
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Student Login</h3>
                        <div class="row register-form">
                            
                            <div class="col-md-8 m-auto">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email " value="" name="email"/>
                                    <span id="head" class="err ms-4" ><?php echo $err;?></span>
                                </div>
                            
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Enter Password "name="lpass"
                                        value="" />
                                        <span id="head" class="err ms-4" ><?php echo $p_err;?></span>
                                </div>
                                <input type="submit" class="btnRegister" value="Login" name="submit" />
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    </form> 

</body>

</html>