<?php
    ini_set('memory_limit','256M');
    include 'conn.php'; 
    include 'sas-conn.php';
    $method = $_POST['method'];
    if($method == 'generateAbsence'){
        $from = $_POST['genFrom'];
        $to = $_POST['genTo'];
        $shift = $_POST['genShift'];
        $count = 0;
        // GROUP BY ID NUMBER AND REASON
        $generate = "SELECT provider,emp_id_number,name,section,carmodel_group,process_line, COUNT(id) as total_absence_num, reason, reason_2 FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY emp_id_number,reason_2";
        $stmt = $conn->prepare($generate);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$x['provider'].'</td>';
                echo '<td>'.$x['emp_id_number'].'</td>';
                echo '<td>'.$x['name'].'</td>';
                echo '<td>'.$x['section'].'</td>';
                echo '<td>'.$x['carmodel_group'].'</td>';
                echo '<td>'.$x['process_line'].'</td>';
                echo '<td>'.$x['total_absence_num'].'</td>';
                echo '<td>'.$x['reason'].'</td>';
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
    if($method == 'load_section_master'){
        echo '<option value="">SECTION</option>';
        $section  = "SELECT DISTINCT deptSection FROM aris_department";
        $stmt = $conn->prepare($section);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<option value="'.$x['deptSection'].'">'.$x['deptSection'].'</option>';
        }
    }

    // GENERATE USER 
    if($method == 'fetchUsers'){
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
    if($method == 'getDeptCode'){
        echo '<option value="">DEPT CODE</option>';
        $getDeptCodeQL = "SELECT DISTINCT deptCode FROM aris_department";
        $stmt = $conn->prepare($getDeptCodeQL);
        $stmt->execute();
        foreach($stmt->fetchALL() as $x){
            echo '<option value="'.$x['deptCode'].'">'.$x['deptCode'].'</option>';
        }
    }

    // LOAD DEPT SECTION CLERK
    if($method == 'getDeptSectionClerk'){
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
    if($method == 'getDeptSubSect'){
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
    if($method == 'getAgencyCode'){
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
    if($method == 'getAgencyDesc'){
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
    if($method == 'createClerkAccount'){
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
    if($method == 'createCoordinatorAccount'){
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
    if($method == 'createAdminUser'){
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
    if($method == 'prevAccountUser'){
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
    if($method == 'updatePassword'){
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

    if($method == 'deleteUser'){
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
    if($method == 'generateAbsencePerProvider'){
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
        }else{
            // NO RESULT
        }
    }

    if($method == 'generate_absence_per_reason'){
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
        }else{
            // NO RESULT
        }
    }

    if($method == 'generate_absence_per_reason_2'){
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
        }else{
            // NO RESULT
        }
    }

    if($method == 'generate_absence_per_section'){
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
        }else{
            // NO RESULT
        }
    }


    $conn = null;
?>