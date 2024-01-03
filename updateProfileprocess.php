<?php
require "connection.php";
session_start();
$data = $_SESSION['u'];
$id=$data['id'];

$f = $_POST['f'];
$l = $_POST['l'];
$u = $_POST['u'];


Database::iud("UPDATE `user` SET `first_name` ='$f',
                                `last_name` ='$l',
                                `username` ='$u' WHERE `id` ='$id'");

$data['first_name']=$f;
$data['last_name']=$l;
$data['username']=$u;

echo("1");

?>