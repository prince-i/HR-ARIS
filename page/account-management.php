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
    include '../components/Modals/add-user-menu.php';
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
                        <!-- USERNAME -->
                        <div class="col s2 input-field">
                            <input type="text" name="" id="searchUserName"><label for="">USERNAME</label>
                        </div>

                        <!-- FULLNAME -->
                        <div class="col s2 input-field">
                            <input type="text" name="" id="searchName"><label for="">FULLNAME</label>
                        </div>

                        <!-- ROLE -->
                        <div class="col s2 input-field">
                            <select name="" id="searchRole" class="browser-default z-depth-3">
                                <option value="">ROLE</option>
                                <option value="admin">ADMIN</option>
                                <option value="clerk">CLERK</option>
                                <option value="coordinator">COORDINATOR</option>
                            </select>
                        </div>

                        <!-- SECTION -->
                        <div class="col s2 input-field">
                            <select name="" id="searchSection" class="browser-default z-depth-3">
                                <option value="">SECTION</option>
                            </select>
                        </div>
                        
                        <!-- GENERATE -->
                        <div class="col s2 input-field">
                            <button class="btn blue btn-large col s12" onclick="generateUser()">generate</button>
                        </div>

                        <!-- CREATE USER -->
                        <div class="col s2 input-field">
                            <button class="btn #2196f3 blue btn-large col s12 modal-trigger" onclick="load_create_account_menu()" data-target="modal-add-user-menu">&plus; User</button>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <h5 class="center blue-text">HR-ARIS SYSTEM ACCOUNTS</h5>
                        <div class="col s12" style="max-height:70vh;overflow:auto;">
                            <table class="centered" style="zoom:75%;">
                                <thead>
                                <th>#</th>
                                <th>USERNAME</th>
                                <th>FULLNAME</th>
                                <th>ROLE</th>
                                <th>DEPTCODE</th>
                                <th>SECTION</th>
                                <th>SUBSECTION</th>
                                </thead>
                                <tbody id="users_data_render"></tbody>
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
            load_section();
            generateUser();
        });

        const load_section =()=>{
            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'load_section_master'
                },success:function(data){
                    // console.log(data);
                    document.getElementById('searchSection').innerHTML = data;
                }
            });
        }

        const generateUser =()=>{
            var username = document.getElementById('searchUserName').value;
            var fullname = document.getElementById('searchName').value;
            var role = document.getElementById('searchRole').value;
            var section = document.getElementById('searchSection').value;

            $.ajax({
                url: '../function/admin-controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetchUsers',
                    username:username,
                    fullname:fullname,
                    role:role,
                    section:section
                },success:function(response){
                    // console.log(response);
                    document.getElementById('users_data_render').innerHTML = response;
                }
            });
        }

        const load_create_account_menu =()=>{
            $('#renderAddUserForm').load('../components/Modules/create-account-menu.php');
        }

        const load_clerk_user_form =()=>{
            $('#renderAddUserForm').load('../components/Modules/create-clerk.php');
        }
       
    </script>
</body>

</html>