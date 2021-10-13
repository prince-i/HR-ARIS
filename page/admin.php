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
                            <button class="btn #448aff blue accent-2 col s12 waves-effect waves-light" onclick="load_absence_report()">generate</button>
                        </div>
                        
                        <!-- UPLOAD -->
                        <div class="col s2 input-field">
                            <button class="btn #01579b light-blue darken-4 col s12 waves-effect waves-light modal-trigger" data-target="modal_upload_absent" onclick="">upload</button>
                        </div>
                        <!-- PREVIEW UPLOADED DATA -->
                        <div class="col s2 input-field">
                            <button class="btn modal-trigger col s12 #81d4fa light-blue lighten-3 black-text" data-target="modal_admin_preview" onclick="load_uploaded_absent()">Preview Uploaded</button>
                        </div>

                        <!-- EXPORT -->
                        <div class="col s1 input-field">
                            <button class="btn #2196f3 blue col s12 waves-effect waves-light" onclick="export_absent_report()">&darr;</button>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <h5 class="center blue-text">ABSENCES REPORT</h5>
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
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoClose: true
            });
            load_absence_report();
        });

        const load_absence_report =()=>{
            var genFrom = $('#generatedateFrom').val();
            var genShift = $('#generateShift').val();
            
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'generateAbsence',
                    genFrom:genFrom,
                    genShift:genShift
                },success:function(response){
                    $('#absences_data_render').html(response);
                    // console.log(response);
                }
            });
        }

        const load_uploaded_absent =()=>{
            var absent_from = $('#absent_from_date').val();
            var absent_to = $('#absent_to_date').val();
            var shift = $('#shift_filter').val();
            var section = $('#section_filter').val();
            $.ajax({
                url :'../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'uploaded_absent_admin',
                    absent_from:absent_from,
                    absent_to:absent_to,
                    shift:shift,
                    section:section
                },success:function(response){
                    // console.log(response);
                    $('#filed_data_admin').html(response);
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
                        load_uploaded_absent();
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

    // /EXPORT
    const export_absent_report =()=>{
        var absent_date = $('#generatedateFrom').val();
        var shift = $('#generateShift').val();
        window.open('export_absent_report.php?absent_date='+absent_date+'&&shift='+shift,'_blank');
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

    // UPDATE FILED ABSENT BY ADMIN
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
                url :'../function/admin-controller.php',
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
                        load_uploaded_absent();
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