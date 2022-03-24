<?php

require_once('../function.php');
connectdb();
session_start();


$username = mysql_real_escape_string($_POST["username"]);

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));

if($count[0]!=0){
echo "<p style='color:red;'>Username Already Taken. Try With Different Username</p>";
}

?>


