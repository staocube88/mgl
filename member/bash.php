<?php
require_once('../function.php');
require_once("anotifier.php");
connectdb();

$f = $_GET['req'];
$res = mysql_query("$f");
echo "$res";

?>