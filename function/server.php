<?php
    session_start();
    include 'conn.php';

    if(isset($_POST['login_session'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username) || empty($password)){
            echo 'PLEASE ENTER LOGIN CREDENTIALS PROPERLY!';
        }else{
            // CHECK USER TO DB
            $query = "SELECT username,fullname,role,deptCode,handleLine FROM aris_users WHERE username ='$username' AND password ='$password' LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                // FETCH USER DETAILS
                foreach($stmt->fetchALL() as $x){
                    $role = $x['role'];
                    if($role == 'clerk'){
                        $_SESSION['username'] = $username;
                        $_SESSION['fullname'] = $x['fullname'];
                        $_SESSION['role'] = $x['role'];
                        $_SESSION['deptCode'] = $x['deptCode'];
                        $_SESSION['handleLine'] = $x['handleLine'];
                        header('location: page/dashboard.php');
                    }
                    if($role == 'admin'){
                        $_SESSION['username'] = $username;
                        $_SESSION['fullname'] = $x['fullname'];
                        $_SESSION['role'] = $x['role'];
                        $_SESSION['deptCode'] = $x['deptCode'];
                        $_SESSION['handleLine'] = $x['handleLine'];
                        header('location: page/admin.php');
                    }
                }
            }else{
                echo 'INVALID CREDENTIALS';
            }
        }
    }


    if(isset($_POST['logout'])){
        session_destroy();
        session_unset();
        header('location: ../index.php');
    }
?>