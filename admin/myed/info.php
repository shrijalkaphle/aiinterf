<?php
    include '../../dbconnect.php';

    $id = $_GET['id'];

    $query = "SELECT * FROM myed WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
?>

<p><b>School Name</b> <?php echo $data['schoolname'] ?></p>
<p><b>Username</b> <?php echo $data['username'] ?></p>
<p><b>Email Address</b> <?php echo $data['email'] ?></p>
<p><b>Contact Info</b> <?php echo $data['contact'] ?></p>
<p><b>Contact Info</b> <?php echo $data['db_name'] ?></p>