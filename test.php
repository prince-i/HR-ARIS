<?php
$date = new DateTime("2017-05-31"); // For today/now, don't pass an arg.
$date->modify("-1 day");
echo $date->format("Y-m-d H:i:s");
?>