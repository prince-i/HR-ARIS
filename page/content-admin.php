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
            <!-- SIDE LINKS -->
            <?php include 'side-nav-admin.php';?>

            <!-- CONTAINER -->
            <div class="col l10 m10 s10">
                <div class="collection" id="container">
                <div class="row">
                    <h5 class="center blue-text">CONTENT MANAGEMENT</h5>
                    <div class="col s12">
                    <div class="row">
                    <!-- CARD 1 AGENCY -->
                        <div class="col s12 m6">
                        <div class="card z-depth-5" style="height:70vh;overflow:auto;">
                            <div class="card-content" style="">
                            <span class="card-title center">AGENCY <button class="btn right #0277bd light-blue darken-4 waves-effect light-waves z-depth-5">&plus;</button></span>
                            <table style="zoom:75%;">
                                <thead>
                                    <th>AGENCY CODE</th>
                                    <th>AGENCY NAME</th>
                                </thead>
                                <tbody id="agency_list"></tbody>
                            </table>
                        </div>
                        </div>
                        </div>
                    <!-- CARD 2 REASON -->
                        <div class="col s12 m6">
                        <div class="card z-depth-5" style="height:70vh;overflow:auto;">
                            <div class="card-content">
                            <button class="btn right #0277bd light-blue darken-4 waves-effect light-waves z-depth-5">&plus;</button>
                            <span class="card-title center">REASON
                            <input type="text" name="" id="reason_keyword" onchange="load_reason()">
                            
                            </span>
                            <table style="zoom:75%;">
                                <thead>
                                    <th>CATEGORY</th>
                                    <th>DESCRIPTION</th>
                                </thead>
                                <tbody id="reason_list"></tbody>
                            </table>
                        </div> 
                        </div>
                        </div>
                    <!-- CARD 3 DEPARTMENT -->
                        <div class="col s12 m12">
                        <div class="card z-depth-5" style="height:70vh;overflow:auto;">
                            <div class="card-content">
                            <button class="btn right #0277bd light-blue darken-4 waves-effect light-waves z-depth-5">&plus;</button>
                            <span class="card-title center">DEPARTMENT
                            <input type="text" name="" id="dept_keyword" onchange="load_dept()">
                            </span>
                            
                            <table>
                                <thead>
                                    <th>DEPT CODE</th>
                                    <th>SECTION</th>
                                    <th>SUBSECTION</th>
                                </thead>
                                <tbody id="department_list"></tbody>
                            </table>
                        </div>
                        </div>
                        </div>
                     <!-- END OF CARD -->



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
            load_agency_list();
        });

        const load_agency_list =()=>{
             $.ajax({
                 url: '../function/admin-controller.php',
                 type: 'POST',
                 cache: false,
                 data:{
                     method: 'load_agency'
                 },success:function(response){
                    $('#agency_list').html(response);
                    setTimeout(() => {
                        load_reason();
                    }, 300);
                 }
             });
        }

        const load_reason =()=>{
            var keyword = $('#reason_keyword').val();
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'load_reason',
                    keyword:keyword
                },success:function(response){
                    $('#reason_list').html(response);
                    load_dept();
                }
            });
        }


        const load_dept =()=>{
            var keyword = $('#dept_keyword').val();
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'load_dept',
                    keyword:keyword
                },success:function(response){
                    $('#department_list').html(response);
                }
            });
        }
    </script>
</body>

</html>