<?php
    session_start();
    include 'conn.php';

    if(isset($_POST['login_session'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username) || empty($password)){
            echo 'PLEASE ENTER LOGIN CREDENTIALS PROPERLY!';
        }
    }
?>