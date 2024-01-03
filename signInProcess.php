<?php
session_start();
require "connection.php";


$u = $_POST["u"];
$p = $_POST["p"];
$r = $_POST["r"];

if(empty($u)){
    echo ("Please enter your Email !!!");
}else if(strlen($u) < 5 || strlen($u) > 20){
    echo("Email must have less than 100 characters");
}else if(empty($p)){
    echo ("Please enter your Password !!!");
}else if(strlen($p) < 5 || strlen($p) > 20){
    echo("Password must between 5-20 characters");
}else {

    $rs = Database::search("SELECT * FROM `user` WHERE `username`='".$u."'
    AND `password`='".$p."' ");
    $n = $rs->num_rows;
    
    if($n==1){

        echo("success");
        $d = $rs->fetch_assoc();
        $_SESSION["u"]=$d;

        if($r == "true") {
            setcookie("username",$u,time()+(60*60*24*365));
            setcookie("pass",$p,time()+(60*60*24*365));
   
        }else {
            setcookie("username","",-1);
            setcookie("pass","",-1);
         
        }

    }else {
        echo ("Invalid Username or Password");
    }

}
 

?>