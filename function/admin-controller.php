<?php
    ini_set('memory_limit','256M');
    include 'conn.php'; 
    include 'sas-conn.php';
    $method = $_POST['method'];
    if($method == 'generateAbsence'){
        $from = $_POST['genFrom'];
        $shift = $_POST['genShift'];
        $count = 0;
        // GROUP BY ID NUMBER AND REASON
        $generate = "SELECT provider,emp_id_number,name,section,carmodel_group,process_line, number_absent, reason, reason_2 FROM aris_absent_filing WHERE date_absent = '$from' AND shift LIKE '$shift%' GROUP BY emp_id_number,reason_2";
        $stmt = $conn->prepare($generate);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                $count++;
                if($x['number_absent'] >= 15 ){
                    $reason = 'Prolong Absent';
                }else{
                    $reason = $x['reason'];
                }
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$x['provider'].'</td>';
                echo '<td>'.$x['emp_id_number'].'</td>';
                echo '<td>'.$x['name'].'</td>';
                echo '<td>'.$x['section'].'</td>';
                echo '<td>'.$x['carmodel_group'].'</td>';
                echo '<td>'.$x['process_line'].'</td>';
                echo '<td>'.$x['number_absent'].'</td>';
                echo '<td>'.$reason.'</td>';
                echo '<td>'.$x['reason_2'].'</td>';
                echo '</tr>';
            }
        }else{
            echo '<tr>';
            echo '<td colspan="10">NO RECORD</td>';
            echo '</tr>';
        }

    }

    // LOAD SECTION FROM HRIS
    elseif($method == 'load_section_master'){
        echo '<option value="">SECTION</option>';
        $section  = "SELECT DISTINCT deptSection FROM aris_department";
        $stmt = $conn->prepare($section);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<option value="'.$x['deptSection'].'">'.$x['deptSection'].'</option>';
        }
    }

    // GENERATE USER 
    elseif($method == 'fetchUsers'){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $section = $_POST['section'];
        $count = 0;
        $sql = "SELECT *FROM aris_users WHERE username LIKE '$username%' AND fullname LIKE '$fullname%' AND role LIKE '$role%' AND deptSection LIKE '$section%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                if($x['deptSection'] == ''){
                    $x['deptSection'] = '--';
                }

                if($x['deptCode'] == ''){
                    $x['deptCode'] = '--';
                }

                if($x['subSection'] == ''){
                    $x['subSection'] = '--';
                }

                $count++;
                echo '<tr onclick="getUserID(&quot;'.$x['id'].'&quot;)" class="modal-trigger" data-target="change_password_user_modal">';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$x['username'].'</td>';
                echo '<td>'.$x['fullname'].'</td>';
                echo '<td>'.strtoupper($x['role']).'</td>';
                echo '<td>'.$x['deptCode'].'</td>';
                echo '<td>'.$x['deptSection'].'</td>';
                echo '<td>'.$x['subSection'].'</td>';
                echo '</tr>';
            }
        }
    }

    // LOAD DEPT CODE CLERK
    elseif($method == 'getDeptCode'){
        echo '<option value="">DEPT CODE</option>';
        $getDeptCodeQL = "SELECT DISTINCT deptCode FROM aris_department";
        $stmt = $conn->prepare($getDeptCodeQL);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<option value="'.$x['deptCode'].'">'.$x['deptCode'].'</option>';
        }
    }

    // LOAD DEPT SECTION CLERK
    elseif($method == 'getDeptSectionClerk'){
        echo '<option value="">SECTION</option>';
        $deptcode = $_POST['deptCode'];
        $sql = "SELECT DISTINCT deptSection FROM aris_department WHERE deptCode = '$deptcode'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<option value="'.$x['deptSection'].'">'.$x['deptSection'].'</option>';
        }
    }

    // GETSUBSECTION
    elseif($method == 'getDeptSubSect'){
        $section = $_POST['deptSection'];
        echo '<option value="">SUB-SECTION</option>';
        $sql = "SELECT DISTINCT deptSubSection FROM aris_department WHERE deptSection LIKE '$section%' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<option value="'.$x['deptSubSection'].'">'.$x['deptSubSection'].'</option>';
        }
    }
    // GET AGENCY CODE
    elseif($method == 'getAgencyCode'){
        echo '<option value="">AGENCY CODE</option>';
        $sql = "SELECT agencyCode FROM aris_agency";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                echo '<option value="'.$x['agencyCode'].'">'.$x['agencyCode'].'</option>';
            }
        }
    }
    
    // GET AGENCY DESC
    elseif($method == 'getAgencyDesc'){
        $agency_code = $_POST['agency_code'];
        $sql = "SELECT agencyName FROM aris_agency WHERE agencyCode = '$agency_code'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                echo $x['agencyName'];
            }
        }
    }

    // CREATE CLERK USER
    elseif($method == 'createClerkAccount'){
        $clerkUsername = $_POST['clerkUsername'];
        $clerkPassword = $_POST['clerkPassword'];
        $clerkFullname = $_POST['clerkFullname'];
        $clerkDeptCode = $_POST['clerkDeptCode'];
        $clerkSection = $_POST['clerkSection'];
        $clerkSubSection = $_POST['clerkSubSection'];
        $role  = 'clerk';
        // CHECK USER IF ALREADY EXIST
        $checkQL = "SELECT username FROM aris_users WHERE username = '$clerkUsername' AND deptCode = '$clerkDeptCode' AND deptSection = '$clerkSection' AND role = 'clerk'";
        $stmt = $conn->prepare($checkQL);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo 'exists';
        }else{
            // INSERT TO USERS
            $createUser = "INSERT INTO aris_users (`username`,`password`,`fullname`,`role`, `deptCode`,`deptSection`,`subSection`) VALUES ('$clerkUsername','$clerkPassword','$clerkFullname','$role','$clerkDeptCode','$clerkSection','$clerkSubSection')";
            $stmt = $conn->prepare($createUser);
            if($stmt->execute() == TRUE){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }

    // CREATE COORDINATOR ACCOUNT
    elseif($method == 'createCoordinatorAccount'){
        $coorUsername = $_POST['coorUsername'];
        $coorPassword = $_POST['coorPassword'];
        $coorFullname = $_POST['coorFullname'];
        $coorAgencyCode = $_POST['coorAgencyCode'];
        $coorDesc = $_POST['coorDescription'];
        $role = 'coordinator';
        // CHECK USER
        $checkQL = "SELECT username FROM aris_users WHERE username = '$coorUsername' AND deptCode ='$coorAgencyCode' AND role ='coordinator'";
        $stmt = $conn->prepare($checkQL);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo 'exists';
        }else{
            $createCoor = "INSERT INTO aris_users (`username`,`password`,`fullname`,`role`,`deptCode`,`deptSection`) VALUES ('$coorUsername','$coorPassword','$coorFullname','$role','$coorAgencyCode','$coorDesc')";
            $stmt = $conn->prepare($createCoor);
            if($stmt->execute()){
                echo 'created';
            }else{
                echo 'fail';
            }
        }
    }

    // CREATE ADMIN USER ACCOUNT
    elseif($method == 'createAdminUser'){
        $username = $_POST['usernameAdmin'];
        $password = $_POST['passwordAdmin'];
        $fullname = $_POST['fullnameAdmin'];
        $role = 'admin';
        //CHECK USER
        $check_user = "SELECT username FROM aris_users WHERE username = '$username' AND role = '$role'";
        $stmt = $conn->prepare($check_user);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo 'exists';
        }else{
            // INSERT USER 
            $create = "INSERT INTO aris_users (`username`,`password`,`fullname`,`role`) VALUES ('$username','$password','$fullname','$role')";
            $stmt = $conn->prepare($create);
            if($stmt->execute()){
                echo 'created';
            }else{
                echo 'fail';
            }
        }
    }
  

    // LOAD ACCOUNT DATA
    elseif($method == 'prevAccountUser'){
        $id = $_POST['id'];
        $sql ="SELECT username,password,fullname FROM aris_users WHERE id ='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<table style="zoom:80%;">';
            echo '<tr>';
            echo '<td>USERNAME:</td>';
            echo '<td>'.$x['username'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>PASSWORD:</td>';
            echo '<td>'.$x['password'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>NAME:</td>';
            echo '<td>'.$x['fullname'].'</td>';
            echo '</tr>';
            echo '</table>';
        }
        
    }

    // UPDATE PASSWORD 
    elseif($method == 'updatePassword'){
        $id = $_POST['id'];
        $newPass = $_POST['newPass'];
        $sql = "UPDATE aris_users SET password = '$newPass' WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            echo 'updated';
        }else{
            echo 'fail';
        }
    }
    // REMOVE USER

    elseif($method == 'deleteUser'){
        $id = $_POST['id'];
        $sql = "DELETE FROM aris_users WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        if($stmt->execute() ==  TRUE){
            echo 'deleted';
        }else{
            echo 'fail';
        }
    }

    // GENERATE ABSENCE PER AGENCY
    elseif($method == 'generateAbsencePerProvider'){
        $from = $_POST['genFrom'];
        $to = $_POST['genTo'];
        $shift = $_POST['genShift'];
        $row = 0;
        // GENERATE
        $get_data = "SELECT provider,COUNT(id) as absent_count FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY provider ORDER BY absent_count DESC";
        $stmt = $conn->prepare($get_data);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                $row++;
                echo '<tr>';
                echo '<td>'.$row.'</td>';
                echo '<td class="provider_row">'.$x['provider'].'</td>';
                echo '<td class="absent_provider">'.$x['absent_count'].'</td>';
                echo '</tr>';
            }
                echo '<tr>';
                echo '<td colspan="2"><b>GRAND TOTAL</b></td>';
                echo '<td class="" id="total_absent_provider"></td>';
                echo '</tr>';
        }else{
            // NO RESULT
        }
    }

    elseif($method == 'generate_absence_per_reason'){
        $from = $_POST['genFrom'];
        $to = $_POST['genTo'];
        $shift = $_POST['genShift'];
        $row = 0;
        // GENERATE
        $get_data = "SELECT reason,COUNT(id) as absent_count FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY reason ORDER BY absent_count DESC";
        $stmt = $conn->prepare($get_data);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                $row++;
                echo '<tr>';
                echo '<td>'.$row.'</td>';
                echo '<td class="reason_label">'.$x['reason'].'</td>';
                echo '<td class="reason_data">'.$x['absent_count'].'</td>';
                echo '</tr>';
            }
            echo '<tr>';
            echo '<td colspan="2"><b>GRAND TOTAL</b></td>';
            echo '<td class="" id="total_absent_reason"></td>';
            echo '</tr>';
        }else{
            // NO RESULT
        }
    }

    elseif($method == 'generate_absence_per_reason_2'){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $shift = $_POST['shift'];
        $row = 0;
        // GENERATE
        $get_data = "SELECT reason_2,COUNT(id) as absent_count FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY reason_2 ORDER BY absent_count DESC";
        $stmt = $conn->prepare($get_data);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                $row++;
                echo '<tr>';
                echo '<td>'.$row.'</td>';
                echo '<td class="reason2_label">'.$x['reason_2'].'</td>';
                echo '<td class="reason2_data">'.$x['absent_count'].'</td>';
                echo '</tr>';
            }
                echo '<tr>';
                echo '<td colspan="2"><b>GRAND TOTAL</b></td>';
                echo '<td class="" id="total_absent_reason2"></td>';
                echo '</tr>';
        }else{
            // NO RESULT
        }
    }

    elseif($method == 'generate_absence_per_section'){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $shift = $_POST['shift'];
        $row = 0;
        // GENERATE
        $get_data = "SELECT section,COUNT(id) as absent_count FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY section ORDER BY absent_count DESC";
        $stmt = $conn->prepare($get_data);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                $row++;
                echo '<tr>';
                echo '<td>'.$row.'</td>';
                echo '<td class="section_label">'.$x['section'].'</td>';
                echo '<td class="section_data">'.$x['absent_count'].'</td>';
                echo '</tr>';
            }
                echo '<tr>';
                echo '<td colspan="2"><b>GRAND TOTAL</b></td>';
                echo '<td class="" id="total_absent_section"></td>';
                echo '</tr>';
        }else{
            // NO RESULT
        }
    }

  
    
    elseif($method == 'generate_absence_per_section_expanded'){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $shift = $_POST['shift'];
        $row = 0;
        // GENERATE
        $generate = "SELECT section,
         COUNT(if(reason LIKE 'AWOL%',1,NULL)) as awol, 
         COUNT(if(reason LIKE 'BL%' AND number_absent < 15,1,NULL)) as bl, 
         COUNT(if(reason LIKE 'EL%' AND number_absent < 15,1,NULL)) as el, 
         COUNT(if(reason LIKE 'For Cancel%',1,NULL)) as cancel, 
         COUNT(if(reason LIKE 'ML%',1,NULL)) as ml, 
         COUNT(if((reason LIKE 'SL%' OR reason LIKE 'VL%' OR reason LIKE 'BL%' OR reason LIKE 'EL%') AND number_absent >= 15,1,NULL)) as prolong, 
         COUNT(if(reason LIKE 'SL%' AND number_absent < 15,1,NULL)) as sl, 
         COUNT(if(reason LIKE 'SUS%',1,NULL)) as sus, 
         COUNT(if(reason LIKE 'VL%' AND number_absent < 15,1,NULL)) as vl, 
         COUNT(id) as total_absent
         FROM aris_absent_filing 
         WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' 
         GROUP BY section
         ORDER BY total_absent DESC";
         $stmt = $conn->prepare($generate);
         $stmt->execute();
         foreach($stmt->fetchALL() as $x){
            $row++;
            // CALCULATE LESS ML
            $grand_total = $x['awol'] + $x['bl'] + $x['el'] + $x['cancel'] + $x['ml'] + $x['prolong'] + $x['sl'] + $x['sus'] + $x['vl'];
            $less_ml = $grand_total - $x['ml'];
            echo '<tr>';
            echo '<td>'.$row.'</td>';
            echo '<td>'.$x['section'].'</td>';
            echo '<td>'.$x['awol'].'</td>';
            echo '<td>'.$x['bl'].'</td>';
            echo '<td>'.$x['el'].'</td>';
            echo '<td>'.$x['cancel'].'</td>';
            echo '<td>'.$x['ml'].'</td>';
            echo '<td>'.$x['prolong'].'</td>';
            echo '<td>'.$x['sl'].'</td>';
            echo '<td>'.$x['sus'].'</td>';
            echo '<td>'.$x['vl'].'</td>';
            echo '<td>'.$grand_total.'</td>';
            echo '<td>'.$less_ml.'</td>';
            echo '</tr>';
         }
        }

    // GET TOP REASON
    elseif($method == 'generate_top_reason'){
        $from = $_POST['genFrom'];
        $to = $_POST['genTo'];
        $shift = $_POST['genShift'];
        $row = 0;
        $total = "SELECT count(id) as absent_count FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%'";
        $stmt2 = $conn->prepare($total);
        $stmt2->execute();
        foreach($stmt2->fetchALL() as $total){
            $total_absent = $total['absent_count'];
        }
        $sql = "SELECT reason,count(id) as absent_count FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY reason ORDER BY absent_count DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            $row++;
            $absent =  $x['absent_count'];
            $percentage = round(($absent/$total_absent)*100,2);
            echo '<tr>';
            echo '<td>'.$row.'</td>';
            echo '<td class="reason_label_percentage">'.$x['reason'].'</td>';
            echo '<td class="reason_data_percentage">'.$x['absent_count'].'</td>';
            echo '<td class="reason_average_percentage">'.$percentage.'</td>';
            echo '</tr>';
        }

    }

    elseif($method == 'load_agency'){
        $fetch = "SELECT * FROM aris_agency ORDER BY agencyName ASC";
        $stmt = $conn->prepare($fetch);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<tr ondblclick="get_agency_del(&quot;'.$x['id'].'&quot;)" style="cursor:pointer;">';
            echo '<td>'.$x['agencyCode'].'</td>';
            echo '<td>'.$x['agencyName'].'</td>';
            echo '</tr>';
        }
    }

    // DELETE AGENCY
    elseif($method == 'delete_agency'){
        $id = $_POST['id'];
        $sql = "DELETE FROM aris_agency WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            echo 'success';
        }else{
            echo 'fail';
        }
    }


    // ADD AGENCY
    elseif($method == 'register_agency'){
        $code = $_POST['code'];
        $name = $_POST['agency_name'];
        $sql = "INSERT INTO aris_agency (`agencyCode`,`agencyName`) VALUES ('$code','$name')";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            echo 'success';
        }else{
            echo 'fail';
        }
    }


    elseif($method == 'load_reason'){
        $word = $_POST['keyword'];
        $fetch = "SELECT *FROM aris_absent_reason WHERE reason_categ LIKE '$word%' OR reason2 LIKE '$word%' ORDER BY reason_categ ASC";
        $stmt = $conn->prepare($fetch);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<tr ondblclick="get_reason_del(&quot;'.$x['id'].'&quot;)" style="cursor:pointer;">';
            echo '<td>'.$x['reason_categ'].'</td>';
            echo '<td>'.$x['reason2'].'</td>';
            echo '</tr>';
        }
    }
    // ADD REASON
    elseif($method == 'add_reason'){
        $credit = $_POST['credit'];
        $desc = $_POST['desc'];
        $query = "INSERT INTO aris_absent_reason (`reason_categ`,`reason2`) VALUES ('$credit','$desc')";
        $stmt = $conn->prepare($query);
        if($stmt->execute()){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    // DELETE REASON
    elseif($method == 'delete_reason'){
        $id = $_POST['id'];
        $sql = "DELETE FROM aris_absent_reason WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    // LOAD DEPT
    elseif($method == 'load_dept'){
        $word = $_POST['keyword'];
        $fetch = "SELECT *FROM aris_department WHERE deptCode LIKE '$word%' OR deptSection LIKE '$word%' OR deptSubSection LIKE '$word%' ORDER BY deptCode ASC";
        $stmt = $conn->prepare($fetch);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<tr>';
            echo '<td>'.$x['deptCode'].'</td>';
            echo '<td>'.$x['deptSection'].'</td>';
            echo '<td>'.$x['deptSubsection'].'</td>';
            echo '</tr>';
        }
    }

    elseif($method == 'uploaded_absent_admin'){
        $from = $_POST['absent_from'];
        $to = $_POST{'absent_to'};
        $shift = $_POST['shift'];
        echo $uploader = $_POST['uploader'];
        $query = "SELECT *FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' AND uploader LIKE '$uploader%'";
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

    

    $conn = null;
?>