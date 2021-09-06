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
        $reason = $_POST['reason'];
        $reason2 = $_POST['reason2'];
        $uploader = $_POST['uploader'];
        $absent_date = $_POST['absent_date'];
        $shift = $_POST['shift'];
        $rowID =  $_POST['row_data'];
        if(empty($reason) || empty($reason2) || empty($absent_date)){
            echo "error"."~!~".$rowID;
        }else{
        // CHECK DATA IF EXISTED
        $check = "SELECT id FROM aris_absent_filing WHERE date_absent = '$absent_date'  AND emp_id_number = '$empID'";
        $stmt = $conn->prepare($check);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "exist"."~!~".$rowID."~!~".$name;
        }else{
            $file = "INSERT INTO aris_absent_filing 
            (`id`,`provider`,`emp_id_number`,`name`,`section`,`carmodel_group`,`process_line`,`reason`,`reason_2`,`uploader`,`shift`,`date_absent`,`date_upload`) 
            VALUES ('0','$provider','$empID','$name','$deptSection','$group','$line','$reason','$reason2','$uploader','$shift','$absent_date','$server_date')";
        $stmt = $conn->prepare($file);
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
    $section = $_POST['section'];
    $subsection = $_POST['subsection'];

    // $count = 0;
    $query = "SELECT *FROM aris_absent_filing WHERE date_absent >= '$dateFrom' AND date_absent <= '$dateTo' AND shift LIKE '$shift%' AND section LIKE '$section%' AND carmodel_group LIKE '$subsection%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach($stmt->fetchALL() as $x){
            // $count++;
            echo '<tr>';
            echo '<td>
            <p>
                <label>
                    <input type="checkbox" name="" id="checkUser" class="singleCheckFile"value="'.$x['id'].'" onchange="get_checked_item()">
                    <span></span>
                </label>
                </p>
            </td>';
            echo '<td>'.$x['provider'].'</td>';
            echo '<td>
                    <a href="#modal-edit-absent-file" class="modal-trigger" 
                    onclick="getToEdit(&quot;'
                    .$x['id'].'*!*'
                    .$x['provider'].'*!*'
                    .$x['emp_id_number'].'*!*'
                    .$x['name'].'*!*'
                    .$x['section'].'*!*'
                    .$x['carmodel_group'].'*!*'
                    .$x['process_line'].'*!*'
                    .$x['reason'].'*!*'
                    .$x['reason_2'].'*!*'
                    .$x['date_absent'].'*!*'
                    .$x['shift'].'&quot;)">
                    '.$x['emp_id_number'].'</a>
                </td>';
            echo '<td>'.$x['name'].'</td>';
            echo '<td>'.$x['section'].'</td>';
            echo '<td>'.$x['carmodel_group'].'</td>';
            echo '<td>'.$x['process_line'].'</td>';
            echo '<td>'.$x['reason'].'</td>';
            echo '<td>'.$x['reason_2'].'</td>';
            echo '<td>'.$x['uploader'].'</td>';
            echo '<td>'.$x['date_absent'].'</td>';
            echo '<td>'.$x['shift'].'</td>';
            echo '<td>'.$x['date_upload'].'</td>';
            
        }
    }else{
        echo '<tr>';
        echo '<td colspan="15">NO FILED YET</td>';
        echo '</tr>';
    }
}

    // DELETE OF FILE BY CLERK
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

    // FETCH REASON BY CATEGORY
    if($method == 'getReason'){
        $categ = $_POST['value'];
        $fetchReason = "SELECT reason2 FROM aris_absent_reason WHERE reason_categ = '$categ'";
        $stmt = $conn->prepare($fetchReason);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                echo '<option value="'.$x['reason2'].'">'.$x['reason2'].'</option>';
            }
        }
    }

    // CALCULATE ABSENT DAYS
    if($method == 'calculateAbsent'){
        $dateFrom = $_POST['date_from'];
        $dateTo = $_POST['date_to'];
        // CHECK CALENDAR ID OF DATE START
        $calendarIDFrom = "SELECT id FROM falp_calendar WHERE date_value = '$dateFrom' LIMIT 1";
        $stmt = $conn->prepare($calendarIDFrom);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $f){
                $dateFromID = $f['id'];
             }
        }else{
            $dateFromID = '';
        }

        // SELECT THE ID OF DATE END 
        $calendarIDTo = "SELECT id FROM falp_calendar WHERE date_value = '$dateTo' LIMIT 1";
        $stmt2 = $conn->prepare($calendarIDTo);
        $stmt2->execute();
        if($stmt2->rowCount() > 0){
            foreach($stmt2->fetchALL() as $t){
                $dateToID = $t['id'];
             }
        }else{
            $dateToID = '';
        }

        // CALCULATE
        if(is_numeric($dateFromID) && is_numeric($dateToID)){
            echo $absence =  ($dateToID - $dateFromID) + 1;
        }else{
            echo '0';
        }
    }




    $conn = null;
?>