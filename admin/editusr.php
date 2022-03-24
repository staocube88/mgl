<?php
include ('include/header.php');
?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');
?>




<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
<!-- BEGIN PAGE HEADER-->

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">EDIT USER
<small></small>
</h3>
<!-- END PAGE TITLE-->

<hr>






<div class="row">
<div class="col-md-12">
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">

<div class="portlet-body form">
<form class="form-horizontal" action="" method="post" role="form">
<div class="form-body">


<?php
$iidd = $_GET['userid'];


if($_POST)
{


$firstname = mysql_real_escape_string($_POST["fnm"]);
$lastname = mysql_real_escape_string($_POST["lnm"]);
$dob = mysql_real_escape_string($_POST["dob"]);



$address = mysql_real_escape_string($_POST["address"]);
$city = mysql_real_escape_string($_POST["city"]);
$post = mysql_real_escape_string($_POST["postcode"]);
$country = mysql_real_escape_string($_POST["country"]);

$email = mysql_real_escape_string($_POST["email"]);
$mobile = mysql_real_escape_string($_POST["mobile"]);
$mallu = mysql_real_escape_string($_POST["mallu"]);



$res = mysql_query("UPDATE users SET  fname='".$firstname."', lname='".$lastname."', dob='".$dob."', address='".$address."', city='".$city."', postcode='".$post."', country='".$country."', mobile='".$mobile."', email='".$email."', mallu='".$mallu."'  WHERE mid='".$iidd."'");

if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Updated Successfully! 
</div>";
}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Some Problem Occurs, Please Try Again. 
</div>";
}



}


$old = mysql_fetch_array(mysql_query("SELECT mid, refid, posid, position, username, password, joindate, fname, lname, dob, address, city, postcode, country, mobile, email, status, paid_status, mallu FROM users WHERE mid='".$iidd."'"));

$refBy = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE mid='".$old[1]."'"));
$posUnder = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE mid='".$old[2]."'"));

?>										






<div class="form-group">
<label class="col-md-3 control-label"><strong>User Name</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" value="<?php echo $old[4];?>" type="text" disabled="">
</div>
</div>



<div class="form-group">
<label class="col-md-3 control-label"><strong>Reff. By</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" value="<?php echo $refBy[0];?>" type="text" disabled="">
</div>

</div>


<div class="form-group">
<label class="col-md-3 control-label"><strong>Position</strong></label>
<div class="col-md-4">
<input class="form-control input-lg" value="<?php echo $posUnder[0];?>" type="text" disabled="">
</div>
<div class="col-md-2">
<input class="form-control input-lg" value="<?php echo $old[3];?>" type="text" disabled="">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Balance</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="mallu" value="<?php echo $old['mallu'] ;?>" type="text">
</div>
</div>
<hr>






<div class="form-group">
<label class="col-md-3 control-label"><strong>First Name</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="fnm" value="<?php echo $old[7];?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Last Name</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="lnm" value="<?php echo $old[8];?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Date Of Birth</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="dob" value="<?php echo $old[9];?>" type="text">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"><strong>Address</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="address" value="<?php echo $old[10];?>" type="text">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"><strong>City</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="city" value="<?php echo $old[11];?>" type="text">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"><strong>Post Code</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="postcode" value="<?php echo $old[12];?>" type="text">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"><strong>Country</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="country" value="<?php echo $old[13];?>" type="text">
</div>
</div>



<div class="form-group">
<label class="col-md-3 control-label"><strong>Mobile</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="mobile" value="<?php echo $old[14];?>" type="text">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"><strong>Email</strong></label>
<div class="col-md-6">
<input class="form-control input-lg" name="email" value="<?php echo $old[15];?>" type="text">
</div>
</div>





<div class="row">
<div class="col-md-offset-3 col-md-6">
<button type="submit" class="btn blue btn-block">UPDATE</button>
</div>
</div>

</div>
</form>
</div>
</div>
</div>		
</div><!---ROW-->		













</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->




<?php
include ('include/footer.php');
?>


</body>
</html>