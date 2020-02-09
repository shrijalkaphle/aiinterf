<?php
    include "../../../dbconnect.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn,"DELETE FROM career WHERE id = '$id'");

    $msg = "Career Post Deleted Successfully";

    echo "<script>window.location = '../../vacancy/".$msg."'</script>";

?>