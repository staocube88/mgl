<?php

require_once('../function.php');
connectdb();
session_start();


$refname = mysql_real_escape_string($_POST["refname"]);
$poss = mysql_real_escape_string($_POST["poss"]);

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$refname."'"));

if($count[0]!=1){

echo "<p style='color:red;'>Referrer ID not Found in Our Database</p>";
}else{
///---------------------------------->>>>>CHK POSITIOM
$refid = mysql_fetch_array(mysql_query("SELECT mid FROM users WHERE username='".$refname."'"));
if($poss==""){
echo "<p style='color:red;' class='pull-right'>Please Select Poition</p>";
}else{


$willPosition = getLastChildOfLR($refname,$poss);

$pos = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE mid='".$willPosition."'"));

echo "<p style='color:green; font-weight:bold;' class='pull-right'>You Will Join Under - $pos[0] </p>";



}








}



?>


