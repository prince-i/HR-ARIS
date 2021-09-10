<?php
    include 'server.php';
    $username = $username = $_SESSION['username'];
    $fullname = $_SESSION['fullname'];
    $role = $_SESSION['role'];
    $deptCode = $_SESSION['deptCode'];
    $deptSection = $_SESSION['deptSection'];
    $deptSubSection = $_SESSION['subSection'];
    if($_SESSION['username'] == ''){
        session_destroy();
        session_unset();
        header('location:../index.php');
    }
?>