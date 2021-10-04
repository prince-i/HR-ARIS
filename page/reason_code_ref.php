<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REFERENCE</title>
    <style>
        table{
            border: 1px solid black;
            border-collapse:collapse;
            width:100%;
            /* table-layout:fixed; */
        }
        body {
            font-family: arial;
        }
    </style>
</head>
<body>
    <center>
    <h3>REASON REFERENCE</h3>
    </center>
    <table border="1">
    <thead>
    <th>CATEGORY</th>
    <th>REASON</th>
    <th>CODE</th>
    </thead>
    <tbody>
    <?php
    require '../function/session.php';
    $count = 0;
    $sql = "SELECT *FROM aris_absent_reason ORDER BY reason_categ ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    foreach($stmt->fetchALL() as $x){
        echo '<tr>';
        echo '<td>'.$x['reason_categ'].'</td>';
        echo '<td>'.$x['reason2'].'</td>';
        echo '<td>'.$x['code'].'</td>';
        echo '</tr>';
    }

    ?>
    </tbody>
    </table>


</body>
</html>

