<?php 
$pgtitle = "Deposit Now";
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
<h1>Make  <span class="shop-green">Deposit</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">

<div class="shop-product">












<div class="panel panel-default"><div class="panel-body">
<div class="row">
<div class="col-md-4"><b class="btn btn-warning btn-block">Minimum Deposit 100 NGR</b></div>
<div class="col-md-4"><b class="btn btn-info  btn-block">1 LOT = 100 NGR</b></div>
<div class="col-md-4"><b class="btn btn-primary  btn-block">Maximum 99 LOT at a Time</b></div>
</div>
</div></div>





<div class="row">

<div class="col-md-3 product-service md-margin-bottom-30">
					<div class="product-service-heading">
					<h1 style="color:#fff;">YOUR CURRENT BALANCE</h1>
					</div>
					<div class="product-service-in">
						<b class="btn btn-primary btn-block">Earning: $ <?php echo $mallu1; ?> NGR</b>
						<b class="btn btn-info btn-block">Account : $ <?php echo $mallu2; ?> NGR</b>
					
					
					</div>
				</div>






<form action="" method="post">
<div class="col-md-9 product-service md-margin-bottom-30">


<?php 


if($_POST){

$account = mysql_real_escape_string($_POST['acc']);
$amount = (int) mysql_real_escape_string($_POST['amount']);

if($account==1){
	$currentbal = $mallu1;
}else{
	$currentbal = $mallu2;
}


$err1 = 0;
$err2 = 0;



$willcut = $amount*100;

if($willcut>$currentbal){
	$err1 = 1;
}



if($amount>99 || $amount<0){
	$err2 = 1;
}


$error = $err1+$err2;

if ($error == 0){


$dt = date("Y-m-d");
$dtm = date("Y-m-d H:i:s");

$res = mysql_query("INSERT INTO deposit SET mid='".$uid."', deposit_amount='".$amount."', bidtm='".$dtm."', pay='0', last_paid='".$dt."'");
  


if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
$amount Lot Diposited Successfully!
</div>";



//////////---------------------------------------->>>> CUT THE BALANCE 
$willupdate = $currentbal-$willcut;

if($account==1){
mysql_query("UPDATE member_balance SET balance='".$willupdate."' WHERE mid='".$uid."'");
}else{
mysql_query("UPDATE member_balance SET trade_balance='".$willupdate."' WHERE mid='".$uid."'");
}
//////////---------------------------------------->>>> CUT THE BALANCE



$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Deposit $amount Lot";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$uid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$willcut."', nbal='".$willupdate."', acctyp='".$account."'");
////------------------------------>>>>>>>>>TRX



///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$uid."'"));

$txt = "This is a soft notification that you just deposit $amount LOT.";
abiremail($userContact[3], "You Just Deposit $amount Lot", "$userContact[0] $userContact[1]", $txt);

//$sms ="Hi $firstname, Welcome to XpertCash. Your Verification Code is $mvcode";
//abirsms($mobile, $sms);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS




$paidid = mysql_fetch_array(mysql_query("SELECT paid_status FROM users WHERE mid='".$uid."'"));
if($paidid[0]==0){
mysql_query("UPDATE users SET paid_status='1' WHERE mid='".$uid."'");
updatePaid($uid);
}






//////////////-------------------->>>>>>COMMISION TO SPONSOR
$comisionPercent = mysql_fetch_array(mysql_query("SELECT comi FROM general_setting WHERE id='1'"));
$sponsor = mysql_fetch_array(mysql_query("SELECT refid FROM users WHERE mid='".$uid."'"));
$comAmount = $amount*$comisionPercent[0];



$currentBalanceOfSponsor = mysql_fetch_array(mysql_query("SELECT balance FROM member_balance WHERE mid='".$sponsor[0]."'"));
$updatedBalanceOfSponsor = $currentBalanceOfSponsor[0]+$comAmount;
mysql_query("UPDATE member_balance SET balance='".$updatedBalanceOfSponsor."' WHERE mid='".$sponsor[0]."'");


$des = "Deposit Commision From $user";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$sponsor[0]."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$comAmount."', nbal='".$updatedBalanceOfSponsor."', acctyp='1'");
////------------------------------>>>>>>>>>TRX

////------------------------------>>>>>>>>>INCOME
mysql_query("INSERT INTO my_income SET usid='".$sponsor[0]."', amount='".$comAmount."', description='".$des."', tm='".time()."', typ='R'");
////------------------------------>>>>>>>>>INCOME



//////////////-------------------->>>>>>COMMISION TO SPONSOR



///////////////// UPDATE BV
updateDepositBV($uid,$willcut);
///////////////// UPDATE BV



//////////////-------------------------------------------------------------- UPDATE USER CAT IF NOT UPDATED YET

$catNow = mysql_fetch_array(mysql_query("SELECT usercat FROM users WHERE mid='".$uid."'"));
if($catNow[0]==0){

if($amount<5){
$upCat = 1;
}else{
$upCat = 2;
}

mysql_query("UPDATE users SET usercat='".$upCat."' WHERE mid='".$uid."'");

}

//////////////-------------------------------------------------------------- UPDATE USER CAT IF NOT UPDATED YET




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
You Dont Have Enough Balance To Deposit!
</div>";
}		

	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Minimum 1 lot and Maximum 99 Lot Can Be Deposited !!
</div>";
}		


	
}










}

////------------------------------>>>>>>>>>TRX
//mysql_query("INSERT INTO trx SET usid='".$uid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$singlecost."', nbal='".$ctn."'");
////------------------------------>>>>>>>>>TRX
 ?>



<ul class="list-inline product-size margin-bottom-30">
		<li>
				<input id="acc-1" name="acc" value="1" checked="" type="radio">
				<label for="acc-1">Earning BALANCE</label>
		</li>
		<li>
				<input id="acc-2" name="acc" value="2" type="radio">
				<label for="acc-2">Account BALANCE</label>
		</li>
</ul>




<div class="row">
<div class="col-md-12">
<div class="input-group">
<span class="input-group-addon">DEPOSIT</span>
<input class="form-control input-lg" placeholder="How Many Lot You Want To Deposit?" name="amount" type="text" required="">
<span class="input-group-addon">LOT</span>
</div>
<div class="form-group">
</div>
</div>











<div class="col-md-12">
<button type="submit" class="btn btn-success btn-block"> Deposit Now</button>
</div>

</div>
</div>




</form>


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