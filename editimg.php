<?php
error_reporting(0);
include_once('connection.php');
session_start();
if(empty($_SESSION['username'])){
    header('location: admin.php');
    exit;
}
$id = $_GET['id'];
$sql = "SELECT * FROM student WHERE id='$id'";
$data = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="wrapper gradient-custom-3">
            <div class="overlay gradient-custom-3" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
                <div class="col-md-6 m-auto pt-5">
                    <div class="text-center px-1">
                        <div class="forms p-4 py-5 bg-white rounded-3">
                            <h5>UPDATE IMAGE</h5>
                            <div class="mt-4 inputs">
                                <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>"
                                    placeholder="ID">
                              
                                <input type="text" class="form-control" name="img" value="<?php echo $row['img']; ?>"
                                    placeholder="img">
                                
                                    <img src="<?php echo $row['img'] ?>" width="100px" alt="No image" height="100px">

                            </div>  
                            <br>
                            <label for="" class="form-label text-danger fst-italic" >Add New Image</label>
                            <input type="file" class="form-control" name="imgin" value=""
                                    placeholder="imgin">

                            <div class="button mt-4 text-left">
                                <input type="submit" class="btn btn-dark" value="Change" name="update">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </form>

    <?php

    if (isset($_POST['update'])) {
        
        $image_name = $_FILES['imgin']['name'];
        $image_tmp_name = $_FILES['imgin']['tmp_name'];
        

        $sql1 = "UPDATE student SET img='$image_name' WHERE id='$id'";

        $result = mysqli_query($connect, $sql1);

        if ($result) {

            move_uploaded_file($image_tmp_name, $image_name);
            header('location: adminedit.php?id='.$id);
                ?>
            <script type="text/javascript">
                alert("Updated Succussfully");
            </script>
        <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Cant't Update");
            </script>
            <?php
        }
    }
    ?>

</body>

</html>