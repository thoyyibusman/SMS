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
<script src="https://kit.fontawesome.com/278c0c5846.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/adminpage.css">
<style>
    #sidebar-wrapper{
      background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }
  </style>
</head>
<body>









    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
          
            <ul class="sidebar-nav">
            <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="Admin" class="" width="150">
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
                    <a class="border-bottom  ms-2" href="adminnotice.php">Notifications</a>
                </li>
                <li>
                    <a class="border-bottom ms-2" href="#">Events</a>
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
                <h1>Events</h1>
                
            </div>
            <?php

include_once('connection.php');
session_start();
if(empty($_SESSION['username'])){
header('location: index.php');
exit;
}



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
        <th scope="col" class="w-50">DISCRIPTION</th>
        <th colspan="2">ACTION</th>
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
          <td class=""><a class="btn btn-outline-primary " target="" href="eventedit.php?id=<?php echo $result['id'];?>"><i class="fa-solid fa-pen-to-square"
                style="color: #0d6efd;"></i>&nbspEdit</a></td>

          <td><a class="btn btn-outline-danger " target="" href="eventdelete.php?id=<?php echo $result['id'];?>"><i class="fa-solid fa-trash " style="color: #f60938;"></i>&nbspDelete</a></td>

        </tr>
        

       




        <?php
    }
} else {

  ?>
    
      <table class=" table  w-75 m-auto mt-5 ">
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
        <!-- /#page-content-wrapper -->



        <div class="container-fluid mt-5 ms-3" id="" style="">
                <h3>Add new Event</h3>
                
            </div>


            <?php
            if(isset($_POST['add'])){
              $event = $_POST['addevent'];
              $devent = $_POST['adddiscript'];

              $sql = "INSERT INTO event(event,discription) VALUE('$event','$devent')";

              $result = mysqli_query($connect,$sql);
              if($result){
                ?>
                <script>
                  alert("Event Added")
                </script>

                <?php
              }
              else {
                echo "wrong happened!";
              }

            }
            
            ?>

    <form action="" method="post">
<table class="table w-75 ms-3 " >
    <tr>
    <th class="w-25">
        Event
    </th>
    <td>
        <input type="text" name="addevent" id="" placeholder="Enter event name" class="form-control" value="">
    </td>
    </tr>
    <tr>
    <th>
        Discription
    </th>
    <td>
        <input type="text" name="adddiscript" id="" placeholder="Enter event Discription" class="form-control " value="">
    </td>
    </tr>
    <tr>
        <th colspan="2">
        <input type="submit" name="add" value="Add" class="btn me-2 btn-outline-primary" style="float:right;">                         
        </th>
    </tr>
    
    
</table>
</form>

    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    


    <!-- adding new event -->
   

  
</body>
</html>