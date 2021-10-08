<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <title>REFERENCE</title>
    <style>
        table, thead , td ,tr, th{
            border: 1px solid black;
            border-collapse:collapse;
            /* width:100%; */
            /* table-layout:fixed; */
        }
        body {
            font-family: arial;
        }
    </style>
</head>
<body>
    <center>
    <h3>REASON REFERENCE</h3>
    </center>
    <div class="row container">
    <div class="col s12">
        <div class="col s9 input-field">
            <input type="text" id="search"><label for="">Search</label>
        </div>
        <div class="col s3 input-field">
           <button class="btn blue btn-large col s12" onclick="export_code('reference')">export &darr;</button>
        </div>
    </div>
    </div>

    <table border="1" class="container" id="reference">
    <thead>
    <th>CATEGORY</th>
    <th>REASON</th>
    <th>CODE</th>
    </thead>
    <tbody id="reason_code_data">
    <?php
    require '../function/session.php';
    $count = 0;
    $sql = "SELECT *FROM aris_absent_reason ORDER BY reason_categ ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    foreach($stmt->fetchALL() as $x){
        echo '<tr>';
        echo '<td>'.$x['reason_categ'].'</td>';
        echo '<td>'.$x['reason2'].'</td>';
        echo '<td>'.$x['code'].'</td>';
        echo '</tr>';
    }

    ?>
    </tbody>
    </table>

<!-- JS & JQUERY -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#reason_code_data tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });


    function export_code(table_id, separator = ',') {
            var rows = document.querySelectorAll('table#' + table_id + ' tr');
            var csv = [];
            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll('td, th');
                for (var j = 0; j < cols.length; j++) {
                    var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
                    data = data.replace(/"/g, '""');
                    row.push('"' + data + '"');
                }
                csv.push(row.join(separator));
            }
            var csv_string = csv.join('\n');
            // Download it
            var filename = 'Reference Absent Code'+ '_' + new Date().toLocaleDateString() + '.csv';
            var link = document.createElement('a');
            link.style.display = 'none';
            link.setAttribute('target', '_blank');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
            link.setAttribute('download', filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>
</html>

