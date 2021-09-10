<div class="col s12">
    <h5 class="center">COORDINATOR REGISTRATION</h5>
    <!-- USERNAME -->
    <div class="col s4 input-field">
        <input type="text" name="" id="coordinatorUsernameNew"><label for="">Username</label>
    </div>
    <!-- PASSWORD -->
    <div class="col s4 input-field">
        <input type="text" name="" id="coordinatorPassNew"><label for="">Password</label>
    </div>
    <!-- FULLNAME -->
    <div class="col s4 input-field">
        <input type="text" name="" id="coordinatorNameNew"><label for="">Full Name</label>
    </div>
</div>

<!-- 2ND ROW -->
<div class="col s12">
    <div class="col s4 input-field">
        <select name="" id="coordinatorAgencyCode" class="browser-default z-depth-4" onchange="getAgencyDesc()">
        <option value="">AGENCY CODE</option>
        </select>
    </div>
    <div class="col s8 input-field">
        <input type="text" name="" id="coordinatorDescNew" disabled>
    </div>
</div>

<div class="col s12">
    <div class="col s12 input-field">
        <button class="btn blue col s12 btn-large waves-effect waves-light" onclick="createNewCoordinator()">CREATE USER</button>
    </div>
</div>