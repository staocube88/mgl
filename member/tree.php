<?php 
$pgtitle = "TREE";
include('include-header.php');
?>
<style>
	
.userInfo {
 display: none;
}
.user {
  width: 70px;
  text-align: center;
}

</style>

</head>
<body class="header-fixed">


<?php
include('include-navbar.php');


if(isset($_GET['name'])) {
$treefor = $_GET['name'];
}else{
$treefor = $user;
}
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Binary  <span class="shop-green">Tree</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">





<form action="<?php echo $baseurl;?>/Tree/" method="get">


<div class="col-md-12">
<div class="row">


<div class="col-md-3 col-md-offset-3">
<div class="form-group">
<input class="form-control input-lg" placeholder="USERNAME" name="name" type="text" required="">
</div>
</div>


<div class="col-md-3">

<button type="submit" class="btn btn-success btn-lg btn-block"> SEARCH </button>
</div>


</div>
</div>


</form>


<div style="margin-top:100px;"></div>

<?php 
$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$treefor."'"));

if($count[0]==0){
  echo "<div class=\"alert alert-danger alert-dismissable\">
NO USER FOUND !!!!!!
</div>";
echo "</div></div></div>";
echo '<div style="margin-top:300px;"></div>';
include("include-footer.php");
exit;
}

$midd = mysql_fetch_array(mysql_query("SELECT mid FROM users WHERE username='".$treefor."'"));

if(treeeee($midd[0],$uid)==0 && $midd[0]!=$uid){
  echo "<div class=\"alert alert-danger alert-dismissable\">
You Do not have permission To view This Tree !!
</div>";
echo "</div></div></div>";
echo '<div style="margin-top:300px;"></div>';
include("include-footer.php");
exit;
}



 ?>





<?php 
$root = mysql_fetch_array(mysql_query("SELECT mid, username, fname, lname, paid_status FROM users WHERE username='".$treefor."'"));
if($root[4]==0){
$paid = '<b class="btn btn-warning btn-block">FREE</b>';
}else{
$paid = '<b class="btn btn-primary btn-block">PAID</b>';
}

?>


<div class="col-xs-12">







<!--==================ROOT==================-->

<div class="row">


<div class="col-xs-6 col-xs-offset-3" >

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/$root[4].png"; ?>" alt="**" style="width:100%;">
<?php echo $root[1]; ?>
<div class="userInfo">



<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$root[1]"; ?>'><h1><?php echo $root[1]; ?></h1></a></div>
<div class="panel-body">
<?php 
echo "<h1>".strtoupper("$root[2] $root[3]")." </h1> $paid";
printBV($root[0]);
printBelowMember($root[0]);
?>
</div></div>

</div>	
</div>
</div>
</div>
<!--==================ROOT==================-->









<div style="margin-top:100px;"></div>





















<!--================================================LEFT================================================-->

<div class="row">
<div class="col-xs-5">


<?php 

$countsl =  mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE posid='".$root[0]."' AND position='L'"));

