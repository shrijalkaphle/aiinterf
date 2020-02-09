<?php
    include '../../dbconnect.php';

    $id = $_GET['id'];

    $query = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $type = $data['type'];
    $acctype = '';
    if($type == 0) {
        $acctype = 'User';
    } else {
        $acctype = 'Admin';
    }
?>

<p><b>Full Name</b> <?php echo $data['name'] ?></p>
<p><b>Username</b> <?php echo $data['username'] ?></p>
<p><b>Email Address</b> <?php echo $data['email'] ?></p>
<p><b>Account Type</b> <?php echo $acctype ?></p>