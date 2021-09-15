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
<!-- START FILTERING FORMS    -------------------------------------- -->
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
                            <button class="btn #448aff blue accent-2 col s12" onclick="load_absence_per_provider()" id="generateBtn">generate</button>
                        </div>
                        <!-- EXPORT -->
                        <div class="col s2 input-field">
                            <button class="btn #2196f3 blue col s12" onclick="">export</button>
                        </div>
                    </div>
                    </div>
<!-- END FILTERING FORMS    -------------------------------------- -->

                    <div class="row" style="max-height:80vh;overflow:auto;">
                    <!-- ---------------------------------------------------------- -->
                        <h5 class="center blue-text">PER PROVIDER</h5>
                        <!-- REPORT 1 -->
                        <div class="row col s12">
                            <div class="col s6">
                                <table class="centered" style="zoom:75%;">
                                    <thead>
                                    <th>#</th>
                                    <th>PROVIDER</th>
                                    <th>COUNT</th>
                                    </thead>
                                    <tbody id="absence_per_provider"></tbody>
                                </table>
                            </div>
                            <!-- PER AGENCY CHART -->
                            <div class="col s6">
                            <canvas id="per_agency_chart" width="400" height="200"></canvas>
                            </div>
                        </div>
                        <!-- ------------------------------------------------------ -->

                        <div class="row divider"></div>
                        <h5 class="center blue-text">PER REASON</h5>
                        <!-- REPORT 2 -->
                        <div class="row col s12">
                            <div class="col s6">
                                <table class="centered" style="zoom:75%;">
                                    <thead>
                                    <th>#</th>
                                    <th>REASON</th>
                                    <th>COUNT</th>
                                    </thead>
                                    <tbody id="absence_per_reason"></tbody>
                                </table>
                            </div>
                            <!-- GRAPH -->
                            <div class="col s6">
                                <canvas id="per_reason_chart" width="400" height="200"></canvas>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------- -->
                        <div class="row divider"></div>
                        <h5 class="center blue-text">PER REASON2</h5>
                        <!-- REPORT 3 -->
                        <div class="row col s12">
                            <div class="col s4">
                                <table class="centered" style="zoom:75%;">
                                    <thead>
                                    <th>#</th>
                                    <th>REASON2</th>
                                    <th>COUNT</th>
                                    </thead>
                                    <tbody id="absence_per_reason2"></tbody>
                                </table>
                            </div>
                            <!-- GRAPH -->
                            <div class="col s8">
                                <canvas id="per_reason2_chart" width="400" height="200"></canvas>
                            </div>
                        </div>

                    <!-- -------------------------------------------------------------- -->

                    <div class="row divider"></div>
                        <h5 class="center blue-text">PER SECTION</h5>
                        <!-- REPORT 3 -->
                        <div class="row col s12">
                            <div class="col s6">
                                <table class="centered" style="zoom:75%;">
                                    <thead>
                                    <th>#</th>
                                    <th>REASON2</th>
                                    <th>COUNT</th>
                                    </thead>
                                    <tbody id="absence_per_section"></tbody>
                                </table>
                            </div>
                            <!-- GRAPH -->
                            <div class="col s6">
                                <canvas id="per_section_chart" width="400" height="200"></canvas>
                            </div>
                        </div>








                        <!-- END MAIN RIGHT DIV -->
                    </div>
                </div>
            </div>
    </div>

<!-- /CONTENT -->


  <!-- JS & JQUERY -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../node_modules/chart.js/dist/chart.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            // load_absence_per_provider();
        });

        const load_absence_per_provider =()=>{

            $('#generatedateFrom').attr('disabled',true);
            $('#generatedateTo').attr('disabled',true);
            $('#generateShift').attr('disabled',true);
            $('#generateBtn').attr('disabled',true);

            var genFrom = $('#generatedateFrom').val();
            var genTo =$('#generatedateTo').val();
            var genShift = $('#generateShift').val();
            
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generateAbsencePerProvider',
                    genFrom:genFrom,
                    genTo:genTo,
                    genShift:genShift
                },success:function(response){
                    $('#absence_per_provider').html(response);
                    var provider_data = [];
                    $('.provider_row').each(function(){
                        provider_data.push($(this).html());
                    }); 
                    var provider_data_count = [];
                    $('.absent_provider').each(function(){
                        provider_data_count.push($(this).html());
                    }); 
                    // CALL FUNCTION GENERATE CHART FOR PER PROVIDER
                    generate_chart_per_provider(provider_data,provider_data_count);
                    setTimeout(() => {
                        load_per_reason(genFrom,genTo,genShift);
                    }, 1000);
                  }
            });
        }

        const load_per_reason =(x,y,z)=>{
            // console.log(x); 
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generate_absence_per_reason',
                    genFrom:x,
                    genTo:y,
                    genShift:z
                },success:function(data){
                    // console.log(data);
                    $('#absence_per_reason').html(data);
                    var reason_label = [];
                    var reason_data = [];
                    $('.reason_label').each(function(){
                        reason_label.push($(this).html());
                    });
                    $('.reason_data').each(function(){
                        reason_data.push($(this).html());
                    });
                    generate_chart_per_reason(reason_label,reason_data);
                    setTimeout(() => {
                        load_per_reason_2(x,y,z);
                    }, 1000);
                }
            });
        }

        const load_per_reason_2 =(from,to,shift)=>{
            // console.log(from);
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generate_absence_per_reason_2',
                    from:from,
                    to:to,
                    shift:shift
                },success:function(response){
                    // console.log(response);
                    $('#absence_per_reason2').html(response);
                    var reason2_label = [];
                    var reason2_data = [];
                    $('.reason2_label').each(function(){
                        reason2_label.push($(this).html());
                    });
                    $('.reason2_data').each(function(){
                        reason2_data.push($(this).html());
                    });
                    generate_chart_per_reason2(reason2_label,reason2_data);
                    setTimeout(() => {
                        load_per_section(from,to,shift);
                    }, 1000);
                }
            });
        }

        const load_per_section =(from,to,shift)=>{
            $.ajax({
                url : '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generate_absence_per_section',
                    from:from,
                    to:to,
                    shift:shift
                },success:function(data){
                    // console.log(data);
                    $('#absence_per_section').html(data);
                    var section_label = [];
                    var section_data = [];
                    $('.section_label').each(function(){
                        section_label.push($(this).html());
                    });
                    $('.section_data').each(function(){
                        section_data.push($(this).html());
                    });

                    generate_chart_per_section(section_label,section_data);
                }
            });
        }

        // PER AGENCY CHART
        const generate_chart_per_provider =(x,y)=>{
            var ctx = document.getElementById('per_agency_chart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: x,
                    datasets: [{
                        label: '# of Absences',
                        data: y,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // PER REASON CHART
        const generate_chart_per_reason =(x,y)=>{
            var ctx = document.getElementById('per_reason_chart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: x,
                    datasets: [{
                        label: '# of Absences',
                        data: y,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // PER REASON2 CHART
        const generate_chart_per_reason2 =(x,y)=>{
            var ctx = document.getElementById('per_reason2_chart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: x,
                    datasets: [{
                        label: '# of Absences',
                        data: y,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    indexAxis: 'y'
                   
                }
                                 
            });
        }

        const generate_chart_per_section =(x,y)=>{
            var ctx = document.getElementById('per_section_chart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: x,
                    datasets: [{
                        label: '# of Absences',
                        data: y,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    indexAxis: 'y'
                   
                }
                                 
            });
        }
    </script>
</body>

</html>