<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../assets/logo/bio.png" type="image/x-icon">   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARIS - CLERK DASHBOARD</title>
    <?php
    require '../function/session.php';
    if($_SESSION['role'] != 'clerk'){
        session_unset();
        session_destroy();
        header('location:../index.php');
    }
    include '../components/Modals/modal_logout.php';
    include '../components/Modals/modal_upload_absent.php';
    include '../components/Modals/modal_file_absent.php';
    ?>
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
</head>
<body>
    <div class="navbar-fixed">
        <nav class="blue darken-3 z-depth-3">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">HR-ARIS (Clerk Dashboard) </a>
            <ul class="right hide-on-med-and-down">
            <!-- <li><a href="sass.html">Sass</a></li> -->
            <li><a href="#modal_logout" class="modal-trigger z-depth-5"><?=$fullname;?></a></li>
            </ul>
        </div>
        </nav>
  </div>
  <input type="hidden" name="" id="deptcode" value="<?=$deptCode;?>">
  <input type="hidden" name="" id="handleemp" value="<?=$handle;?>">
  <!-- CONTENT -->
    <div class="row">
        <div class="col s12 z-depth-5">
            
            <!-- DATE FROM -->
                <div class="col s2 input-field ">
                    <input type="text" class="datepicker" placeholder="Date From">
                </div>
            <!-- DATE TO -->
                <div class="col s2 input-field">
                    <input type="text" class="datepicker" placeholder="Date To">
                </div>
                <!-- BUTTON -->
            <div class="col s1 input-field">
                <button id="search_btn" class="btn-large blue z-depth-5" style="border-radius:30px;">Search</button>    
            </div>
            <!-- BLANK -->

            <div class="col s2 right input-field">
                <button id="search_btn" class="btn-large blue col s12 z-depth-5 modal-trigger" style="border-radius:30px;" data-target="modal_upload_absent">Upload Absent</button>    
            </div>
        </div>
        <div class="col s12 divider"></div>
        <!-- <div class="col s5 input-field">
            <button id="file_absent_btn" class="btn-large blue z-depth-5 modal-trigger" style="border-radius:30px;" data-target="modal-file-absent" onclick="load_emp()">File Absent</button>    
        </div> -->
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
            load_today_file();
        });

    </script>
    <script src="../components/JS/main.js"></script>
</body>
</html>