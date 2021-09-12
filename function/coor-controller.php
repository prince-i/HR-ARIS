<?php
    include 'conn.php'; 
    $method = $_POST['method'];
    if($method == 'load_file_history'){
        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];
        $shift = $_POST['shift'];
        $agency = $_POST['provider'];
        // $count = 0;
        $query = "SELECT *FROM aris_absent_filing WHERE date_absent >= '$dateFrom' AND date_absent <= '$dateTo' AND shift LIKE '$shift%' AND provider LIKE '$agency%'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach($stmt->fetchALL() as $x){
                // $count++;
                echo '<tr>';
                echo '<td>
                <p>
                    <label>
                        <input type="checkbox" name="" id="checkUser" class="singleCheckFile"value="'.$x['id'].'" onchange="get_checked_item()">
                        <span></span>
                    </label>
                    </p>
                </td>';
                echo '<td>'.$x['provider'].'</td>';
                echo '<td>
                        <a href="#modal-edit-absent-file" class="modal-trigger" 
                        onclick="getToEdit(&quot;'
                        .$x['id'].'*!*'
                        .$x['provider'].'*!*'
                        .$x['emp_id_number'].'*!*'
                        .$x['name'].'*!*'
                        .$x['section'].'*!*'
                        .$x['carmodel_group'].'*!*'
                        .$x['process_line'].'*!*'
                        .$x['reason'].'*!*'
                        .$x['reason_2'].'*!*'
                        .$x['date_absent'].'*!*'
                        .$x['shift'].'&quot;)">
                        '.$x['emp_id_number'].'</a>
                    </td>';
                echo '<td>'.$x['name'].'</td>';
                echo '<td>'.$x['section'].'</td>';
                echo '<td>'.$x['carmodel_group'].'</td>';
                echo '<td>'.$x['process_line'].'</td>';
                echo '<td>'.$x['reason'].'</td>';
                echo '<td>'.$x['reason_2'].'</td>';
                echo '<td>'.$x['uploader'].'</td>';
                echo '<td>'.$x['date_absent'].'</td>';
                echo '<td>'.$x['shift'].'</td>';
                echo '<td>'.$x['date_upload'].'</td>';
                
            }
        }else{
            echo '<tr>';
            echo '<td colspan="15">NO FILED YET</td>';
            echo '</tr>';
        }
        }

?>