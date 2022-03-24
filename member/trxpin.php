<?php 
$pgtitle = "Transaction PIN";
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
<h1>Transaction   <span class="shop-green">PIN</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">

<div class="shop-product">

















<div class="row">




<form action="" method="post">
<div class="col-md-4 product-service md-margin-bottom-30">
<div class="product-service-heading">
<h1 style="color:#fff;">RESET YOUR PIN</h1>
</div>
<div class="product-service-in">

<?php 
$cppn = mysql_fetch_array(mysql_query("SELECT trxpin FROM users WHERE mid='".$uid."'"));

if(isset($_POST['reset'])){
$reset = mysql_real_escape_string($_POST['reset']);
$err1 = 0;

if (strtoupper($reset)!="RESET"){
$err1=1;
}


$error = $err1;

if ($error == 0){
$randomPIN = rand(1000,9999);

$res = mysql_query("UPDATE users SET trxpin='".$randomPIN."' WHERE mid='".$uid."'");
if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
PIN Updated Successfully!
</div>";


///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$uid."'"));

$txt = "You Asked for reset your Transaction PIN. We just execute your request. <br/><br/> Your New PIN is:

<br><br>
<h2 style='font-size: 40px; text-align: center; font-weight: bold;'>$randomPIN</h2>
<br><br>";

abiremail($userContact[3], "Transaction PIN Reset", "$userContact[0] $userContact[1]", $txt);

//$sms ="Hi $firstname, Welcome to XpertCash. Your Verification Code is $mvcode";
//abirsms($mobile, $sms);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS


echo "<div class=\"alert alert-info alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Please Check your Mailbox For New PIN !!
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
Please Type 'RESET'
</div>";
}	

	
}


}
?>








<div class="form-group">
<input class="form-control input-lg" placeholder="type 'RESET'" name="reset" type="text" required="">
</div>

<button type="submit" class="btn btn-success btn-block"> RESET NOW </button>





</div>
</div>
</form>





<form action="" method="post">
<div class="col-md-8 product-service md-margin-bottom-30">

<div class="product-service-heading">
<h1 style="color:#fff;">CHANGE YOUR PIN</h1>
</div>
<div class="product-service-in">

<?php 
$cppn = mysql_fetch_array(mysql_query("SELECT trxpin FROM users WHERE mid='".$uid."'"));

if(isset($_POST['npin'])){


$cpin = mysql_real_escape_string($_POST['cpin']);
$npin = mysql_real_escape_string($_POST['npin']);
$nnpin = mysql_real_escape_string($_POST['nnpin']);



$err0 = 0;
$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;
$err5 = 0;



if(!is_numeric($npin)){
$err0 = 1;
}

if ($cppn[0]!==$cpin){
$err1=1;
}

///////////////////////-------------------->> 2 bar ki same?
if ($npin!=$nnpin){
$err2=1;
}

///////////////////////-------------------->> Pass ki faka??

 if(trim($npin)=="")
      {
$err3=1;
}

 if(strlen($npin)<=3)
      {
$err4=1;
}

$error = $err0+$err1+$err2+$err3+$err4;

if ($error == 0){

$res = mysql_query("UPDATE users SET trxpin='".$npin."' WHERE mid='".$uid."'");
if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

PIN Updated Successfully!

</div>";
}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Some Problem Occurs, Please Try Again. 

</div>";
}
} else {
	
if ($err0 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

PIN Must be Numbers Only!!

</div>";
}	


if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Your Current PIN Does Not Match.

</div>";
}		
if ($err2 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

You Enter Different PIN in two field. Please enter same password in both field.

</div>";

}		
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

PIN Can Not Be Empty!!!

</div>";
echo"<h1></h1>";
}		
if ($err4 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

PIN Must be 4 or more char.

</div>";
}	

	
}


}
?>




<div class="row">

<?php 
if($cppn[0]!=="0"){
 ?>


<div class="col-md-12">
<div class="form-group">
<input class="form-control input-lg" placeholder="Current PIN" name="cpin" type="password">
</div>
</div>
<?php
}else{
echo '<input name="cpin" type="hidden" value="0">';
}
?>


<div class="col-md-12">
<div class="form-group">
<input class="form-control input-lg" placeholder="New PIN" name="npin" type="password" required="">
</div>
</div>



<div class="col-md-12">
<div class="form-group">
<input class="form-control input-lg" placeholder="New PIN Again" name="nnpin" type="password" required="">
</div>
</div>












<div class="col-md-12">
<button type="submit" class="btn btn-success btn-block"> Change PIN </button>
</div>



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