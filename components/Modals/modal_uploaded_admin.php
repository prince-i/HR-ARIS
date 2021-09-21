<div class="modal" id="modal-edit-absent-file">
<div class="modal-footer">
    <button class="modal-close btn-flat" style="font-size:25px;">&times;</button>
</div>
<div class="modal-content">
    <div class="row">
        <input type="hidden" name="" id="editIDAbsent">
        <div class="col s12">
            <table class="center">
                <tr>
                    <td><b>PROVIDER:</b></td>
                    <td id="providerPrev"></td>
                    <td><b>ID NUMBER:</b></td>
                    <td id="employeeIDPrev"></td>
                </tr>
                <tr>
                    <td><b>NAME:</b></td>
                    <td id="employeeName"></td>
                    <td><b>SECTION:</b></td>
                    <td id="sectionPrev"></td>
                </tr>
                <tr>
                    <td><b>CARMODEL/GROUP:</b></td>
                    <td id="carmodelGroupPrev"></td>
                    <td><b>PROCESS/LINE:</b></td>
                    <td id="processLinePrev"></td>
                </tr>
                <tr>
                    <td><b>REASON:</b></td>
                    <td id="reasonPrev"></td>
                    <td><b># OF ABSENT:</b></td>
                    <td>
                        <input type="number" id="number_absent_prev" class="center col s6">
                    </td>
                </tr>
                <tr>
                    <td><b>REASON2:</b></td>
                    <td colspan="3" id="reason2Prev"></td>
                </tr>
                <tr>
                    <td><b>Date Absent:</b></td>
                    <td id="">
                        <input type="date" name="" id="date_absentPrev" class="">
                    </td>
                    <td><b>SHIFT:</b></td>
                    <td>
                        <select name="" id="shiftPrev" class="browser-default z-depth-3">
                        <?php
                            //USES THE CONNECTION FROM SESSION
                            $sql = "SELECT shift_code FROM aris_shift ORDER BY id ASC";
                            $stmt=$conn->prepare($sql);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){
                                echo '<option value="'.$x['shift_code'].'">'.$x['shift_code'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button class="btn col s12 #0d47a1 blue darken-4 waves-effect light-waves" onclick="update_absent_detail()">Update</button>
            </div>
        </div>
    </div>
</div>
</div>