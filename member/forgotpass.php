<?php 
$pgtitle = "Forgot Password";
include('include-header-nuser.php');
?>

</head>
<body class="header-fixed">


<?php
include('include-navbar-nuser.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Forgot <span class="shop-green">Password</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->








<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">









				












		<div class="col-md-8 col-md-offset-2">


<?php







///////////---------------->>>>>echo "$fstform"

$fstform = '


		<form  class="log-reg-block sky-form" action="" method="post">
		<h2>RESET YOUR PASSWORD</h2>
		<div class="login-input reg-input">

		<section>
		<label class="input">
		<input type="text" name="username" placeholder="Your Username" class="form-control" required="">
		</label>
		</section>

		</div>

		<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Next Step</button>
		</form>

';



///////////---------------->>>>>echo "$fstform"












if(isset($_POST['vcode']))
{
$code= $_POST["vcode"];
$username = $_POST["user"];

$codeOnDB = mysql_fetch_array(mysql_query("SELECT forgotcode FROM users WHERE username='".$username."'"));


if($codeOnDB[0]==$code){

$aa = date("YDlJH:i:s");
$md = MD5($aa);
$newpass  = substr($md, 0, 6);
$mdpass = md5($newpass);

mysql_query("UPDATE users SET password='".$mdpass."', forgotcode='' WHERE username='".$username."'");


echo "<div class=\"alert alert-success alert-dismissable\">
Password Reset Completed Successfully !!
</div>";

echo "YOUR TEMPORARY PASSWORD IS: <strong style='font-size:24px;'> $newpass </strong> Change It As Soon As Possible!";

echo "<b style=\"color:green; font-size: 20px;\"> </b><br/><br/>";

echo "$fstform";

}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
Your Reset Code is Wrong !!!
</div>";

echo "$fstform";
}
}elseif(isset($_POST['username']))
{
$username = $_POST["username"];

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));

if($count[0]>=1){
$cde = rand(100000,999999);
mysql_query("UPDATE users SET forgotcode='".$cde."' WHERE username='".$username."'");

$sendToEmail = mysql_fetch_array(mysql_query("SELECT email, fname, lname  FROM users WHERE username='".$username."'"));


///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

$txt = "
You are request for password reset for your account (Username: $username). To Make sure that you really want to reset your password, Here is the Reset Code :
<br><br>
<h2 style='font-size: 40px; text-align: center; font-weight: bold;'>$cde</h2>
<br><br>
If you are not request for password reset, please ignore this email.
<br><br>
<b style='color:red;'>Please Do Not Share The Code With Others .</b> 
<br>
";

$name = "$sendToEmail[1] $sendToEmail[2]";
abiremail($sendToEmail[0], "Pasword Reset Code", $name , $txt);

//$sms =" ";
//abirsms($mobile, $sms);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS



echo "<div class=\"alert alert-success alert-dismissable\">
Reset Code Sent to  $sendToEmail[0]
</div>";

?>



		<form  class="log-reg-block sky-form" action="" method="post">
		<h2>RESET YOUR PASSWORD</h2>
		<div class="login-input reg-input">

		<section>
		<label class="input">
		<input type="text" name="vcode" placeholder="RESET CODE" class="form-control" required="">
		</label>
		</section>

		</div>

  		<input type="hidden" name="user" value="<?php echo $username; ?>">

		<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">RESET NOW !</button>
		</form>




<?php
}else{

echo "<div class=\"alert alert-danger alert-dismissable\">
 NO ACCOUNT FOUND WITH THIS USERNAME.
</div>";

echo "$fstform";

}
}else{


echo $fstform;

}
?>






		</div>





</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->



<div style="margin-top:280px;"></div>

<?php 
include('include-footer.php');
?>






</body>
</html>
