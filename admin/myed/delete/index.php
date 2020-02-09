<?php
    include "../../../dbconnect.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn,"DELETE FROM myed WHERE id = '$id'");

    $msg = "User Post Deleted Successfully";

    echo "<script>window.location = '../../myed/".$msg."'</script>";

?>