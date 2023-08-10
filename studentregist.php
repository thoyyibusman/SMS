


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/studentregist.css">
    <style>
        .err {
    color: red;
    font-size: 13px;
}
        </style>
</head>

<body>




<?php
error_reporting(0);
include_once('connection.php');


if (isset($_POST["submit"])) {

    $name = ucfirst($_POST['name']);
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $gender = $_POST['gender'];
    $place = $_POST['place'];
    $address = $_POST['address'];
    $class = $_POST['class'];
    $division = $_POST['division'];
    $language = $_POST['language'];
    $image = $_FILES['img']['name'];
    // $image_tmp = ();

    echo $place;

    $nameerr = $emailerr = $passerr = $cpasserr =  "";

    if ($name == "") {

        $nameerr = "* Enter name";

    }
    
    if ($email == "") {

        $emailerr = "* Enter email";

    }
    if ($pass == "") {

        $passerr = "* Enter password";

    }
    if ($cpass == "") {

        $cpasserr = "* Confirm your password";

    }
    else {

        $sql = "SELECT * FROM student WHERE email='$email'";


        $result = mysqli_query($connect, $sql);


        if (mysqli_num_rows($result) > 0) {
            ?>
            <script type="text/javascript">
                alert("User Exist ! Try another .");
            </script>
            <?php

        } else {




            $lpass = password_hash($pass, PASSWORD_DEFAULT);


            $sql1 = "INSERT INTO student(name,dob,contact,email,password,sex,place,address,class,division,language,img) VALUES('$name','$dob','$contact','$email','$lpass','$gender','$place','$address','$class','$division','$language','$image')";

            $result1 = mysqli_query($connect, $sql1);

            if ($result1) {
                move_uploaded_file($_FILES['img']['tmp_name'],'images/'. $image);
                header('location: studentlogin.php');
                //   echo "setttt";
                // }
                // else{
                //   echo "try";
            }

        }
    }

}
if (isset($_POST["login"])){
    header('location: studentlogin.php');
}
?>





<form method="POST" action="" enctype="multipart/form-data" >


    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>Explore student managment System</p>
                <input type="submit" value="Login" name="login"/><br />
            </div>


            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Student Registration</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name" value="" name="name" />
                                    <span id="head" class="err ms-4" ><?php echo $nameerr;?></span>
                                </div>
                                

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Date of Birth" value=""name="dob"
                                        onfocus="(this.type = 'date')" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contact" value="" name="contact"/>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" value="" name="email"/>
                                    <span id="head" class="err ms-4" ><?php echo $emailerr;?></span>
                                </div>
                                

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" value="" name="pass"/>
                                    <span id="head" class="err ms-4" ><?php echo $passerr;?></span>
                                </div>
                                

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpass"
                                        value="" />
                                        <span id="head" class="err ms-4" ><?php echo $cpasserr;?></span>
                                </div>
                                

                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Place" value="" name="place" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" value="" name="address"/>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="class">
                                        <option class="hidden" selected disabled>Class
                                        </option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>+1</option>
                                        <option>+2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="division">
                                        <option class="hidden" selected disabled>Division
                                        </option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>S1</option>
                                        <option>S2</option>
                                        <option>C1</option>
                                        <option>C2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="language">
                                        <option class="hidden" selected disabled>Language
                                        </option>
                                        <option>English</option>
                                        <option>Malayalam</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" placeholder="" value="" name="img"/>
                                </div>
                                <input type="submit" class="btnRegister" value="Register" name="submit" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </form>
        </div>

    </div>


</body>

</html>