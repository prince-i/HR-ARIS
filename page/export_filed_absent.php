<?php
require '../function/session.php';
if($_SESSION['role'] != 'admin'){
    session_unset();
    session_destroy();
    header('location:../index.php');
}
$from = $_GET['from'];
$to = $_GET['to'];
$shift = $_GET['shift'];
$section = $_GET['section'];

$filename = "HR-ARIS Absent Report-".$from." to ".$to.".xls";
header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/csv; charset=utf-8');  
header("Content-Disposition: ; filename=\"$filename\"");
echo'
<html lang="en">
<body>
<table border="1">
<thead>
    <tr>
    <th>#</th>
    <th>PROVIDER</th>
    <th>EMPLOYEE ID</th>
    <th>NAME</th>
    <th>POSITION</th>
    <th>SECTION</th>
    <th>CARMODEL/GROUP</th>
    <th>PROCESS/LINE</th>
    <th>REASON</th>
    <th>REASON2</th>
    <th>FILED BY</th>
    <th>ABSENT DATE</th>
    <th>NUMBER OF ABSENT</th>
    <th>SHIFT</th>
    <th>DATE UPLOAD</th>
    </tr>
</thead>';
$count = 0;
$query = "SELECT *FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' AND section LIKE '$section%'";
$stmt = $conn->prepare($query);
$stmt->execute();
if($stmt->rowCount() > 0){
   foreach($stmt->fetchALL() as $x){
    $count++;
    echo '<tr>';
    echo '<td>'.$count.'</td>';
    echo '<td>'.$x['provider'].'</td>';
    echo '<td>'.$x['emp_id_number'].'</td>';
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
    echo '</tr>';
   }
}else{
    echo '<tr>';
    echo '<td colspan="14">NO RECORD</td>';
    echo '</tr>';
}
echo'
</table>
</body>
</html>
';
?>