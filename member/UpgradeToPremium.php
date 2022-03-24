<?php 
$pgtitle = "Upgrade To Premium";
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
<span class="page-name">&nbsp; </span>
<h1>Upgrade   <span class="shop-green">Account</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">

<div class="shop-product">

















<div class="row">


<div class="col-md-12 product-service md-margin-bottom-30">
<div class="product-service-heading">
<h1 style="color:#fff;">UPGRADE ACCOUNT INFORMATION</h1>
</div>
<div class="product-service-in">

<?php 
$gen = mysql_fetch_array(mysql_query("SELECT uc, comitree, comi FROM general_setting WHERE id='1'"));

echo " <h1>You will Be Charged ₦ $gen[0] NGR To Upgrade Account</h1>
<strong>You will Get ₦ $gen[2] NGR When any of Your Referral Upgrade To Premium Account <br>
You will Get ₦ $gen[1] NGR When any of Your Below Tree Member Upgrade To Premium Account <br></strong>
";

echo "<h3> YOU HAVE ₦ $mallu NGR</h3>";

if ($mallu<$gen[0]) {

echo "<a href=\"$baseurl/AddFund\" class='btn btn-success btn-md '> ADD FUND NOW</a>";

}


 ?>



</div><br><br>
</div>



<form action="" method="post">

<div class="col-md-6 col-md-offset-3 product-service md-margin-bottom-30">
<div class="product-service-heading">
<h1 style="color:#fff;">UPGRADE YOUR ACCOUNT</h1>
</div>
<div class="product-service-in">

<?php 
$csts = mysql_fetch_array(mysql_query("SELECT paid_status, mallu FROM users WHERE mid='".$uid."'"));

if(isset($_POST['upgrade'])){
$upgrade = mysql_real_escape_string($_POST['upgrade']);

$err1 = 0;
$err2 = 0;
$err3 = 0;

if (strtoupper($upgrade)!="UPGRADE"){
$err1=1;
}
	
if ($mallu<2500){
	$err3=1;
	}
if ($csts[0]!=0) {
$err2=1;
}

$error = $err1+$err2+$err3;	

if ($error == 0){


$res = mysql_query("UPDATE users SET paid_status='1' WHERE mid='".$uid."'");

if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Updated Successfully!
</div>";





//////////---------------------------------------->>>> CUT THE BALANCE 
$willupdate = $mallu-$gen[0];
$res = mysql_query("UPDATE users SET mallu='".$willupdate."' WHERE mid='".$uid."'");
//////////---------------------------------------->>>> CUT THE BALANCE

$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Upgrade To Premium";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$uid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$gen[0]."', nbal='".$willupdate."'");
////------------------------------>>>>>>>>>TRX

updatePaid($uid);





//////////////-------------------->>>>>>COMMISION TO SPONSOR
$comisionAmount = mysql_fetch_array(mysql_query("SELECT comi FROM general_setting WHERE id='1'"));
$sponsor = mysql_fetch_array(mysql_query("SELECT refid FROM users WHERE mid='".$uid."'"));
$comAmount = $comisionAmount[0];



$currentBalanceOfSponsor = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE mid='".$sponsor[0]."'"));
$updatedBalanceOfSponsor = $currentBalanceOfSponsor[0]+$comAmount;
mysql_query("UPDATE users SET mallu='".$updatedBalanceOfSponsor."' WHERE mid='".$sponsor[0]."'");


$des = "Referral Commision From $user";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$sponsor[0]."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$comAmount."', nbal='".$updatedBalanceOfSponsor."'");
////------------------------------>>>>>>>>>TRX

////------------------------------>>>>>>>>>INCOME
mysql_query("INSERT INTO my_income SET usid='".$sponsor[0]."', amount='".$comAmount."', description='".$des."', tm='".time()."', typ='R'");
////------------------------------>>>>>>>>>INCOME



//////////////-------------------->>>>>>COMMISION TO SPONSOR



///////////////// UPDATE BV
updateDepositBV($uid,'1');
///////////////// UPDATE BV








}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Some Problem Occurs, Please Try Again. 
</div>";
}
} else {
	
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Please Type 'UPGRADE'
</div>";
}	
	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
You Are Already A Premium Account Holder
</div>";
}	
if ($err3 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	You do not have sufficient balance to upgrade
	</div>";
	}	

	
}


}
?>








<div class="form-group">
<input class="form-control input-lg" placeholder="type 'UPGRADE'" name="upgrade" type="text" required="">
</div>

<button type="submit" class="btn btn-success btn-block"> UPGRADE NOW </button>





</div>
</div>
</form>





</div>
</div>

</div>
</div>















</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<?php
include("include-footer.php");
?>
</body>
</html>