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
    // require '../function/conn.php';
    require '../function/session.php';
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
    echo '<th>ABSENT FROM</th>';
    echo '<th>ABSENT TO</th>';
    echo '</thead>';
    foreach($row_data as $x){
        $c++;
        $id = $x['id'];
        $query = "SELECT *FROM a_m_employee WHERE idNumber = '$id' AND empDeptSection = '$deptSection' AND empSubSect = '$deptSection'";
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
                echo '<td contenteditable class="absence"><input type="number" value="1" class="center" style="width:50px;"/></td>';
                echo '<td >
                        <select id="reason'.$c.'" class="browser-default reason">
                            <option value=""></option>
                            <option value="SL">SL</option>
                            <option value="VL">VL</option>
                            <option value="ML">ML</option>
                            <option value="AWOL">AWOL</option>
                            <option value="LWOP">LWOP</option>
                        </select>
                        </td>';

                echo '<td >
                        <select id="reason2'.$c.'" class="browser-default reason2">
                            <option value=""></option>
                            <option value="Family Matter">Family Matter</option>
                            <option value="Personal Matter">Personal Matter</option>
                            <option value="Quarantine">Quarantine</option>
                        </select>
                    </td>';

                echo '<td >
                       <input type="text" class="datepicker absent_date_from" value="'.$server_date.'">
                    </td>';

                echo '<td >
                       <input type="text" class="datepicker absent_date_to" value="'.$server_date.'">
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
            // var thisTable = [];
            // $('table#tbl tr').each(function(){
            //     var arrayOfThisRow =[]
            //     var tableData = $(this).find('td');
            //     if(tableData. length > 0){
            //         tableData.each(function() {arrayOfThisRow.push($(this).text());
            //         });
            //         thisTable.push(arrayOfThisRow);
            //     }
            // });
            // console.log(thisTable);
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
            $('.absence input').each(function(){
                absenceArray.push($(this).val());
            });
            console.log(absenceArray);

            // REASON
            var reasonArray = [];
            $('.reason').each(function(){
                reasonArray.push($(this).val());
            });
            console.log(reasonArray);
            // REASON 2
            var reason2Array = [];
            $('.reason2').each(function(){
                reason2Array.push($(this).val());
            });

            // ABSENT FROM

            var date_from = [];
            $('.absent_date_from').each(function(){
                date_from.push($(this).val());
            });

            // ABSENT TO
            var date_to = [];
            $('.absent_date_to').each(function(){
                date_to.push($(this).val());
            });


            // SERIALIZE ARRAY USING FOR LOOP
            for(let i = 0; i < idArray.length;i++){
                console.log(providerArray[i]+ "*!*" + idArray[i] + "*!*" + nameArray[i] + '*!*' + deptSectArray[i] + '*!*' + subSectArray[i] + '*!*' + lineArray[i] + '*!*' + absenceArray[i] + '*!*' + reasonArray[i] + '*!*' + reason2Array[i] + '*!*' + date_from[i] + '*!*' + date_to[i]); 

                $.ajax({
                    url: '../function/controller.php',
                    type: 'POST',
                    cache: false,
                    data:{
                        method: 'file_absent',
                        provider: providerArray[i],
                        empID: idArray[i],
                        name: nameArray[i],
                        deptSection: deptSectArray[i],
                        group: subSectArray[i],
                        line: lineArray[i],
                        absence: absenceArray[i],
                        reason: reasonArray[i],
                        reason2: reason2Array[i],
                        uploader: '<?=$fullname;?>',
                        absent_from: date_from[i],
                        absent_to: date_to[i]
                    },success:function(response){
                        console.log(response);
                    }
                });
            }
                
          
        }
    </script>
</body>
</html>



