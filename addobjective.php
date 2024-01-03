<?php   
session_start();
require "connection.php";
$cat = $_POST["cat"];
$title = $_POST["title"];
$sd = $_POST["sd"];
$ed = $_POST["ed"];
$desc = $_POST["desc"];

if (isset($_SESSION["u"])) {
    $data = $_SESSION["u"];
    $user= $data['username'];
    $search= Database::search("SELECT * FROM `objective`,`user` WHERE `username` ='".$user."'
    ");
    $result = $search->fetch_assoc();
    $id=$result['User_id'];   
if($cat =='0'){
    echo("Please choose a priority.");
}else if (empty($title)){
    echo("Please give a heading to the objective.");
}else if (empty($sd)){
    echo("Please select a start date.");
}else if (empty($ed)){
    echo("Please select a end date.");
}else if($sd>$ed){

    echo('please select an end date which is after the start date.');
} else if (empty($desc)){
    echo("Please give a description for the objective.");
}else{
    $check= Database::search("SELECT * FROM `objective` WHERE `heading` ='".$title."' AND `priority_id` ='".$cat."'");
    if($check->num_rows == 0 ){
        Database::iud("INSERT INTO `objective` (`priority_id`,`User_id`,`heading`,`description`,`set_date`,`end_date`,`status_id`)
        VALUES ('$cat','$id','$title','$desc','$sd','$ed','1')         ");
    
        echo("success");
    }else{
        echo("This title already exists within this priority.");
    }
  

}


 
}

?>