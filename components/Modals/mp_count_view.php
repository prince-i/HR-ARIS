<div class="modal" id="modal_mp_view">
<div class="modal-footer">
    <button class="modal-close right btn-flat" style="font-size:20px;">&times;</button>
</div>
<div class="modal-content">
    <div class="row">
        <div class="col s12">
            <input type="hidden" id="mp_id">
            <div class="col s6 input-field">
                <b>SHIFT:</b>
                <input type="text" id="mp_shift" disabled>
            </div>
            <div class="col s6 input-field">
                <b>AGENCY:</b>
                <input type="text" id="mp_agency" disabled>
            </div>
            <div class="col s12 input-field">
                <b>MP COUNT:</b>
                <input type="number" name="" id="mp_count_val" min="0">
            </div>

            <div class="col s6 input-field">
                <button class="btn blue col s12" onclick="update_mp_data()">update</button>
            </div>

            <div class="col s6 input-field">
                <button class="btn red col s12" onclick="delete_mp_data('mp_id')">delete</button>
            </div>

        </div>
    </div>
</div>
</div>