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
        $section  = "SELECT DISTINCT deptSection FROM a_m_department";
        $stmt = $conn_sas->prepare($section);
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
                echo '<td>'.$x['handleLine'].'</td>';
                echo '</tr>';
            }
        }
    }

?>