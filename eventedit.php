<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event-Admin</title>
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

    </style>
</head>

<body>
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



            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid" id="section1" style="">
                <h1>Event Editing</h1>

                <?php

                include_once('connection.php');
                session_start();
                if (empty($_SESSION['username'])) {
                    header('location: index.php');
                }
                if (isset($_POST['cancel'])){
                    header('location: adminevent.php');
                }
                $id = $_GET['id'];

                $sql = "SELECT * FROM event WHERE id='$id'";

                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($result);


                if (isset($_POST['edit'])) {

                    $event = $_POST['event'];
                    $devent = $_POST['devent'];

                    $sql2 = "UPDATE event SET event='$event', discription='$devent' WHERE id='$id'";

                    $result2 = mysqli_query($connect, $sql2);

                    if ($result2) {
                        header('location: adminevent.php');
                    } else {
                        echo "can't edit";
                    }
                }

                ?>










                <form action="" method="post">
                    <table class="table w-75">
                        <tr>
                            <th class="w-25">
                                Event
                            </th>
                            <td>
                                <input type="text" name="event" id="" placeholder="Enter event name"
                                    class="form-control" value="<?php echo $row['event']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Discription
                            </th>
                            <td>
                                <input type="text" name="devent" id="" placeholder="Enter event Discription"
                                    class="form-control " value="<?php echo $row['discription']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                            

                                <input type="submit" class="btn btn-outline-dark " value="Cancel" name="cancel" style="float:right;">
                                <input type="submit" name="edit" value="Edit" class="btn me-2 btn-outline-primary"
                                    style="float:right;">
                            </th>
                        </tr>


                    </table>
                </form>
            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>



</body>

</html>