<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
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
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png"
              alt="Admin" class="" width="150" >
            <div class="mt-3">
              <h4 class="text-light">Admin</h4>

            </div>
          </div>
        </div>
        <li>
          <a class="border-bottom ms-2" href="adminpage.php">Dashboard</a>
        </li>
        <li>
          <a class="border-bottom ms-2" href="#">Students Data</a>
        </li>
        <li>
          <a class="border-bottom ms-2" href="adminnotice.php">Notifications</a>
        </li>
        <li>
          <a class="border-bottom ms-2" href="adminevents.php">Events</a>
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
        <h1>Students Details</h1>



        <?php

        include_once('connection.php');
        session_start();
if(empty($_SESSION['username'])){
    header('location: admin.php');
    exit;
}



        $sql = "SELECT * FROM student";
        $data = mysqli_query($connect, $sql);
        $total = mysqli_num_rows($data);

        if ($total) {
          ?>
          

          <table class="table   m-auto mt-2">
            <thead>

              <tr>
                <th scope="col">Student ID</th>
                <th scope="col">NAME</th>
                <th scope="col">CLASS</th>
                <th scope="col">DIVISION</th>
                <th scope="col">CONTACT</th>
                <th scope="col">PLACE</th>
                <th colspan="2" scope="col">ACTION</th>
              </tr>
            </thead>

            <?php
            while ($result = mysqli_fetch_array($data)) {

              ?>


              <tbody>

                <tr>
                  <th scope="row">
                    <?php echo "100" . $result['id']; ?>
                  </th>
                  <td>
                    <?php echo $result['name']; ?>
                  </td>
                  <td>
                    <?php echo $result['class']; ?>
                  </td>
                  <td>
                    <?php echo $result['division']; ?>
                  </td>
                  <td>
                    <?php echo $result['contact']; ?>
                  </td>
                  <td>
                    <?php echo $result['place']; ?>
                  </td>

                  <td><a class="text-decoration-none btn btn-light border border-dark gradient-custom-4"
                      href="studentview.php?id=<?php echo $result['id']; ?>"><i class="fa-solid fa-pen-to-square"
                        style="color: #000000;"></i>&nbsp;View</td>

                </tr>




                <?php
            }
        } else {

          ?>
            
              <table class="table  w-75 m-auto mt-5">
                <thead>

                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">CLASS</th>
                    <th scope="col">DIVISION</th>
                    <th scope="col">CONTACT</th>
                    <th scope="col">PLACE</th>
                    <th colspan="2" scope="col">ACTION</th>
                  </tr>
                </thead>
                <tr>
                  <td colspan="8" class="text-center">NO RECORDS</td>
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