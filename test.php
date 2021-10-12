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
    $get_section = "SELECT DISTINCT section FROM aris_absent_filing WHERE date_upload < '$server_date'";
    $stmt = $conn->prepare($get_section);
    $stmt->execute();
    foreach($stmt->fetchALL() as $x){
        if($x['section'] == 'N/A' || $x['section'] == 'Vietnamese Officers')continue;
        echo $section = $x['section'];
        
    }


    echo '</table>';
?>