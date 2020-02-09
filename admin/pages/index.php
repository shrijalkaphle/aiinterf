<?php
    include '../../dbconnect.php';

    if(!$_SESSION['username']) {
        header("location: ". ROOT ."");
    }

    $msg = '';

    if($_GET['msg']) {
        $msg = $_GET['msg'];
    }

    if(isset($_POST['post'])) {
        $title = $_POST['title'];
        $user = $_POST['user'];
        $video = $_FILES['video']['name'];
        $header = $_POST['header'];
        $bdy = $_POST['body'];
        $body = str_replace("'","&#39;",$bdy);
        
        $target_dir = "videos/";

        if(empty($video)) {
            $query = "INSERT INTO pages VALUES ('','$user','','$title','$header','$body','')";
            mysqli_query($conn, $query) or die($query);
            $msg = "User Post Created.";
        } else {
            $target_file = $target_dir . $_FILES['video']['name'];
            $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");
            $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (in_array($videoFileType, $extensions_arr)) {
                if (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
                    $query = "INSERT INTO pages VALUES ('','$user','$video','$title','$header','$body','$target_file')";
                    mysqli_query($conn, $query);
                    $msg = "User Post Created.";
                }
            }
        }
    }

    $sql = "SELECT * FROM pages";
    $result = mysqli_query($conn,$sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/ico" href="../../assets/images/siteLogo.jpg" />
    <title>AI-INTERF | Pages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
    <script src="../../js/jquery-3.4.1.min.js"></script>
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
                                <a href="../vacancy/">
                                    <i class="metismenu-icon fas fa-briefcase"></i>
                                    Job Vacancy
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../pages/" class="mm-active">
                                    <i class="fas metismenu-icon fa-file-alt"></i>
                                    Pages
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../users/">
                                    <i class="metismenu-icon fas fa-user"></i>
                                    User List
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../myed/">
                                    <i class="metismenu-icon fas fa-user"></i>
                                    MyEd User List
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../files/">
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
                                    <i class="fas metismenu-icon fa-file-alt"></i>
                                </div>
                                <div>Pages</div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        if($msg != '') {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $msg ?>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="card-header">List of Pages</h5>
                            <div class="list-group">
                                <?php
                                    while ($row = mysqli_fetch_assoc($result)):
                                ?>
                                <input type="hidden" name="cid" value="<?php echo $row['id']; ?>">
                                <div class="card mycard">
                                    <div class="card-body">
                                        <h4 class="list-group-item-heading">
                                            <?php echo $row['header'] ?>
                                        </h4>
                                        <div style="float:right">
                                            <button type="button" class="modelBTN btn btn-info" data-id="<?php echo $row['id'] ?>" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <i class="fas fa-info-circle"></i>
                                            </button>

                                            <a href="edit/<?php echo $row['id'] ?>">
                                                <button class="mybtn btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            
                                            <a href="delete/<?php echo $row['id'] ?>" onclick="return confirm('Are you sure?')">
                                                <button class=" btn btn-danger">
                                                    <span class="fas fa-trash"></span>
                                                </button>
                                            </a>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <?php
                                    endwhile;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="job card">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="position-relative form-group">
                                            <label for="title" class="">Page Title</label>
                                            <select name="title" class="form-control">
                                                <option>Select Page Title</option>
                                                <option value="1">Summary</option>
                                                <option value="2">Performance</option>
                                                <option value="3">Interface</option>
                                                <option value="4">AI-Feed</option>
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="user" class="">User</label>
                                            <select name="title" class="form-control">
                                                <option>Select User</option>
                                                <?php
                                                    $rlt = mysqli_query($conn,"SELECT * FROM user WHERE type='0'");
                                                    while ($row = mysqli_fetch_assoc($rlt)):
                                                ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                <?php
                                                    endwhile;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="video" class="">Video</label>
                                            <input type="file" name="video" id="video" class="form-control" />
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="header" class="">Post Header</label>
                                            <input type="text" name="header" id="header" placeholder="Post Header" class="form-control" required />
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="body" class="">Post Body</label>
                                            <textarea class="form-control editor" name="body" id="body" rows="8" placeholder="Post Body" required></textarea>
                                        </div>
                                        <center><button class="mt-2 btn btn-primary" type="submit" name="post">Post</button></center>
                                    </form>
                                </div>
                            </div>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Post Header</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="info"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .mycard {
        margin-top: 10px;
    }
</style>

<script>
    $(document).on("click", ".modelBTN", function () {
        var Id = $(this).data('id');
        $.ajax({
            url: 'info.php',
            data: 'id='+Id,
            success:function (data) {
                $('#info').html(data);
            }
        });
    });
</script>