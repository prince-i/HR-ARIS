<?php
    // DEFAULT TIMEZONE
    date_default_timezone_set('Asia/Manila');
    $server_date = date('Y-m-d');
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    try{
        $conn_sas = new PDO("mysql:host=$servername;dbname=live_hris",$username,$password);
    }catch(PDOException $e){
        echo 'No Connection!'.$e->getMessage();
    }

?>