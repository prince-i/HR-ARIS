<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPORT</title>
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
</head>
<body>
<div class="navbar-fixed">
        <nav class="blue darken-3 z-depth-1">
        <div class="nav-wrapper">
            <!-- <a href="#!" class="brand-logo">PREVIEW</a> -->
            <ul class="hide-on-med-and-down">
            <li><a href="dashboard.php">&larr; BACK</a></li>
            <li><a href="#" class="" onclick="submit_report()">SUBMIT</a></li>
            </ul>
        </div>
        </nav>
  </div>

  <div class="row">
  <?php
    // error_reporting(0);
    require '../function/conn.php';
    if(!empty($_FILES['csv-import-file']['name']))
    {
    $file_data = fopen($_FILES['csv-import-file']['tmp_name'], 'r');
    fgetcsv($file_data);
    while($row = fgetcsv($file_data))
    {
    $row_data[] = array(
    'id'  => $row[0]
    );
    }
    $c = 0;
    echo '<table class="centered" id="tbl">';
    echo '<thead>';
    echo '<th>#</th>';
    echo '<th>PROVIDER</th>';
    echo '<th>ID#</th>';
    echo '<th>NAME</th>';
    echo '<th>SECTION</th>';
    echo '<th>CAR MODEL/GROUP</th>';
    echo '<th>PROCESS/LINE</th>';
    echo '<th># OF ABSENCE</th>';
    echo '<th>REASON</th>';
    echo '<th>REASON2</th>';
    echo '</thead>';
    foreach($row_data as $x){
        $c++;
        $id = $x['id'];
        $query = "SELECT *FROM a_m_employee WHERE idNumber = '$id'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
           
            foreach($stmt->fetchALL() as $d){
                
                echo '<tr id="row" class="row_data">';
                echo '<td>'.$c.'</td>';
                echo '<td id="provider" class="provider">'.$d['empAgency'].'</td>';
                echo '<td class="idnumber">'.$d['idNumber'].'</td>';
                echo '<td class="empname">'.$d['empName'].'</td>';
                echo '<td class="deptsection">'.$d['empDeptSection'].'</td>';
                echo '<td class="subsection">'.$d['empSubSect'].'</td>';
                echo '<td class="linenumber">'.$d['lineNo'].'</td>';
                echo '<td contenteditable class="absence"></td>';
                echo '<td >
                        <select id="reason'.$c.'" class="browser-default reason">
                            <option value=""></option>
                            <option value="SL">SL</option>
                            <option value="VL">VL</option>
                            <option value="ML">ML</option>
                            <option value="AWOL">AWOL</option>
                            <option value="LWOP">LWOP</option>
                            <option value="Quarantine">Quarantine</option>
                        </select>
                        </td>';
                echo '</tr>';
            }
        }
    }
    echo '</table>';
    }

?>
  </div>  


<!-- JS & JQUERY -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoClose: true
            });
            $('.modal').modal();
        });

        function submit_report(){
            // ROW
            

            // PROVIDER
            var providerArray = [];
            $('.provider').each(function(){
                providerArray.push($(this).html());
            });
            console.log(providerArray);

            // ID
            var idArray = [];
            $('.idnumber').each(function(){
                idArray.push($(this).html());
            });
            console.log(idArray);

            // NAMES

            var nameArray = [];
            $('.empname').each(function(){
                nameArray.push($(this).html());
            });
            console.log(nameArray);

            // DEPT SECTION
            var deptSectArray = [];
            $('.deptsection').each(function(){
                deptSectArray.push($(this).html());
            });
            console.log(deptSectArray);

            // SUB SECTION
            var subSectArray = [];
            $('.subsection').each(function(){
                subSectArray.push($(this).html());
            });
            console.log(subSectArray);

            // PROCESS

            var lineArray = [];
            $('.linenumber').each(function(){
                lineArray.push($(this).html());
            });
            console.log(lineArray);

            // ABSENCE
            var absenceArray = [];
            $('.absence').each(function(){
                absenceArray.push($(this).html());
            });
            console.log(absenceArray);

            // REASON
            var reasonArray = [];
            $('.reason').each(function(){
                reasonArray.push($(this).val());
            });
            console.log(reasonArray);

                
          
        }
    </script>
</body>
</html>



