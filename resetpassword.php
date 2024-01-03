<?php
require "connection.php";

$u=$_GET["u"];
$pw=$_GET["pw"];
$sc=$_GET["sc"];

$data=Database::search("SELECT * FROM `user` WHERE `username` ='$u' AND secretcode='$sc'");

$num= $data->num_rows;
 
if($num ==1){
    Database::iud("UPDATE `user` SET `password` ='$pw' WHERE `username` ='$u' AND secretcode='$sc'");
    echo("1");

}else{
    echo ("username associated with the given security code does not exist.");
}


?>