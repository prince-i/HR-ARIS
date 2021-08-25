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

    if($method == 'file_absent'){
        $provider = $_POST['provider'];
        $empID = $_POST['empID'];
        $name = $_POST['name'];
        $deptSection = $_POST['deptSection'];
        $group = $_POST['group'];
        $line = $_POST['line'];
        $absence = $_POST['absence'];
        $reason = $_POST['reason'];
        $reason2 = $_POST['reason2'];
        $uploader = $_POST['uploader'];
        $absent_from = $_POST['absent_from'];
        $absent_to = $_POST['absent_to'];
        $shift = $_POST['shift'];
        $rowID =  $_POST['row_data'];
        if(empty($reason) || empty($reason2)){
            echo "error"."~!~".$rowID;
        }else{
        // CHECK DATA IF EXISTED
        $check = "SELECT id FROM aris_absent_filing WHERE date_absent_from >= '$absent_from' AND date_absent_to >= '$absent_to' AND emp_id_number = '$empID'";
        $stmt = $conn->prepare($check);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "exist"."~!~".$name;
        }else{
            $file = "INSERT INTO aris_absent_filing (`id`,`provider`,`emp_id_number`,`name`,`section`,`carmodel_group`,`process_line`,`absence_num`,`reason`,`reason_2`,`uploader`,`date_absent_from`,`date_absent_to`,`shift`) VALUES ('0','$provider','$empID','$name','$deptSection','$group','$line','$absence','$reason','$reason2','$uploader','$absent_from','$absent_to','$shift')";
        $stmt = $conn->prepare($file);
        // $stmt->execute();
        if($stmt->execute()){
            echo "success"."~!~".$rowID;
        }else{
            echo "error"."~!~".$rowID;
        }
    }
    }  
}

?>