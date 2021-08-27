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
                    <input type="text" class="datepicker" id="dateFrom" placeholder="Date From" value="<?=date('Y-m-d')?>">
                </div>

            <!-- DATE TO -->
                <div class="col s2 input-field">
                    <input type="text" class="datepicker" id="dateTo" placeholder="Date To" value="<?=date('Y-m-d')?>">
                </div>

            <!-- SHIFT -->
                <div class="col s2 input-field">
                    <select name="" id="shiftFilter" class="browser-default z-depth-3">
                        <option value="">--SELECT SHIFT--</option>
                        <option value="DS">DS</option>
                        <option value="NS">NS</option>
                    </select>
                </div>

                <!-- BUTTON -->
            <div class="col s1 input-field">
                <button id="search_btn" class="btn-large blue z-depth-5" style="border-radius:30px;" onclick="load_filed_absent()">Search</button>    
            </div>

            <!-- BLANK -->
            <div class="col s2 right input-field">
                <button id="search_btn" class="btn-large blue col s12 z-depth-5 modal-trigger" style="border-radius:30px;" data-target="modal_upload_absent">Upload Absent</button>    
            </div>
        </div>
        <div class="col s12 divider"></div>
    </div>

    <div class="row">
        <div class="col s12">
            <table class="centered">
                <thead>
                    <th>
                        <p>
                        <label>
                            <input type="checkbox" name="" id="checkAllAbsent" class=""value="'.$x['id'].'" onclick="select_all_file()">
                            <span></span>
                        </label>
                    </p>
                    </th>
                    <th>PROVIDER</th>
                    <th>EMPLOYEE ID</th>
                    <th>NAME</th>
                    <th>SECTION</th>
                </thead>
                <tbody id="filed_data"></tbody>
            </table>
        </div>
    </div>


    <!-- JS & JQUERY -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script>
    console.log('%cRESTRICTED VIEW, YOU ARE MONITORED','color:red;font-size:20px;');
         $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoClose: true
            });
            $('.modal').modal();
            load_filed_absent();
        });

    const load_emp =()=>{
        deptCode = $('#deptcode').val();
        handleEmp = $('#handleemp').val();
        $.ajax({
            url : '../function/controller.php' ,
            type: 'POST',
            cache: false,
            data:{
                method:'filter_emp',
                deptCode: deptCode,
                handleEmp:handleEmp
            },success:function(response){
                document.querySelector('#emp_data').innerHTML = response;
            }
        });
    }

    const load_filed_absent =()=>{
        var dateFrom = $('#dateFrom').val();
        var dateTo = $('#dateTo').val();
        var shift = $('#shiftFilter').val();
        $.ajax({
            url : '../function/controller.php',
            type: 'POST',
            cache: false,
            data:{
                method: 'load_file_history',
                dateFrom:dateFrom,
                dateTo:dateTo,
                shift:shift
            },success:function(response){  
                $('#filed_data').html(response);
            } 
        });
    }

    // CHECK ALL
    const select_all_file =()=>{
        var checked_all = document.getElementById('checkAllAbsent');
        if(check_all.checked == true){
            $('.singleCheckFile').each(function(){
                this.checked =true;
            });
        }else{
            $('.singleCheckFile').each(function(){
                this.checked = false;
            });
        }
        get_checked_length();
    }

    // GET CHECKED ITEMS
    const get_checked_length =()=>{
        var checkArr = [];
        $('input.singleCheckFile:checkbox:checked').each(function(){
            checkArr.push($(this).val());
        });
    }

</script>
</body>
</html>