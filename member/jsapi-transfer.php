<?php

require_once('../function.php');
connectdb();
session_start();


$refname = mysql_real_escape_string($_POST["refname"]);

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$refname."'"));

if($count[0]!=1){

echo "<p class='btn btn-danger  btn-block btn-lg'>USER not Found in Our Database</p>";
}else{

$dd = mysql_fetch_array(mysql_query("SELECT username, email FROM users WHERE username='".$refname."'"));

echo "<p class='btn btn-success btn-block  btn-lg'>You are sending money TO $dd[0] ($dd[1]) </p>";
}






?>


