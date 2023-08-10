<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/adminpage.css">
<style>
    .container-fluid{
        height: 800px;
    }
    
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
  header('location: studentlogin.php');
  exit;
}


    $email= $_GET['email'];
    $sql = "SELECT * FROM student WHERE email='$email'";
    

    $result=mysqli_query($connect,$sql);

        $row=mysqli_fetch_assoc($result);
    $id = $row['id'];
?>






    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
            <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/<?php echo $row['img']; ?>" alt="No profile" class="" width="150" height="200">
                    
                    <div class="mt-3">
                      <h4 class="text-light"><?php echo $row['name']; ?></h4>
                      
                      <p class=" font-size-sm text-light"><?php echo $row['class']."/".$row['division']; ?></p>
                      
                    </div>
                  </div>
                </div>
                
                <li>
                    <a class="border-bottom ms-2" href="#section1">Dashboard</a>
                </li>
                <li>
                    <a class="border-bottom ms-2" href="#section2">Notices</a>
                </li>
                <li>
                    <a class="border-bottom ms-2" href="#section3">Events</a>
                    
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
                <h3>Student Information</h3>
                <div class="container">
    <div class="main-body">
    
          
    
          <div class="row gutters-sm">
            <div class="col-md-8 mb-3">
                
              <div class="card">
                <div class="card-body">

                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Student Id</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo "100".$row['id']; ?>
                    </div>
                  </div>
                  <hr>



                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Class</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['class']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Division</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['division']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Language</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['language']; ?>
                    </div>
                  </div>
                  
              </div>
              
            </div>

<br><br>

            <h3>Personal Information</h3>

            <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-body">

                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['name']; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['dob']; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['sex']; ?>
                    </div>
                  </div>
                  <hr>


                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['email']; ?>
                    </div>
                  </div>
                  <hr>


                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contact</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['contact']; ?>
                    </div>
                  </div>
                  <hr>


                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Place</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['place']; ?>
                    </div>
                  </div>
                  <hr>


                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['address']; ?>
                    </div>
                  </div>
                  <hr>


                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="" href="studentedit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

             











            </div>
          </div>

        </div>
    </div>
                
            </div>
            <div class="container-fluid " id="section2" style="margin-top: 400px;">
                <h1>Notice</h1>


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
                

                

                
            </div>
            <div class="container-fluid" id="section3">
                <h1>Events</h1>
                
                <?php




$sql = "SELECT * FROM event";
$data = mysqli_query($connect, $sql);
$total = mysqli_num_rows($data);

if ($total) {
  ?>
  

  <table class="table bg-info  m-auto mt-2 mb-5">
    <thead>

      <tr>
        
        <th scope="col">DATE</th>
        <th scope="col">EVENT</th>
        <th scope="col" class="w-75">DISCRIPTION</th>
        
      </tr>
    </thead>

    <?php
    while ($result = mysqli_fetch_array($data)) {

      ?>


      <tbody>

        <tr>
          
          <td>
            <?php echo $result['date']; ?>
          </td>
          <td>
            <?php echo $result['event']; ?>
          </td>
          <td>
            <?php echo $result['discription']; ?>
          </td>
          
        </tr>
        

       




        <?php
    }
} else {

  ?>
    
      <table class="table  w-75 m-auto mt-5">
        <thead>

        <tr>
        <th scope="col">SI</th>
        <th scope="col">DATE</th>
        <th scope="col">EVENT</th>
        <th scope="col">DISCRIPTION</th>
        <th >ACTION</th>
      </tr>
        </thead>
        <tr>
          <td colspan="6" class="text-center">NO RECORDS</td>
        </tr>
        <?php
}


?>
  </tbody>
</table>

            </div>
            
           
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    

  
</body>
</html>