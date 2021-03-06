<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR-ARIS</title>
    <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
    <link rel="shortcut icon" href="assets/logo/bio.png" type="image/x-icon">
    <style>
       tbody tr{
            font-weight:bold;
            color:red;
        }
    </style>
</head>
<body style="overflow:hidden;">
    <!-- CONTENT -->
    <nav class="blue darken-3" id="1565c0">
        <center style="font-size:25px;" class="hide-on-med-and-down">Absenteeism Report Information System - ARIS</center>
        <center style="font-size:25px;" class="hide-on-med-and-up">ARIS</center>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="col l8 m12 s12 hide-on-med-and-down center">
                <!-- <img src="assets/logo/bio.png" alt="login_background" class="responsive-img" style="min-height:100vh;object-fit:cover;"> -->
                <div class="col s12" style="overflow:auto;height:90vh;" id="data_render">
                <?php
                    // include 'function/conn.php';
                        // echo '<table border="1">';
                        // echo '<thead>';
                        // echo '<th>SECTION WITH NO ABSENT FILED AS OF '.$server_date.'</th>';
                        // echo '<tbody>';
                        // // SELECT SECTION WITH FILE
                        // $get_section = "SELECT section,carmodel_group FROM aris_absent_filing WHERE date_upload = '$server_date'";
                        // $stmt = $conn->prepare($get_section);
                        // $stmt->execute();
                        // if($stmt->rowCount() > 0){
                        //     foreach($stmt->fetchALL() as $x){
                        //         if($x['section'] == 'N/A' || $x['section'] == 'Vietnamese Officers')continue;
                        //         $sub = $x['carmodel_group'];
                        //         // SELECT ALL SECTION THEN SKIP THE SECTION WITH ABSENT FILED 
                        //         $select_sec = "SELECT DISTINCT deptSection,deptCode FROM aris_users ORDER BY deptSection ASC";
                        //         $stmt = $conn->prepare($select_sec);
                        //         $stmt->execute();
                        //         foreach($stmt->fetchall() as $d){
                        //             if($d['deptSection'] == $sub || $d['deptSection'] == 'N/A' || $d['deptSection'] == 'HR')continue;
                        //             if($d['deptSection'] == ''){
                        //                 $concern = $d['deptCode'];
                        //             }else{
                        //                 $concern = $d['deptCode'].'-'.$d['deptSection'];
                        //             }
                        //             echo '<tr>';
                        //             echo '<td>'.$concern.'</td>';
                        //             echo '</tr>';
                        //         }
                        //     }
                        // }
                        // echo '</tbody>';
                        // echo '</table>';
                    ?>
                </div>
            </div>

            <!-- LOGIN -->
            <div class="col l4 m12 s12">
                <h4 class="center">Login</h4>
                <form action="" method="post">
                    <!-- USERNAME -->
                    <div class="col s12 input-field">
                        <input type="text" name="username" id="username" autocomplete="off"><label for="username">Username</label>
                    </div>
                    <!-- PASSWORD -->
                    <div class="input-field col s12">
                        <input type="password" name="password" id="password" autocomplete="off"><label for="password">Password</label>
                    </div>
                    <!-- BUTTON -->
                    <div class="input-field col s12">
                        <input type="submit" id="loginbtn" value="login" name="login_session" class="btn-large col s12  blue" id="login_btn">
                    </div>

                </form>
                <center class="red-text" style="font-weight:bold;"><?php include 'function/server.php';?></center>
            </div>
        </div>
    </div>

    
    <!-- /CONTENT -->

    <!-- JS & JQUERY -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            inactive_file();
        });
        function inactive_file(){
            $.post({
                url: 'function/controller.php',
                cache: false,
                data:{
                    method: 'get_withno_file'
                },success:function(response){
                    $('#data_render').html(response);
                }
            });
        }
    </script>
</body>
</html>