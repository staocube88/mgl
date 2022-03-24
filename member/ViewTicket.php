<?php 
$pgtitle = "View Ticket";
include('include-header.php');
?>






</head>
<body class="header-fixed">


<?php
include('include-navbar.php');

$tid = mysql_real_escape_string($_GET['tid']);


if(isset($_POST['act'])){

mysql_query("UPDATE ticket_main SET status='9' WHERE tid='".$tid."'");
echo mysql_error();

}



$tdetails = mysql_fetch_array(mysql_query("SELECT id, subject, tm, status, btext, usid FROM ticket_main WHERE tid='".$tid."'"));

if($tdetails[5]!=$uid){

echo "<div style='margin-top:200px;'></div>";


echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
You DO not have Permission to view this !
</div>";

echo "</div></div></div>";
echo "<div style='margin-top:200px;'></div>";
include("include-footer.php");
echo "</body></html>";

exit;
}


$dtm = date("Y-m-d H:i:s", $tdetails[2]);

if($tdetails[3]==0){
    $sts = "<b style='color:green;'> OPEN </b>";
}elseif($tdetails[3]==1){
    $sts = "<b style='color:blue;'> ANSWERED </b>";
}elseif($tdetails[3]==2){
    $sts = "<b style='color:orange;'> USER REPLY </b>";
}elseif($tdetails[3]==9){
    $sts = "<b style='color:red;'> CLOSED </b>";
}

?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>View   <span class="shop-green">Ticket</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">


<div class="shop-product">












<div class="panel panel-primary">
<div class="panel-heading"> <h1 style="color:#fff;">#<?php echo $tid; ?> - <?php echo $tdetails[1]; ?> 
<span class="pull-right" style="background-color:#fff; padding:5px;"><?php echo $sts; ?></span> </h1> </div>

<div class="panel-body">

<div class="row">


<div class="col-md-12 product-service md-margin-bottom-30">


<?php 

if($tdetails[3]!=9){

echo "<form action='' method='post'>
<input type='hidden' name='act' value='1'>
<button type='submit' class='btn btn-warning btn-block'> CLOSE NOW - You can ReOpen This anytime by reply </button>
</form><br><br>";


}

if(isset($_POST['btext'])){

$btext = mysql_real_escape_string($_POST['btext']);

$err1 = 0;
$err2 = 0;



if($btext==""){
    $err1 = 1;
}

$error = $err1+$err2;

if ($error == 0){


$res = mysql_query("INSERT INTO ticket_reply SET tid='".$tdetails[0]."', btext='".$btext."', tm='".time()."', typ='1'");


if($res){

mysql_query("UPDATE ticket_main SET status='2' WHERE id='".$tdetails[0]."'");

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Reply Added !! 
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
Subject Can Not Be Empty !!!
</div>";
}       
    
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Message Body Can Not Be Empty !!!
</div>";
}       
    


    
}

}









?>




<div class="row">
<div class="col-md-10">
<div class="alert alert-info">
<b>YOU:</b>
<b class="pull-right"><?php echo $dtm; ?></b><br><br>
<?php echo nl2br($tdetails[4]); ?>
</div>
</div>
</div>

<?php 

$ddaa = mysql_query("SELECT btext, tm, typ FROM ticket_reply WHERE tid='".$tdetails[0]."' ORDER BY id ASC");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa))
{

$dtm = date("Y-m-d H:i:s", $data[1]);

$txt = nl2br($data[0]);

if($data[2]==1){

echo "
<div class=\"row\">
<div class=\"col-md-10\">
<div class=\"alert alert-info\">
<b>YOU:</b>
<b class=\"pull-right\"> $dtm </b><br><br> $txt
</div>
</div>
</div>
";
}else{
echo "
<div class=\"row\">
<div class=\"col-md-10 col-md-offset-2\">
<div class=\"alert alert-warning\">
<b>STAFF:</b>
<b class=\"pull-right\"> $dtm </b><br><br> $txt
</div>
</div>
</div>
";

}




}

 ?>







</div>

				<form action="" method="post">
				<div class="col-md-12 product-service md-margin-bottom-30">

				<div class="row">

				<div class="col-md-12">
				<div class="form-group">
				<textarea name="btext" class="form-control input-lg" placeholder="Your Reply" required="" rows="4"></textarea>
				</div>
				</div>

				</div>

				<button type="submit" class="btn btn-success btn-block"> SUBMIT </button>


				</div>
		




				</form>


</div>
</div></div>
















</div>










<div style="margin-top:100px;"></div>




</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<?php
include("include-footer.php");
?>





</body>
</html>