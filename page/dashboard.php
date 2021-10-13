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
    include '../components/Modals/edit_uploaded_clerk.php';
   
    // echo $username;
    // echo $deptCode;
    // echo $deptSection;
    // echo $deptSubSection;

    ?>
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <style>
        div::-webkit-scrollbar {
            width: 0.6em;
        }
        
        div::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
        
        div::-webkit-scrollbar-thumb {
            background-color: darkgrey;
            outline: 1px solid darkgrey;
        }
        body::-webkit-scrollbar {
            width: 0.6em;
        }
        
        body::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
        
        body::-webkit-scrollbar-thumb {
            background-color: darkgrey;
            outline: 1px solid darkgrey;
        }  
    </style>

</head>
<body>
    <div class="navbar-fixed">
        <nav class="blue darken-3 z-depth-3">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">HR-ARIS (Clerk Dashboard) </a>
            <ul class="right hide-on-med-and-down">
            <li><a target="_blank" href="reason_code_ref.php">Reference</a></li>
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
                        <option value="">COMBINE SHIFT</option>
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
        <div class="col s4">
            <button class="btn-small red" disabled id="delete_absent" onclick="del_selected_data()">DELETE &times;</button>
        </div>
        <div class="col s12" style="overflow:auto;height:65vh;position:relative;">
            <table class="centered" style="zoom:80%;">
                <thead style="font-size:12px;">
                    <th>
                        <p>
                        <label>
                            <input type="checkbox" name="" id="checkAllAbsent" class="" value="" onclick="select_all_file()">
                            <span></span>
                        </label>
                    </p>
                    </th>
                    <th>PROVIDER</th>
                    <th>EMPLOYEE ID</th>
                    <th>NAME</th>
                    <th>POSITION</th>
                    <th>SECTION</th>
                    <th>CARMODEL/GROUP</th>
                    <th>PROCESS/LINE</th>
                    <th>REASON</th>
                    <th>REASON2</th>
                    <th>FILED BY</th>
                    <th>ABSENT DATE</th>
                    <th>NUMBER OF ABSENT</th>
                    <th>SHIFT</th>
                    <th>DATE UPLOAD</th>
                </thead>
                <tbody id="filed_data"></tbody>
            </table>
        </div>
    </div>


    <!-- JS & JQUERY -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
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
        var section = '<?=$deptSection?>';
        var subsection = '<?=$deptSubSection;?>';
        // console.log(section);
        $.ajax({
            url : '../function/controller.php',
            type: 'POST',
            cache: false,
            data:{
                method: 'load_file_history',
                dateFrom:dateFrom,
                dateTo:dateTo,
                shift:shift,
                section:section,
                subsection:subsection
            },success:function(response){  
                $('#filed_data').html(response);
            } 
        });
    }

    // CHECK ALL
    const select_all_file =()=>{
        var checked_all = document.getElementById('checkAllAbsent');
        
        if(checked_all.checked == true){
            $('.singleCheckFile').each(function(){
                this.checked = true;
            });
        }else{
            $('.singleCheckFile').each(function(){
                this.checked = false;
            });
        }
        get_checked_item();
    }

    // GET CHECKED ITEMS AND LENGTH
    const get_checked_item =()=>{
        var checkArr = [];
        $('input.singleCheckFile:checkbox:checked').each(function(){
            checkArr.push($(this).val());
        });
        var number_selected =  checkArr.length;
        console.log(checkArr);
        if(number_selected > 0){
            $('#delete_absent').attr('disabled',false);
        }else{
            $('#delete_absent').attr('disabled',true);
        }
    }

    // GET SELECTED DATA ID
    const del_selected_data =()=>{
        var items = [];
        $('input.singleCheckFile:checkbox:checked').each(function(){
            items.push($(this).val());
        });

        console.log(items);
        if(items.length > 0){
            // RUN AJAX
            $.ajax({
                url: '../function/controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'deleteFileClerk',
                    items:items
                },success:function(x){
                    console.log(x);
                    if(x == 'deleted'){
                        load_filed_absent();
                        swal('Done','Successfully deleted!','success');
                    }else{
                        swal('Sorry','An error was occured!','error');
                    }
                    $('#delete_absent').attr('disabled',true);
                    $('#checkAllAbsent:checkbox').attr('checked',false);
                }
            });
        }else{
            console.log('NO ITEM/S SELECTED');
        }
    }

    const getToEdit =(param)=>{
        // console.log(param);
        var str = param.split('*!*');
        var id = str[0];
        var provider = str[1];
        var employee_id = str[2];
        var name = str[3];
        var section = str[4];
        var carmodelGroup = str[5];
        var process_line = str[6];
        var reason = str[7];
        var reason2 = str[8];
        var absent_date = str[9];
        var shift = str[10];
        var number_of_absent = str[11];

        // DISTRIBUTING VALUES
        $('#edit_id_absent').val(id);
        $('#providerPrev').html(provider);
        $('#employeeIDPrev').html(employee_id);
        $('#employeeName').html(name);
        $('#sectionPrev').html(section);
        $('#carmodelGroupPrev').html(carmodelGroup);
        $('#processLinePrev').html(process_line);
        $('#reasonPrev').html(reason);
        $('#reason2Prev').html(reason2);
        $('#date_absentPrev').val(absent_date);
        $('#shiftPrev').val(shift);
        $('#number_absent_prev').val(number_of_absent);
        var server_date = '<?=$server_date;?>';
        if(absent_date < server_date) {
            // console.log('cant edit');
            $('#date_absentPrev').attr('disabled',true);
            $('#shiftPrev').attr('disabled',true);
            $('#number_absent_prev').attr('disabled',true);
            $('#edit_absent_btn').attr('disabled',true);
            $('#edit_absent_btn').html('uneditable');
        }else{
            // console.log('editable');
            $('#date_absentPrev').attr('disabled',false);
            $('#shiftPrev').attr('disabled',false);
            $('#number_absent_prev').attr('disabled',false);
            $('#edit_absent_btn').attr('disabled',false);
            $('#edit_absent_btn').html('update');
        }
    }

    // UPDATE ABSENTEE
    const update_absent_detail =()=> {
        var emp_id = $('#employeeIDPrev').html();
        var up_id = $('#edit_id_absent').val();
        var up_number_absent = $('#number_absent_prev').val();
        var up_date_absent = $("#date_absentPrev").val();
        var up_shift = $('#shiftPrev').val();
        if(up_number_absent == ''){
            swal('Alert','Please enter number of absences!','info');
        }else if(up_date_absent == ''){
            swal('Alert','Please select the absent date!','info');
        }else{
            // AJAX
            $.ajax({
                url :'../function/controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'update_absentee',
                    up_id:up_id,
                    up_number_absent:up_number_absent,
                    up_date_absent:up_date_absent,
                    up_shift:up_shift,
                    emp_id:emp_id
                },success:function(response){
                    console.log(response);
                    if(response == 'success'){
                        swal('Notice','Successfully updated!','success');
                        load_filed_absent();
                        $('.modal').modal('close','#modal_edit_absent_file');
                    }
                    else{
                        swal('Notice','Error in updating!','error');
                    }
                }
            });
        }
    }


</script>
</body>
</html>