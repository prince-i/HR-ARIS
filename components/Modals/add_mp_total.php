<div class="modal" id="add_mp_total" style="width:40%;">
    <div class="modal-footer">
        <button class="modal-close right btn-flat" style="font-size:20px;">&times;</button>
        </div>
    <div class="modal-content">
        <div class="row">
        <h5 class="center">CREATE NEW MP COUNT</h5>
            <div class="col s12">
                <div class="col s6 input-field">
                    <select name="" id="mp_count_agency_code" class="browser-default z-depth-3">
                        <option value="">SELECT AGENCY</option>
                        <?php
                        $agency = "SELECT agencyCode FROM aris_agency";
                        $stmt = $conn->prepare($agency);
                        $stmt->execute();
                        foreach($stmt->fetchALL() as $x){
                            echo '<option value="'.$x['agencyCode'].'">'.$x['agencyCode'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col s6 input-field">
                    <select name="" id="mp_count_shift" class="browser-default z-depth-3">
                        <option value="">SELECT SHIFT</option>
                        <?php
                        $agency = "SELECT * FROM aris_shift";
                        $stmt = $conn->prepare($agency);
                        $stmt->execute();
                        foreach($stmt->fetchALL() as $x){
                            echo '<option value="'.$x['shift_code'].'">'.$x['shift_desc'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col s12 input-field">
                    <input type="number" id="mp_count_total" min="0"><label for="">MP COUNT</label>
                </div>
                
                <div class="col s12 input-field">
                    <button class="btn #0277bd light-blue darken-4 waves-effect light-waves" onclick="save_mp_count()">save &rarr;</button>
                </div>

            </div>
        </div>
    </div>
</div>