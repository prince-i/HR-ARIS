<!-- 1ST ROW ---------------------------------------------------------->

<div class="col s12">
    <h5 class="center">CLERK REGISTRATION</h5>
    <!-- USERNAME -->
    <div class="col s4 input-field">
        <input type="text" name="" id="usernameNew"><label for="">Username</label>
    </div>
    <!-- PASSWORD -->
    <div class="col s4 input-field">
        <input type="text" name="" id="passwordNew"><label for="">Password</label>
    </div>
    <!-- USER FULLNAME -->
    <div class="col s4 input-field">
        <input type="text" name="" id="fullnameNew"><label for="">Full Name</label>
    </div>
</div>

<!-- 2ND ROW ---------------------------------------------------------->
<div class="col s12">
    <!-- DEPTCODE -->
    <div class="col s4 input-field">
        <select name="" id="deptCodeNew" class="browser-default z-depth-4" onchange="load_dept_section_clerk()">
            <option value="">DEPT CODE</option>
        </select>
    </div>

    <!-- DEPT SECTION -->
    <div class="col s4 input-field">
        <select name="" id="deptSectionNew" class="browser-default z-depth-4" onchange="load_dept_subsection_clerk()">
            <option value="">SECTION</option>
        </select>
    </div>

    <!-- SUBSECTION -->
    <div class="col s4 input-field">
        <select name="" id="deptSubSectionNew" class="browser-default z-depth-4" onchange="">
            <option value="">SUB-SECTION</option>
        </select>
    </div>
</div>

<!-- 3RD ROW -->
<div class="col s12">
    <div class="col s12 input-field">
        <button class="btn blue col s12 btn-large waves-effect waves-light" onclick="createNewClerkUser()">CREATE USER</button>
    </div>
</div>