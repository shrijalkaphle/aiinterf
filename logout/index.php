<?php
    session_start();

    //end user session
    session_destroy();

    header('location: ../');
?>