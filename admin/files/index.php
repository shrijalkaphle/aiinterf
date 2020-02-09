<?php
    include '../../dbconnect.php';

    if(!$_SESSION['username']) {
        header("location: /aiinterf/");
    }

    $query = "SELECT * FROM `filesUpload` ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/ico" href="../../assets/images/siteLogo.jpg" />
    <title>AI-INTERF | User Files</title>
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
                                <a href="../vacancy/">
                                    <i class="metismenu-icon fas fa-briefcase"></i>
                                    Job Vacancy
                                </a>
                            </li>
                            <div class="spacer"></div>
                            <li>
                                <a href="../pages/">
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
                                <a href="../files/" class="mm-active">
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
                                    <i class="fas fa-file-upload"></i>
                                </div>
                                <div>User Files</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="mb-0 table table-borderless">
                                <thead>
                                    <tr>
                                        <td>File Name</td>
                                        <td>File Extension</td>
                                        <td>User Name</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($data = mysqli_fetch_assoc($result)):
                                            $filename = pathinfo($data['name'], PATHINFO_FILENAME);
                                            $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                                            $uid = $data['userid'];
                                            $exec = mysqli_query($conn,"SELECT * FROM user WHERE id = '$uid'");
                                            $usr = mysqli_fetch_assoc($exec);
                                            $user = $usr['name'];
                                    ?>
                                    <tr>
                                        <td><?php echo $filename ?></td>
                                        <td><?php echo $extension ?></td>
                                        <td><?php echo $user ?></td>
                                        <td>
                                            <a href="<?php echo $location ?>" download><button class="btn btn-success"><i class="fas fa-download"></i></button></a>
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
