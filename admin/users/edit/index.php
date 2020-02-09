<?php
    include '../../../dbconnect.php';
    
    if(!$_SESSION['username']) {
        header("location: /aiinterf/");
    }

    $id = $_GET['id'];

    $err = '';

    if(isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $type = $_POST['type'];

        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];

        if(empty($pwd1)) {
            $query = "UPDATE user SET name = '$name', username = '$username', email = '$email', type='$type' WHERE id='$id'";
            mysqli_query($conn,$query);
            $msg = "User details have been updated!!";
            echo "<script>window.location = '../../users/".$msg."'</script>";
        } else {
            if($pwd1 == $pwd2 && $pwd1 != null) {
                $pwd = md5($pwd1);
                $query = "UPDATE user SET name = '$name', username = '$username', email = '$email', type='$type', password = '$pwd' WHERE id='$id'";
                mysqli_query($conn,$query);
                $msg = "User details have been updated!!";
                echo "<script>window.location = '../../users/".$msg."'</script>";
            } else {
                $err = "Unable to Verify Password. Both Password must be same.";
            }
        }
    }

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/ico" href="../../../assets/images/siteLogo.jpg" />
    <title>AI-INTERF | Edit User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
    <link href="../../../css/main.css" rel="stylesheet">
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
                                <a href="../../dashboard/">
                                    <i class="fas metismenu-icon fa-tachometer-alt"></i>
                                    Dashboard
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../../vacancy/">
                                    <i class="metismenu-icon fas fa-briefcase"></i>
                                    Job Vacancy
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../../pages/">
                                    <i class="fas metismenu-icon fa-file-alt"></i>
                                    Pages
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../../users/" class="mm-active">
                                    <i class="metismenu-icon fas fa-user"></i>
                                    User List
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../../myed/">
                                    <i class="metismenu-icon fas fa-user"></i>
                                    MyEd User List
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../../files/">
                                    <i class="fas metismenu-icon fa-file-upload"></i>
                                    User Files
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
                                    <i class="fa-user fas"></i>
                                </div>
                                <div>User Configuration</div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if($err != '') {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $err ?>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="mycard card">
                        <div class="card-body">
                            <form method="post">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Full Name</label>
                                    <input type="text" name="name" id="name" value="<?php echo $data['name'] ?>" class="form-control" required />
                                </div>
                                <div class="position-relative form-group">
                                    <label for="username" class="">Username</label>
                                    <input type="text" name="username" id="username" value="<?php echo $data['username'] ?>" class="form-control" required />
                                </div>
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email</label>
                                    <input type="email" name="email" id="email" value="<?php echo $data['email'] ?>" class="form-control" required />
                                </div>
                                <div class="position-relative form-group">
                                    <label for="type" class="">Account Type</label>
                                    <select name="type" id="type"class="form-control" required>
                                        <option value="0" <?php if($data['type'] == 0) { ?> selected <?php } ?>>User</option>
                                        <option value="1" <?php if($data['type'] == 1) { ?> selected <?php } ?>>Admin</option>
                                    </select>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="pwd1" class="">Update Password</label>
                                    <input type="password" name="pwd1" id="pwd1" placeholder="Enter password" class="form-control"/>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="pwd2" class="">Re-enter Password</label>
                                    <input type="password" name="pwd2" id="pwd2" placeholder="Enter password" class="form-control"/>
                                </div>
                                <center><button class="mt-2 btn btn-primary" type="submit" name="update">Update</button></center>
                            </form>
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Full Name</b></p>
                <p><b>Username</b></p>
                <p><b>Email Address</b></p>
                <p><b>Account Type</b></p>
                <p><b>Password</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .mycard {
        width: 80%;
        margin: auto;
    }
</style>