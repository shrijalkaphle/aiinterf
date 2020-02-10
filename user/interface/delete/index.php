<?php
    include "../../../dbconnect.php";

    $id = $_GET['id'];

    //delete file
    $exec = mysqli_query($conn,"SELECT * FROM filesupload WHERE id = '$id'");
    $info = mysqli_fetch_assoc($exec);
    $file = "../../../assets/" . $info['location'];

    unlink($file);

    //delete data from sql
    $result = mysqli_query($conn,"DELETE FROM filesupload WHERE id = '$id'");

    $msg = "File Deleted Successfully";

    echo "<script>window.location = '../../interface/".$msg."'</script>";

?>