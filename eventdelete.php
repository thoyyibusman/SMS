<?php
include_once('connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM event WHERE id='$id'";
$data = mysqli_query($connect,$sql);
if($data){
    ?>
    <script type="text/javascript">
        alert("data deleted Succsufully");
    </script>
    <?php
    header('location: adminevent.php');

}
else {
    ?>
    <script type="text/javascript">
        alert("Please try again");
    </script>
    <?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
}
?>