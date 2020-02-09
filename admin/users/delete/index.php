<?php
    include "../../../dbconnect.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn,"DELETE FROM user WHERE id = '$id'");

    $msg = "User Post Deleted Successfully";

    echo "<script>window.location = '../../users/".$msg."'</script>";

?>