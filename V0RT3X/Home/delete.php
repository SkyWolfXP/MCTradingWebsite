<?php
include_once "../DB/Database.php";
$db = new Database;

$msg = $db->RunDML("DELETE FROM buyers WHERE SerialNo =  ".$_GET["id"].";");
echo "<script> window.open('../Home','_parent'); </script>";
?>