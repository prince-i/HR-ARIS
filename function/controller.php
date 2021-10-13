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

    elseif($method == 'file_absent'){
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
        $number_absent = $_POST['number_absent'];
        $position = $_POST['position'];
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
            // DECREASE DATE WITH  DAY
            // $subtract_date =  date('Y-m-d',(strtotime('-1 day', strtotime($absent_date))));


            $file = "INSERT INTO aris_absent_filing 
            (`id`,`provider`,`emp_id_number`,`name`,`position`,`section`,`carmodel_group`,`process_line`,`reason`,`reason_2`,`uploader`,`shift`,`date_absent`,`number_absent`,`date_upload`) 
            VALUES ('0','$provider','$empID','$name','$position','$deptSection','$group','$line','$reason','$reason2','$uploader','$shift','$absent_date','$number_absent','$server_date')";
            $stmt = $conn->prepare($file);
            if($stmt->execute()){
                echo "success"."~!~".$rowID;
            }else{
                echo "error"."~!~".$rowID;
            }
        }
    }  
}

elseif($method == 'load_file_history'){
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
                    <a href="#modal_edit_absent_file" class="modal-trigger" 
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
                    .$x['shift'].'*!*'
                    .$x['number_absent']
                    .'&quot;)">
                    '.$x['emp_id_number'].'</a>
                </td>';
            echo '<td>'.$x['name'].'</td>';
            echo '<td>'.$x['position'].'</td>';
            echo '<td>'.$x['section'].'</td>';
            echo '<td>'.$x['carmodel_group'].'</td>';
            echo '<td>'.$x['process_line'].'</td>';
            echo '<td>'.$x['reason'].'</td>';
            echo '<td>'.$x['reason_2'].'</td>';
            echo '<td>'.$x['uploader'].'</td>';
            echo '<td>'.$x['date_absent'].'</td>';
            echo '<td>'.$x['number_absent'].'</td>';
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
    elseif($method == 'deleteFileClerk'){
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
    elseif($method == 'getReason'){
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

    // UPDATE ABSENTEE FILE
    elseif($method == 'update_absentee'){
        $id = $_POST['up_id'];
        $number_absent = $_POST['up_number_absent'];
        $date_absent = $_POST['up_date_absent'];
        $shift = $_POST['up_shift'];

        // UPDATE DETAILS
        $updateQL = "UPDATE aris_absent_filing SET number_absent = '$number_absent', date_absent = '$date_absent', shift = '$shift' WHERE id = '$id'";
        $stmt = $conn->prepare($updateQL);
        if($stmt->execute()){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    elseif($method == 'update_last_upload_date'){
        $user = $_POST['x'];
        $update = "UPDATE aris_users SET last_upload = '$server_date' WHERE username = '$user'";
        $stmt = $conn->prepare($update);
        if($stmt->execute()){
            echo 'success';
        }else{
            echo 'fail';
        }
    }



    elseif($method == 'get_withno_file'){
        echo '<table border="1">';
        echo '<thead>';
        echo '<th>SECTION WITH NO ABSENT FILED AS OF '.$server_date.'</th>';
        echo '<tbody>';
        // SELECT SECTION WITH FILE
        $get_section = "SELECT DISTINCT deptCode,deptSection FROM aris_users WHERE (last_upload < '$server_date' OR last_upload IS NULL) AND role NOT LIKE 'admin%'";
        $stmt = $conn->prepare($get_section);
        $stmt->execute();
        foreach($stmt->fetchall() as $x){
            echo '<tr>';
            echo '<td>'.$x['deptSection'].'</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }

    $conn = null;
?>