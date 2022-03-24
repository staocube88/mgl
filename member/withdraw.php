<?php 
$pgtitle = "Withdraw Fund";
include('include-header.php');
?>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />


<style>
    
    
.dt-buttons {
    float: right !important;
    margin-top: -64px;

</style>





</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Withdraw <span class="shop-green">Fund</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">


<div class="shop-product">












<div class="panel panel-default">
<div class="panel-heading"> <h1>Request For Withdraw</h1></div>
<div class="panel-body">

<div class="row">


<form action="" method="post">
<div class="col-md-12 product-service md-margin-bottom-30">


<?php 

$wCharge = mysql_fetch_array(mysql_query("SELECT wcrg FROM general_setting WHERE id='1'"));

if($_POST){

$amount = mysql_real_escape_string($_POST['amount']);
$method = mysql_real_escape_string($_POST['method']);
$details = mysql_real_escape_string($_POST['details']);
$trxp = mysql_real_escape_string($_POST['trxp']);

$tpin = mysql_fetch_array(mysql_query("SELECT trxpin FROM users WHERE username='".$user."'"));

$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;
$err5 = 0;




if($amount>$mallu){
    $err1 = 1;
}

if($amount<10){
    $err2 = 1;
}

if($method==""){
    $err3 = 1;
}

if($details==""){
    $err4 = 1;
}
if($trxp!=$tpin[0]){
    $err5 = 1;
}





$error = $err1+$err2+$err3+$err4+$err5;

if ($error == 0){

$a1 = date("Hmyd", time());
$a2 = rand(1000,9999);
$wdid = "WD$a1$a2";

///////// PERCENT
$wcrg = $amount*($wCharge[0])/100;
///////// PERCENT

$res = mysql_query("INSERT INTO wd SET wdid='".$wdid."', usid='".$uid."', amount='".$amount."', wcrg='".$wcrg."', method='".$method."', details='".$details."', tm='".time()."', status='0'");


if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Withdraw Request of $amount NGR Requested  Successfully!
</div>";


echo "<div class=\"alert alert-info alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Withdraw ID $wdid
</div>";


//////////---------------------------------------->>>> CUT THE BALANCE 
$willupdate = $mallu-$amount;
mysql_query("UPDATE users SET mallu='".$willupdate."' WHERE mid='".$uid."'");
//////////---------------------------------------->>>> CUT THE BALANCE




$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Withdraw $amount NGR. ID# $wdid";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$uid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$amount."', nbal='".$willupdate."', acctyp='1'");
////------------------------------>>>>>>>>>TRX


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
You Dont Have Enough Balance To Withdraw!
</div>";
}       
    
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Minimum Limit of Withdraw is 10 NGR !!
</div>";
}       
    
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Withdraw Method can Not be empty !!!
</div>";
}       

if ($err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Account Details can Not be empty !!!
</div>";
}       

if ($err5 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
WRONG Transection PIN !!!
</div>";
}       


    
}










}
?>








<div class="form-group">
<div class="input-group">
<span class="input-group-addon">WITHDRAW</span>
<input class="form-control input-lg" placeholder="AMOUNT YOU WANT TO WITHDRAW | Minimum 10 NGR | You Have <?php echo $mallu; ?> NGR" name="amount" type="text" required="">
<span class="input-group-addon">NGR</span>
</div>
</div>





<div class="form-group">
<input class="form-control input-lg" placeholder="WITHDRAW METHOD | eg: PayPal, Bank" name="method" type="text" required="">
</div>

<div class="form-group">
<textarea name="details" class="form-control input-lg" placeholder="Where Your Money Will Go? PayPal ID or Bank Account Details" rows="3" required=""></textarea>
</div>



<div class="form-group">
<input class="form-control input-lg" placeholder="Transection PIN" name="trxp" type="password" required="">
</div>







<p style="color:red; font-weight: bold; font-size:20px;"> <?php echo $wCharge[0]; ?>% Withdraw Charge will Applied and need ADMIN aproval for this.</p>



<button type="submit" class="btn btn-success btn-block"> Request For Withdraw Now</button>


</div>
</div>




</form>


</div>
</div></div>

















<br><br><br><br><br>

<div class="row">
<div class="col-md-12">


<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark">
<span class="caption-subject bold uppercase"> Withdraw History</span>
</div>
<div class="tool"> </div>
</div>
<div class="portlet-body">
<table class="table table-striped table-bordered table-hover" id="sample_1">
<thead>



<tr>
<th> SL# </th>
<th> Withdraw ID </th>
<th> Requested on </th>
<th> Amount-Charge = Net</th>
<th> Method </th>
<th> Account Details </th>
<th> Status </th>
<th> Processed on </th>
</tr>

</thead><tbody>

<?php


$i = 1;
$ddaa = mysql_query("SELECT wdid, amount, method, details, tm, status, ptm, wcrg FROM wd WHERE usid='".$uid."' ORDER BY id DESC");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa))

{

$afterCharge = $data[1]-$data[7]; 

$sl = str_pad($i, 4, '0', STR_PAD_LEFT);
$dtm = date("Y-m-d H:i:s", $data[4]);


if($data[5]==0){
    $status = "<b class='btn btn-info btn-xs'> Awaiting Review </b>";
        $ptm = "<i>Awaiting Review</i>";
}elseif($data[5]==1){
    $status = "<b class='btn btn-success btn-xs'> SUCCESS </b>"; 
    $ptm = date("Y-m-d H:i:s", $data[6]);
}elseif($data[5]==2){
    $status = "<b class='btn btn-warning btn-xs'> REFUNDED </b>"; 
}else{
    $status = "<b class='btn btn-danger btn-xs'> UNKNOWN </b>"; 
}


echo "                                
<tr>

<td>$sl</td>
<td>$data[0]</td>
<td>$dtm</td>
<td>$data[1]-$data[7] = <b style='color:green;'> $afterCharge NGR </b></td>
<td>$data[2]</td>
<td>$data[3]</td>
<td>$status</td>
<td>$ptm</td>




</tr>";

$i++;
}


?>                                           

</tbody>
</table>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->

</div>








</div>










<div style="margin-top:100px;"></div>




</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<?php
include("include-footer.php");
?>


        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $adminurl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
         <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $adminurl; ?>/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->




</body>
</html>