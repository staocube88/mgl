<?php 
$pgtitle = "Change Password";
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
<h1>Change   <span class="shop-green">Password</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">

<div class="shop-product">


<div style="margin-top:40px;"></div>















<div class="row">








<form action="" method="post">
<div class="col-md-8 col-md-offset-2 product-service md-margin-bottom-30">

		   
<?php

if($_POST)
{

$err1=0;
$err2=0;
$err3=0;
$err4=0;


$oldword = $_POST["oldword"];
$newword = $_POST["newword"];
$newwword = $_POST["newwword"];
$oldmd = md5($oldword);

$cpass = mysql_fetch_array(mysql_query("SELECT password FROM users WHERE mid='".$uid."'"));


///////////////////////-------------------->> CURRENT PASS THIK ACHE TO?
if ($cpass[0]!=$oldmd){
$err1=1;
}

///////////////////////-------------------->> 2 bar ki same?
if ($newword!=$newwword){
$err2=1;
}

///////////////////////-------------------->> Pass ki faka??

 if(trim($newword)=="")
      {
$err3=1;
}

 if(strlen($newword)<=3)
      {
$err4=1;
}

$error = $err1+$err2+$err3+$err4;


if ($error == 0){
$md = md5($newwword);
$res = mysql_query("UPDATE users SET password='".$md."' WHERE mid='".$uid."'");
if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Password Updated Successfully!

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

Your Current Password Does Not Match.

</div>";
}		
if ($err2 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

You Enter Different Password in two field. Please enter same password in both field.

</div>";

}		
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Password Can Not Be Empty!!!

</div>";
echo"<h1></h1>";
}		
if ($err4 == 1){
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Password Must be 4 or more char.

</div>";
}	

	
}



} 
?>			



<div class="row">



<div class="col-md-12">
<div class="form-group">
<input class="form-control input-lg" name="oldword" placeholder="Your Current Password" type="password">
</div>
</div>


<div class="col-md-12">
<div class="form-group">
<input class="form-control input-lg" name="newword" placeholder="New Password" type="password">
</div>
</div>



<div class="col-md-12">
<div class="form-group">
<input class="form-control input-lg" name="newwword" placeholder="New Password Again" type="password">
</div>
</div>









<div class="col-md-12">
<button type="submit" class="btn btn-success btn-block"> Change Password </button>
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
<div style="margin-top:200px;"></div>


<?php
include("include-footer.php");
?>
</body>
</html>