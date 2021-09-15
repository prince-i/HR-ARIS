<div class="modal" id="modal_upload_absent">
<div class="modal-content">
    <div class="row">
        <div class="col s12 input-field">
        <form action="preview_uploaded_data_coor.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="uploader" value="<?=$_SESSION['username'];?>">
            <div class="file-field input-field col s8">
                <div class="btn blue z-depth-5">
                    <span>File</span>
                    <input type="file" name="csv-import-file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="col s4 input-field">
                <input type="submit" value="upload data" name="upload_data" class="btn blue z-depth-5 col s12">
            </div>
        </form>
        </div>
        <div class="col s12 divider"></div>
        <div class="col s12 input-field">
            <a href="../components/Template/upload_absent.csv" class="right red btn z-depth-5" download>Download Template</a>
        </div>
    </div>
</div>
</div>