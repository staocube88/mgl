<?php 
$pgtitle = "Edit Profile";
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
<h1>Edit   <span class="shop-green">Profile</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">















		<form id="sky-form4" class="log-reg-block sky-form" action="" method="post">
	






<div class="row">
<div class="col-sm-12">






<?php

if($_POST)
{


$firstname = mysql_real_escape_string($_POST["firstname"]);
$lastname = mysql_real_escape_string($_POST["lastname"]);


$email = mysql_real_escape_string($_POST["email"]);
$mobile = mysql_real_escape_string($_POST["mobile"]);

$address = mysql_real_escape_string($_POST["address"]);
$city = mysql_real_escape_string($_POST["city"]);
$post = mysql_real_escape_string($_POST["post"]);
$country = mysql_real_escape_string($_POST["country"]);




$err1=0;
$err2=0;
$err3=0;
$err4=0;
$err5=0;
$err6=0;
$err7=0;
$err8=0;
$err9=0;
$err10=0;
$err11=0;
$err12=0;
$err13=0;
$err14=0;
$err15=0;
$err16=0;
$err17=0;
$err18=0;
$err19=0;
$err20=0;
$err21=0;



if(trim($firstname)==""){
$err1=1;
}

if(trim($lastname)==""){
$err2=1;
}




if(trim($email)==""){
$err6=1;
}

$eee = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."'"));
if($eee[0]!=0){
//$err7=1;
}

if(trim($mobile)==""){
$err8=1;
}

$mob = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE mobile='".$mobile."'"));
if($mob[0]!=0){
//$err9=1;
}







if(trim($address)==""){
$err10=1;
}

if(trim($city)==""){
$err11=1;
}

if(trim($post)==""){
$err12=1;
}

if(trim($country)==""){
$err13=1;
}







$error = $err1+$err2+$err3+$err4+$err5+$err6+$err7+$err8+$err9+$err10+$err11+$err12+$err13+$err14+$err15+$err16+$err17+$err18+$err19+$err20+$err21;


if ($error == 0){

$res = mysql_query("UPDATE users SET fname='".$firstname."', lname='".$lastname."', address='".$address."', city='".$city."', postcode='".$post."', country='".$country."', mobile='".$mobile."', email='".$email."' WHERE mid='".$uid."'");

if($res){
  echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Profile Updated Successfully!

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
First Name Can Not be Empty!!!
</div>";
}   
  
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Last Name Can Not be Empty!!!
</div>";
}   
  
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Please Provide a valid Date of Birth!!!
</div>";
}   

  




  
if ($err6 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Can Not be Empty!!!
</div>";
}   


  
if ($err7 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Already Exist in our database... Please Use another Email!!
</div>";
}   


  
if ($err8 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Can Not be Empty!!!
</div>";
}   


  
if ($err9 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Number Already Exist in our database... Please Use another Mobile Number!!
</div>";
}   
  


 
if ($err10 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Street Address Can Not be Empty!!!
</div>";
}   
   

  
if ($err11 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
City/State Can Not be Empty!!!
</div>";
}   
  
 

 
if ($err12 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Post Code Can Not be Empty!!!
</div>";
}   
  
if ($err13 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Country Can Not be Empty!!!
</div>";
}   






if ($err14 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Username Can Not be Empty!!!
</div>";
}   
 
if ($err15 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Username Already Exist in our database... Please Use another Username!!
</div>";
}   
  

 
if ($err16 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Password and Confirm Password not match!!!
</div>";
}   
   

  
if ($err17 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Password must be minimum 6 Char!!!
</div>";
}   
  
 

 
if ($err18 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Referrer ID Can not be Empty !!!
</div>";
}   
  
 
if ($err19 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Referrer ID not Found in Our Database!!!
</div>";
}   
  




 
if ($err20 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Please Select Poition!!!
</div>";
}   
  
 
if ($err21 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Position already taken!!
</div>";
}   
  





}




}



$old = mysql_fetch_array(mysql_query("SELECT fname, lname, email, mobile, address, city, postcode, country FROM users WHERE mid='".$uid."'"));

?>






</div>
</div>









		<div class="login-input reg-input">







		<div class="row">
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="firstname" placeholder="First name" value="<?php echo $old[0]; ?>" class="form-control">
		</label>
		</section>
		</div>
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="lastname" placeholder="Last name" value="<?php echo $old[1]; ?>" class="form-control">
		</label>
		</section>
		</div>
		</div>



		<div class="row">
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="email" name="email" placeholder="Email address" value="<?php echo $old[2]; ?>" id="email" class="form-control">
		</label>
		</section>
		<div id="emailerr"></div>
		</div>
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="mobile" placeholder="Mobile Number" value="<?php echo $old[3]; ?>" id="mobile" class="form-control">
		</label>
		</section>
		<div id="mobileerr"></div>
		</div>
		</div>



		<div class="row">
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="address" placeholder="Street Address" value="<?php echo $old[4]; ?>" class="form-control">
		</label>
		</section>
		</div>
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="city" placeholder="City/State" value="<?php echo $old[5]; ?>" class="form-control">
		</label>
		</section>
		</div>
		</div>



		<div class="row">
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="post" placeholder="Postcode" value="<?php echo $old[6]; ?>" class="form-control">
		</label>
		</section>
		</div>
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="country" placeholder="Country" value="<?php echo $old[7]; ?>" class="form-control">
		</label>
		</section>
		</div>
		</div>





		<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Update Profile</button>
		</form>


		</div>














</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->
<div style="margin-top:200px;"></div>


<?php
include("include-footer.php");
?>
</body>
</html>