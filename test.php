<?php
    echo '<table>';
    echo '<thead>';
    echo '<th>SECTION</th>';
    echo '</thead>';
    include 'function/conn.php';
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
            echo '<td>'.$reason['reason'].'</td>';
            echo '<td>'.$reason['countid'].'</td>';
        }
        echo '</tr>';
        echo '</tbody>';
    }
    echo '</table>';
?>