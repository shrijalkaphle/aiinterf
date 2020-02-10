<?php
include '../dbconnect.php';

$err = '';
$msg = '';

if (isset($_POST['Apply'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $cid = $_POST['jobid'];

    $target_dir = "../uploads/";
    $cv = $_FILES['cv']['name'];
    $tmp_name = $_FILES['cv']['tmp_name'];
    $ext = pathinfo($cv, PATHINFO_EXTENSION);
    $new_name = "cv/cv_" . $name . "." . $ext;
    $fileDir = $target_dir . $new_name;
    if (move_uploaded_file($tmp_name, $fileDir)) {
        //$sqly = "INSERT INTO applied (cid,name,mobile,email,cv) VALUES ('$cid','$name','$mobile','$email','$new_name')";
        //$result = mysqli_query($conn,$sqly);
        $msg = "Thank You for applying. We will get back to you as soon as possible";
    } else {
        $err = "Error while uploading CV. Contact us through our official mail";
    }
}

//check if job has expired
$query = "SELECT * FROM career";
$result = mysqli_query($conn, $query);
while ($data = mysqli_fetch_assoc($result)) {
    $id = $data['id'];
    $today = date('Y-m-d');
    $deadline = $data['deadline'];

    if ($today < $deadline) {
        $sql = "UPDATE career SET status = '0' WHERE id = '$id'";
        $exec = mysqli_query($conn, $sql);
    }
}

//display only non-expired jobs
$query = "SELECT * FROM career WHERE status = '1'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="../assets/images/siteLogo.jpg" />
    <title>AI-INTERF | Career</title>

    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/733ee988ac.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <header class="header">
        <nav id="nav" class="navbar navbar-expand-lg fixed-top py-md-3">
            <div class="container">
                <img src="../assets/images/logo.png" alt="">
                <button type="button" onclick="navColor()" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">
                    <i class="fas fa-bars"></i>
                </button>

                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="../../aiinterf" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Portfolio</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">About</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Career</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div>
        <div class="carHead">
            <div class="container">
                <center>
                    <h2 class="main" style="border-bottom: 0px solid black;">
                        We are always searching for new talents. Explore available job positions and join our creative team.
                    </h2>
                </center>
            </div>
        </div>
        <div style="height: 100px"></div>
        <div class="container">
            <?php
            if ($msg != '') {
            ?>
                <div class="alert alert-success">
                    <?php echo $msg ?>
                </div>
            <?php
            }
            ?>
            <?php
            if ($err != '') {
            ?>
                <div class="alert alert-danger">
                    <?php echo $err ?>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="container">
            <h2>Available Jobs</h2>
            <?php
            while ($data = mysqli_fetch_assoc($result)) :
            ?>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $data['position'] ?></h3>
                        <h6 class="card-subtitle mb-2 text-muted">Deadline : <?php echo $data['deadline'] ?></h6>
                        <p>
                            <?php echo $data['description'] ?>
                        </p>
                        <a href="#" class="card-link modelBTN btn btn-primary" data-id="<?php echo $data['id'] ?>" data-toggle="modal" data-target="#exampleModalCenter">Apply</a>
                    </div>
                </div>
                <div style="height: 100px"></div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
    <footer id="footer" class="footer-1">
        <div class="main-footer widgets-dark typo-light">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget subscribe no-box">
                            <h5 class="widget-title">AI-INTERF<span></span></h5>
                            <p>Boudha, Kathmandu <br> Nepal</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget no-box">
                            <h5 class="widget-title">Quick Links<span></span></h5>
                            <ul class="thumbnail-widget">
                                <li>
                                    <div class="thumb-content"><a href="../../aiinterf">Home</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">About Us</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">Portfolio</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">Career</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget no-box">
                            <h5 class="widget-title">Get Started<span></span></h5>
                            <p>Get access to your full Training and Marketing Suite.</p>
                            <a class="btn" href="#." target="_blank">Register Now</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">

                        <div class="widget no-box">
                            <h5 class="widget-title">Contact Us<span></span></h5>
                            <p><a href="mailto:aiinterf@gmail.com" title="glorythemes">Mail us</a></p>
                            <ul class="social-footer2">
                                <li>
                                    <a href="https://www.facebook.com/AI-Interf-2158628204262803/" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="https://www.linkedin.com/company/ai-interf/" target="_blank" title="Linkedin">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                                <li class="">
                                    <a title="Instagram" target="_blank" href="https://www.instagram.com/aiinterf/">
                                    <i class="fab fa-instagram-square"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Copyright Company Name © 2016. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Your Contact Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="jid" name="jobid" value="4">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input class="form-control" name="name" id="name" type="text" placeholder="Full Name" required="">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input class="form-control" name="mobile" id="mobile" type="Number" placeholder="Mobile Number" required="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" id="email" type="email" placeholder="E-Mail" required="">
                    </div>
                    <div class="form-group">
                        <label for="cv">CV</label>
                        <input class="form-control" name="cv" id="cv" type="file" placeholder="cv" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="Apply" value="Apply" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(function() {
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 10) {
                $('.navbar').addClass('active');
            } else {
                $('.navbar').removeClass('active');
            }
        });

        $("body").on("contextmenu", "img", function(e) {
            return false;
        });
    });

    function navColor() {
        var test = document.getElementById('nav');
        if (test.classList.contains('active')) {
            if ($(window).scrollTop() < 10) {
                $('.navbar').removeClass('active');
            }
        } else {
            $('.navbar').addClass('active')
        }
    };

    $(document).on("click", ".modelBTN", function() {
        var jobId = $(this).data('id');
        //var jobId = document.getElementById("careerID").value;
        $(".modal-body #jid").val(jobId);
    });
</script>

<style>
    .carHead {
        background-color: aqua;
        height: 300px;
    }
</style>