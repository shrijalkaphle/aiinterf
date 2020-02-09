<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta charset="UTF-8">

<?php

    include '../../dbconnect.php';
    $id = $_GET['id'];

    $sql = "SELECT * FROM career WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_query($conn, "SELECT * FROM applied WHERE cid = '$id'");
?>
<h5>
<p>
    <b>Position Name</b>
    &emsp;
    <?php echo $row['position'] ?>
</p>
<p>
    <b>Deadline</b>
    &emsp;&emsp;&emsp;&emsp;
    <?php echo $row['deadline'] ?>
</p>
<p>
    <b>Description</b>
    <br>
    <?php echo $row['description'] ?>
</p>
<hr>
<p>
    <b>Applicant List</b>
    <br>
    <table class="table table-striped">
    <thead>
        <td>Name</td>
        <td>Number</td>
        <td>Email</td>
        <td>CV</td>
    </thead>
    <tbody>
<?php
    while($r = mysqli_fetch_assoc($num)):
?>
        <tr>
            <td><?php echo $r['name'] ?></td>
            <td><?php echo $r['mobile'] ?></td>
            <td><?php echo $r['email'] ?></td>
            <td><a href="/<?php echo $r['cv'] ?>" target="_blank">View CV</a></td>
        </tr>
<?php
    endwhile;
?>
    </tbody>
</table>
</p>
</h5>