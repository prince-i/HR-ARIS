<div class="modal" id="change_password_user_modal">
<div class="modal-footer">
    <button class="btn-flat modal-close" style="font-size:20px;font-weight:bold;">&times;</button>
</div>
<div class="modal-content">
<div class="row">
<div class="col s12">
<h5 class="center">EDIT USER</h5>
<input type="hidden" id="userIDPrev">
<div id="prevUserData"></div>
<div class="col s12 input-field">
    <input type="text" name="" id="newPasswordUpdate">
    <label for="">New Password:</label>
</div>
<div class="col s6 input-field">
    <button class="btn btn-large #2979ff blue accent-3 col s12" onclick="updatePassword()">update password</button>
</div>
<div class="col s6 input-field">
    <button class="btn btn-large red col s12" onclick="removeUser()">delete account</button>
</div>
</div>
</div>
</div>
</div> 