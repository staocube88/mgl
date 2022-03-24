<?php 
$pgtitle = "Dashboard";
include('include-header.php');
?>

</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Account  <span class="shop-green">Dashboard</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">

<div class="row">
	
<?php 
$psts = mysql_fetch_array(mysql_query("SELECT paid_status FROM users WHERE mid='".$uid."'"));
$gen = mysql_fetch_array(mysql_query("SELECT uc, comitree, comi FROM general_setting WHERE id='1'"));


if($psts[0]==0){

echo "<div class=\"alert alert-warning alert-dismissable\">

<a href=\"$baseurl/UpgradeToPremium\" class='btn btn-success btn-md pull-right'> UPGRADE NOW</a>

<strong> If You Upgrade Profile You will Eligible for Comissions. </strong><br>
You will Get ₦ $gen[2] NGR When any of Your Referral Upgrade To Premium Account <br>
You will Get ₦ $gen[1] NGR When any of Your Below Tree Member Upgrade To Premium Account <br>


</div>";


}else{

echo "<div class=\"alert alert-success alert-dismissable\">

<strong> You Are Eligible for Comissions. </strong><br>
You will Get ₦ $gen[2] NGR When any of Your Referral Upgrade To Premium Account <br>
You will Get ₦ $gen[1] NGR When any of Your Below Tree Member Upgrade To Premium Account <br>


</div>";


}

 ?>


</div>




<div class="row">
	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/Tree" class="btn btn-info btn-block btn-lg"> <i class="fa fa-tree fa-5x"></i><br> Binary Tree</a>
</div>

	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/BinarySummery" class="btn btn-info btn-block btn-lg"> <i class="fa fa-list fa-5x"></i><br> Binary Summary</a>
</div>

	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/EditProfile" class="btn btn-info btn-block btn-lg"> <i class="fa fa-user fa-5x"></i><br> My Profile</a>
</div>

</div>




<div style="margin-top:30px;"></div>

<div class="row">
	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/ReferralBonus" class="btn btn-success btn-block btn-lg"> <i class="fa fa-money fa-5x"></i><br> Referral Commission</a>
</div>

	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/BinaryBonus" class="btn btn-success btn-block btn-lg"> <i class="fa fa-money fa-5x"></i><br> Binary Commission</a>
</div>

	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/TransactionHistory" class="btn btn-success btn-block btn-lg"> <i class="fa fa-money fa-5x"></i><br> Transaction History</a>
</div>

</div>



<div style="margin-top:30px;"></div>

<div class="row">
	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/AddFund" class="btn btn-primary btn-block btn-lg"> <i class="fa fa-plus fa-5x"></i><br> Add Fund</a>
</div>

	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/WithdrawFund" class="btn btn-primary btn-block btn-lg"> <i class="fa fa-repeat fa-5x"></i><br> Withdraw Fund</a>
</div>

	
<div class="col-md-4 col-xs-12">
<a href="<?php echo $baseurl; ?>/FundTransfer" class="btn btn-primary btn-block btn-lg"> <i class="fa fa-share-alt fa-5x"></i><br> Transfer Fund</a>
</div>

</div>



<?php 


//echo date("d M Y ----- h:i:s A");


 ?>







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