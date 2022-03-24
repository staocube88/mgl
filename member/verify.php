<?php 
$pgtitle = "Verify Your Profile";
?>
<?php
require_once('../function.php');
require_once("anotifier.php");
connectdb();
session_start();

 if(isset($_SESSION['username'])){
$user = $_SESSION['username'];
}else{
redirect("$baseurl");
}

$general = mysql_fetch_array(mysql_query("SELECT sitetitle, terms FROM general_setting WHERE id='1'"));




$user = $_SESSION['username'];
$sid = $_SESSION['sid'];

$userdetails = mysql_fetch_array(mysql_query("SELECT mid, sid, mallu FROM users WHERE username='".$user."'"));
$uid = $userdetails[0];
$mallu = $userdetails[2];

if($sid!=$userdetails[1]){
redirect("$baseurl/signout");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo "$pgtitle - $general[0]"; ?></title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo $baseurl; ?>/favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/shop.style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/headers/header-v5.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/footers/footer-v4.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/plugins/animate.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">

	<!-- CSS Page Styles -->
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/pages/log-reg-v3.css">

	<!-- Style Switcher -->
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/plugins/style-switcher.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/theme-colors/default.css" id="style_color">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/custom.css">


</head>
<body class="header-fixed">


<?php

if (!is_user()) {
include('include-navbar-nuser.php');
}else{
include('include-navbar.php');
}
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Verify <span class="shop-green">Account</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">







<div class="col-md-12 col-sm-12">





<?php 
$num = mysql_fetch_array(mysql_query("SELECT email, fname, lname FROM users WHERE mid='".$uid."'"));


if(isset($_POST['verify'])){

$code = mysql_real_escape_string($_POST["code"]);
$original = mysql_fetch_array(mysql_query("SELECT vercode FROM users WHERE mid='".$uid."'"));

if($code==$original[0]){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Your Account Verified Successfully!!!
</div>";

$res = mysql_query("UPDATE users SET verstat='1' WHERE mid='".$uid."'");

// ///////////////////------------------------------------->>>>>>>>>Send Email AND SMS


// $deta = mysql_fetch_array(mysql_query("SELECT emailFROM users WHERE id='".$uid."'"));

// $txt = "Your Mobile Number Verified Successfully.";
// abiremail($deta[1], "Mobile Number Verified Successfully", $deta[2], $txt);
// abirsms($deta[0], $txt);
// ///////////////////------------------------------------->>>>>>>>>Send Email AND SMS



}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
WRONG CODE !!!
</div>";
}


}


if(isset($_POST['again'])){

$email = mysql_real_escape_string($_POST["num"]);



$mvcode = rand(100000,999999);
$res = mysql_query("UPDATE users SET vercode='".$mvcode."', email='".$email."' WHERE mid='".$uid."'");

if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
CODE Sent Successfully To $email !
</div>";
///////////////////////////////////---------------------------->>>>>>>>>>>SMS

$txt = "
You are request for Account Verification. Here is the Verification Code :
<br><br>
<h2 style='font-size: 40px; text-align: center; font-weight: bold;'>$mvcode</h2>
<br><br>
Use The Code To Verify Your Account.
<br><br>
<b style='color:red;'>Please Do Not Share The Code With Others .</b> 
<br>
";

$namess = "$num[1] $num[2]";

abiremail($email, "Account Verification", $namess, $txt);



///////////////////////////////////---------------------------->>>>>>>>>>>SMS
}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Some Problem Occurs, Please Try Again. 
</div>";
}




}

?>
















<div class="row">


<div class="col-md-6 col-sm-12">
  
<form action="" method="post">
<?php
$num = mysql_fetch_array(mysql_query("SELECT email, fname, lname FROM users WHERE mid='".$uid."'"));
echo "A Verification Code Send To <b> $num[0]</b>. Input The Code To Verify Your Account";
?> 

<br><br><input type="text" class="form-control input-lg"  name="code" placeholder="CODE" required><br>

<input type="hidden" name="verify" value="1">

<button type="submit" class="btn btn-success btn-block">VERIFY NOW</button><br>
</form>
</div>








<div class="col-md-6 col-sm-12">
  
<form action="" method="post">
<?php
$num = mysql_fetch_array(mysql_query("SELECT email, fname, lname FROM users WHERE mid='".$uid."'"));
echo "<b>Don't Have a Code? Request Code Again</b>";
?> 

<input type="hidden" name="again" value="1">
<br><br><input type="text" class="form-control input-lg"  name="num" value="<?php echo $num[0]; ?>" placeholder="Your Email" required><br>
<button type="submit" class="btn btn-primary btn-block">SEND CODE TO ABOVE EMAIL</button><br>
</form>
</div>



</div>






	  <div style="min-height: 800px;"></div>


</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<div style="margin-top:230px;"></div>
<?php
include("include-footer.php");
?>
</body>
</html>