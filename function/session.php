<?php
    include 'server.php';
    $username = $username = $_SESSION['username'];
    $fullname = $_SESSION['fullname'];
    $role = $_SESSION['role'];
    $deptSection = $_SESSION['deptCode'];
    $deptSubSection = $_SESSION['handleLine'];
    if($_SESSION['username'] == ''){
        session_destroy();
        session_unset();
        header('location:../index.php');
    }
?>