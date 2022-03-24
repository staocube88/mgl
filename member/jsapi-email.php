<?php

require_once('../function.php');
connectdb();
session_start();


$email = mysql_real_escape_string($_POST["email"]);

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."'"));

if($count[0]!=0){
echo "<p style='color:red;'>Email Already Exist in our database... Please Use another Email!!</p>";
}

?>


