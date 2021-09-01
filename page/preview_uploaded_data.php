<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../assets/logo/bio.png" type="image/x-icon">   
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
    if(!empty($_FILES['csv-import-file']['name'])){
    $file_data = fopen($_FILES['csv-import-file']['tmp_name'], 'r');
    fgetcsv($file_data);
    while($row = fgetcsv($file_data))
    {
    $row_data[] = array(
    'id'  => $row[0]
    );
    }
    $c = 0;
    echo '<table class="centered" id="tbl" style="zoom:80%;">';
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
    echo '<th>SHIFT</th>';
    echo '</thead>';
    foreach($row_data as $x){
        $c++;
        $id = $x['id'];
        $query = "SELECT *FROM a_m_employee WHERE idNumber = '$id' AND empDeptSection = '$deptSection' AND empSubSect = '$deptSection'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
           
            foreach($stmt->fetchALL() as $d){
                
                echo '<tr id="row'.$c.'" class="row_data">';
                echo '<td class="row_count">'.$c.'</td>';
                echo '<td id="provider" class="provider">'.$d['empAgency'].'</td>';
                echo '<td class="idnumber">'.$d['idNumber'].'</td>';
                echo '<td class="empname">'.$d['empName'].'</td>';
                echo '<td class="deptsection">'.$d['empDeptSection'].'</td>';
                echo '<td class="subsection">'.$d['empSubSect'].'</td>';
                echo '<td class="linenumber">'.$d['lineNo'].'</td>';
                echo '<td class="absence"><input type="number" value="1" class="center" style="width:50px;"/></td>';
                echo '<td >
                        <select id="reason'.$c.'" class="browser-default z-depth-4 reason" onchange="load_reason('.$c.')">
                            <option value="">REASON</option>';
                            $get_reason = "SELECT DISTINCT reason_categ FROM aris_absent_reason";
                            $stmt = $conn->prepare($get_reason);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){
                                echo '<option value="'.$x['reason_categ'].'">'.$x['reason_categ'].'</option>';
                            }
                        
                        echo'
                        </select>
                        </td>';

                echo '<td >
                        <select id="reason2'.$c.'" class="browser-default z-depth-4 reason2">
                            <option value="">REASON 2</option>
                           
                        </select>
                    </td>';

                echo '<td >
                       <input type="text" class="datepicker absent_date_from" value="'.$server_date.'" onchange="calculate_absent_date()">
                    </td>';

                echo '<td >
                       <input type="text" class="datepicker absent_date_to" value="'.$server_date.'" onchange="calculate_absent_date()">
                </td>';
                echo '<td class="eachShift">'.$d['empShift'].'</td>';
                echo '</tr>';
                
            }
        }
    }
    echo '</table>';
    }else{
        
        echo '<div class="row col s12">';
        echo '<div class="card center"><h5>NO CSV FILE IS UPLOADED!</h5></div>';
        echo '</div>';
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
            // PROVIDER
            var providerArray = [];
            $('.provider').each(function(){
                providerArray.push($(this).html());
            });
         

            // ID
            var idArray = [];
            $('.idnumber').each(function(){
                idArray.push($(this).html());
            });
         

            // NAMES
            var nameArray = [];
            $('.empname').each(function(){
                nameArray.push($(this).html());
            });
          
            // DEPT SECTION
            var deptSectArray = [];
            $('.deptsection').each(function(){
                deptSectArray.push($(this).html());
            });
        

            // SUB SECTION
            var subSectArray = [];
            $('.subsection').each(function(){
                subSectArray.push($(this).html());
            });

            // PROCESS
            var lineArray = [];
            $('.linenumber').each(function(){
                lineArray.push($(this).html());
            });

            // ABSENCE
            var absenceArray = [];
            $('.absence input').each(function(){
                absenceArray.push($(this).val());
            });

            // REASON
            var reasonArray = [];
            $('.reason').each(function(){
                reasonArray.push($(this).val());
            });


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

            // SHIFT
            var shift = [];
            $('.eachShift').each(function(){
                shift.push($(this).html());
            });

            var row_data = [];
            $('.row_count').each(function(){
                row_data.push($(this).html());
            });
            // SERIALIZE ARRAY USING FOR LOOP
            for(let i = 0; i < idArray.length;i++){
                // console.log(providerArray[i]+ "*!*" + idArray[i] + "*!*" + nameArray[i] + '*!*' + deptSectArray[i] + '*!*' + subSectArray[i] + '*!*' + lineArray[i] + '*!*' + absenceArray[i] + '*!*' + reasonArray[i] + '*!*' + reason2Array[i] + '*!*' + date_from[i] + '*!*' + date_to[i]); 
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
                            absent_to: date_to[i],
                            shift:shift[i],
                            row_data:row_data[i]
                        },success:function(response){
                            console.log(response);
                            var report = response.split("~!~");
                            var res = report[0];
                            var row = report[1];
                            var name = report[2];
                            if(res == 'error'){
                                $('#row'+row).addClass('#e57373 red lighten-2');
                            }
                            if(res == 'exist'){
                            // ALERT 
                            
                            M.toast({html: 'Existing absent file for '+name,classes: 'rounded blue'});
                            // $('#row'+row).remove();
                            }
                            // SUCCESS
                            if(res == 'success'){
                                $('#row'+row).addClass('#a5d6a7 green lighten-3');
                                $('#row'+row).remove();
                                
                            }
                        }               
                    });
                }
        }

    // CALCULATE ABSENT DAYS BASE TO FALP CALENDAR
    const calculate_absent_date =()=>{

    }    

    const load_reason =(x)=>{
        // VARIABLE X IS THE ID OF REASON SELECT TAG
        var value = $('#reason'+x).val();
        console.log(value);
        $.ajax({
            url: '../function/controller.php',
            type: 'POST',
            cache: false,
            data:{
                method: 'getReason',
                value:value
            },success:function(data){
                console.log(data);
                $('#reason2'+x).html(data);
            }
        });
    }
    </script>
</body>
</html>



