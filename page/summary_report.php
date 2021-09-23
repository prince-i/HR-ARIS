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
        .spinner {
        width: 40px;
        height: 40px;

        position: relative;
        margin: 100px auto;
        }

        .double-bounce1, .double-bounce2 {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #333;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;
        
        -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
        animation: sk-bounce 2.0s infinite ease-in-out;
        }

        .double-bounce2 {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
        }

        @-webkit-keyframes sk-bounce {
        0%, 100% { -webkit-transform: scale(0.0) }
        50% { -webkit-transform: scale(1.0) }
        }

        @keyframes sk-bounce {
        0%, 100% { 
            transform: scale(0.0);
            -webkit-transform: scale(0.0);
        } 50% { 
            transform: scale(1.0);
            -webkit-transform: scale(1.0);
        }
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
                                <option value="DS">DS</option>
                                <option value="NS">NS</option>
                            </select>
                        </div>

                        <div class="col s2 input-field">
                            <button class="btn #448aff blue accent-2 col s12" onclick="load_absence_per_provider()" id="generateBtn">generate</button>
                        </div>
                        <!-- EXPORT -->
                        <div class="col s2 input-field">
                            <button class="btn #2196f3 blue col s12" onclick="export_excel()">export all</button>
                        </div>
                    </div>
                    </div>
<!-- END FILTERING FORMS    -------------------------------------- -->

                    <input type="hidden" name="" id="total_mp_count_data">
                    <!-- LOADER -->
                    <div class="spinner" id="spinner" style="display:none;">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>

                    <!-- LOADER -->
                    <div class="row" id="dashboard" style="max-height:80vh;overflow:auto;display:none;" id="printable_pdf">
                    
                    <!-- ---------------------------------------------------------- -->
                        <h5 class="center blue-text">PER PROVIDER <span class="right"><button class="btn blue" onclick="export_per_provider('per_provider_tbl')">&darr;</button></span></h5>
                        <!-- REPORT 1 -->
                        <div class="row col s12">
                            <div class="col s6">
                                <table class="centered" style="zoom:75%;" id="per_provider_tbl">
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
                        <h5 class="center blue-text">PER REASON
                            <span class="right">
                                <button class="btn blue" onclick="export_per_reason('per_reason_tbl')">&darr;</button>
                            </span>
                        </h5>
                        <!-- REPORT 2 -->
                        <div class="row col s12">
                            <div class="col s6">
                                <table class="centered" style="zoom:75%;" id="per_reason_tbl">
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
                        <h5 class="center blue-text">PER REASON2
                        <span class="right">
                                <button class="btn blue" onclick="export_per_reason2('per_reason2_tbl')">&darr;</button>
                            </span>
                        </h5>
                        <!-- REPORT 3 -->
                        <div class="row col s12">
                            <div class="col s4">
                                <table class="centered" style="zoom:75%;" id="per_reason2_tbl">
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
                        <h5 class="center blue-text">PER SECTION
                            <span class="right">
                                <button class="btn blue" onclick="export_per_section('per_section_tbl')">&darr;</button>
                            </span>
                        </h5>
                        <!-- REPORT 3 -->
                        <div class="row col s12">
                            <div class="col s6">
                                <table class="centered" style="zoom:75%;" id="per_section_tbl">
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

                        <!-- =--------------------------- -->
                        <div class="row divider"></div>
                        <h5 class="center blue-text">PER SECTION & REASON
                        <span class="right">
                                <button class="btn blue" onclick="export_per_section_reason('per_section_reason_tbl')">&darr;</button>
                            </span>
                        </h5>
                        <!-- REPORT 3 -->
                        <div class="row col s12">
                            <div class="col s12" id="">
                                <table class="centered" style="zoom:70%;" id="per_section_reason_tbl">
                                    <thead>
                                    <th>#</th>
                                    <th>SECTION</th>
                                    <th>AWOL</th>
                                    <th>BL</th>
                                    <th>EL</th>
                                    <th>FOR CANCEL</th>
                                    <th>ML</th>
                                    <th>PROLONG ABSENT</th>
                                    <th>SL</th>
                                    <th>SUS</th>
                                    <th>VL</th>
                                    <th>GRAND TOTAL</th>
                                    <th>LESS ML</th>
                                    </thead>
                                    <tbody id="absence_per_section_expanded"></tbody>
                                </table>
                            </div>
                            
                        </div>

                        <!-- ----------------------------------------------------------------- -->
                        <div class="row divider"></div>
                        <h5 class="center blue-text">PER PROVIDER & REASON
                            <span class="right">
                                <button class="btn blue" onclick="export_per_provider_reason('per_provider_reason_tbl')">&darr;</button>
                            </span>
                            </h5>
                        <!-- REPORT 3 -->
                        <div class="row col s12">
                            <div class="col s12" id="">
                                <table class="centered" style="zoom:70%;" id="per_provider_reason_tbl">
                                    <thead>
                                    <th>#</th>
                                    <th>PROVIDER</th>
                                    <th>AWOL</th>
                                    <th>BL</th>
                                    <th>EL</th>
                                    <th>FOR CANCEL</th>
                                    <th>ML</th>
                                    <th>PROLONG ABSENT</th>
                                    <th>SL</th>
                                    <th>SUS</th>
                                    <th>VL</th>
                                    <th>GRAND TOTAL</th>
                                    </thead>
                                    <tbody id="absence_per_provider_expanded"></tbody>
                                </table>
                            </div>
                            
                        </div>

                        <!-- ----------------------------------------------------------------- -->
                        <div class="row divider"></div>
                        <h5 class="center blue-text">QUARANTINE REPORT</h5>
                        <!-- REPORT 3 -->
                        <div class="row col s12">
                            <div class="col s6" id="">
                            <h6 class="center">WITH QUARANTINE</h6>
                                <table class="centered" style="zoom:70%;" id="">
                                    <thead>
                                    <th>PROVIDER</th>
                                    <th>TOTAL</th>
                                    <th>TOTAL ABSENT</th>
                                    <th>PERCENTAGE</th>
                                    </thead>
                                    <tbody id="absence_with_quarantine"></tbody>
                                </table>
                            </div>
                            <h6 class="center">WITHOUT QUARANTINE</h6>
                            <div class="col s6" id="">
                                <table class="centered" style="zoom:70%;" id="">
                                    <thead>
                                    <th>PROVIDER</th>
                                    <th>TOTAL</th>
                                    <th>TOTAL ABSENT</th>
                                    <th>PERCENTAGE</th>
                                    </thead>
                                    <tbody id="absence_without_quarantine"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- END MAIN RIGHT CONTAINER -->
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
            $('#spinner').css('display','block');
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

                    $('#total_absent_provider').html(eval(provider_data_count.join('+')));

                    // CALL FUNCTION GENERATE CHART FOR PER PROVIDER
                    generate_chart_per_provider(provider_data,provider_data_count);
                    setTimeout(() => {
                        load_per_reason(genFrom,genTo,genShift);
                        load_total_mp(genShift);
                    }, 500);
                  }
            });
        }

        const load_total_mp =(x)=>{
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_mp',
                    x:x
                },success:function(response){
                    console.log(response);
                    $('#total_mp_count_data').val(response);
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

                    $('#total_absent_reason').html(eval(reason_data.join('+')));

                    generate_chart_per_reason(reason_label,reason_data);
                    setTimeout(() => {
                        load_per_reason_2(x,y,z);
                    }, 500);
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

                    $('#total_absent_reason2').html(eval(reason2_data.join('+')));
                    generate_chart_per_reason2(reason2_label,reason2_data);
                    setTimeout(() => {
                        load_per_section(from,to,shift);
                    }, 500);
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
                    $('#total_absent_section').html(eval(section_data.join('+')));
                    generate_chart_per_section(section_label,section_data);
                    setTimeout(() => {
                        load_per_section_expanded(from,to,shift);
                    }, 500);
                }
            });
        }
        
        const load_per_section_expanded =(from,to,shift)=>{
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generate_absence_per_section_expanded',
                    from:from,
                    to:to,
                    shift:shift
                },success:function(response){
                    $('#absence_per_section_expanded').html(response);
                    var awol_data = [];
                    $('.per_section_reason_awol').each(function(){
                        awol_data.push($(this).html());
                    });
                    var bl_data = [];
                    $('.per_section_reason_bl').each(function(){
                        bl_data.push($(this).html());
                    });
                    var el_data = [];
                    $('.per_section_reason_el').each(function(){
                        el_data.push($(this).html());
                    });
                    var for_cancel = [];
                    $('.per_section_reason_cancel').each(function(){
                        for_cancel.push($(this).html());
                    });
                    var ml_data = [];
                    $('.per_section_reason_ml').each(function(){
                        ml_data.push($(this).html());
                    });
                    var prolong_data = [];
                    $('.per_section_reason_prolong').each(function(){
                        prolong_data.push($(this).html());
                    });
                    var sl_data = [];
                    $('.per_section_reason_sl').each(function(){
                        sl_data.push($(this).html());
                    });

                    var sus_data = [];
                    $('.per_section_reason_sus').each(function(){
                        sus_data.push($(this).html());
                    });

                    var vl_data = [];
                    $('.per_section_reason_vl').each(function(){
                        vl_data.push($(this).html());
                    });

                    var total_col = [];
                    $('.per_section_total_col').each(function(){
                        total_col.push($(this).html());
                    });

                    var less_ml_data = [];
                    $('.per_section_less_ml').each(function(){
                        less_ml_data.push($(this).html());
                    });

                    // TOTAL 
                    $('#awol_grand_total').html(eval(awol_data.join('+')));
                    $('#bl_grand_total').html(eval(bl_data.join('+')));
                    $('#el_grand_total').html(eval(el_data.join('+')));
                    $('#cancel_grand_total').html(eval(for_cancel.join('+')));
                    $('#ml_grand_total').html(eval(ml_data.join('+')));
                    $('#prolong_grand_total').html(eval(prolong_data.join('+')));
                    $('#sl_grand_total').html(eval(sl_data.join('+')));
                    $('#sus_grand_total').html(eval(sus_data.join('+')));
                    $('#vl_grand_total').html(eval(vl_data.join('+')));
                    $('#gd_grand_total').html(eval(total_col.join('+')));
                    $('#less_ml_total').html(eval(less_ml_data.join('+')));
                    // console.log(response);

                    // CALCULATE PERCENTAGE
                    var total_mp = $('#total_mp_count_data').val();
                    var grand_total = $('#gd_grand_total').html();
                    var less_ml_total = $('#less_ml_total').html();
                    var percentage_grand_total = (parseFloat(grand_total) / parseFloat(total_mp)*100);
                    var percentage_grand_total = parseFloat(percentage_grand_total.toFixed(2));
                    $('#percentage_grand_total').html(percentage_grand_total+'%');
                    // CALCULATE LESS ML PERCENTAGE
                    var less_ml_percentage = (parseFloat(less_ml_total) / parseFloat(total_mp)*100);
                    var less_ml_percentage = parseFloat(less_ml_percentage.toFixed(2));
                    $('#percentage_ml_total').html(less_ml_percentage+'%');
                    setTimeout(() => {
                        load_per_provider_reason(from,to,shift);
                    }, 500);
                }
            });
        }
        
        const load_per_provider_reason =(from,to,shift)=>{
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generate_absence_per_provider_reason_expanded',
                    from:from,
                    shift:shift,
                    to:to
                },success:function(response){
                    // console.log(response);
                    $('#absence_per_provider_expanded').html(response);
                    // GET TOTALS
                    var awol = [];
                    var bl = [];
                    var el = [];
                    var cancel =  [];
                    var ml = [];
                    var prolong = [];
                    var sl = [];
                    var sus = [];
                    var vl = [];
                    var total = [];
                    $('.provider_awol').each(function(){awol.push($(this).html());});
                    $('.provider_bl').each(function(){bl.push($(this).html());});
                    $('.provider_el').each(function(){el.push($(this).html());});
                    $('.provider_cancel').each(function(){cancel.push($(this).html());});
                    $('.provider_ml').each(function(){ml.push($(this).html());});
                    $('.provider_prolong').each(function(){prolong.push($(this).html());});
                    $('.provider_sl').each(function(){sl.push($(this).html());});
                    $('.provider_sus').each(function(){sus.push($(this).html());});
                    $('.provider_vl').each(function(){vl.push($(this).html());});
                    $('.provider_total').each(function(){total.push($(this).html());});
                    // COMPUTATION
                    $('#provider_awol_total').html(eval(awol.join('+')));
                    $('#provider_bl_total').html(eval(bl.join('+')));
                    $('#provider_el_total').html(eval(el.join('+')));
                    $('#provider_cancel_total').html(eval(cancel.join('+')));
                    $('#provider_ml_total').html(eval(ml.join('+')));
                    $('#provider_prolong_total').html(eval(prolong.join('+')));
                    $('#provider_sl_total').html(eval(sl.join('+')));
                    $('#provider_sus_total').html(eval(sus.join('+')));
                    $('#provider_vl_total').html(eval(vl.join('+')));
                    $('#provider_grand_total').html(eval(total.join('+')));
                    setTimeout(() => {
                        load_with_quarantine(from,to,shift);
                    }, 500);
                }
            });
        }

        // LOAD WITH QUARANTINE 
        const load_with_quarantine =(from,to,shift)=>{
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'load_with_quarantine',
                    from:from,
                    to:to,
                    shift:shift
                },success:function(data){
                    // console.log(data);
                    $('#absence_with_quarantine').html(data);
                    var total_mp = [];
                    var absent_count = [];
                    $('.q_total_mp_per_provider').each(function(){
                        total_mp.push($(this).html());
                    });
                    $('.q_total_mp_absent_provider').each(function(){
                        absent_count.push($(this).html());
                    });

                    // SUM OF COLUMNS
                    $('#q_total_mp').html(eval(total_mp.join('+')));
                    $('#q_total_absent').html(eval(absent_count.join('+')));
                    //GRAND TOTAL AVERAGE
                    var grand_total_mp = $('#q_total_mp').html();
                    var grand_total_absent = $('#q_total_absent').html();
                    // PER = TOTAL ABSENT / TOTAL MP
                    var percentage = parseFloat((grand_total_absent / grand_total_mp)*100);
                    var percentage = parseFloat(percentage.toFixed(2));
                    $('#q_total_percentage').html(percentage+'%');
                    setTimeout(() => {
                        load_without_quarantine(from,to,shift);
                    }, 500);
                }
            });
        }

        // LOAD WITHOUT QUARANTINE
        const load_without_quarantine =(from,to,shift)=>{
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'load_without_quarantine',
                    from:from,
                    to:to,
                    shift:shift
                },success:function(response){
                    $('#absence_without_quarantine').html(response);
                    // console.log(response);
                    var nq_mp_count = [];
                    var nq_absent_count = [];
                    $('.nq_total_mp_per_provider').each(function(){
                        nq_mp_count.push($(this).html());
                    });
                    $('.nq_total_mp_absent_provider').each(function(){
                        nq_absent_count.push($(this).html());
                    });
                    //SUM OF COLUMNS
                    $('#nq_total_mp').html(eval(nq_mp_count.join('+')));
                    $('#nq_total_absent').html(eval(nq_absent_count.join('+')));
                    // AVERAGE GRAND TOTAL
                    var grand_total_mp = $('#nq_total_mp').html();
                    var grand_total_absent = $('#nq_total_absent').html();
                    // AVE = ABSENT / TOTAL MP
                    var average = parseFloat((grand_total_absent / grand_total_mp)*100);
                    var average = parseFloat(average.toFixed(2));
                    $('#nq_total_percentage').html(average+'%');
                    $('#spinner').fadeOut(function(){
                        $('#dashboard').fadeIn();
                    });
                   
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


        // EXPORT 
        const export_excel =()=>{
          
        }
        // EXPORT PER PROVIDER
        function export_per_provider(table_id, separator = ',') {
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
            var filename = 'Absent Report per Provider'+ '_' + new Date().toLocaleDateString() + '.csv';
            var link = document.createElement('a');
            link.style.display = 'none';
            link.setAttribute('target', '_blank');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
            link.setAttribute('download', filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
    }   
        //EXPORT PER REASON
        function export_per_reason(table_id, separator = ',') {
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
            var filename = 'Absent Report per Reason'+ '_' + new Date().toLocaleDateString() + '.csv';
            var link = document.createElement('a');
            link.style.display = 'none';
            link.setAttribute('target', '_blank');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
            link.setAttribute('download', filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
    }
        // EXPORT PER REASON2
        function export_per_reason2(table_id, separator = ',') {
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
            var filename = 'Absent Report per Reason2'+ '_' + new Date().toLocaleDateString() + '.csv';
            var link = document.createElement('a');
            link.style.display = 'none';
            link.setAttribute('target', '_blank');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
            link.setAttribute('download', filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
    }
    // EXPORT PER SECTION
    function export_per_section(table_id, separator = ',') {
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
            var filename = 'Absent Report per Section'+ '_' + new Date().toLocaleDateString() + '.csv';
            var link = document.createElement('a');
            link.style.display = 'none';
            link.setAttribute('target', '_blank');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
            link.setAttribute('download', filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
    }
    // EXPORT PER SECTION REASON
    function export_per_section_reason(table_id, separator = ',') {
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
            var filename = 'Absent Report per Section and Reason'+ '_' + new Date().toLocaleDateString() + '.csv';
            var link = document.createElement('a');
            link.style.display = 'none';
            link.setAttribute('target', '_blank');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
            link.setAttribute('download', filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
    }
    // EXPORT PER PROVIDER AND REASON
    function export_per_provider_reason(table_id, separator = ',') {
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
            var filename = 'Absent Report per Section and Reason'+ '_' + new Date().toLocaleDateString() + '.csv';
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