if($countsl[0]==0){
?>



<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

<div style="margin-top:100px;"></div>

<!--==================3 L==================-->

<div class="row">
<div class="col-xs-5">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

</div>	





<div class="col-xs-5 col-xs-offset-2">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

</div>	


	
</div>

<!--==================3 L==================-->



</div>	


<?php
//////////////////////////////////////////////////////////
}else{


$sl = mysql_fetch_array(mysql_query("SELECT mid, username, fname, lname, paid_status FROM users WHERE posid='".$root[0]."' AND position='L'"));
if($sl[4]==0){
$paid = '<b class="btn btn-warning btn-block">FREE</b>';
}else{
$paid = '<b class="btn btn-primary btn-block">PAID</b>';
}

?>


<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/$sl[4].png"; ?>" alt="**" style="width:100%;">
<?php echo $sl[1]; ?>
<div class="userInfo">



<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$sl[1]"; ?>'><h2><?php echo $sl[1]; ?></h2></a></div>
<div class="panel-body">
<?php 
echo "<h2>".strtoupper("$sl[2] $sl[3]")." </h2> $paid";

printBV($sl[0]);
printBelowMember($sl[0]);

?>
</div></div>
</div></div>


<div style="margin-top:100px;"></div>
<!--==================3 L==================-->
<div class="row">

<?php
$tllc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE posid='".$sl[0]."' AND position='L'"));
if($tllc[0]==0){
?>

<div class="col-xs-5">
<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

</div>	


<?php
}else{

$tll = mysql_fetch_array(mysql_query("SELECT mid, username, fname, lname, paid_status FROM users WHERE posid='".$sl[0]."' AND position='L'"));
if($tll[4]==0){
$paid = '<b class="btn btn-warning btn-block">FREE</b>';
}else{
$paid = '<b class="btn btn-primary btn-block">PAID</b>';
}

?>



<div class="col-xs-5">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/$tll[4].png"; ?>" alt="**" style="width:100%;">
<?php echo $tll[1]; ?>
<div class="userInfo">



<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$tll[1]"; ?>'><h3><?php echo $tll[1]; ?></h3></a></div>
<div class="panel-body">
<?php 
echo "<h3>".strtoupper("$tll[2] $tll[3]")." </h3> $paid";
printBV($tll[0]);
printBelowMember($tll[0]);
?>
</div></div>
</div></div>

</div>	

<?php
}
?>


<?php
$tlrc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE posid='".$sl[0]."' AND position='R'"));
if($tlrc[0]==0){

?>



<div class="col-xs-5 col-xs-offset-2">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

</div>	

<?php
}else{

$tlr = mysql_fetch_array(mysql_query("SELECT mid, username, fname, lname, paid_status FROM users WHERE posid='".$sl[0]."' AND position='R'"));
if($tlr[4]==0){
$paid = '<b class="btn btn-warning btn-block">FREE</b>';
}else{
$paid = '<b class="btn btn-primary btn-block">PAID</b>';
}

?>



<div class="col-xs-5 col-xs-offset-2">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/$tlr[4].png"; ?>" alt="**" style="width:100%;">
<?php echo $tlr[1]; ?>
<div class="userInfo">



<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$tlr[1]"; ?>'><h3><?php echo $tlr[1]; ?></h3></a></div>
<div class="panel-body">
<?php 
echo "<h3>".strtoupper("$tlr[2] $tlr[3]")." </h3> $paid";
printBV($tlr[0]);
printBelowMember($tlr[0]);
?>
</div></div>
</div></div>

</div>	

<?php
}
?>

	
</div>

<!--==================3 L==================-->



</div>	

<?php
}
?>




<!--================================================LEFT================================================-->

















<!--================================================RIGHT================================================-->


<div class="col-xs-5 col-xs-offset-2">


<?php 

$countsr =  mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE posid='".$root[0]."' AND position='R'"));

