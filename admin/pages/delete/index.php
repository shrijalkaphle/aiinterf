<?php
    include "../../../dbconnect.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn,"DELETE FROM pages WHERE id = '$id'");

    $msg = "User Post Deleted Successfully";

    echo "<script>window.location = '../../pages/".$msg."'</script>";

?>