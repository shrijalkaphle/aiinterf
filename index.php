<?php
    include 'dbconnect.php';

    $err = '';

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $pwd = $_POST['password'];

        $encryptpwd = md5($pwd);
        //check for user

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$encryptpwd'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num != 0) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['type'] = $data['type'];

            if($_SESSION['type'] == 1) {
                header('location: admin/dashboard');
            } else {
                header('location: user/dashboard');
            }
        } else {
            $err = "Invalid Username or password!! Recheck your login details";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="assets/images/siteLogo.jpg" />
    <title>AI-Interf</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <header class="header">
        <nav id="nav" class="navbar navbar-expand-lg fixed-top py-md-3">
            <div class="container">
                <img src="assets/images/logo.png" alt="">
                <button type="button" onclick="navColor()" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Portfolio</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">About</a></li>
                        <li class="nav-item"><a href="career/" class="nav-link text-uppercase font-weight-bold">Career</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="main">
        <div class="container">
        <?php
                        if($err != '') {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $err ?>
                    </div>
                    <?php
                        }
                    ?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <center><h2 class="card-header">LOGIN</h2></center>
                        <div class="form-div">
                            <form method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required/>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required/>
                                </div>
                                <center><input type="submit" value="Login" name="login" class="btn btn-primary"></center>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(function () {
        $(window).on('scroll', function () {
            if ( $(window).scrollTop() > 10 ) {
                $('.navbar').addClass('active');
            } else {
                $('.navbar').removeClass('active');
            }
        });

        $("body").on("contextmenu", "img",function(e){
            return false;
        });
    });

    function navColor() {
        var test = document.getElementById('nav');
        if(test.classList.contains('active')) {
            if ( $(window).scrollTop() < 10 ) {
                $('.navbar').removeClass('active');
            }
        } else {
            $('.navbar').addClass('active')
        }
        
    }
</script>