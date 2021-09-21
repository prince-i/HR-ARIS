<?php

// require '../function/conn.php';
require '../function/session.php';
if($_SESSION['role'] != 'admin'){
    session_unset();
    session_destroy();
    header('location:../index.php');
}
$from = $_GET['absent_date'];
$shift = $_GET['shift'];
$count = 0;

$filename = "HR-ARIS Absent Report-".$from.".xls";
header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/csv; charset=utf-8');  
header("Content-Disposition: ; filename=\"$filename\"");
echo'
<html lang="en">
<body>
<table border="1">
<thead>
    <tr>
        <td>FURUKAWA AUTOMOTIVE SYSTEMS LIMA PHILIPPINES INC.</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>DATE</td>
        <td>'.$from.'</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>SHIFT</td>
        <td>'.$shift.'</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
    <th>#</th>
    <th>PROVIDER</th>
    <th>ID NO.</th>
    <th>NAME</th>
    <th>AREA</th>
    <th>GROUP</th>
    <th>PROCESS</th>
    <th>NO OF ABSENCES</th>
    <th>REASON</th>
    <th>REASON 2</th>
    </tr>
</thead>
';
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
echo'
</table>
</body>
</html>
';
?>