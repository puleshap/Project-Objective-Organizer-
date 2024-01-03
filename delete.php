<?php
require "connection.php";


$id=$_GET["id"];

Database::iud("DELETE FROM `objective` WHERE `o_id` = '$id'");
echo("success");
?>