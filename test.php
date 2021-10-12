<style>
table{
    border-collapse:collapse;
}
</style>

<?php
include 'function/conn.php';
    echo '<table border="1">';
    echo '<thead>';
    echo '<th>SECTION</th>';
    // SELECT SECTION WITH FILE
    $get_section = "SELECT section,carmodel_group FROM aris_absent_filing WHERE date_upload = '$server_date'";
    $stmt = $conn->prepare($get_section);
    $stmt->execute();
    foreach($stmt->fetchALL() as $x){
        if($x['section'] == 'N/A' || $x['section'] == 'Vietnamese Officers')continue;
        // $section = $x['section'];
        $sub = $x['carmodel_group'];
        // SELECT ALL SECTION THEN SKIP THE SECTION WITH ABSENT FILED 
        $select_sec = "SELECT DISTINCT deptSection FROM aris_users";
        $stmt = $conn->prepare($select_sec);
        $stmt->execute();
        foreach($stmt->fetchall() as $d){
            if($d['deptSection'] == $sub || $d['deptSection'] == 'N/A')continue;
            echo $d['deptSection'].'<br>';
        }
    }


    echo '</table>';
?>