<?php
    require '../function/session.php';
    if($_SESSION['role'] != 'admin'){
        session_unset();
        session_destroy();
        header('location:../index.php');
    }

    $from = $_GET['dateFrom'];
    $to = $_GET['dateTo'];
    $shift = $_GET['shift'];
    $filename = "HR-ARIS Absent Summary Report-".$from.".xls";
    header("Content-Type: application/vnd.ms-excel");
    header('Content-Type: text/csv; charset=utf-8');  
    header("Content-Disposition: ; filename=\"$filename\"");
    echo'
    <html lang="en">
    <body>
    <table border="1">
    <thead>
        <tr>
        <th colspan="2">PER PROVIDER</th>
        </tr>
        <tr>
        <th>PROVIDER</th>
        <th>COUNT</th>
        </tr>
    </thead>
    ';
    $get_data = "SELECT provider,COUNT(id) as absent_count FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY provider ORDER BY absent_count DESC";
        $stmt = $conn->prepare($get_data);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                echo '<tr>';
                echo '<td class="provider_row">'.$x['provider'].'</td>';
                echo '<td class="absent_provider">'.$x['absent_count'].'</td>';
                echo '</tr>';
            }
                echo '<tr>';
                echo '<td colspan=""><b>GRAND TOTAL</b></td>';
                echo '<td class="" id="total_absent_provider">';
                echo '</td>';
                echo '</tr>';
                
        }else{
            // NO RESULT
        }
  
    
echo'
</table>

<br>

<table border="1">
<thead>
    <tr>
    <th colspan="2">PER REASON</th>
    </tr>
    <tr>
    <th>PROVIDER</th>
    <th>COUNT</th>
    </tr>
</thead>
';
$get_data = "SELECT reason,COUNT(id) as absent_count FROM aris_absent_filing WHERE (date_absent >= '$from' AND date_absent <= '$to') AND shift LIKE '$shift%' GROUP BY reason ORDER BY absent_count DESC";
    $stmt = $conn->prepare($get_data);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach($stmt->fetchALL() as $x){
            echo '<tr>';
            echo '<td class="provider_row">'.$x['reason'].'</td>';
            echo '<td class="absent_provider">'.$x['absent_count'].'</td>';
            echo '</tr>';
        }
            echo '<tr>';
            echo '<td colspan=""><b>GRAND TOTAL</b></td>';
            echo '<td class="" id="total_absent_reason">';
            echo '</td>';
            echo '</tr>';
            
    }else{
        // NO RESULT
    }


echo'
</table>
</body>
</html>
';
?>