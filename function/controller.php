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
            echo "exist"."~!~".$rowID."~!~".$name;
        }else{
            $file = "INSERT INTO aris_absent_filing (`id`,`provider`,`emp_id_number`,`name`,`section`,`carmodel_group`,`process_line`,`absence_num`,`reason`,`reason_2`,`uploader`,`date_absent_from`,`date_absent_to`,`shift`,`date_upload`) VALUES ('0','$provider','$empID','$name','$deptSection','$group','$line','$absence','$reason','$reason2','$uploader','$absent_from','$absent_to','$shift','$server_date')";
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

if($method == 'load_file_history'){
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $shift = $_POST['shift'];
    // $count = 0;
    $query = "SELECT *FROM aris_absent_filing WHERE date_upload >= '$dateFrom' AND date_upload <= '$dateTo' AND shift LIKE '$shift%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach($stmt->fetchALL() as $x){
            // $count++;
            echo '<tr>';
            echo '<td>
            <p>
                <label>
                    <input type="checkbox" name="" id="checkUser" class="singleCheckFile"value="'.$x['id'].'" onclick="get_checked_item()">
                    <span></span>
                </label>
                </p>
            </td>';
            echo '<td>'.$x['provider'].'</td>';
            echo '<td>'.$x['emp_id_number'].'</td>';
            echo '<td>'.$x['name'].'</td>';
            echo '<td>'.$x['section'].'</td>';
            echo '<td>'.$x['carmodel_group'].'</td>';
            echo '<td>'.$x['process_line'].'</td>';
            echo '<td>'.$x['absence_num'].'</td>';
            echo '<td>'.$x['reason'].'</td>';
            echo '<td>'.$x['reason_2'].'</td>';
            echo '<td>'.$x['uploader'].'</td>';
            echo '<td>'.$x['date_absent_from'].'</td>';
            echo '<td>'.$x['date_absent_to'].'</td>';
            echo '<td>'.$x['shift'].'</td>';
            echo '<td>'.$x['date_upload'].'</td>';
            echo '</tr>';
        }
    }else{
        echo '<tr>';
        echo '<td colspan="15">NO FILED YET</td>';
        echo '</tr>';
    }
}

    if($method == 'deleteFileClerk'){
        $itemID = array();
        $itemID = $_POST['items'];
        $count = count($itemID);
        foreach($itemID as $x){
            // DELETE QUERY
            $del = "DELETE FROM aris_absent_filing WHERE id = '$x'";
            $stmt = $conn->prepare($del);
            if($stmt->execute()){
                // IN EVERY SUCCESS OF FUNCTION MINUS 1 TO THE ORIGINAL ARRAY ITEM COUNT
                $count = $count - 1;
            }
        }

        // IF COUNT == 0 THE FUNCTION RETURN SUCCESS
        if($count == 0){
            echo 'deleted';
        }else{
            echo 'failed';
        }
    }
?>