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
    include '../components/Modals/modal_logout.php';
    ?>
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <style>
        #container {
            min-height:90vh;
            overflow-y:auto;
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
            <!-- SIDE LINKS -->
            <?php include 'side-nav-admin.php';?>

            <!-- CONTAINER -->
            <div class="col l10 m10 s10">
                <div class="collection" id="container">
                <div class="row">
                    <div class="col s12 z-depth-3">
                        <div class="col s3 input-field">
                            <input type="date" name="" id="generatedateFrom" value="<?=$server_date;?>"><label for="">Date From:</label>
                        </div>
                        <div class="col s3 input-field">
                            <input type="date" name="" value="<?=$server_date;?>" id="generatedateTo"><label for="">Date To:</label>
                        </div>
                        <div class="col s2 input-field">
                            <select name="" id="generateShift" class="browser-default">
                                <option value="">ALL SHIFT</option>
                                <option value="DS">DS</option>
                                <option value="NS">NS</option>
                            </select>
                        </div>

                        <div class="col s2 input-field">
                            <button class="btn #448aff blue accent-2 col s12" onclick="load_absence_report()">generate</button>
                        </div>
                        <!-- EXPORT -->
                        <div class="col s2 input-field">
                            <button class="btn #2196f3 blue col s12" onclick="">export</button>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <h5 class="center blue-text">ABSENCES REPORT</h5>
                        <div class="col s12" style="max-height:70vh;overflow:auto;">
                            <table class="centered" style="zoom:75%;">
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
                                <tbody id="absences_data_render"></tbody>
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
            load_absence_report();
        });

        const load_absence_report =()=>{
            var genFrom = $('#generatedateFrom').val();
            var genTo =$('#generatedateTo').val();
            var genShift = $('#generateShift').val();
            
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generateAbsence',
                    genFrom:genFrom,
                    genTo:genTo,
                    genShift:genShift
                },success:function(response){
                    $('#absences_data_render').html(response);
                    console.log(response);
                }
            });
        }
    </script>
</body>

</html>