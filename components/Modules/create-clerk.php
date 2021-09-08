<div class="col s12">
<h5 class="center">CLERK REGISTRATION</h5>
<div class="col s4 input-field">
    <input type="text" name="" id="usernameNew"><label for="">Username</label>
</div>
<!-- PASSWORD -->
<div class="col s4 input-field">
    <input type="text" name="" id="passwordNew"><label for="">Password</label>
</div>
<!-- DEPTCODE -->
<div class="col s4 input-field">
    <select name="" id="deptCodeNew" class="browser-default z-depth-4" onchange="load_dept_section_clerk()">
        <option value="">DEPT CODE</option>
    </select>
</div>
</div>

<div class="col s12">
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