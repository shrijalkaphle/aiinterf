<?php
    include '../../dbconnect.php';

    if(!$_SESSION['id']) {
        header("location: ". ROOT ."");
    }

    $id = $_SESSION['id'];

    $msg = '';
    $err = '';

    if($_GET['msg']) {
        $msg =  $_GET['msg'];
    }

    if(isset($_POST['upload'])) {
        $file = $_FILES['file']['name'];
        $target_dir = "../../uploads/".$id."/";
        $location = $id."/" . $file;
        if(!file_exists($target_dir)) {
            mkdir($target_dir);
        }
        $target_file = $target_dir . basename($file);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $query = "INSERT INTO filesUpload VALUES ('','$file','$location','$id')";
            $resukt = mysqli_query($conn,$query);

            $msg = "The file ". $file ." has been uploaded.";
        } else {
            $err =  "Sorry, there was an error uploading your file.";
        }
    };

    $query = "SELECT * FROM filesupload WHERE userid = '$id' ORDER BY id DESC";
    $result = mysqli_query($conn,$query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/ico" href="../../assets/images/siteLogo.jpg" />
    <title>AI-INTERF | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
    <link href="../../css/main.css" rel="stylesheet">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <div class="widget-heading">
                                                <?php echo $_SESSION['name'] ?>
                                                <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                            </div>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a href="../../logout"><button type="button" tabindex="0" class="dropdown-item">Logout</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <div class="spacer"></div>
                            <li>
                                <a href="../dashboard/">
                                    <i class="fas metismenu-icon fa-tachometer-alt"></i>
                                    Dashboard
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../summary/">
                                    <i class="metismenu-icon fas fa-list-alt"></i>
                                    Summary
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../performance/">
                                    <i class="metismenu-icon fas fa-chart-bar"></i>
                                    Performance
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../interface/" class="mm-active">
                                    <i class="metismenu-icon fas fa-tv"></i>
                                    Interface
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../ai-feed/">
                                    <i class="metismenu-icon fas fa-comments"></i>
                                    AI-Feed
                                </a>
                            </li> 
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fas fa-tv"></i>
                                </div>
                                <div>Interface</div>
                            </div>
                        </div>
                    </div>
                    <div class="contain">
                        <form method="post" enctype="multipart/form-data" class="inline">
                            <input type="file" name="file" id="file" />
                            <button type="submit" name="upload" class="btn btn-primary"><i class="fas fa-upload"></i></button>
                        </form>
                    </div>
                    <?php
                        if($msg != '') {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $msg ?>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        if($err != '') {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $err ?>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="spacer"></div>
                    <div class="card mycard">
                        <div class="card-body">
                            <table class="mb-0 table table-borderless">
                                <thead>
                                    <td>File Name</td>
                                    <td>Extension</td>
                                    <td></td>
                                </thead>
                                <tbody>
                                    <?php
                                        while($data = mysqli_fetch_assoc($result)):
                                            $filename = pathinfo($data['name'], PATHINFO_FILENAME);
                                            $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                                    ?>
                                    <tr>
                                        <td><?php echo $filename ?></td>
                                        <td><?php echo $extension ?></td>
                                        <td>
                                            <a href="#" download><button class="btn btn-success"><i class="fas fa-download"></i></button></a>
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                        endwhile;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            </div>
        </div>
        <script type="text/javascript" src="../../assets/scripts/main.js"></script>
    </div>
</body>
</html>

<style>
    .contain {
        /* border: 1px solid black; */
        width: 400px;
        margin: auto;
    }
    .mycard {
        width: 80%;
        margin: auto;
    }
</style>