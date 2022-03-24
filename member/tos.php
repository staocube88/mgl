<?php 
$pgtitle = "Terms of Service";
?>
<?php
require_once('../function.php');
connectdb();
session_start();

 if(isset($_SESSION['username'])){
$user = $_SESSION['username'];
}else{
$user = "Guest";
}

$general = mysql_fetch_array(mysql_query("SELECT sitetitle, terms FROM general_setting WHERE id='1'"));
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

include('include-navbar-nuser.php');

?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Terms <span class="shop-green">of Service</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">


<?php echo $general[1]; ?>


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