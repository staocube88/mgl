<?php 
$pgtitle = "Fund Transfer";
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
<h1>Transfer  <span class="shop-green">Fund</span></h1>
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
<div class="col-md-4"><b class="btn btn-warning btn-block">Share your Balance with Other User</b></div>
<div class="col-md-4"><b class="btn btn-info  btn-block">Shared Balance Will Added to Account Balance</b></div>
<div class="col-md-4"><b class="btn btn-primary  btn-block">Minimum 01 NGR Can be Transferred</b></div>
</div>
</div></div>





<div class="row">


<form action="" method="post">
<div class="col-md-12 product-service md-margin-bottom-30">


<?php 

$trxCharge = mysql_fetch_array(mysql_query("SELECT tcrg FROM general_setting WHERE id='1'"));

if($_POST){

$transferto = mysql_real_escape_string($_POST['user']);
$amount = (int) mysql_real_escape_string($_POST['amount']);
$trxp = mysql_real_escape_string($_POST['trxp']);

$tpin = mysql_fetch_array(mysql_query("SELECT trxpin FROM users WHERE username='".$user."'"));

$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;




if($amount>$mallu){
	$err1 = 1;
}

if($amount<1){
	$err2 = 1;
}


$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$transferto."'"));
if($count[0]!=1){
	$err3 = 1;
}

if($trxp!=$tpin[0]){
    $err4 = 1;
}


$error = $err1+$err2+$err3+$err4;

if ($error == 0){


//////////---------------------------------------->>>> CUT THE BALANCE 
$willupdate = $mallu-$amount;
$res = mysql_query("UPDATE users SET mallu='".$willupdate."' WHERE mid='".$uid."'");
//////////---------------------------------------->>>> CUT THE BALANCE



if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
$amount NGR Transfered  Successfully! You Have $willupdate NGR .
</div>";





///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$uid."'"));

$txt = "This is a soft notification that you just Sent $amount NGR to $transferto.";
abiremail($userContact[3], "You Just Sent Money", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS







$sendto = mysql_fetch_array(mysql_query("SELECT mid, username, email FROM users WHERE username='".$transferto."'"));


$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Transfer $amount NGR TO $sendto[1] ";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$uid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$amount."', nbal='".$willupdate."'");
////------------------------------>>>>>>>>>TRX


///////// PERCENT
$amountToSend = $amount*(100-$trxCharge[0])/100;
///////// PERCENT





//////////---------------------------------------->>>> ADD THE BALANCE 
$cbal = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE mid='".$sendto[0]."'"));
$newbal = $cbal[0]+$amountToSend;
$res = mysql_query("UPDATE users SET mallu='".$newbal."' WHERE mid='".$sendto[0]."'");
//////////---------------------------------------->>>> ADD THE BALANCE


///////////////////------------------------------------->>>>>>>>>Send Email AND SMS
$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$sendto[0]."'"));
$txt = "This is a soft notification that you just Got $amountToSend NGR From $user.";
abiremail($userContact[3], "You Got Money", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS




$des = "Transfer $amountToSend NGR FROM $user ";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$sendto[0]."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$amountToSend."', nbal='".$newbal."'");
////------------------------------>>>>>>>>>TRX

echo "<div class=\"alert alert-info alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
$amountToSend NGR Transfered To  $transferto
</div>";


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
You Dont Have Enough Balance To Transfer!
</div>";
}		
	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Minimum Limit of Transfer is 1 NGR !!
</div>";
}		
	
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Username You want to Transfer is not Found in Our Database!!
</div>";
}		

if ($err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
WRONG Transection PIN !!!
</div>";
}   
	
}










}
?>






<div class="row">
<div class="col-md-12">



<div class="row">



<div class="col-md-6">
<div class="form-group">
<input class="form-control input-lg" placeholder="USERNAME to Transfer" name="user" id="refname" type="text" required="">
</div>
</div>


<div class="col-md-6">
<div id="resu"></div>
</div>

</div>




<div class="form-group">
<div class="input-group">
<span class="input-group-addon">TRANSFER</span>
<input class="form-control input-lg" placeholder="AMOUNT YOU WANT TO SHARE" name="amount" type="text" required="">
<span class="input-group-addon">NGR</span>
</div>

<br>

<div class="form-group">
<input class="form-control input-lg" placeholder="Transection PIN" name="trxp" type="password" required="">
</div>

<p style="color:red; font-weight: bold; font-size:20px;"> <?php echo $trxCharge[0]; ?>% Transfer Charge will Applied and transferred Fund will go to Secondary Balance.</p>

</div>




</div>











<div class="col-md-12">
<button type="submit" class="btn btn-success btn-block"> Transfer Now</button>
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






<script type='text/javascript'>

jQuery(document).ready(function(){







$('#refname').on('input', function() {

var refname = $("#refname").val();

        $.post( 
           "<?php echo $baseurl; ?>/jsapi-transfer.php",
                  { 
                     refname : refname,
                 
          },


							function(data) {
							$("#resu").html(data);
							}
               );
});





















  
});
</script>





</body>
</html>