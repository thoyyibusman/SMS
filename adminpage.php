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
        #sidebar-wrapper {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }

        .ui-btn {
  --btn-default-bg: -webkit-linear-gradient(left, #3931af, #00c6ff);
  --btn-padding: 15px 20px;
  --btn-hover-bg: -webkit-linear-gradient(left, #00c6ff, #3931af);;
  --btn-transition: .3s;
  --btn-letter-spacing: .1rem;
  --btn-animation-duration: 1.1s;
  --btn-shadow-color: rgba(0, 0, 0, 0.137);
  --btn-shadow: 0 2px 10px 0 var(--btn-shadow-color);
  --hover-btn-color: #FAC921;
  --default-btn-color: #fff;
  --font-size: 36px;
  /* 👆 this field should not be empty */
  --font-weight: 600;
  --font-family: Menlo,Roboto Mono,monospace;
  /* 👆 this field should not be empty */
}

/* button settings 👆 */

.ui-btn {
  box-sizing: border-box;
  padding: var(--btn-padding);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--default-btn-color);
  font: var(--font-weight) var(--font-size) var(--font-family);
  background: var(--btn-default-bg);
  border: none;
  cursor: pointer;
  transition: var(--btn-transition);
  overflow: hidden;
  box-shadow: var(--btn-shadow);
}

.ui-btn span {
  letter-spacing: var(--btn-letter-spacing);
  transition: var(--btn-transition);
  box-sizing: border-box;
  position: relative;
  
}

.ui-btn span::before {
  box-sizing: border-box;
  position: absolute;
  content: "";
  
}

.ui-btn:hover, .ui-btn:focus {
  background: var(--btn-hover-bg);
}

.ui-btn:hover span, .ui-btn:focus span {
}

.ui-btn:hover span::before, .ui-btn:focus span::before {
  animation: chitchat linear both var(--btn-animation-duration);
}

@keyframes chitchat {
  0% {
    content: "#";
  }

  5% {
    content: ".";
  }

  10% {
    content: "^{";
  }

  15% {
    content: "-!";
  }

  20% {
    content: "#$_";
  }

  25% {
    content: "№:0";
  }

  30% {
    content: "#{+.";
  }

  35% {
    content: "@}-?";
  }

  40% {
    content: "?{4@%";
  }

  45% {
    content: "=.,^!";
  }

  50% {
    content: "?2@%";
  }

  55% {
    content: "\;1}]";
  }

  60% {
    content: "?{%:%";
    right: 0;
  }

  65% {
    content: "|{f[4";
    right: 0;
  }

  70% {
    content: "{4%0%";
    right: 0;
  }

  75% {
    content: "'1_0<";
    right: 0;
  }

  80% {
    content: "{0%";
    right: 0;
  }

  85% {
    content: "]>'";
    right: 0;
  }

  90% {
    content: "4";
    right: 0;
  }

  95% {
    content: "2";
    right: 0;
  }

  100% {
    content: "";
    right: 0;
  }
}
    </style>
</head>

<body>


    <?php
    error_reporting(0);
    include_once('connection.php');
    session_start();
    if (empty($_SESSION['username'])) {
        header('location: admin.php');
        exit;
    }








    $sql = "SELECT * from student";

    if ($result = mysqli_query($connect, $sql)) {

        $rowcount = mysqli_num_rows($result);

        
    }

    $sql2 = "SELECT * from event";

    if ($result2 = mysqli_query($connect, $sql2)) {

        $rowcount2 = mysqli_num_rows($result2);

        
    }

    $sql3 = "SELECT * from notice";

    if ($result3 = mysqli_query($connect, $sql3)) {

        $rowcount3 = mysqli_num_rows($result3);

        
    }

    ?>








    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png"
                            alt="Admin" class="" width="150">
                        <div class="mt-3">
                            <h4 class="text-light">Admin</h4>

                        </div>
                    </div>
                </div>

                <li>
                    <a class="border-bottom ms-2" href="#section1">Dashboard</a>
                </li>
                <li>
                    <a class="border-bottom ms-2" href="admindata.php">Students Data</a>
                </li>
                <li>
                    <a class="border-bottom ms-2" href="adminnotice.php">Notifications</a>
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
                <h1>Dashboard</h1>


                <div class="row justify-content-around  align-items-center" style="margin-top: 5%; height: 500px;">
                    <div class="col-5 "><button class="ui-btn m-auto " style="height: 200px ; width: 300px;border-radius: 10px;">
                        <span>
                            STUDENTS<br><?php echo $rowcount;?>
                        </span>
                    </button></div>
                    <div class="col-5 "><button class="ui-btn m-auto " style="height: 200px ; width: 300px;border-radius: 10px;">
                        <span>
                            CLASSES<br>48
                        </span>
                    </button></div>
                    <div class="col-5  "><button class="ui-btn m-auto " style="height: 200px ; width: 300px;border-radius: 10px;">
                        <span>
                            EVENTS<br><?php echo $rowcount2;?>
                        </span>
                    </button></div>
                    <div class="col-5  "><button class="ui-btn m-auto " style="height: 200px ; width: 300px;border-radius: 10px;">
                        <span>
                            NOTICES<br><?php echo $rowcount3;?>
                        </span>
                    </button></div>
                    
                </div>



            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->



</body>

</html>