<?php

require_once('../function.php');
connectdb();
session_start();


$mobile = mysql_real_escape_string($_POST["mobile"]);

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE mobile='".$mobile."'"));

if($count[0]!=0){
echo "<p style='color:red;'>Mobile Number Already Exist in our database... Please Use another Mobile Number!!</p>";
}

?>


