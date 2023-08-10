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
  <script src="https://kit.fontawesome.com/278c0c5846.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/adminpage.css">

  <style>
    button a{
      color: #000;
    }
    button {
      --color: #560bad;
      font-family: inherit;
      display: inline-block;
      width: 2.5em;
      height: 2.3em;
      line-height: 2.1em;
      margin: 20px;
      position: relative;
      overflow: hidden;
      border: none ;
      transition: color .5s;
      z-index: 1;
      font-size: 15px;
      border-radius: 60px;
      font-weight: 500;
      color: var(--color);
    }

    button:before {
      content: "";
      position: absolute;
      z-index: -1;
      background: var(--color);
      height: 150px;
      width: 200px;
      border-radius: 50%;
    }

    button :hover {
      color: #fff;
    }

    button:before {
      top: 100%;
      left: 100%;
      transition: all .7s;
    }

    button:hover:before {
      top: -30px;
      left: -30px;
    }

    button:active:before {
      background: #3a0ca3;
      transition: background 0s;
    }
  </style>
</head>

<body>




  <div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <button class="m-3"><a href="admindata.php" class="text-decoration-none"><i class="fa-solid fa-chevron-left"
            style=""></i></a></button>
      <ul class="sidebar-nav">
        <div class="card-body">
          <div class="d-flex flex-column align-items-center text-center mt-4">
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png"
              alt="Admin" class="" width="150">
            <div class="mt-3">
              <h4 class="text-light">Admin</h4>

            </div>
          </div>
        </div>



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
        if (empty($_SESSION['username'])) {
          header('location: admin.php');
          exit;
        }

        $id = $_GET['id'];

        $sql = "SELECT * FROM student WHERE id='$id'";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);

        ?>
        <div class="row justify-content-between">
          <div class="col-md-3">
            <div class="card-body ">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="images/<?php echo $row['img']; ?>" alt="No Profile" class="" width="200" height="250px">

              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card-body ">
              <div class="d-flex flex-column align-items-center text-center mt-5">
                <h3>
                  <?php echo $row['name']; ?>
                </h3>
                <h3>
                  <?php echo "100" . $row['id']; ?>
                </h3>

              </div>
            </div>
          </div>

          <div class="col-md-3 ">

            <a class="btn btn-info mb-2 mt-5 px-3" target=""
              href="adminedit.php?id=<?php echo $row['id']; ?>">Edit</a><br>
            <a class="btn btn-danger " target="" href="admindelete.php?id=<?php echo $row['id']; ?>">Delete</a>


          </div>
        </div>

      </div>

      <div class="col-md-12">



        <div class="card mb-3">





          <div class="card-body">




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




          </div>
        </div>


      </div>

    </div>

</body>

</html>