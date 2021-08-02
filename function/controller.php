<?php
    include 'conn.php'; 
    $method = $_POST['method'];

    if($method == 'view_my_initial_upload'){
        $c = 0 ;
        $uploader = $_POST['username'];
        $fetch = "SELECT *FROM aris_initial_filing WHERE uploader = '$uploader'";
        $stmt = $conn->prepare($fetch);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            $c++;
            echo '<tr>';
            echo '<td>'.$c.'</td>';
            echo '<td>'.$x['provider'].'</td>';
            echo '<td>'.$x['emp_id_number'].'</td>';
            echo '<td>'.$x['name'].'</td>';
            echo '<td>'.$x['section'].'</td>';
            echo '<td>'.$x['carmodel_group'].'</td>';
            echo '<td>'.$x['process_line'].'</td>';
            echo '<td contenteditable>'.$x['absence_num'].'</td>';
            echo '<td>'.$x['reason'].'</td>';
            echo '<td>'.$x['reason_2'].'</td>';
            echo '</tr>';
        }
    }
?>