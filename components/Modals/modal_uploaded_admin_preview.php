<div class="modal bottom-sheet" id="modal_admin_preview" style="min-height:100vh;">
    <div class="modal-footer">
    <button class="modal-close right btn-flat" style="font-size:20px;">&times;</button>
    </div>

    <div class="modal-content">
        
        <div class="row" style="margin-top:-5%;">
            <h5 class="center">UPLOADED ABSENT</h5>
            <div class="col s12">
                <div class="col s3 input-field">
                    <input type="text" id="absent_from_date" class="datepicker" value="<?=$server_date;?>"><label for="">Absent From:</label>
                </div>

                <div class="col s3 input-field">
                    <input type="text" id="absent_to_date" class="datepicker" value="<?=$server_date;?>"><label for="">Absent To:</label>
                </div>

                <div class="col s2 input-field ">
                    <select name="" id="shift_filter" class="browser-default z-depth-4">
                    <option value="">ALL SHIFT</option>
                    <option value="DS">DS</option>
                    <option value="NS">NS</option>
                    </select>
                </div>

                <div class="col s2 input-field">
                    <select name="" id="section_filter" class="browser-default z-depth-5">
                    <option value="">ALL SECTION</option>
                        <?php
                            $sql = "SELECT DISTINCT deptSection FROM aris_department";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){
                                echo '<option value="'.$x['deptSection'].'">'.$x['deptSection'].'</option>';
                            }
                            ?>
                    </select>
                </div>

                <div class="col s2 input-field">
                    <button class="col s12 btn blue" onclick="load_uploaded_absent()">Generate</button>
                </div>
                
                <div class="col s2 input-field">
                    <button class="col s12 btn blue" onclick="export_uploaded()">Export</button>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col s4">
                <button class="btn-small red" disabled id="delete_absent" onclick="del_selected_data()">DELETE &times;</button>
            </div>
            <div class="col s12 collection" style="height:70vh;overflow:auto;">
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
                    <tbody id="filed_data_admin"></tbody>
                </table>
            </div>
        </div>

    </div>
</div>