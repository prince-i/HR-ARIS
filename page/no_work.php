<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../assets/logo/bio.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR DASHBOARD</title>
    <?php
    require '../function/session.php';
    if($_SESSION['role'] != 'admin'){
        session_unset();
        session_destroy();
        header('location:../index.php');
        
    }
    // echo $fullname;
    include '../components/Modals/modal_logout.php';
    include '../components/Modals/modal_uploaded_admin.php';
    ?>
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <style>
        #container {
            min-height:90vh;
            overflow-y:auto;
        }
        div::-webkit-scrollbar {
            width: 1em;
        }
        
        div::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
        
        div::-webkit-scrollbar-thumb {
            background-color: darkgrey;
            outline: 1px solid darkgrey;
        }      
    </style>
</head>
<body>
<div class="navbar-fixed">
        <nav class="blue darken-3 z-depth-3">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">HR-ARIS (HR Admin Dashboard)</a>
            <ul class="right hide-on-med-and-down">
            <li><a href="#modal_logout" class="modal-trigger z-depth-5"><?=$fullname;?></a></li>
            </ul>
        </div>
        </nav>
  </div>
  
<!-- CONTENT -->
    <div class="row">
            
            <?php 
            // <!-- SIDE LINKS -->
                include 'side-nav-admin.php';
            // MODALS
                include '../components/Modals/modal_upload_absent_admin.php';
                include '../components/Modals/modal_uploaded_admin_preview.php';
            ?>

            <!-- CONTAINER -->
            <div class="col l10 m10 s10">
                <div class="collection" id="container">
                <div class="row">
                    <div class="col s12 z-depth-3">
                        <div class="col s3 input-field">
                            <input type="date" name="" id="generatedateFrom" value="<?=$server_date;?>"><label for="">Date:</label>
                        </div>

                        <div class="col s2 input-field">
                            <select name="" id="generateShift" class="browser-default z-depth-3">
                                <option value="">ALL SHIFT</option>
                                <option value="DS">DS</option>
                                <option value="NS">NS</option>
                            </select>
                        </div>

                        <div class="col s2 input-field">
                            <button class="btn #448aff blue accent-2 col s12 waves-effect waves-light" onclick="load_no_work()">generate</button>
                        </div>
                        
                        <!-- UPLOAD -->
                        

                        <!-- EXPORT -->
                        <div class="col s3 input-field">
                            <button class="btn #2196f3 blue col s12 waves-effect waves-light" onclick="export_nowork_report('tbl_absent_report')">export &darr;</button>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <h5 class="center blue-text">NO WORK REPORT</h5>
                        <div class="col s12" style="max-height:70vh;overflow:auto;">
                            <table class="centered" style="zoom:75%;" id="tbl_absent_report">
                                <thead>
                                <th>#</th>
                                <th>PROVIDER</th>
                                <th>ID NO.</th>
                                <th>NAME</th>
                                <th>AREA</th>
                                <th>GROUP</th>
                                <th>PROCESS</th>
                                <th>NO OF ABSENCES</th>
                                <th>REASON</th>
                                <th>REASON 2</th>
                                </thead>
                                <tbody id="no_work_data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<!-- /CONTENT -->

  <!-- JS & JQUERY -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoClose: true
            });
            load_no_work();
        });

        const load_no_work =()=>{
            var genFrom = $('#generatedateFrom').val();
            var genShift = $('#generateShift').val();
            
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generate_no_work',
                    genFrom:genFrom,
                    genShift:genShift
                },success:function(response){
                    $('#no_work_data').html(response);
                    // console.log(response);
                }
            });
        }

        function export_nowork_report(table_id, separator = ',') {
            var rows = document.querySelectorAll('table#' + table_id + ' tr');
            var csv = [];
            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll('td, th');
                for (var j = 0; j < cols.length; j++) {
                    var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
                    data = data.replace(/"/g, '""');
                    row.push('"' + data + '"');
                }
                csv.push(row.join(separator));
            }
            var csv_string = csv.join('\n');
            // Download it
            var filename = 'No Work Employees'+ '_' + new Date().toLocaleDateString() + '.csv';
            var link = document.createElement('a');
            link.style.display = 'none';
            link.setAttribute('target', '_blank');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
            link.setAttribute('download', filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

    </script>
</body>

</html>