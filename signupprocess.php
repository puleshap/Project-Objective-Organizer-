<?php
require "connection.php";
$f = $_POST["fn"];
$l = $_POST["ln"];
$u = $_POST["u"];
$p = $_POST["p"];
$b = $_POST["b"];
$s = $_POST["s"];

$resultsset=Database::search("SELECT * FROM `user` WHERE
 `username`='".$u."' AND `password`='".$p."'");

$n_rows= $resultsset->num_rows;

if ($n_rows==1){
 echo("This user and password already exists");

}else if ($n_rows==0){


    if(empty($f)){
        echo ("Please enter your First Name !!!");
    }else if(empty($l)){
        echo ("Please enter your Last Name !!!");
    }else if(empty($u)){
        echo ("Please enter your Username !!!");
    }else if(strlen($u) < 5 || strlen($u) > 20){
        echo("Username must between 5-20 characters");
    }else if(empty($s)){
        echo ("Please enter your Security Code !!!");
    }else if(strlen($s) < 5 || strlen($s) > 10){
        echo("Username must between 5-20 characters");
    }else if(empty($b)){
        echo ("Please enter your birthdate !!!");
    }else if(empty($p)){
        echo ("Please enter your Password !!!");
    }else if(strlen($p) < 5 || strlen($p) > 20){
        echo("Password must between 5-20 characters");
    }else {



$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");
Database::iud("INSERT INTO `user`
(`first_name`,`last_name`,`username`,`password`,`created_date`,`birth_date`,`secretcode`) 
VALUES('".$f."','".$l."','".$u."','".$p."','".$date."','$b','$s')");

echo("success");
    }
}


?>