<?php
require "connection.php";
$id = $_POST['id'];
$p = $_POST['p'];
$t = $_POST['t'];
$s = $_POST['s'];
$e = $_POST['e'];
$d = $_POST['d'];



if($p =='0'){
echo("Please select a status to assign to the objecctive.");
}else if(empty($t)){
    echo("Please give the objective a title.");
}else if (empty($s)){
    echo("Please select a start date.");
}else if (empty($e)){
    echo("Please select a end date.");
}else if($s>$e){

    echo('please select an end date which is after the start date.');
} else if (empty($d)){
    echo("Please give a description for the objective.");
}else{

Database::iud("UPDATE `objective` SET `heading`='$t'
                , `set_date`='$s'
                , `end_date`='$e'
                , `description`='$d'
                , `status_id`='$p'
                 WHERE `o_id` = '".$id."'");


                 echo("success");


}

?>