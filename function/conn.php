<?php
    // DEFAULT TIMEZONE
    date_default_timezone_set('Asia/Manila');
    $server_date = date('Y-m-d');
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    try{
        $conn = new PDO("mysql:host=$servername;dbname=hraris",$username,$password);
    }catch(PDOException $e){
        echo 'No Connection!'.$e->getMessage();
    }

?>