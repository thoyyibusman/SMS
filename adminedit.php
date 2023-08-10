<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Edit-Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<?php



if (isset($_POST['cancel'])){
    header('location: admindata.php');
}



include_once('connection.php');
session_start();
if(empty($_SESSION['username'])){
    header('location: admin.php');
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM student WHERE id='$id'";
$result=mysqli_query($connect,$sql);

$row=mysqli_fetch_assoc($result);



if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $division = $_POST['division'];
    $language = $_POST['language'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $place = $_POST['place'];
    $address = $_POST['address'];
    
    
    

    $sql1 = "UPDATE student SET name='$name', class='$class', division='$division', language='$language', dob='$dob', email='$email', contact='$contact', place='$place', address='$address' WHERE id='$id'";

    $result = mysqli_query($connect, $sql1);

    if ($result) {
        header('location: studentview.php?id='.$id);
           
    } else {
        ?>
        <script type="text/javascript">
            alert("Cant't Update");
        </script>
        <?php
    }
}


?>
    
<h3>Edit details of <?php echo $row['name'];?></h3>

<form method="POST">
<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
                        <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Profile </h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <p  class=" border text-dark"><?php
                                    if(!empty($row['img'])){
                                        
                                        ?>
                                            <br><img src="images/<?php echo $row['img'] ?>" alt="" width="100px" height="100px">
                                        <?php
                                    }
                                    else {
                                        echo "No Image Found";
                                    }

                                     ?><br><br><button class=" btn "><a class="text-decoration-none " href = "editimg.php?id=<?php echo $row['id'];?>">Edit Image</a></button>
                                    <button class=" btn "><a class="text-decoration-none " href = "deleteimg.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure? Do you wanna delete the image?');">Delete Image</a></button></p>
                            
								</div>
							</div>

                            
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['name'];?>" name="name">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">class</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['class'];?>" name="class">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Division</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['division'];?>" name="division">
								</div>
							</div>

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Language</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['language'];?>" name="language">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">DOB</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['dob'];?>" name="dob">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['email'];?>" name="email">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Contact</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['contact'];?>" name="contact">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Place</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['place'];?>" name="place">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $row['address'];?>" name="address">
								</div>
							</div>

                            
                            

							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Save Changes" name="update">
                                    <input type="submit" class="btn btn-dark text-light" value="Cancel" name="cancel">
								</div>
							</div>
						</div>
					</div>

                    <?php
    

    
    ?>
</form>



</body>
</html>