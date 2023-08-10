<?php
include_once('connection.php');
session_start();
$id = $_GET['id'];
$sql = "UPDATE student SET img = NULL WHERE id = '$id'";
$data = mysqli_query($connect,$sql);
if($data){
    ?>
    <script type="text/javascript">
        alert("data deleted Succsufully");
    </script>
    <?php
    if ($_SESSION['username']=='admin'){
        header('location: adminedit.php?id='.$id);
    }
    else {
        header('location: studentedit.php?id='.$id);
    }
    

}
else {
    ?>
    <script type="text/javascript">
        alert("Please try again");
    </script>
    <?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
}
?> 