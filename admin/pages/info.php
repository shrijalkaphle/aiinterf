<?php
    $id = $_GET['id'];

    include '../../dbconnect.php';
    $page = '';

    $sql = "SELECT * FROM pages WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_assoc($result);
    $pageID = $data['title'];
    if($pageID == 1) {
        $page = 'Summary';
    } else if ($pageID == 2) {
        $page = 'Performance';
    } else if ($pageID == 3) {
        $page = 'Interface';
    } else if ($pageID == 4) {
        $page = 'AI-Feed';
    };

    $uid = $data['user'];
    $rlt = mysqli_query($conn,"SELECT * FROM user WHERE id = '$uid'");
    $info = mysqli_fetch_assoc($rlt);
    $name = $info['name'];
?>

<p><b>Display Page</b> <?php echo $page ?></p>
<p><b>Display User</b> <?php echo $name ?></p>
<p><b>Post Body</b><br><br> <?php echo $data['body'] ?></p>
<p>
    <b>Video</b>
    <?php 
        echo $data['slug'];
        if($data['location'] != '') {
    ?>
        <video src="../../assets/<?php echo $data['location'] ?>" controls="" width="600" height="400" __idm_id__="259536897"></video>
    <?php
        }
    ?>

</p>