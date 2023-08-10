<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/adminpage.css">
<style>
    #sidebar-wrapper{
      background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }
  </style>
</head>
<body>


<?php
error_reporting(0);
include_once('connection.php');
session_start();
if(empty($_SESSION['username'])){
    header('location: admin.php');
    exit;
}


    $user= $_POST['luser'];
    
    $sql = "SELECT * FROM admin";
    

    $result=mysqli_query($connect,$sql);

        $row=mysqli_fetch_assoc($result);
    // echo $row['uadmin'];
?>






    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
            <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="Admin" class="" width="150" >
                    <div class="mt-3">
                      <h4 class="text-light">Admin</h4>
                      
                    </div>
                  </div>
                </div>
                
                <li>
                    <a class="border-bottom ms-2" href="adminpage.php">Dashboard</a>
                </li>
                <li>
                    <a class="border-bottom ms-2" href="admindata.php">Students Data</a>
                </li>
                <li>
                    <a class="border-bottom ms-2" href="#">Notifications</a>
                </li>
                <li>
                    <a class="border-bottom ms-2" href="adminevent.php">Events</a>
                </li>
                <li>
                    <a class=" ms-2" href="logout.php">Logout</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid" id="section1" style="">
                <h1>Notifications</h1>
                
            </div>


            <div class="container mt-5">
        
    </div>



    <?php

   $sql = "SELECT * FROM notice";
$data = mysqli_query($connect, $sql);
$total = mysqli_num_rows($data);

if ($total) {
  ?>
  

  

    <?php
    while ($result = mysqli_fetch_array($data)) {

      ?>


<div class="alert alert-warning">
        <div class="container">
            <div class="alert-icon">
                <i class="material-icons"><?php echo $result['date']; ?></i>
            </div>
            <button type="button" class="close btn btn-dark " style="float:right; " data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons"><a href="removenotice.php?id=<?php echo $result['id'];?>" class="text-decoration-none text-light">Remove</a></i></span>
            </button>

            <b>Message:</b><?php echo $result['notice']; ?>
            
        </div>
    </div>
        

       




        <?php
    }
} else {

  ?>
    
      <table class="table  w-75 m-auto mt-5">
        
        <tr>
          <td colspan="6" class="text-center">No notification</td>
        </tr>
        <?php
}


?>
  
</table>

<h3 style="margin-top: 200px;">Add New Notice</h3>
                
                </div>
    
    
                <?php
                if(isset($_POST['add'])){
                  $notice = $_POST['notice'];
                  
    
                  $sql = "INSERT INTO notice(notice) VALUES('$notice')";
    
                  $result = mysqli_query($connect,$sql);
                  if($result){
                    ?>
                    <script>
                      alert("Notice Added")
                    </script>
    
                    <?php
                  }
                  else {
                    echo "wrong happened!";
                  }
    
                }
                
                ?>

                <form action="" method="post" class="w-75">

                <input type="text" class="form-control" name="notice" placeholder="Message here...">
                <button class="btn btn-primary btn-sm mt-2 " name="add" type="submit"  style="float: right;">Add </button>
                </form>
    
    
    
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>

</body>
            
            
                
            
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    

  
</body>
</html>