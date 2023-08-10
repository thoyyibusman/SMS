<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/admin.css">
</head>
<body>



<?php
error_reporting(0);
include_once('connection.php');

session_start();

if (isset($_POST["submit"])) {

    $user= $_POST['luser'];
    $lpass= $_POST['lpass'];
    $err = "";
    $p_err = "";

    if($user == ""){
        $err = "* Enter admin name";
    }

    if($lpass == ""){

        $p_err = "* Enter admin password";
    }

    else{
    $sql = "SELECT * FROM admin WHERE uadmin='$user'";
    

    $result=mysqli_query($connect,$sql);
    

    if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($lpass, $row['password'])) {
                $_SESSION['username']=$user;
                header('location: adminpage.php?uadmin='.$user);
                echo "Succuss" ;
            } else {
                $p_err = "* Incorrect password";
            }
                
            
        }
    }
    else{
    $err = "* User not found";
                   
    }
}
}

?>




<div class="wrapper fadeInDown">
<div class="fadeIn first">
    <h4>Admin Login</h4>
    </div>

  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    

    <!-- Login Form -->
    <form method="POST" action="" >
      <input type="text" id="login" class="fadeIn second mt-4" name="luser" placeholder="login"><br>
      <span id="head" class="err ms-4" ><?php echo $err;?></span>
      <input type="password" id="password" class="fadeIn third" name="lpass" placeholder="password"><br>
      <span id="head" class="err ms-4"><?php echo $p_err;?></span><br>
      <input type="submit" class="fadeIn fourth" value="Log In" name="submit">
    </form>

   

  </div>
</div>
    
</body>
</html>