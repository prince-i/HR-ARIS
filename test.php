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
    $get_section = "SELECT DISTINCT reason FROM aris_absent_filing ORDER BY reason ASC";
        $stmt3 = $conn->prepare($get_section);
        $stmt3->execute();
        foreach($stmt3->fetchALL() as $reason){
            echo '<td>'.$reason['reason'].'</td>';
        }
    echo '</thead>';
    
    $sql = "SELECT DISTINCT section FROM aris_absent_filing ORDER BY section ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    foreach($stmt->fetchALL() as $section){
        $section_name = $section['section'];
        echo '<tbody>';
        echo '<tr>';
        echo '<td>'.$section['section'].'</td>';
        $get_reason = "SELECT DISTINCT reason,count(id) as countid FROM aris_absent_filing WHERE section = '$section_name' GROUP BY reason ORDER BY reason ASC";
        $stmt2 = $conn->prepare($get_reason);
        $stmt2->execute();
        foreach($stmt2->fetchALL() as $reason){
            // echo '<td>'.$reason['reason'].'</td>';
            echo '<td>'.$reason['countid'].'</td>';
        }
        echo '</tr>';
        echo '</tbody>';
    }
    echo '</table>';
?>