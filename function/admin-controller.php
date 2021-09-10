<?php
    include 'conn.php'; 
    include 'sas-conn.php';
    $method = $_POST['method'];
    if($method == 'generateAbsence'){
        $from = $_POST['genFrom'];
        $to = $_POST['genTo'];
        $shift = $_POST['genShift'];
        $count = 0;
        $generate = "SELECT provider,emp_id_number,name,section,carmodel_group,process_line, COUNT(id) as total_absence_num, reason, reason_2 FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY emp_id_number";
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
                $count++;
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$x['username'].'</td>';
                echo '<td>'.$x['fullname'].'</td>';
                echo '<td>'.$x['role'].'</td>';
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
        $checkQL = "SELECT username FROM aris_users WHERE username = '$clerkUsername' AND deptCode = '$clerkDeptCode' AND deptSection = '$clerkSection'";
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
?>