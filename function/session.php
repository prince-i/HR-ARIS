<?php
    include 'server.php';
    $username = $_SESSION['username'];
    $_SESSION['fullname'];
    $_SESSION['role'];
    if($_SESSION['username'] == ''){
        session_destroy();
        session_unset();
        header('location:../index.php');
    }
?>