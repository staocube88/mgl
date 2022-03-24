<?php 
$pgtitle = "Add Fund";
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
<h1>Add <span class="shop-green">Fund</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">


<div class="shop-product">




<div class="row">


<?php 
$tm = time();
$dt = date("YmdH", $tm);
$payid = "$dt$uid";
$general = mysql_fetch_array(mysql_query("SELECT sitetitle, pmuid, pmsec, pp FROM general_setting WHERE id='1'"));
?>


<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading" style="background-color: #019cde;"><h1 style="color: #fff;">ADD FUND VIA PayPal</h1></div>
<div class="panel-body">



<form action="https://secure.paypal.com/uk/cgi-bin/webscr" method="post" name="paypal" id="paypal">


<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="<?php echo $general[3]; ?>" />
<input type="hidden" name="cbt" value="<?php echo $general[0]; ?>" />
<input type="hidden" name="currency_code" value="NGR" />

<!-- Allow the customer to enter the desired quantity -->
<input type="hidden" name="quantity" value="1" />
<input type="hidden" name="item_name" value="Add Fund To Account" />

<!-- Custom value you want to send and process back in the IPN -->
<input type="hidden" name="custom" value="<?php echo $uid; ?>" />



<div class="form-group">
<div class="input-group">
<span class="input-group-addon">ADD</span>
<input class="form-control input-lg" placeholder="AMOUNT YOU WANT TO ADD" name="amount" type="text" required="">
<span class="input-group-addon">NGR</span>
</div>
</div>


<input type="hidden" name="return" value="<?php echo $baseurl; ?>"/>
<input type="hidden" name="cancel_return" value="<?php echo $baseurl; ?>" />

<!-- Where to send the PayPal IPN to. -->
<input type="hidden" name="notify_url" value="<?php echo $baseurl; ?>/paypal_ipn.php" />
<br>


<input type="submit" name="PAYMENT_METHOD" value="ADD VIA PAYPAL!" class="btn btn-lg btn-block" style="background-color: #019cde; color: #fff;"><br><br>

</form>




</div>
</div>
</div>





<!-- ######### -->


<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading" style="background-color: #cb0e20;"><h1 style="color: #fff;">ADD FUND VIA PerfectMoney</h1></div>
<div class="panel-body">





<form action="https://perfectmoney.is/api/step1.asp" method="POST">
<div class="col-md-12 product-service md-margin-bottom-30">




<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $general[1]; ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $general[0]; ?>">
<input type='hidden' name='PAYMENT_ID' value='<?php echo $payid; ?>'>

<div class="form-group">
<div class="input-group">
<span class="input-group-addon">ADD</span>
<input class="form-control input-lg" placeholder="AMOUNT YOU WANT TO ADD" name="PAYMENT_AMOUNT" type="text" required="">
<span class="input-group-addon">NGR</span>
</div>
</div>


<input type="hidden" name="PAYMENT_UNITS" value="NGR">
<input type="hidden" name="STATUS_URL" value="<?php echo $baseurl; ?>/add_new_balance_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $baseurl; ?>">
<input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $baseurl; ?>">
<input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
<input type="hidden" name="SUGGESTED_MEMO" value="">
<input type="hidden" name="BAGGAGE_FIELDS" value="IDENT"><br>


</div>

<input type="submit" name="PAYMENT_METHOD" value="ADD VIA PERFECT MONEY!" class="btn btn-lg btn-block" style="background-color: #cb0e20; color: #fff;"><br><br>


</form>


</div>
</div>
</div>





                    
<!-- //content > row-->

</div>
<!-- //content-->

















<br><br><br><br><br>

<div class="row">
<div class="col-md-12">


<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark">
<span class="caption-subject bold uppercase"> Add Fund History</span>
</div>
<div class="tool"> </div>
</div>
<div class="portlet-body">
<table class="table table-striped table-bordered table-hover" id="sample_1">
<thead>



<tr>
<th> SL# </th>
<th> Added On </th>
<th> Amount </th>
<th> Method </th>
<th> TRX ID </th>
</tr>

</thead><tbody>

<?php


$i = 1;
$ddaa = mysql_query("SELECT trx, amount, method, tm FROM add_bal WHERE usid='".$uid."' ORDER BY id DESC");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa))

{


$sl = str_pad($i, 4, '0', STR_PAD_LEFT);
$dtm = date("Y-m-d H:i:s", $data[3]);



echo "                                
<tr>

<td>$sl</td>
<td>$dtm</td>
<td>$data[1] NGR</td>
<td>$data[2]</td>
<td>$data[0]</td>




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







</div>



</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<div style="margin-top:200px;"></div>

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