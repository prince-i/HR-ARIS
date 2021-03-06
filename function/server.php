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
            $query = "SELECT username,fullname,role,deptCode,deptSection,subSection FROM aris_users WHERE username ='$username' AND password ='$password' LIMIT 1";
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
                        $_SESSION['deptSection'] = $x['deptSection'];
                        $_SESSION['subSection'] = $x['subSection'];
                        header('location: page/dashboard.php');
                    }
                    if($role == 'coordinator'){
                        $_SESSION['username'] = $username;
                        $_SESSION['fullname'] = $x['fullname'];
                        $_SESSION['role'] = $x['role'];
                        $_SESSION['deptCode'] = $x['deptCode'];
                        $_SESSION['deptSection'] = $x['deptSection'];
                        $_SESSION['subSection'] = $x['subSection'];
                        header('location: page/coordinator.php');
                    }
                    if($role == 'admin'){
                        $_SESSION['username'] = $username;
                        $_SESSION['fullname'] = $x['fullname'];
                        $_SESSION['role'] = $x['role'];
                        $_SESSION['deptCode'] = $x['deptCode'];
                        $_SESSION['deptSection'] = $x['deptSection'];
                        $_SESSION['subSection'] = $x['subSection'];
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