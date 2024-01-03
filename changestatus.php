<?php
require "connection.php";
$val= $_POST['val'];
$id = $_POST['id'];

$result = Database::search("SELECT * FROM `objective`   WHERE  `o_id` = '".$id."'");
$result_num = $result->num_rows;


if($result_num =="1"){
    Database::iud("UPDATE `objective` SET `status_id`='$val' WHERE `o_id` = '".$id."'");
echo("success");

}else{
    echo("Error");
}


?>