if($countsr[0]==0){

$paid = '<b class="btn btn-danger btn-block">NO USER</b>';
?>



<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

<div style="margin-top:100px;"></div>
<!--==================3 L==================-->

<div class="row">
<div class="col-xs-5">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

</div>	





<div class="col-xs-5 col-xs-offset-2">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>


</div>	


	
</div>

<!--==================3 L==================-->



</div>	


<?php
//////////////////////////////////////////////////////////
}else{


$sr = mysql_fetch_array(mysql_query("SELECT mid, username, fname, lname, paid_status FROM users WHERE posid='".$root[0]."' AND position='R'"));
if($sr[4]==0){
$paid = '<b class="btn btn-warning btn-block">FREE</b>';
}else{
$paid = '<b class="btn btn-primary btn-block">PAID</b>';
}

?>

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/$sr[4].png"; ?>" alt="**" style="width:100%;">
<?php echo $sr[1]; ?>
<div class="userInfo">

<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$sr[1]"; ?>'><h2><?php echo $sr[1]; ?></h2></a></div>
<div class="panel-body">
<?php 
echo "<h2>".strtoupper("$sr[2] $sr[3]")." </h2> $paid";
printBV($sr[0]);
printBelowMember($sr[0]);
?>
</div></div>
</div></div>


<div style="margin-top:100px;"></div>
<!--==================3 L==================-->
<div class="row">

<?php
$tllc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE posid='".$sr[0]."' AND position='L'"));
if($tllc[0]==0){
?>


<div class="col-xs-5">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

</div>	


<?php
}else{

$tll = mysql_fetch_array(mysql_query("SELECT mid, username, fname, lname, paid_status FROM users WHERE posid='".$sr[0]."' AND position='L'"));
if($tll[4]==0){
$paid = '<b class="btn btn-warning btn-block">FREE</b>';
}else{
$paid = '<b class="btn btn-primary btn-block">PAID</b>';
}

?>



<div class="col-xs-5">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/$tll[4].png"; ?>" alt="**" style="width:100%;">
<?php echo $tll[1]; ?>
<div class="userInfo">


<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$tll[1]"; ?>'><h3><?php echo $tll[1]; ?></h3></a></div>
<div class="panel-body">
<?php 
echo "<h3>".strtoupper("$tll[2] $tll[3]")." </h3> $paid";
printBV($tll[0]);
printBelowMember($tll[0]);
?>
</div></div>
</div></div>

</div>	

<?php
}
?>


<?php
$tlrc = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE posid='".$sr[0]."' AND position='R'"));
if($tlrc[0]==0){

?>



<div class="col-xs-5 col-xs-offset-2">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/e.png"; ?>" alt="**" style="width:100%;">
NO USER
</div>

</div>	

<?php
}else{

$tlr = mysql_fetch_array(mysql_query("SELECT mid, username, fname, lname, paid_status FROM users WHERE posid='".$sr[0]."' AND position='R'"));
if($tlr[4]==0){
$paid = '<b class="btn btn-warning btn-block">FREE</b>';
}else{
$paid = '<b class="btn btn-primary btn-block">PAID</b>';
}

?>



<div class="col-xs-5 col-xs-offset-2">

<div class="user" style="text-align: center; margin: auto;">
<img src="<?php echo "$baseurl/assets/img/$tlr[4].png"; ?>" alt="**" style="width:100%;">
<?php echo $tlr[1]; ?>
<div class="userInfo">


<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$tlr[1]"; ?>'><h3> <?php echo $tlr[1]; ?></h3></a></div>
<div class="panel-body">
<?php 
echo "<h3>".strtoupper("$tlr[2] $tlr[3]")." </h3> $paid";
printBV($tlr[0]);
printBelowMember($tlr[0]);
?>
</div></div>
</div></div>

</div>	

<?php
}
?>

	
</div>

<!--==================3 L==================-->



</div>	

<?php
}
?>




<!--================================================LEFT================================================-->
















































<?php 


/*
 ?>





<div class="col-xs-5 col-xs-offset-2">

<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$root[1]"; ?>'><h1><?php echo $root[1]; ?></h1></a></div>
<div class="panel-body">
<?php 
echo "<h1>".strtoupper("$root[2] $root[3]")." </h1> $paid";
?>
</div></div>

<!--==================3 R==================-->

<div class="row">
<div class="col-xs-5">

<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$root[1]"; ?>'><h1><?php echo $root[1]; ?></h1></a></div>
<div class="panel-body">
<?php 
echo "<h1>".strtoupper("$root[2] $root[3]")." </h1> $paid";
?>
</div></div>

</div>	





<div class="col-xs-5 col-xs-offset-2">

<div class="panel panel-success" style="text-align: center;">
<div class="panel-heading"><a href='<?php echo "$baseurl/Tree/$root[1]"; ?>'><h1><?php echo $root[1]; ?></h1></a></div>
<div class="panel-body">
<?php 
echo "<h1>".strtoupper("$root[2] $root[3]")." </h1> $paid";
?>
</div></div>

</div>	


	
</div>

<!--==================3 R==================-->



</div>	




<?php 

*/

 ?>





















	
</div>
<!--==================SECOND==================-->





</div>













</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->
<div style="margin-top:200px;"></div>

<?php
include("include-footer.php");
?>



<script type='text/javascript'>

	
$('.user').each(function() {
    var $this = $(this);
    $this.popover({
      trigger: 'click',
      placement: 'bottom',
      html: true,
      content: $this.find('.userInfo').html()  
    });
});


</script>

</body>
</html>